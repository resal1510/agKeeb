<?php
//Set the default font path for GD
putenv('GDFONTPATH=' . realpath('.'));
session_start();
//All characters that will be used for the captcha
$permitted_chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ0123456789';
//Generate the random string to display on the captcha
function generate_string($input, $strength = 10) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
//Create a new image wuth php
$image = imagecreatetruecolor(200, 50);
imageantialias($image, true);
//Setup all used colors
$colors = [];
$red = rand(125, 175);
$green = rand(125, 175);
$blue = rand(125, 175);
 //generate colors
for($i = 0; $i < 5; $i++) {
  $colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
}
//Fill the image with a color
imagefill($image, 0, 0, $colors[0]);
//Create lines behind
for($i = 0; $i < 10; $i++) {
  imagesetthickness($image, rand(2, 10));
  $line_color = $colors[rand(1, 4)];
  imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $line_color);
}

$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$textcolors = [$black, $white];
//Setup fonts for captcha text
$fonts = ['../../fonts/Roboto.ttf', '../../fonts/BebasNeue.ttf', '../../fonts/Shadows.ttf', '../../fonts/IBMPlexMono.ttf', '../../fonts/BalooBhai.ttf'];
//Call the function that generate the string for the captcha
$string_length = 6; //Here we can change the lenght of the string
$captcha_string = generate_string($permitted_chars, $string_length);
//Store the string into the session
$_SESSION['code'] = $captcha_string;
//Display the letters randomly into the image
for($i = 0; $i < $string_length; $i++) {
  $letter_space = 170/$string_length;
  $initial = 15;
  imagettftext($image, 24, rand(-15, 15), $initial + $i*$letter_space, rand(25, 45), $textcolors[rand(0, 1)], $fonts[array_rand($fonts)], $captcha_string[$i]);
}
//Generate the final image
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
 ?>
