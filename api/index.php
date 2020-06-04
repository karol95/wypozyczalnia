<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
    <title>Rezultat zapytania</title>
</head>
    
<body>
    
    <table width="1000" align="center" border="1" bordercolor="#d5d5d5"  cellpadding="0" cellspacing="0">
        <tr>
        <?php
            ini_set("display_errors", 0);
            require_once "dbconnect.php";
            $polaczenie = mysqli_connect($host, $user, $password);
			mysqli_query($polaczenie, "SET CHARSET utf8");
			mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
            mysqli_select_db($polaczenie, $database);
            
            $zapytanietxt = file_get_contents("zapytanie.txt");
            
            $rezultat = mysqli_query($polaczenie, $zapytanietxt);
            $ile = mysqli_num_rows($rezultat);
            
            echo "znaleziono: ".$ile;
if ($ile>=1) 
{
echo<<<END
<td width="50" align="center" bgcolor="e5e5e5">id_klienta</td>
<td width="100" align="center" bgcolor="e5e5e5">imie</td>
<td width="100" align="center" bgcolor="e5e5e5">nazwisko</td>
<td width="100" align="center" bgcolor="e5e5e5">ulica</td>
<td width="100" align="center" bgcolor="e5e5e5">numer</td>
<td width="100" align="center" bgcolor="e5e5e5">miasto</td>
<td width="100" align="center" bgcolor="e5e5e5">kod_pocztowy</td>
<td width="100" align="center" bgcolor="e5e5e5">numer_telefonu</td>
<td width="100" align="center" bgcolor="e5e5e5">email</td>
<td width="100" align="center" bgcolor="e5e5e5">login</td>
<td width="50" align="center" bgcolor="e5e5e5">haslo</td>
<td width="50" align="center" bgcolor="e5e5e5">nr_samochodu</td>
<td width="100" align="center" bgcolor="e5e5e5">marka</td>
<td width="100" align="center" bgcolor="e5e5e5">zdjecie</td>
<td width="100" align="center" bgcolor="e5e5e5">model</td>
<td width="50" align="center" bgcolor="e5e5e5">typ</td>
<td width="100" align="center" bgcolor="e5e5e5">rok_produkcji</td>
<td width="100" align="center" bgcolor="e5e5e5">kolor</td>
<td width="100" align="center" bgcolor="e5e5e5">Cena</td>
<td width="100" align="center" bgcolor="e5e5e5">id_wypozyczenia</td>
<td width="100" align="center" bgcolor="e5e5e5">data_wypozyczenia</td>
<td width="100" align="center" bgcolor="e5e5e5">data_oddania</td>
<td width="100" align="center" bgcolor="e5e5e5">kaucja</td>
<td width="100" align="center" bgcolor="e5e5e5">cena</td>
</tr><tr>
END;
}

	for ($i = 1; $i <= $ile; $i++) 
	{
		
		$row = mysqli_fetch_assoc($rezultat);
		$a1 = $row['id_klienta'];
		$a2 = $row['imie'];
		$a3 = $row['nazwisko'];
		$a4 = $row['ulica'];
		$a5 = $row['numer'];
		$a6 = $row['miasto'];
		$a7 = $row['kod_pocztowy'];
		$a8 = $row['numer_telefonu'];
		$a9 = $row['email'];
		$a10 = $row['login'];
		$a11 = $row['haslo'];
		$a12 = $row['nr_samochodu'];
		$a13 = $row['marka'];
		$a14 = $row['zdjecie'];
		$a15 = $row['model'];
		$a16 = $row['typ'];
		$a17 = $row['rok_produkcji'];
		$a18 = $row['Cena'];
		$a19 = $row['id_wypozyczenia'];
		$a20 = $row['data_wypozyczenia'];	
		$a21 = $row['data_oddania'];	
		$a22 = $row['kaucja'];	
		$a23 = $row['cena'];	
		
echo<<<END
<td width="50" align="center">$a1</td>
<td width="100" align="center">$a2</td>
<td width="100" align="center">$a3</td>
<td width="100" align="center">$a4</td>
<td width="100" align="center">$a5</td>
<td width="100" align="center">$a6</td>
<td width="100" align="center">$a7</td>
<td width="100" align="center">$a8</td>
<td width="100" align="center">$a9</td>
<td width="50" align="center">$a10</td>
<td width="100" align="center">$a11</td>
<td width="100" align="center">$a12</td>
<td width="50" align="center">$a13</td>
<td width="100" align="center">$a14</td>
<td width="100" align="center">$a15</td>
<td width="50" align="center">$a16</td>
<td width="100" align="center">$a17</td>
<td width="100" align="center">$a18</td>
<td width="100" align="center">$a19</td>
<td width="100" align="center">$a20</td>
<td width="100" align="center">$a21</td>
<td width="100" align="center">$a22</td>
<td width="100" align="center">$a23</td>
</tr><tr>
END;
			
	}
	

?>


</tr></table>



</body>
</html>

