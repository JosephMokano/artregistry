<?php
require_once "lib/Artefact.class.php";
require_once "lib/Player.class.php";

{
	session_start();
	if(!isset($_SESSION["player"])){
		header("Location: index.html");
	}
	$PLAYER = unserialize($_SESSION["player"]);
	/*
	definePermissionsTable($PLAYER->userGroup->getPermissions());
	if(!CAN_NEWS_LIST){
		header("Location: home.php");
	}
	if(!CAN_NEWS_LIST_ALL){
		$conditions = $_NEWS_FIELD_MAP["authorId"]."=".$USER->getId();
	}
	*/
}



?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<table width="100%" border="1" cellspadding="1" cellspacing="1">
	<tr>
		<td width="10%">No</td>
		<td width="70%">Name</td>
		<td width="20%">Bonus</td>
	</tr>
	<tr>
		<td width="10%"><?=i?></td>
		<td width="70%"><?=name?></td>
		<td width="20%"><?=bonus?></td>
	</tr>
</table>

</body>
</html>