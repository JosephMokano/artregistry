<?php
require_once "lib/Player.class.php";

$dblink = new mysqli('localhost', 'root', 'lazgi2006', 'artregistry');
$dblink->query("SET NAMES UTF8");

$strSQL = "SELECT player.*, race.race_name FROM player, race
			WHERE player.race_id = race.race_id
			AND player_name='".$_POST["logon"]["name"]."'
			AND player_password='".md5($_POST["logon"]["password"])."'";

$result = $dblink->query($strSQL);

if($player = $result->fetch_array()){
	$player = new Player($player["player_id"], $player["player_name"], $player["alliance_id"], $player["race_name"]);
	
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

?>