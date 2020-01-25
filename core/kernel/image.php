<?php
namespace Kernel;
class Image {
        var $logs = array();

        function Resize($source, $destination, $maxwidth, $maxheight, $type = "jpg") {
                list($width, $height) = getimagesize($source);

                $k = min($maxwidth / $width, $maxheight / $height);
                if ($k > 1) $k = 1;

                $newwidth = $width * $k;
                $newheight = $height * $k;

                $thumb = imagecreatetruecolor($newwidth, $newheight);

                imagesavealpha($thumb, true);
                $trans_colour = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
                imagefill($thumb, 0, 0, $trans_colour);

                $origin = @imagecreatefromjpeg($source);
                if (!$origin) {
                        $origin = @imagecreatefromgif($source);
                        if (!$origin) {
                                $origin = @imagecreatefrompng($source);
                                if (!$origin) return false;
                        }
                }

                imagecopyresampled($thumb, $origin, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                if ($type == "png") imagepng($thumb, $destination);
                else imagejpeg($thumb, $destination, 98);

                chmod($destination, 0777);

                if (is_object($this)) {
                        $this -> logs = array(
                                "width" => $width,
                                "height" => $height,
                                "new_width" => $newwidth,
                                "new_height" => $newheight
                                );
                }

                return true;
        }

        function thumb($source, $destination, $maxwidth, $maxheight, $type = "jpg") {
                list($width, $height) = getimagesize($source);

                $k = min($maxwidth / $width, $maxheight / $height);
                if ($k > 1) $k = 1;

                $newwidth = $width * $k;
                $newheight = $height * $k;

                $thumb = imagecreatetruecolor($maxwidth, $maxheight);

                imagesavealpha($thumb, true);
                $trans_colour = imagecolorallocatealpha($thumb, 255, 255, 255, 127);
                imagefill($thumb, 0, 0, $trans_colour);

                $origin = @imagecreatefromjpeg($source);
                if (!$origin) {
                        $origin = @imagecreatefromgif($source);
                        if (!$origin) {
                                $origin = @imagecreatefrompng($source);
                                if (!$origin) return false;
                        }
                }

                $dst_x = floor(($maxwidth - $newwidth) / 2);
                $dst_y = floor(($maxheight - $newheight) / 2);

                imagecopyresampled($thumb, $origin, $dst_x, $dst_y, 0, 0, $newwidth, $newheight, $width, $height);

                if ($type == "png") imagepng($thumb, $destination);
                else imagejpeg($thumb, $destination, 98);

                chmod($destination, 0777);

                if (is_object($this)) {
                        $this -> logs = array(
                                "width" => $width,
                                "height" => $height,
                                "new_width" => $newwidth,
                                "new_height" => $newheight
                                );
                }

                return true;
        }


	public function CropAndResize($source, $destination, $x, $y, $w, $h, $targ_w, $targ_h, $jpeg_quality = 90, $img_format = "jpg") {
		$img = $source;
		$pvimg = $destination;

		$dst_r = ImageCreateTrueColor($targ_w, $targ_h);

		if ($img_format == "png") {
			$background = imagecolorallocate($dst_r, 0, 0, 0);
			ImageColorTransparent($dst_r, $background); // make the new temp image all transparent
			imagealphablending($dst_r, false);
			$img_r = imagecreatefrompng($source);
		} else {
			$img_r = @imagecreatefromjpeg($source);
			if (!$img_r) {
				$img_r = @imagecreatefromgif($source);
				if (!$img_r) {
					$img_r = @imagecreatefrompng($source);
					if (!$img_r) {
						return false;
					}
				}
			}
		}

		imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
		if ($img_format == "png") {
			$result = imagepng($dst_r, $pvimg); 
		} else {
			$result = imagejpeg($dst_r, $pvimg, $jpeg_quality);
		}

		if ($result) {
			chmod($pvimg, 0666);
		}

		return $result;
	}

	public function CropCenterAndResize($source, $destination, $targ_w, $targ_h, $jpeg_quality = 90) {
		list($w, $h) = getimagesize($source);
		if ($w and $h) {
			$k = min($w/$targ_w, $h/$targ_h);
			$new_w = floor($targ_w * $k);
			$new_h = floor($targ_h * $k);
			$x = floor(($w - $new_w) / 2); if ($x < 0) $x = 0;
			$y = floor(($h - $new_h) / 2); if ($y < 0) $y = 0;
			return $this -> CropAndResize($source, $destination, $x, $y, $new_w, $new_h, $targ_w, $targ_h, $jpeg_quality);
		} else {
			return false;
		}
	}

        function CropCenter($source, $destination, $targ_w, $targ_h, $jpeg_quality = 90) {
        	list($w, $h) = getimagesize($source);
		if ($w and $h) {
			$new_w = $targ_w;
			$new_h = $targ_h;
			$x = floor(($w - $new_w) / 2); if ($x < 0) $x = 0;
			$y = floor(($h - $new_h) / 2); if ($y < 0) $y = 0;
	                return $this -> CropAndResize($source, $destination, $x, $y, $new_w, $new_h, $targ_w, $targ_h, $jpeg_quality);
	        } else return false;
        }

        function IsJPEG($filename) {
                $output = false;
                $image = @imagecreatefromjpeg($filename);
                if ($image) $output = true;
                imagedestroy($image);
                return $output;
        }

}

function smart_flip( $file, $output = 'file')
    {
        $info = getimagesize($file);
        $image = '';

        list($width, $height) = $info;

        switch ( $info[2] ) {
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($file);
            break;
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($file);
            break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($file);
            break;
            default:
                return false;
        }
        
        $image_resized = imagecreatetruecolor( $width, $height );
                
        if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
            $trnprt_indx = imagecolortransparent($image);
   
            // If we have a specific transparent color
            if ($trnprt_indx >= 0) {
   
                // Get the original image's transparent color's RGB values
                $trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
   
                // Allocate the same color in the new image resource
                $trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
   
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $trnprt_indx);
   
                // Set the background color for new image to transparent
                imagecolortransparent($image_resized, $trnprt_indx);
   
            
            } 
            // Always make a transparent background color for PNGs that don't have one allocated already
            elseif ($info[2] == IMAGETYPE_PNG) {
   
                // Turn off transparency blending (temporarily)
                imagealphablending($image_resized, false);
   
                // Create a new transparent color for image
                $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
   
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $color);
   
                // Restore transparency blending
                imagesavealpha($image_resized, true);
            }
        }

        imagecopyresampled($image_resized, $image, 0, 0, ($width-1), 0, $width, $height, 0-$width, $height);
    
        switch ( strtolower($output) ) {
            case 'browser':
                $mime = image_type_to_mime_type($info[2]);
                header("Content-type: $mime");
                $output = NULL;
            break;
            case 'file':
                $output = $file;
            break;
            case 'return':
                return $image_resized;
            break;
            default:
            break;
        }

        switch ( $info[2] ) {
            case IMAGETYPE_GIF:
                imagegif($image_resized, $output);
            break;
            case IMAGETYPE_JPEG:
                imagejpeg($image_resized, $output);
            break;
            case IMAGETYPE_PNG:
                imagepng($image_resized, $output);
            break;
            default:
                return false;
        }

        return true;
    }
