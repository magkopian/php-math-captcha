<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

session_start();

require_once('classes/MathCaptcha.php');
require_once('classes/MathCaptchaException.php');

$mathCaptcha = new MathCaptcha();
$mathCaptcha->generate();
$mathCaptcha->output();
