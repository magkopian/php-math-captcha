<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>

<h3>Description:</h3>
<p>
This is a simple PHP script for creating images with simple mathematical questions (Math CAPTCHAs) to protect the forms of your website from spambots.
</p>


<h3>How to Use:</h3>

<p>
To use the script, you have create an image tag that references the captcha.png file inside your form, like this:

<pre>
&lt;img src="captcha.png" alt=""&gt;
</pre>

</p>

<p>
Also, inside your form you have to put a textbox to return the user’s answer to your php script that processes your form, like this:

<pre>
&lt;input type="text" name="captcha_ans"&gt;
</pre>

</p>

<p>
To verify the user’s answer, inside the script that processes your form, you have to check if his answer matches the session variable $_SESSION['math_captcha']:

<pre>
if ( !isset($_SESSION['math_captcha']) || empty($_SESSION['math_captcha']) ) {
	//the math captcha has not been generated
}
else if ( !isset($_POST['captcha_ans']) || empty($_POST['captcha_ans']) ) {
	//the user didn't answered the question
}
else {

	$math_captcha = $_SESSION['math_captcha'];
	unset($_SESSION['math_captcha']);
	
	if ( (int) trim($_POST['captcha_ans']) === $math_captcha ) {
		//the answer is right!
	}
	else {
		//the answer is wrong
	}
	
}
</pre>

Note that, without unsetting the session variable every time the user submits an answer, the captcha can be bypassed very easily. 
An attacker can fetch the captcha image just one time, so the session variable will be set and then brute force the form without 
fetching again a new captcha image. So it is <strong>very important</strong> to do this <code>unset($_SESSION['math_captcha']);</code>, 
every time the user submit an answer for the captcha.
</p>

<p>
Check out the test_form.php file for a working example.
</p>


<h3>Requirements:</h3>
<p>
GD 2.0.1 or later (2.0.28 or later is recommended)
</p>
</body>
</html>