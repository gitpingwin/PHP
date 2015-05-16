<?php
require 'connect.php';

$id =  $_POST['id'];

$query = "SELECT auto_id, nr_rej, marka, model FROM auto WHERE user_id = '$id'";	  
$result = mysql_query($query) or die(mysql_error());
$nmbr = mysql_num_rows($result);

if($nmbr > 0) {
echo "<table class='table'>";
echo "<tr><td><b>Nr rejestracyjny</b></td><td><b>Marka</b></td><td><b>Model</b></td></tr>";

while($row = mysql_fetch_array($result)) {	
	echo "<tr>";
	
	echo "<td>" . $row['nr_rej'] . '</td>';   
	echo "<td>" . $row['marka'] . '</td>';
	echo "<td>" . $row['model'] . '</td>';
	echo"<td><a id='list-ab' href='#' class='btn btn-success' data-toggle='modal' data-autoid='".$row['auto_id']."' data-target='.lista-abonamentow' role='button'>Abonament/y</a></td>  ";
	echo "</tr>";
	
}
echo "</table>";
} else {
	echo "Nie masz aktualnie żadnego samochodu.";
}
?>