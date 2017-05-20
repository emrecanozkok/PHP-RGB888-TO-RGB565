<?php

$im = imagecreatefromjpeg('ttt.jpeg');
$width = imagesx($im);
$height = imagesy($im);
echo '#define DRAGON_WIDTH  '.$width.PHP_EOL;
echo '#define DRAGON_HEIGHT  '.$height.PHP_EOL;
echo 'const PROGMEM uint16_t dragonBitmap[DRAGON_WIDTH * DRAGON_HEIGHT] = {'.PHP_EOL;
$is= 0;
for ($x = 0; $x < $width; $x++) {
    
    
    
    for ($y = 0; $y < $height; $y++) {
        $is ++;
        
        if ($is % 10 == 0) {
            echo PHP_EOL;
        }
        // pixel color at (x, y)
        $color = imagecolorat($im, $x, $y);

        $color_tran = imagecolorsforindex($im, $color);
        /*var_dump($color_tran);*/

        $red = $color_tran['red'];
        $green = $color_tran['green'];
        $blue = $color_tran['blue'];

        $b = ($blue >> 3) & 0x1f;
        $g = (($green >> 2) & 0x3f) << 5;
        $r = (($red >> 3) & 0x1f) << 11;

        echo "0X". strtoupper(dechex($r | $g | $b)).',';

       // echo dechex(($color_tran['red'] << 11) | ($color_tran['green'] << 5) | $color_tran['blue']);
    }
}
echo '};';
