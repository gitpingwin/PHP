<?php
require 'connect.php';

$login = $_POST['login-reg'];
$haslo = $_POST['haslo-reg'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$ulica = $_POST['ulica'];
$nr_domu = $_POST['nr-domu'];
$miasto = $_POST['miasto'];

$query = "SELECT login FROM user WHERE login = '$login'";
		  
$result = mysql_query($query) or die(mysql_error());
$nmbr = mysql_num_rows($result);


if ($nmbr > 0) {
    echo 0; // error o kodzie 0 oznacza ze uzytkownik o takim loginie juz istnieje, nalezy podac inny login
		
} else {
		
	$sql = "INSERT INTO user (imie, nazwisko, ulica, nr_domu, miasto, login, haslo) 
	VALUES ('$imie', '$nazwisko', '$ulica', '$nr_domu', '$miasto', '$login', '$haslo')";
	mysql_query($sql) or die("Niepoprawne zapytanie: ".mysql_error());

    echo 1;

}
	
?>
