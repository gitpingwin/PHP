<?php
require 'connect.php';

$nr_rej = $_POST['nr_rej'];
$marka = $_POST['marka'];
$model = $_POST['model'];
$user_id = $_POST['user_id'];



echo '<table class="table table-striped">
<tr>
<th>Numer rejestracyjny</th>
<th>Marka</th>
<th>Model</th>

</tr>';


$query = "SELECT nr_rej, marka, model FROM auto WHERE user_id = '$user_id'";	  
$result = mysql_query($query) or die(mysql_error());

while($row = pg_fetch_array($result))
{
	echo '<tr SIZE=2>';
	echo '<td>' . $row['nr_rej'] . '</td>';
	echo '<td>' . $row['marka'] . '</td>';
	echo '<td>' . $row['model'] . '</td>';
	
	
	
	echo '</tr>';
}
echo '</table>';
	
?>