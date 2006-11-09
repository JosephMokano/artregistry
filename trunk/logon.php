<?php
require_once "lib/Player.class.php";

//$player = Player::dbGet("player_name='".$_POST["logon"]["name"]."' AND player_password='".md5($_POST["logon"]["password"])."'");

$dblink = new mysqli('localhost', 'root', 'lazgi2006', 'artregistry');
$dblink->query("SET NAMES UTF8");
$result = $dblink->query("SELECT * FROM player WHERE player_name='".$_POST["logon"]["name"]."' AND player_password='".md5($_POST["logon"]["password"])."'");

$player = $result->fetch_array();

if($player){
	session_start();
	
	if(isset($_SESSION["player"])){
		unset($_SESSION["player"]);
	}
	$_SESSION["player"] = $player;
	
	header("Location: home.php");
}
else {
	header("Location: index.html");
}

/*
if($player){
	$player = $player[0];
	
	session_start();
	
	if(isset($_SESSION["player"])){
		unset($_SESSION["player"]);
	}
	$_SESSION["player"] = serialize($player);
	
	header("Location: home.php");
}
else {
	header("Location: index.html");
}
*/

?>