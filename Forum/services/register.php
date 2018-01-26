	<link rel="stylesheet" href="./styles/register_error.css" type="text/css" />
<?php

	session_start();

	if (isset($_POST['nick']))
	{

		$test_flag=true;


		$nick = $_POST['nick'];


		if ((strlen($nick)<3) || (strlen($nick)>40))
		{
			$test_flag=false;
			$_SESSION['error_nick']="Nick musi posiadać od 3 do 40 znaków";
		}

		if (ctype_alnum($nick)==false)
		{
			$test_flag=false;
			$_SESSION['error_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}




		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];

		if ((strlen($password1)<6) || (strlen($password1)>30))
		{
			$test_flag=false;
			$_SESSION['error_password']="Hasło musi posiadać od 6 do 30 znaków";
		}

		if ($password1!=$password2)
		{
			$test_flag=false;
			$_SESSION['error_password']="Podane hasła nie są identyczne";
		}

		// $password_hash = password_hash($password1, PASSWORD_DEFAULT);


		if (!isset($_POST['rules']))
		{
			$test_flag=false;
			$_SESSION['error_rules']="Potwierdź akceptację regulaminu";
		}


		$gender = $_POST['gender'];
		$type = "user";


		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_password1'] = $password1;
		$_SESSION['fr_password2'] = $password2;
		if (isset($_POST['rules'])) $_SESSION['fr_rules'] = true;

		require_once "services/connect.php";


		try
		{
			$connection = new mysqli($host, $db_user, $db_password, $db_name);
			if ($connection->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{


				$result = $connection->query("SELECT id FROM uzytkownicy WHERE nazwa='$nick'");

				if (!$result) throw new Exception($connection->error);

				$how_many_rows = $result->num_rows;
				if($how_many_rows>0)
				{
					$test_flag=false;
					$_SESSION['error_nick']="Istnieje już konto o takim nicku.";
				}

				if ($test_flag==true)
				{


					if ($connection->query("INSERT INTO uzytkownicy VALUES ('$nick', '$password1', '$gender','$type',NULL,NULL)"))
					{
						$_SESSION['register_done']=true;
						$_SESSION['first_register']=true;
						header('Location: login_form.php');
					}
					else
					{
						throw new Exception($connection->error);
					}

				}

				$connection->close();
			}

		}
		catch(Exception $exception)
		{
			echo $exception;
		}

	}


?>
