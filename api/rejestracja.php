<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność login'a
		$login = $_POST['login'];
	
		
		//Sprawdzenie długości login
		if ((strlen($login)<3) || (strlen($login)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_login']="login musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($login)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_login']="login może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	
	
		//$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		$haslo=$haslo1;
		
		$imie=$_POST['imie'];
		$nazwisko=$_POST['nazwisko'];
		$ulica=$_POST['ulica'];
		$numer=$_POST['numer'];
		$miasto=$_POST['miasto'];
		$kod_pocztowy=$_POST['kod_pocztowy'];
		$numer_telefonu=$_POST['numer_telefonu'];
		$email=$_POST['email'];
		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}				
		
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_login'] = $login;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		$_SESSION['fr_imie']=$imie;
		$_SESSION['fr_nazwisko']=$nazwisko;
		$_SESSION['fr_ulica'] = $ulica;
		$_SESSION['fr_numer'] = $numer;
		$_SESSION['fr_miasto'] = $miasto;
		$_SESSION['fr_kod_pocztowy'] = $kod_pocztowy;
		$_SESSION['fr_numer_telefonu'] = $numer_telefonu;
		
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_login, $db_haslo, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id_klienta FROM klienci WHERE `email`='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				//Czy login jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id_klienta FROM klienci WHERE login='$login'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_loginow = $rezultat->num_rows;
				if($ile_takich_loginow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_login']="Istnieje już gracz o takim loginie! Wybierz inny.";
				}
				
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if ($polaczenie->query("INSERT INTO klienci VALUES (NULL, '$imie', '$nazwisko', '$ulica', '$numer', '$miasto','$kod_pocztowy', '$numer_telefonu','$email','$login','$haslo')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: witamy.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>załóż darmowe konto</title>
	
	
	<style>
		.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
	
	<form method="post">
	
		Login: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_login']))
			{
				echo $_SESSION['fr_login'];
				unset($_SESSION['fr_login']);
			}
		?>" name="login" /><br />
		
		<?php
			if (isset($_SESSION['e_login']))
			{
				echo '<div class="error">'.$_SESSION['e_login'].'</div>';
				unset($_SESSION['e_login']);
			}
		?>
		
		Twoje hasło: <br /> <input type="password"  value="<?php
			if (isset($_SESSION['fr_haslo1']))
			{
				echo $_SESSION['fr_haslo1'];
				unset($_SESSION['fr_haslo1']);
			}
		?>" name="haslo1" /><br />
		
		<?php
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
		?>		
		
		Powtórz hasło: <br /> <input type="password" value="<?php
			if (isset($_SESSION['fr_haslo2']))
			{
				echo $_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}
		?>" name="haslo2" /><br />
		
		Nazwisko: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_nazwisko']))
			{
				echo $_SESSION['fr_nazwisko'];
				unset($_SESSION['fr_nazwisko']);
			}
		?>" name="nazwisko" /><br />
		
		<?php
			if (isset($_SESSION['e_nazwisko']))
			{
				echo '<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
				unset($_SESSION['e_nazwisko']);
			}
		?>
		Imie: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_imie']))
			{
				echo $_SESSION['fr_imie'];
				unset($_SESSION['fr_imie']);
			}
		?>" name="imie" /><br />
		
		<?php
			if (isset($_SESSION['e_imie']))
			{
				echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
				unset($_SESSION['e_imie']);
			}
		?>
		
		Ulica: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_ulica']))
			{
				echo $_SESSION['fr_ulica'];
				unset($_SESSION['fr_ulica']);
			}
		?>" name="ulica" /><br />
		
		<?php
			if (isset($_SESSION['e_ulica']))
			{
				echo '<div class="error">'.$_SESSION['e_ulica'].'</div>';
				unset($_SESSION['e_ulica']);
			}
		?>
		
		Numer: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_numer']))
			{
				echo $_SESSION['fr_numer'];
				unset($_SESSION['fr_numer']);
			}
		?>" name="numer" /><br />
		
		<?php
			if (isset($_SESSION['e_numer']))
			{
				echo '<div class="error">'.$_SESSION['e_numer'].'</div>';
				unset($_SESSION['e_numer']);
			}
		?>
		Miasto: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_miasto']))
			{
				echo $_SESSION['fr_miasto'];
				unset($_SESSION['fr_miasto']);
			}
		?>" name="miasto" /><br />
		
		<?php
			if (isset($_SESSION['e_miasto']))
			{
				echo '<div class="error">'.$_SESSION['e_miasto'].'</div>';
				unset($_SESSION['e_miasto']);
			}
		?>
		Kod Pocztowy: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_kod_pocztowy']))
			{
				echo $_SESSION['fr_kod_pocztowy'];
				unset($_SESSION['fr_kod_pocztowy']);
			}
		?>" name="kod_pocztowy" /><br />
		
		<?php
			if (isset($_SESSION['e_kod_pocztowy']))
			{
				echo '<div class="error">'.$_SESSION['e_kod_pocztowy'].'</div>';
				unset($_SESSION['e_kod_pocztowy']);
			}
		?>
		E-mail: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_email']))
			{
				echo $_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
		?>" name="email" /><br />
		
		<?php
			if (isset($_SESSION['e_email']))
			{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
		?>
		
		Telefon: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_numer_telefonu']))
			{
				echo $_SESSION['fr_numer_telefonu'];
				unset($_SESSION['fr_numer_telefonu']);
			}
		?>" name="numer_telefonu" /><br />
		
		<?php
			if (isset($_SESSION['e_numer_telefonu']))
			{
				echo '<div class="error">'.$_SESSION['e_numer_telefonu'].'</div>';
				unset($_SESSION['e_numer_telefonu']);
			}
		?>
		
		<label>
			<input type="checkbox" name="regulamin" <?php
			if (isset($_SESSION['fr_regulamin']))
			{
				echo "checked";
				unset($_SESSION['fr_regulamin']);
			}
				?>/> Akceptuję regulamin
		</label>
		
		<?php
			if (isset($_SESSION['e_regulamin']))
			{
				echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
		?>	
		
		
		<br />
		
		<input type="submit" value="Zarejestruj się" />
		
	</form>

</body>
</html>