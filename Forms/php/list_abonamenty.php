<?php
require 'connect.php';

$id =  $_POST['id'];

$query = "SELECT abonament_id, wazny_od, wazny_do FROM abonament WHERE auto_id = '$id'";	  
$result = mysql_query($query) or die(mysql_error());
$nmbr = mysql_num_rows($result);

if($nmbr > 0) {
echo "<table class='table'>";
echo "<tr><td><b>ID</b></td><td><b>Ważność od</b></td><td><b>Ważność do</b></td></tr>";

while($row = mysql_fetch_array($result)) {	
	echo "<tr>";
	echo "<td>" . $row['abonament_id'] . '</td>';
	echo "<td>" . $row['wazny_od'] . '</td>';   
	echo "<td>" . $row['wazny_do'] . '</td>';
	echo "<td><a href='#' class='btn btn-success przedluz' data-aboid='".$row['abonament_id']."' data-toggle='modal' data-target='.przedloz-abonament' role='button'>Przedłuż</a></td>";
	echo "</tr>";
	
}
echo "</table>";
} else {
	echo "Brak abonamentow dla tego samochodu.";
}
?>