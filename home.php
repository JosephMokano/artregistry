<?php
require_once "lib/Artefact.class.php";
require_once "lib/Player.class.php";

{
	session_start();
	if(!isset($_SESSION["player"])){
		header("Location: index.html");
	}
	$PLAYER = $_SESSION["player"];
}

$dblink = new mysqli('localhost', 'root', 'lazgi2006', 'artregistry');
$dblink->query("SET NAMES UTF8");

$strSQL = "SELECT * FROM race";

$rsRace = $dblink->query($strSQL);

$strSQL = "SELECT resource.resource_name, tbl1.*, tbl2.aa_bonus_1m, tbl2.aa_count_1m,
tbl3.aa_bonus_3m, tbl3.aa_count_3m, tbl4.aa_bonus_6m, tbl4.aa_count_6m FROM
(SELECT artefact.resource_id, ROUND(SUM(artefact.artefact_bonus), 3) AS aa_bonus,
COUNT(player_artefact.artefact_id) AS aa_count
FROM artefact, player_artefact
WHERE player_artefact.artefact_id = artefact.artefact_id
GROUP BY artefact.resource_id) AS tbl1 LEFT JOIN
(SELECT artefact.resource_id, ROUND(SUM(artefact.artefact_bonus), 3) AS aa_bonus_1m,
COUNT(player_artefact.artefact_id) AS aa_count_1m
FROM artefact, player_artefact
WHERE player_artefact.artefact_id = artefact.artefact_id
AND player_artefact.player_artefact_date<=UNIX_TIMESTAMP(CURRENT_DATE - INTERVAL 1 MONTH)
GROUP BY artefact.resource_id) AS tbl2
ON tbl1.resource_id = tbl2.resource_id
LEFT JOIN
(SELECT artefact.resource_id, ROUND(SUM(artefact.artefact_bonus), 3) AS aa_bonus_3m,
COUNT(player_artefact.artefact_id) AS aa_count_3m
FROM artefact, player_artefact
WHERE player_artefact.artefact_id = artefact.artefact_id
AND player_artefact.player_artefact_date<=UNIX_TIMESTAMP(CURRENT_DATE - INTERVAL 3 MONTH)
GROUP BY artefact.resource_id) AS tbl3
ON tbl1.resource_id = tbl3.resource_id
LEFT JOIN
(SELECT artefact.resource_id, ROUND(SUM(artefact.artefact_bonus), 3) AS aa_bonus_6m,
COUNT(player_artefact.artefact_id) AS aa_count_6m
FROM artefact, player_artefact
WHERE player_artefact.artefact_id = artefact.artefact_id
AND player_artefact.player_artefact_date<=UNIX_TIMESTAMP(CURRENT_DATE - INTERVAL 3 MONTH)
GROUP BY artefact.resource_id) AS tbl4
ON tbl1.resource_id = tbl4.resource_id
INNER JOIN resource ON tbl1.resource_id = resource.resource_id
ORDER BY tbl1.resource_id";

$rsAllianceBonus = $dblink->query($strSQL);

$strSQL = "SELECT artefact.*, artefact_size.artefact_size_name, artefact_type.artefact_type_name, resource.resource_name
			FROM player_artefact, artefact, artefact_size, artefact_type, resource
			WHERE player_artefact.artefact_id=artefact.artefact_id AND
			artefact.artefact_size_id=artefact_size.artefact_size_id AND
			artefact.artefact_type_id=artefact_type.artefact_type_id AND
			artefact_type.resource_id=resource.resource_id AND
			player_artefact.player_id=1";

$rsMyArtefacts = $dblink->query($strSQL);
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

}

function addArtefact()
{
	var x = document.getElementsByTagName("table");
	for(i=0; i<x.length; i++)
	{
		if(x[i].name == "resTable")
		{
			x[i].style.display = 'none';
		}
	}
	frmAddArtefact.reset();
	rt1.style.display = '';
	wndAddArtefact.style.display = '';
}

