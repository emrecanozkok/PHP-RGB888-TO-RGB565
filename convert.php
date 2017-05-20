<?php
$im = imagecreatefromjpeg('ttt.jpeg');
$width = imagesx($im);
$height = imagesy($im);

for ($x = 0; $x < $width; $x++) {
    for ($y = 0; $y < $height; $y++) {
      $color = imagecolorat($im, $x, $y);
      $color_tran = imagecolorsforindex($im, $color);

      $red = $color_tran['red'];
      $green = $color_tran['green'];
      $blue = $color_tran['blue'];
      /*bit Shifting*/
      $b = ($blue >> 3) & 0x1f;
      $g = (($green >> 2) & 0x3f) << 5;
      $r = (($red >> 3) & 0x1f) << 11;

      echo "0X". strtoupper(dechex($r | $g | $b));
   }
}
