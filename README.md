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

Also, inside your form you have to put a textbox to return the user’s answer to your php script that processes your form, like this:

<pre>
&lt;input type="text" name="captcha_ans"&gt;
</pre>

Check out the test_form.php file for a working example.
</p>

<h3>Requirements:</h3>
<p>
GD 2.0.1 or later (2.0.28 or later is recommended)
</p>
</body>
</html>