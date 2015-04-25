<?php

$db_host		= 'localhost';//156.17.41.238
$db_user		= 'root';
$db_pass		= '';//pingwin123
$db_database	= 'neurogear'; 

$link = mysql_connect($db_host, $db_user, $db_pass) or die('Wystąpił problem połączenia z bazą danych.');
mysql_select_db($db_database,$link);
mysql_query("SET NAMES utf8") or die(mysql_error());

?>