<?php
//Set the default font path for GD
putenv('GDFONTPATH=' . realpath('.'));

//Start the session
session_start();
//Set all characters that will be used for this captcha
$captcha_num = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
//Only take 6 of them randomly and store them into the session variable "code"
$captcha_num = substr(str_shuffle($captcha_num), 0, 6);
$_SESSION["code"] = $captcha_num;

//Set parameters for the image size and font
$img_width = 200;
$img_height = 40;
$font_size = 20;
$font = "/fonts/Roboto.ttf";

//Set this page content type to PNG to return an image
header('Content-type: image/png');

//Use the imagecreate() function to create the background image with given parameters and color
$image = imagecreate($img_width, $img_height);
imagecolorallocate($image, 255, 255, 255);

//Set the captcha text color
$text_color = imagecolorallocate($image, 0, 0, 0);

//Use the imagettftext() function to generate text into the image
imagettftext($image, $font_size, 0, 50, 30, $text_color, $font, $captcha_num);

//Display the final image with text in it
imagepng($image);

 ?>