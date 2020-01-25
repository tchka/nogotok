<?php

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors','On');

require_once("../core/kernel/validate.php");

$s = \Kernel\Validate::GetConfirmCode($_GET["num"]);

$width = 120; $height = 50;

$bg_color = array(0xff, 0xff, 0xff);
$txt_color = array(0x00, 0x00, 0x00);

$img = imagecreatetruecolor($width, $height);
imagealphablending($img, true);

$background = imagecolorallocate($img, $bg_color[0], $bg_color[1], $bg_color[2]);
$textcolor  = imagecolorallocate($img, $txt_color[0], $txt_color[1], $txt_color[2]);

imagefilledrectangle($img, 0, 0, $width-1, $height-1, $background);
ImageTTFText ($img, 20, 0, 10, 35, $textcolor, $_SERVER["DOCUMENT_ROOT"]."/anima/v.ttf", $s);


$img2 = imagecreatetruecolor($width, $height+($show_credits?12:0));
imagealphablending($img2, true);

$background2 = imagecolorallocate($img2, 255, 255, 255);
$foreground2 = imagecolorallocate($img2, 255, 255, 255);

imagefilledrectangle($img2, 0, $height, $width-1, $height+12, $foreground2);
imagestring($img2, 2, $width/2-ImageFontWidth(2)*strlen($credits)/2, $height-2, $credits, $background2);

// случайные параметры (можно поэкспериментировать с коэффициентами):
// частоты
$rand1 = mt_rand(700000, 1000000) / 15000000;
$rand2 = mt_rand(700000, 1000000) / 15000000;
$rand3 = mt_rand(700000, 1000000) / 15000000;
$rand4 = mt_rand(700000, 1000000) / 15000000;

// фазы
$rand5 = mt_rand(0, 3141592) / 1000000;
$rand6 = mt_rand(0, 3141592) / 1000000;
$rand7 = mt_rand(0, 3141592) / 1000000;
$rand8 = mt_rand(0, 3141592) / 1000000;

// амплитуды
$rand9 = mt_rand(400, 600) / 100;
$rand10 = mt_rand(400, 600) / 100;

for($x = 0; $x < $width; $x++){
  for($y = 0; $y < $height; $y++) {
    // координаты пикселя-первообраза.
    $sx = $x + ( sin($x * $rand1 + $rand5) + sin($y * $rand3 + $rand6) ) * $rand9;
    $sy = $y + ( sin($x * $rand2 + $rand7) + sin($y * $rand4 + $rand8) ) * $rand10;

    // первообраз за пределами изображения
    if($sx < 0 || $sy < 0 || $sx >= $width - 1 || $sy >= $height - 1){
      $color = $bg_color;
      $color_x = $bg_color;
      $color_y = $bg_color;
      $color_xy = $bg_color;
    }else{ // цвета основного пикселя и его 3-х соседей для лучшего антиалиасинга
      $color = array((imagecolorat($img, $sx, $sy) >> 16) & 0xFF, (imagecolorat($img, $sx, $sy) >> 8) & 0xFF, (imagecolorat($img, $sx, $sy) >> 0) & 0xFF);
      $color_x = array((imagecolorat($img, $sx + 1, $sy) >> 16) & 0xFF, (imagecolorat($img, $sx + 1, $sy) >> 8) & 0xFF, (imagecolorat($img, $sx + 1, $sy) >> 0) & 0xFF);
      $color_y = array((imagecolorat($img, $sx, $sy + 1) >> 16) & 0xFF, (imagecolorat($img, $sx, $sy + 1) >> 8) & 0xFF, (imagecolorat($img, $sx, $sy + 1) >> 0) & 0xFF);
      $color_xy = array((imagecolorat($img, $sx + 1, $sy + 1) >> 16) & 0xFF, (imagecolorat($img, $sx + 1, $sy + 1) >> 8) & 0xFF, (imagecolorat($img, $sx + 1, $sy + 1) >> 0) & 0xFF);
    }

    // сглаживаем только точки, цвета соседей которых отличается
    if($color == $color_x && $color == $color_y && $color == $color_xy){
      $newcolor = $color;
    }else{
      $frsx = $sx - floor($sx); //отклонение координат первообраза от целого
      $frsy = $sy - floor($sy);
      $frsx1 = 1 - $frsx;
      $frsy1 = 1 - $frsy;

      // вычисление цвета нового пикселя как пропорции от цвета основного пикселя и его соседей
      for ($jc = 0; $jc < 3; $jc++)
      $newcolor[$jc] = floor( $color[$jc]    * $frsx1 * $frsy1 +
                              $color_x[$jc]  * $frsx  * $frsy1 +
                              $color_y[$jc]  * $frsx1 * $frsy  +
                              $color_xy[$jc] * $frsx  * $frsy );
    }
    $ncolor = imagecolorallocate($img2, $newcolor[0], $newcolor[1], $newcolor[2]);
    imagesetpixel($img2, $x, $y, $ncolor);
  }
}

for ($x = 0; $x < $width; $x = $x+3) imageline($img2, $x, 0, $x, $height-1, $background);
for ($y = 0; $y < $height; $y = $y+3) imageline($img2, 0, $y, $width-1, $y, $background);

header("Content-Type: image/gif");
imagegif($img2);

?>