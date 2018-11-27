

<html>
<head>
	<title>Sign in form</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<?php echo $signinerror; ?>

	<form method="POST" action="">
		<fieldset>
			<h3 id="formlabel">Dufuna Sign-in Form</h3>
			
			<label class="marginclass" for="email">Email:</label>
			<input type="email" name="email"> <br><br>
			<label class="marginclass" for="password">Password:</label>
			<input type="password" name="password"> <br><br>

			<input type="submit" name="signin" value="Sign-in" id="signinbutton"><br><br>

		</fieldset>
	</form>
</body>
</html>