function switchResourceTab(resId)
{
	var x = document.getElementsByTagName("table");
	for(i=0; i<x.length; i++)
	{
		if(x[i].name == "resTable")
		{
			x[i].style.display = 'none';
		}
	}
	eval('rt'+resId+'.style.display = ""');
}

</script>
<body onLoad="init()">

<a href="javascript:addArtefact()">Добавить</a>
Отчет
Выход

<br>

Альянсовый Бонус (кол-во АА)
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#C0C0C0" class="outline">
	<tr>
		<th width="20%"> </th>
		<th width="20%">текущий</th>
		<th width="20%">месяц назад</th>
		<th width="20%">3 месяца назад</th>
		<th width="20%">пол года назад</th>
	</tr>
	<?php while($row = $rsAllianceBonus->fetch_array()){ ?>
	<tr>
		<td class="gen"><?php echo $row["resource_name"]; ?></td>
		<td class="gen" align="center"><?php echo $row["aa_count"]? rtrim($row["aa_bonus"], "0") . "% (" . $row["aa_count"] . " шт)" : "0%"; ?>&nbsp;</td>
		<td class="gen" align="center"><?php echo $row["aa_count_1m"]? rtrim($row["aa_bonus_1m"], "0") . "% (" . $row["aa_count_1m"] . " шт)" : "0%"; ?>&nbsp;</td>
		<td class="gen" align="center"><?php echo $row["aa_count_3m"]? rtrim($row["aa_bonus_3m"], "0") . "% (" . $row["aa_count_3m"] . " шт)" : "0%"; ?>&nbsp;</td>
		<td class="gen" align="center"><?php echo $row["aa_count_6m"]? rtrim($row["aa_bonus_6m"], "0") . "% (" . $row["aa_count_6m"] . " шт)" : "0%"; ?>&nbsp;</td>
	</tr>
	<?php } ?>
</table>

&nbsp;
<!--
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#C0C0C0" class="outline">
	<tr>
		<th width="33%"> </th>
		<th width="33%">кол-во членов ала</th>
		<th width="33%">держат АА</th>
	</tr>
	<?php while($row = $rsRace->fetch_array()){ ?>
	<tr>
		<td class="gen"><?php echo $row["race_name"]; ?></td>
		<td class="gen"> </td>
		<td class="gen"> </td>
	</tr>
	<?php } ?>
</table>
-->

<br>
Мои Альянсовые Артефакты
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#C0C0C0" class="outline">
	<tr>
		<th width="5%">№</th>
		<th width="70%">Название артефакта</th>
		<th width="25%">Бонус</th>
	</tr>
	<?php $i=1; while($row = $rsMyArtefacts->fetch_array()){ ?>
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

<form name="frmAddArtefact" method="POST" action="add_artefact.php">
<span align="right" id="wndAddArtefact" style="display: none; position: absolute; width: 400; height: 400; top: 100; left: 100;">
	<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#C0C0C0" style="filter:progid:DXImageTransform.Microsoft.Shadow(color=#707070, direction=90, strength=3)">
		<tr>
		<?php while($t = $resource_types->fetch_array()){?>
			<th nowrap><a href="javascript: switchResourceTab(<?php echo $t["resource_id"]; ?>)"><?php echo $t["resource_name"]; ?></a></th>
		<?php } $resource_types->data_seek(0); ?>
		</tr>
	</table>
	<?php while($t = $resource_types->fetch_array()){?>
	<table name="resTable" id="rt<?php echo $t["resource_id"]; ?>" width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#C0C0C0" class="outline" style="display: none;filter:progid:DXImageTransform.Microsoft.Shadow(color=#707070, direction=135, strength=5);">
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
		    	<input type="submit" name="btnSubmit" value="Добавить">
	    	<input type="button" name="btnCancel" onClick="wndAddArtefact.style.display='none'" value="Отменить">
</span>
</form>

</body>
</html>