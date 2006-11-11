<?php
require_once "lib/Artefact.class.php";
require_once "lib/Player.class.php";

{
	session_start();
	if(!isset($_SESSION["player"])){
		header("Location: index.html");
	}
	$PLAYER = $_SESSION["player"];
	/*
	$PLAYER = unserialize($_SESSION["player"]);
	definePermissionsTable($PLAYER->userGroup->getPermissions());
	if(!CAN_NEWS_LIST){
		header("Location: home.php");
	}
	if(!CAN_NEWS_LIST_ALL){
		$conditions = $_NEWS_FIELD_MAP["authorId"]."=".$USER->getId();
	}
	*/
}

$dblink = new mysqli('localhost', 'root', 'lazgi2006', 'artregistry');
$dblink->query("SET NAMES UTF8");

$strSQL = "SELECT artefact.*, artefact_size.artefact_size_name, artefact_type.artefact_type_name, resource.resource_name
			FROM player_artefact, artefact, artefact_size, artefact_type, resource
			WHERE player_artefact.artefact_id=artefact.artefact_id AND
			artefact.artefact_size_id=artefact_size.artefact_size_id AND
			artefact.artefact_type_id=artefact_type.artefact_type_id AND
			artefact_type.resource_id=resource.resource_id AND
			player_artefact.player_id=1";

$result = $dblink->query($strSQL);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Реестр Альянсовых Артефактов</title>
<link rel="stylesheet" href="templates/style.css" type="text/css">
<style>

.dialogBox
{
	background-color: #FFFFFF;
	border: 2px #006699 solid;
	filter:progid:DXImageTransform.Microsoft.Shadow(color=#707070, direction=135, strength=5)
}

</style>
</head>
<script language="javascript">

function init()
{
	var x = document.all;
	
	var buffer
	for(item in x)
	{
		buffer = "id: "+item.id+"; name: "+item.name;
	}
	
	myScreen.innerText = buffer;
}

function addArtefact()
{
	for(item in resourceTable)
	{
		item.style.display = 'none';
	}
	frmAddArtefact.reset();
	rt1.style.display = '';
	wndAddArtefact.style.display = '';
}

function switchResourceTab(resId)
{
	eval('res'+resId+'.style.display = ""');
}

</script>
<body onLoad="init()">
<div id="myScreen">
</div>


<a href="javascript:addArtefact()">Добавить</a>
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#C0C0C0" class="outline">
	<tr>
		<th width="5%">№</th>
		<th width="70%">Название артефакта</th>
		<th width="25%">Бонус</th>
	</tr>
	<?php $i=1; while($row = $result->fetch_array()){ ?>
	<tr>
		<td class="gen"><?php echo $i++; ?></td>
		<td class="gen"><?php echo $row["artefact_size_name"]." альянсовый артефакт ".$row["artefact_type_name"]; ?></td>
		<td class="gen"><?php echo $row["resource_name"]." +".$row["artefact_bonus"]."%"; ?></td>
	</tr>
	<?php } ?>
</table>

<?php

$strSQL = "SELECT artefact.*, artefact_size.artefact_size_name, artefact_type.artefact_type_name, resource.resource_name
			FROM artefact, artefact_size, artefact_type, resource
			WHERE artefact.artefact_size_id=artefact_size.artefact_size_id AND
			artefact.artefact_type_id=artefact_type.artefact_type_id AND
			artefact_type.resource_id=resource.resource_id
			ORDER BY resource.resource_id, artefact_type.artefact_type_id, artefact_size.artefact_size_id";

$result = $dblink->query($strSQL);

$artefact_sizes = $dblink->query("SELECT * FROM artefact_size");
$artefact_types = $dblink->query("SELECT * FROM artefact_type");
$resource_types = $dblink->query("SELECT * FROM resource");

?>

<span id="wndAddArtefact" style="display: none; position: absolute; width: 400; height: 500; top: 100; left: 100;">
	<form name="frmAddArtefact" method="POST" action="add_artefact.php">
	<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#C0C0C0" style="filter:progid:DXImageTransform.Microsoft.Shadow(color=#707070, direction=90, strength=3)">
		<tr>
		<?php while($t = $resource_types->fetch_array()){?>
			<th nowrap><a href="javascript: switchResourceTab(<?php echo $t["resource_id"]; ?>)"><?php echo $t["resource_name"]; ?></a></th>
		<?php } $resource_types->data_seek(0); ?>
		</tr>
	</table>
	<?php while($t = $resource_types->fetch_array()){?>
	<table name="resTable" id="rt<?php echo $t["resource_id"]; ?>" width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#C0C0C0" class="outline" style="position: absolute; display: none;filter:progid:DXImageTransform.Microsoft.Shadow(color=#707070, direction=135, strength=5);">
		<?php for($r=0; $r<7; $r++){?>
		<tr>
			<td class="gen" nowrap><?php $r1 = $artefact_types->fetch_array(); echo $r1["artefact_type_name"] ?></td>
			<?php while($c = $artefact_sizes->fetch_array()){ ?>
			<td class="gen" align="center">
				<?php
				$row = $result->fetch_array();
				echo $row["artefact_bonus"];
				?>
				<input type="radio" name="artefact">
			</td>
			<?php } $artefact_sizes->data_seek(0); ?>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>
	</form>
</span>

</body>
</html>