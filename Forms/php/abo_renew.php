<?php
require 'connect.php';

$wazny_do =  $_POST['wazny_do'];
$abo_id =  $_POST['abonament_id'];
  
$query = "UPDATE abonament 
		  SET wazny_do='$wazny_do', czy_aktywny='1'
		  WHERE abonament_id='$abo_id'";	  
$result = mysql_query($query) or die(mysql_error());
$nmbr = mysql_num_rows($result);

?>