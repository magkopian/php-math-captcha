<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

require_once 'vendor/autoload.php';

session_start();

$mathCaptcha = new MathCaptcha\MathCaptcha();

try {
	$mathCaptcha->generate();
	$mathCaptcha->output();
}
catch ( MathCaptcha\MathCaptchaException $e ) {
	// Here you normally log the error, and you can output an error image
	// to notify the user that something went wrong, if you want.
}