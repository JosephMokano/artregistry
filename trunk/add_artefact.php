<?php
require_once "lib/DBL.class.php";

{
	session_start();
	if(!isset($_SESSION["player"])){
		header("Location: index.html");
	}
	$player = unserialize($_SESSION["player"]);
}

$dblink = new DBL();


?>