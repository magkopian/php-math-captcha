<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

session_start();

$msg = '';
if (isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == 'Submit') { //check if form has been submited
	if (!isset($_SESSION['math_captcha']) || empty($_SESSION['math_captcha'])) { //check if math captcha has been generated
		$msg = '<span class="error">An unexpected error has been occurred</span>';
	}
	else if (!isset($_POST['captcha_ans']) || empty($_POST['captcha_ans'])) { //check if user answered the question
		$msg = '<span class="error">Please fill the answer to the math question</span>';
	}
	else {
		$math_captcha = $_SESSION['math_captcha'];
		unset($_SESSION['math_captcha']);
		
		if ((int) trim($_POST['captcha_ans']) === $math_captcha) { //validate the answer
			$msg = '<span class="success">SUCCESS</span>'; //in a real application here you can register, loggin your user etc
		}
		else {
			$msg = '<span class="error">You didn\'t answered the question correctly</span>';
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Simple Chat</title>
		<style type="text/css">
			.error {
				color: red;
			}
			.success {
				color: green;
			}
		</style>
	</head>
	<body>
		<p id="msg"><?=$msg?></p>
		<p>Answer to this simple math question:</p>
		<form action="" method="POST">
			<img src="captcha.png" alt="">
			<input type="text" name="captcha_ans">
			<input type="submit" name="submit" value="Submit">
		</form>
	</body>
<html>