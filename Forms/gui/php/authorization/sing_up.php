<?php
	session_start();
	require('../connect.php');
	$username = $_POST['login'];
	$password = $_POST['password'];
	
	$query = "SELECT user_id, imie, nazwisko FROM user WHERE login='$username' and haslo='$password'";
	 
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$count = mysql_num_rows($result);
	
	if ($count == 1){
		$_SESSION['id'] = $row["user_id"];		
		$_SESSION['imie'] = $row["imie"];
		$_SESSION['nazwisko'] = $row["nazwisko"];
		echo 1;
	}else{
		echo 0;
	}
?>