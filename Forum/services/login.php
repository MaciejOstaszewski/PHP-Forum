<?php

	session_start();

	if ((isset($_SESSION['online'])) && ($_SESSION['online']==true))
	{
		header('Location: ../login_form.php');
		$_SESSION['error'] = '<span class="error">Jesteś już zalogowany!</span>';
		exit();
	}


	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: ../login_form.php');
		exit();
	}

	require_once "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);

	try
	{
		$connection = new mysqli($host, $db_user, $db_password, $db_name);

		if ($connection->connect_errno!=0)
		{
			throw new Exception(mysqli_connect_errno());
		}
		else
		{
			$login = $_POST['login'];
			$password = $_POST['password'];


			$sql = "SELECT * FROM uzytkownicy WHERE nazwa='$login' AND haslo='$password'";

			if ($result = $connection->query($sql))
			{
				$number_of_records = $result->num_rows;
				if($number_of_records>0)
				{
					$row = $result->fetch_assoc();

						$_SESSION['online'] = true;
						$_SESSION['id'] = $row['id'];
						$_SESSION['user'] = $row['nazwa'];
						$_SESSION['type'] = $row['typ'];
						$_SESSION['greetings'] = "Witaj";

						unset($_SESSION['error']);
						$result->free_result();
						header('Location: ../forum.php');

				} else {

					$_SESSION['error'] = '<span class="error">Nieprawidłowy login lub hasło!</span>';
					header('Location: ../login_form.php');

				}

			}
			else
			{
				throw new Exception($connection->error);
			}

			$connection->close();
		}
	}
	catch(Exception $exception)
	{
		echo '<span class="error">Błąd serwera</span>';
		echo '<br />'.$exception;
	}
?>
