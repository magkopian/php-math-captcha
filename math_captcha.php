<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

session_start();

//generate the math captcha numbers and save the result in a session variable
$_SESSION['math_captcha'] = ( $num_1 = rand(0, 10) * rand(1, 3) ) + ( $num_2 = rand(0, 10) * rand(1, 3) );

$img = @imagecreatetruecolor(99, 19) or die(); //create a canvas

$color_black = imagecolorallocate($img, 0, 0, 0); //allocate the colors
$color_white = imagecolorallocate($img, 255, 255, 255);

imagefilledrectangle ($img, 0, 0, 99, 19, $color_white); //make background of the image white

imagestring($img, 10, 2, 2,  $num_1.' + '.$num_2.' = ', $color_black); //draw the question string on the image

header('Content-Type: image/png'); //set the MIME type
imagepng($img); //send the image
imagedestroy($img); //free the allocated memory of the image
?>