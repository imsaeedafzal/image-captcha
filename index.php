<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Create the image
$_SESSION['captcha'] = substr(md5(time()), 0, 6);

// Set Content type
//@session_start();
header("Content-type: image/png");
$im = imagecreate(150, 50);
// Create some colors
$white = imagecolorallocate($im, 179, 179, 179);
$red = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 227, 6, 19);
// the text draw
$size = $_SESSION['captcha'];
$text = "$size";
// Replace path by your own font ttf
$font = 'arial.ttf';
// Add some shadow
imagettftext($im, 20, 0, 25, 28, $red, $font, $text);
// Add Text
imagettftext($im, 20, 0, 25, 30, $black, $font, $text);
imagepng($im);
imagedestroy($im);