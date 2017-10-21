## Description:
This is a PHP class for generating images with simple mathematical questions (Math CAPTCHAs) to protect the forms of your website from spambots.

## How to Install:
You can install the class very easily by using composer. You just have to run:

`composer require magkopian/php-math-captcha:1.0.*`

Or add it as a dependency in you `composer.json` file:

```JSON
{
	"require": {
		"magkopian/php-math-captcha": "1.0.*"
	}
}
```

And then run:

`composer update`

Also, don't forget to include composer `autoload.php` file to your code.

## How to Use:

To generate a captcha you simply:

```PHP
session_start();

$mathCaptcha = new MathCaptcha\MathCaptcha();

$mathCaptcha->generate();
$mathCaptcha->output();
```

The `MathCaptcha` class makes use of session variables so you have to call the `session_start()` function before instantiating a `MathCaptcha` object.

You can optionally supply an identifier for the captcha, to the constructor of the `MathCaptcha` class, if you want to use multiple captchas in your website.

To verify the user's answer you simply:

```PHP
session_start();

$mathCaptcha = new MathCaptcha\MathCaptcha();

if ( $mathCaptcha->check($captcha_answer) === true ) {
	// Correct answer
}
else {
	// Incorrect answer
}
```

If you use more than one captchas in your website you need also to supply the identifier of the captcha, to the constructor of the `MathCaptcha` class.

Check out the `test_form.php` and `math_captcha.php` files for a working example.

## Requirements:
PHP 5, GD 2.0.1 or later (2.0.28 or later is recommended)
