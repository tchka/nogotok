<?php
namespace Kernel;
class Field {
	private $data = array();
	private $options = array();
	private $default_value = '';

	private $file_dir = '/files';
	private $file_link = '';

	private $image_dir = '/files/images';
	private $image_preview_size = null;
	private $image_resize = null;
	private $image_show = false;

	private $remove_link = '';

	public function __construct($name) {
		$this->data['name'] = $name;
		return $this;
	}

	public function __get($v) {
		return $this->data[$v];
	}

	public function Title($v) {
		$this->data['title'] = $v;
		return $this;
	}

	public function Type($v = null) {
		if (is_null($v)) {
			return $this->data['type'];
		}

		$this->data['type'] = $v;
		return $this;
	}

	public function Value($v) {
		if ($this->type() != 'custom') {
			$this->data['value'] = $v;
		}
		return $this;
	}

	public function Options($a) {
		if (is_array($a)) {
			foreach ($a as $j => $i) {
				$this->options[$j] = $i;
			}
		}
		return $this;
	}

	public function DefaultValue($v = null) {
		if (is_null($v)) {
			return $this->default_value;
		}
		$this->default_value = $v;
		return $this;
	}

	public function Param($p, $v) {
		$this->data['param'][$p] = $v;
		return $this;
	}

	public function ImagePreviewSize($w, $h) {
		$this->image_preview_size = array(
			'width' => $w,
			'height' => $h
			);
		return $this;
	}

	public function ImageResize($w, $h) {
		$this->image_resize = array(
			'width' => $w,
			'height' => $h
			);
		return $this;
	}

	public function ImageDir($d) {
		$this->image_dir = $d;
		return $this;
	}

	public function getImageDir($d) {
		return $this->image_dir;
	}

	public function ImageShow() {
		$this->image_show = true;
		return $this;
	}

    public function FileDir($d) {
        $this->file_dir = $d;
        return $this;
    }

    public function getFileDir() {
        return $this->file_dir;
    }

    public function fileLink($d) {
        $this->file_link = $d;
        return $this;
    }

    public function removeLink($d) {
        $this->remove_link = $d;
        return $this;
    }

	public function Render() {
		$params = '';
		if ($this->data['param'] and is_array($this->data['param'])) {
			foreach ($this->data['param'] as $p => $v) {
				$params.= ' '.$p.'="'.$v.'"';
			}
		}

		switch ($this->type) {
			case 'hidden':
				$output = '<input type="hidden" name="'.$this->name.'" value="'.(strlen($this->value) ? $this->value : $this->default_value).'" />';
				break;
			case 'text':
				$output = '<input type="text" class="text" name="'.$this->name.'" value="'.$this->value.'" '.$params.' />';
				break;
			case 'numeric':
				$output = '<input type="text" class="text" name="'.$this->name.'" value="'.$this->value.'" '.$params.' />';
				break;
			case 'password':
				$output = '<input type="text" class="text" name="'.$this->name.'" value="" '.$params.' />';
				break;
			case 'date':
				$output = '<input type="text" class="date" name="'.$this->name.'" value="'.$this->value.'" '.$params.' />';
				break;
            case 'file':
                if ($this->value) {
                    $output.= '<div class="field_file_preview">
                    	<a href="'.($this->file_link ? $this->file_link : $this->file_dir.'/'.$this->value).'">'.$this->value.'</a>
                    	'.($this->remove_link ? '&ndash; <a href="'.$this->remove_link.'" onclick="if (confirm(\'Удалить?\')) { var el = $(this); var h = el.attr(\'href\'); $.get(h, {}, function(data){ el.closest(\'.field_file_preview\').remove(); } ); } return false; ">удалить</a>' : '').'
                    </div>';
                }

                $output.= '<input type="file" class="text" name="'.$this->name.'" value="" '.$params.' />';
                break;
			case 'image':
				if ($this->value) {
					if ($this->image_preview_size) {

						if (file_exists(ROOT . $this->image_dir.'/_pv_'.$this->image_preview_size['width'].'x'.$this->image_preview_size['height'].'_'.$this->value)) {
							$output.= '<div class="field_image_preview"><img src="'.$this->image_dir.'/_pv_'.$this->image_preview_size['width'].'x'.$this->image_preview_size['height'].'_'.$this->value.'" /></div>';
						}
						else {
							$output.= '<div class="field_image_preview">
								<a href="'.$this->image_dir.'/'.$this->value.'">'.$this->value.'</a>
		                    	'.($this->remove_link ? '&ndash; <a href="'.$this->remove_link.'" onclick="if (confirm(\'Удалить?\')) { var el = $(this); var h = el.attr(\'href\'); $.get(h, {}, function(data){ el.closest(\'.field_image_preview\').remove(); } ); } return false; ">удалить</a>' : '').'
							</div>';
						}

					}
					else {
						if ($this->image_show) {
							$output.= '<div class="field_image_preview"><img src="'.$this->image_dir.'/'.$this->value.'" title="'.$this->value.'" /></div>';
						}
						else {
							$output.= '<div class="field_image_preview">
								<a href="'.$this->image_dir.'/'.$this->value.'">'.$this->value.'</a>
		                    	'.($this->remove_link ? '&ndash; <a href="'.$this->remove_link.'" onclick="if (confirm(\'Удалить?\')) { var el = $(this); var h = el.attr(\'href\'); $.get(h, {}, function(data){ el.closest(\'.field_image_preview\').remove(); } ); } return false; ">удалить</a>' : '').'
							</div>';
						}
					}
				}

				$output.= '<input type="file" class="text" name="'.$this->name.'" value="" '.$params.' />';
				break;
			case 'checkbox':
				$output = '<input type="checkbox" name="'.$this->name.'" '.( (
					(strlen($this->value) and $this->value) or 
					(!strlen($this->value) and $this->default_value) ) ? 'checked' : '').' value="1" />';
				break;
			case 'textarea':
				$output = '<textarea class="short" name="'.$this->name.'" '.$params.'>'.$this->value.'</textarea>';
				break;
			case 'select':
				$output = '<select name="'.$this->name.'">';
				if (!$this->value and strlen($this->value) == 0) {
					$this->value = $this->default_value;
				}
				foreach ($this->options as $j => $i) {
					$output.= '<option value="'.$j.'" '.($j == $this->value ? 'selected' : '').'>'.$i.'</option>';
				}
				$output.= '</select>';
				break;
			case 'visual':
				$visual = new \Admin\Visual($this->name);
				$visual->setValue( $this->value );

				if ($this->data['param'] and is_array($this->data['param'])) {
					foreach ($this->data['param'] as $p => $v) {
						$visual->setConfig($p, $v);
					}
				}

				$output = $visual->render();
				break;
			default:
				$output = ($this->type() == 'custom') ? $this->default_value : $this->value;
				break;
		}

		return $output;
	}

