<?php

	session_start();



?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="scripts\jquery-3.0.0.min.js"></script>
	<script src="scripts\jquery.scrollTo.min.js"></script>
	<script src="scripts\source.js"></script>
	<link rel="stylesheet" href="./styles/register_error.css" type="text/css" />
	<link rel="stylesheet" href="styles/style.css" type="text/css" />
	<link rel="stylesheet" href="styles/login_form_style.css" type="text/css" />
	<link rel="stylesheet" href="styles/fontello/fontello.css">
</head>

<body>
	<a href="#" class="scrollup"><i class="icon-angle-circled-up"></i></a>
	<header>
		<div id="header">
		<span id="top"><a href="index.php" id="h1">Forum</a><a href="index.php"><i class="icon-laptop"></i></a></span>
		<?php
		if (isset($_SESSION['first_register']))
		{
			unset($_SESSION['first_register']);
			echo "<span class='firstRegister'>Rejestra zakończona sukcesem, można sie zalogować na konto</span>";
		}
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
		<form action="services/login.php" method="post">

			<input type="text" name="login" placeholder="login" onfocus="this.placeholder=''" onblur="this.placeholder='login'" >

			<input type="password" name="password" placeholder="hasło" onfocus="this.placeholder=''" onblur="this.placeholder='hasło'" >

			<input type="submit" value="Zaloguj się">

		</form>
		</div>
		<?php
			if(isset($_SESSION['error']))	echo $_SESSION['error'];
		?>
	</div>
	<div id="register_remainder">
		Musisz być zarejestrowany, aby móc się zalogować. Rejestracja zajmuje tylko kilka chwil, ale zwiększa Twoje możliwości. Administrator Forum może przyznać dodatkowe zezwolenia zarejestrowanym użytkownikom. Zanim się zarejestrujesz, upewnij się, że zapoznałeś się z netykietą i obowiązującymi tutaj zasadami. Pamiętaj także, by czytać regulaminy poszczególnych forów.
		<hr/><br/>
		<a id="register_button" href="register_form.php">Zarejestruj się</a>
	</div>
	<?php
		if(isset($_SESSION['error']))	unset($_SESSION['error']);
	?>


</body>
</html>
