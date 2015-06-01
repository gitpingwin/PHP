<?php
require 'connect.php';

$wazny_od = $_POST['wazny_od'];
$wazny_do = $_POST['wazny_do'];
$czy_aktywny =  $_POST['czy_aktywny'];
$auto_id = $_POST['auto_id'];

	$sql = "INSERT INTO abonament (wazny_od, wazny_do, czy_aktywny, auto_id) 
	VALUES ('$wazny_od', '$wazny_do','$czy_aktywny', '$auto_id')";
	mysql_query($sql) or die("Niepoprawne zapytanie: ".mysql_error());
	
?>