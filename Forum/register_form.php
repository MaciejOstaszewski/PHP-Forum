<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="scripts\jquery-3.0.0.min.js"></script>
	<script src="scripts\jquery.scrollTo.min.js"></script>
	<script src="scripts\source.js"></script>
	<link rel="stylesheet" href="styles/style.css" type="text/css" />
	<link rel="stylesheet" href="styles/register_form_style.css" type="text/css" />
	<link rel="stylesheet" href="styles/fontello/fontello.css">
</head>

<body>
	<a href="#" class="scrollup"><i class="icon-angle-circled-up"></i></a>
	<header>
		<div id="header">
		<span id="top"><a href="index.php" id="h1">Forum</a><a href="index.php"><i class="icon-laptop"></i></a></span>
		<?php
		include "services/register.php";
		if (isset($_SESSION['online']))
		{
			echo "Witaj ".$_SESSION['user'].'! [ <a id="logout" href="services/logout.php">Wyloguj się</a> ]';
		}
		?>
		</div>
	</header>
	<div id="navbar">
		<ol>
			<li><a href="index.php">Strona główna</a></li>
      <li><a href="forum.php">Forum Dyskusyjne</a></li>
      <li><a href="login_form.php">Zaloguj się</a></li>
      <li><a href="register_form.php">Rejestracja</a></li>
      <li><a href="faq.php">FAQ</a></li>
      <li><a href="rules.php">Regulamin</a></li>
		</ol>
	</div>


	<div id="from_container">
		<div id="form_border">

	<form method="post">

		Nickname: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_nick']))
			{
				echo $_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}
		?>" name="nick" /><br />

		<?php
			if (isset($_SESSION['error_nick']))
			{
				echo '<div class="error">'.$_SESSION['error_nick'].'</div>';
				unset($_SESSION['error_nick']);
			}
		?>


		Twoje hasło: <br /> <input type="password"  value="<?php
			if (isset($_SESSION['fr_password1']))
			{
				echo $_SESSION['fr_password1'];
				unset($_SESSION['fr_password1']);
			}
		?>" name="password1" /><br />

		<?php
			if (isset($_SESSION['error_password']))
			{
				echo '<div class="error">'.$_SESSION['error_password'].'</div>';
				unset($_SESSION['error_password']);
			}
		?>

		Powtórz hasło: <br /> <input type="password" value="<?php
			if (isset($_SESSION['fr_password2']))
			{
				echo $_SESSION['fr_password2'];
				unset($_SESSION['fr_password2']);
			}
		?>" name="password2" /><br />
		<br />
    <span id="gender">Płeć:</span> <br /><label>
     <input  type="radio" name="gender" value="1" checked="true">Kobieta</label>
     <label><input  type="radio" name="gender" value="2">Meżczyzna</label>
     <?php
     if (isset($_SESSION['fr_gender']))
     {
       unset($_SESSION['fr_gender']);
     }
     ?>
     <br/>

    <br />
		<label>
			<input type="checkbox" name="rules" <?php
			if (isset($_SESSION['fr_rules']))
			{
				echo "checked";
				unset($_SESSION['fr_rules']);
			}
				?>/> Akceptuję
		</label>
			<a href="rules.php" target="_blank">regulamin</a>

		<?php
			if (isset($_SESSION['error_rules']))
			{
				echo '<div class="error">'.$_SESSION['error_rules'].'</div>';
				unset($_SESSION['error_rules']);
			}
		?>



		<br />

		<input type="submit" value="Zarejestruj się" />

	</form>
</div>
</div>

</body>
</html>
