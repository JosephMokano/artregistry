<?php
require_once "lib/Player.class.php";

//$player = Player::get($_USER_FIELD_MAP["username"]."='".$_POST["logon"]["username"]."' AND ".$_USER_FIELD_MAP["password"]."='".md5($_POST["logon"]["password"])."'");

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

?>