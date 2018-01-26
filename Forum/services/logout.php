<?php

	session_start();

	session_unset();
	unset($_SESSION['type']);
	unset($_SESSION['name']);
	 header('Location: ../index.php');

?>
