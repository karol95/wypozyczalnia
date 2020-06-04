<?php
	require('dbconnect.php');
	$polaczenie = @mysql_connect($host, $user, $password);
	@mysql_select_db($database);
	mysql_query("SET CHARSET utf8");
	$query = mysql_query("SELECT * FROM `samochody`;");
	$array = array();
	while($res = mysql_fetch_assoc($query)) {
		array_push($array, array('id' => intval($res['nr_samochodu']), 'marka' => $res['marka'], 'kategoria' => $res['Kategoria'], 'zdjecie' => $res['zdjecie'], 'model' => $res['model'], 'rok' => intval($res['rok_produkcji']), 'kolor' => $res['kolor'], 'cena' => intval($res['Cena'])) );
	}
	mysql_close($polaczenie);
	echo json_encode($array);
?>