	public function setPostValue() {
		if ($this->type == 'image') {
		}
		elseif ($this->type == 'file') {
		}
		else {
			$this->Value($_POST[$this->name]);
		}
	}

	public function postValue() {
		if ($this->type == 'image') {
			if (is_uploaded_file($_FILES[$this->name]['tmp_name'])) {
				$f = pathinfo($_FILES[$this->name]['name']);

				if (!in_array($f['extension'], array('gif', 'jpg', 'jpeg', 'png'))) {
					return '';
				}

				$fname = uniqid(time()).'.'.$f['extension'];
				move_uploaded_file($_FILES[$this->name]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$this->image_dir.'/'.$fname);

				if ($this->image_preview_size) {
					$img = new \Kernel\Image();
					$img->CropCenterAndResize(
						$_SERVER['DOCUMENT_ROOT'].$this->image_dir.'/'.$fname, 
						$_SERVER['DOCUMENT_ROOT'].$this->image_dir.'/_pv_'.$this->image_preview_size['width'].'x'.$this->image_preview_size['height'].'_'.$fname,
						$this->image_preview_size['width'],
						$this->image_preview_size['height']
					);
				}

				if ($this->image_resize) {
					$img = new \Kernel\Image();
					$img->Resize(
						$_SERVER['DOCUMENT_ROOT'].$this->image_dir.'/'.$fname, 
						$_SERVER['DOCUMENT_ROOT'].$this->image_dir.'/'.$fname,
						$this->image_resize['width'],
						$this->image_resize['height']
					);
				}

				if (strlen($this->value)) {
					@unlink($_SERVER['DOCUMENT_ROOT'].$this->image_dir.'/'.$this->value);
					if ($this->image_preview_size) {
						@unlink($_SERVER['DOCUMENT_ROOT'].$this->image_dir.'/_pv_'.$this->image_preview_size['width'].'x'.$this->image_preview_size['height'].'_'.$this->value);
					}
				}

				return $fname;
			}
			else return '';
		}
        elseif ($this->type == 'file') {
            if (is_uploaded_file($_FILES[$this->name]['tmp_name'])) {
                $f = pathinfo($_FILES[$this->name]['name']);

                if (in_array(strtolower($f['extension']), array('php', 'phtm', 'phtml', 'js'))) {
                    return '';
                }

                $fname_n = 1;
                $fname_t = substr( translit( $f['filename'] ), 0, 200 );
                $fname = $fname_t.'.'.$f['extension'];
                while (file_exists($_SERVER['DOCUMENT_ROOT'].$this->file_dir.'/'.$fname)) {
                	$fname = $fname_t.'_'.($fname_n++).'.'.$f['extension'];
                }

                move_uploaded_file($_FILES[$this->name]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$this->file_dir.'/'.$fname);

                chmod($_SERVER['DOCUMENT_ROOT'].$this->file_dir.'/'.$fname, 0644);

                if (strlen($this->value)) {
                    @unlink($_SERVER['DOCUMENT_ROOT'].$this->file_dir.'/'.$this->value);
                }

                return $fname;
            }
            else return '';
        }
		elseif ($this->type == 'password') {
			return (strlen($_POST[$this->name]) ? encodePass($_POST[$this->name]) : '');
		}
		elseif ($this->type == 'numeric') {
			return preg_replace("/([^0-9\.]+)/", "", $_POST[$this->name]);
		}
		else {
			return $_POST[$this->name];
		}
	}


}