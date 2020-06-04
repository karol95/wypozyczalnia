<?php
	$host="localhost"; // Nazwa hosta
	$user="root"; // Nazwa uzytkownika mysql
	$password=""; // Haslo do bazy
	$database="karol"; // Nazwa bazy
	$table1="klienci"; //Nazwa tabeli
	$table2="samochody"; //Nazwa tabeli
	$table3="wypozyczenia"; //Nazwa tabeli

	function response($status, $data) {
		return json_encode(array('status' => $status, 'data' => $data));
	}
?>