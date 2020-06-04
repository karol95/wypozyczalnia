<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index1.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Wypozyczalnia samochodowa Car Comfort</title>
</head>

<body>
	
<?php

	echo "<p>Witaj ".$_SESSION['login'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
	echo "<p><b>id_klienta</b>: ".$_SESSION['id_klienta'];
	echo " | <b>imie</b>: ".$_SESSION['imie'];
	echo " | <b>nazwisko</b>: ".$_SESSION['nazwisko']."</p>";
	echo "<p><b>e-mail</b>: ".$_SESSION['email'];
	echo "<p><b>numer_telefonu</b>: ".$_SESSION['numer_telefonu'];
	
?>

</body>
</html>