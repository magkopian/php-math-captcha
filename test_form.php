<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

session_start();

$msg = '';

// Check if form has been submited
if ( isset($_POST['submit']) && !empty($_POST['submit']) ) {

	// Check if math captcha has been generated
	if ( !isset($_SESSION['math_captcha']) || empty($_SESSION['math_captcha']) ) {
		
		$msg = '<span class="error">An unexpected error has been occurred</span>';
		
	}// Check if user answered the question
	else if ( !isset($_POST['captcha_ans']) || empty($_POST['captcha_ans']) ) {
		
		$msg = '<span class="error">Please fill the answer to the math question</span>';
		
	}
	else {
	
		$math_captcha = $_SESSION['math_captcha'];
		unset($_SESSION['math_captcha']);
		
		// Validate the answer
		if ( (int) trim($_POST['captcha_ans']) === $math_captcha ) {
			
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