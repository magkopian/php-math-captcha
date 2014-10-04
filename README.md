<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>

<h3>Description:</h3>
<p>
This is a PHP class for generating images with simple mathematical questions (Math CAPTCHAs) to protect the forms of your website from spambots.
</p>

<h3>How to Install:</h3>

<p>
	You can install the class very easily by using composer. You just have to run:
</p>
<pre>
composer require magkopian/php-math-captcha:1.0.*
</pre>
<p>
	Or add it as a dependency in you `composer.json` file:
</p>
<pre>
{
	"require": {
		"magkopian/php-math-captcha": "1.0.*"
	}
}
</pre>
<p>
	And then run:
</p>
<pre>
composer update
</pre>
<p>
	Also, don't forget to include composer `autoload.php` file to your code.
</p>

<h3>How to Use:</h3>

<h4>To generate a captcha you simply:</h4>

<pre>
session_start();

$mathCaptcha = new MathCaptcha\MathCaptcha();

$mathCaptcha->generate();
$mathCaptcha->output();
</pre>

<p>
The `MathCaptcha` class makes use of session variables so you have to call the `session_start()` function before instantiating a `MathCaptcha` object.
</p>

<p>
You can optionally supply an identifier for the captcha, to the constructor of the `MathCaptcha` class, if you want to use multiple captchas in your website.
</p>

<h4>To verify the user's answer you simply:</h4>

<pre>
session_start();

$mathCaptcha = new MathCaptcha\MathCaptcha();

if ( $mathCaptcha->check($captcha_answer) === true ) {
	// Correct answer
}
else {
	// Incorrect answer
}
</pre>

<p>
If you use more than one captchas in your website you need also to supply the identifier of the captcha, to the constructor of the `MathCaptcha` class.
</p>

<p>
Check out the `test_form.php` and `math_captcha.php` files for a working example.
</p>


<h3>Requirements:</h3>
<p>
PHP 5, GD 2.0.1 or later (2.0.28 or later is recommended)
</p>
</body>
</html>

