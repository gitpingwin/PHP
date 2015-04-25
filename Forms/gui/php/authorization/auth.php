<?php
if (!isset($_SESSION['imie']) && !isset($_SESSION['nazwisko']) && !isset($_SESSION['id'])){
	header("Location: ./login");
}
?>