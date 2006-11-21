<?php

{
	session_start();
	if(!isset($_SESSION["player"])){
		header("Location: index.html");
	}
	$PLAYER = $_SESSION["player"];
}

?>