<?php
require 'connect.php';

$nr_rej = $_POST['nr_rej'];
$marka = $_POST['marka'];
$model = $_POST['model'];
$user_id = $_POST['user_id'];



$query = "SELECT nr_rej FROM auto WHERE nr_rej = '$nr_rej'";
		  
$result = mysql_query($query) or die(mysql_error());
$nmbr = mysql_num_rows($result);

if ($nmbr > 0) {
    echo 0; // error o kodzie 0 oznacza ze uzytkownik o takim loginie juz istnieje, nalezy podac inny login
		
} else {
			
	$sql = "INSERT INTO auto (nr_rej, marka, model, user_id) 
	VALUES ('$nr_rej', '$marka', '$model','$user_id')";
	mysql_query($sql) or die("Niepoprawne zapytanie: ".mysql_error());

    echo 1;

}
	
?>