<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

require_once 'vendor/autoload.php';

session_start();

$msg = '';

// Check if form has been submited
if ( isset($_POST['submit']) && !empty($_POST['submit']) ) {

	// Check if user answered the question
	if ( !isset($_POST['captcha_ans']) || $_POST['captcha_ans'] === '' ) {
		
		$msg = '<span class="error">Please fill the answer to the math question</span>';
		
	}
	else {
	
		$mathCaptcha = new MathCaptcha\MathCaptcha();
		
		// Validate the answer
		if ( $mathCaptcha->check($_POST['captcha_ans']) === true ) {
			
			// In a real application here you can register/login the user, insert a comment in the database etc
			$msg = '<span class="success">SUCCESS</span>';
			
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
		<title>PHP Math Captcha</title>
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
		<p id="msg"><?php echo $msg; ?></p>
		<p>Answer to this simple math question:</p>
		<form action="" method="POST">
			<img src="captcha.png" alt="">
			<input type="text" name="captcha_ans">
			<input type="submit" name="submit" value="Submit">
		</form>
	</body>
</html>