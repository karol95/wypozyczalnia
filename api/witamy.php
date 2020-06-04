<?php

	session_start();
	
	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: index1.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
	}
	
	//Usuwanie zmiennych pamiętających wartości wpisane do formularza
	if (isset($_SESSION['fr_login'])) unset($_SESSION['fr_login']);
	if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
	if (isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
	if (isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);
	
	//Usuwanie błędów rejestracji
	if (isset($_SESSION['e_login'])) unset($_SESSION['e_login']);
	if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if (isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
	if (isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
	
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Wypozyczalnia samochodowa Car Comfort</title>
</head>

<body>
	
	Dziękujemy za rejestrację w serwisie! Możesz już zalogować się na swoje konto!<br /><br />
	
	<a href="index1.php">Zaloguj się na swoje konto!</a>
	<br /><br />

</body>
</html>