<?php

{
	session_start();
	if(!isset($_SESSION["player"])){
		header("Location: index.html");
	}
	$player = unserialize($_SESSION["player"]);
}

$player->dbAddArtefact($_POST["artefact"]);

header("Location: index.html");

?>