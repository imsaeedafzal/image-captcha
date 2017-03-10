<?php

$limit = (isset($_GET['limit'])) ? $_GET['limit'] : 6;
$width = (isset($_GET['width'])) ? $_GET['width'] : 190;
$height = (isset($_GET['height'])) ? $_GET['height'] : 50;

$angle = 0;

// X Coordinates (from upper left to right)
$coordinates_x = 35;
$coordinates_x_shadow = 32;

// Y Coordinates (from top to baseline)
$coordinates_y = 40;
$coordinates_y_shadow = 38;

// Font and text to generate
$fontSize = 30;
$fontFile = 'arial.ttf';
$captcha_text = substr(md5(time()), 0, $limit);

// Start session
@session_start();
$_SESSION['captcha'] = $captcha_text;

// Set Content type
header("Content-type: image/png");
$image = imagecreate($width, $height);

// Create some colors
$image_background = imagecolorallocate($image, 179, 179, 179);
$text_shadow_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 227, 6, 19);

// Add some shadow
imagettftext($image, $fontSize, $angle, $coordinates_x_shadow, $coordinates_y_shadow, $text_shadow_color, $fontFile, $captcha_text);

// Add Text
imagettftext($image, $fontSize, $angle, $coordinates_x, $coordinates_y, $text_color, $fontFile, $captcha_text);
imagepng($image);

imagedestroy($image);