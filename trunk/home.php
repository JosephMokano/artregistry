<?php
//require_once "lib/Artefact.class.php";
//require_once "lib/Player.class.php";
require_once "lib/DBL.class.php";

{
	session_start();
	if(!isset($_SESSION["player"])){
		header("Location: index.html");
	}
	$player = unserialize($_SESSION["player"]);
}

function mergeImages($img1, $img2)
{
	$imgDir = "img/";
	
	$newImg = $imgDir. substr($img1,0, strlen($img1)-4) . "_" . substr($img2,0, strlen($img2)-4) . ".gif";
	
	list($img1width, $img1height) = getimagesize($imgDir . $img1); // Size of source photo for resizing
	list($img2width, $img2height) = getimagesize($imgDir . $img2); // Size of source photo for resizing

	$imgFile1 = imagecreatefromgif($imgDir . $img1);
	$imgFile2 = imagecreatefromgif($imgDir . $img2);

	imagecopymerge( $imgFile1, $imgFile2, 5, 5, 0, 0, $img2width, $img2height, 100);

	imagegif( $imgFile1, $newImg ) or die ( 'Could not save picture! Please check permissions.' );

	imagedestroy($imgFile1);
	imagedestroy($imgFile2);
}

$dblink = new DBL();

$strSQL = "SELECT resource.resource_name, resource.resource_img, tbl1.*, tbl2.aa_bonus_1m, tbl2.aa_count_1m,
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

$strSQL = "SELECT artefact.*, artefact_size.artefact_size_name, artefact_size.artefact_size_img,
			artefact_type.artefact_type_name, artefact_type.artefact_type_img, resource.resource_name, resource.resource_img
			FROM player_artefact, artefact, artefact_size, artefact_type, resource
			WHERE player_artefact.artefact_id=artefact.artefact_id AND
			artefact.artefact_size_id=artefact_size.artefact_size_id AND
			artefact.artefact_type_id=artefact_type.artefact_type_id AND
			artefact_type.resource_id=resource.resource_id AND
			player_artefact.player_id=1
			ORDER BY artefact_type.resource_id, artefact.artefact_size_id DESC";

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
		//alert(x[i].name);
		if(x[i].summary == "resTable")
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
		if(x[i].summary == "resTable")
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
		<td class="gen"><img src="img/<?php echo $row["resource_img"]; ?>"><?php echo $row["resource_name"]; ?></td>
		<td class="gen" align="center"><?php echo $row["aa_count"]? rtrim($row["aa_bonus"], "0") . "% (" . $row["aa_count"] . " шт)" : "0%"; ?>&nbsp;</td>
		<td class="gen" align="center"><?php echo $row["aa_count_1m"]? rtrim($row["aa_bonus_1m"], "0") . "% (" . $row["aa_count_1m"] . " шт)" : "0%"; ?>&nbsp;</td>
		<td class="gen" align="center"><?php echo $row["aa_count_3m"]? rtrim($row["aa_bonus_3m"], "0") . "% (" . $row["aa_count_3m"] . " шт)" : "0%"; ?>&nbsp;</td>
		<td class="gen" align="center"><?php echo $row["aa_count_6m"]? rtrim($row["aa_bonus_6m"], "0") . "% (" . $row["aa_count_6m"] . " шт)" : "0%"; ?>&nbsp;</td>
	</tr>
	<?php } ?>
</table>

<br>
Мои Артефакты
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#C0C0C0" class="outline">
	<tr>
		<th width="5%">№</th>
		<th width="70%">Название артефакта</th>
		<th width="25%">Бонус</th>
	</tr>
	<?php $i=1; while($row = $rsMyArtefacts->fetch_array()){ ?>
	<tr>
		<td class="gen"><?php echo $i++; ?></td>
		<td class="gen">
			<?php
			$imgFile = substr($row["artefact_size_img"],0, strlen($row["artefact_size_img"])-4) . "_" . substr($row["artefact_type_img"],0, strlen($row["artefact_type_img"])-4). ".gif";
			if (!file_exists($imgFile)){ mergeImages($row["artefact_size_img"], $row["artefact_type_img"]); } ?>
			<img src="img/<?php echo $imgFile; ?>">
			<?php echo $row["artefact_size_name"]." альянсовый артефакт ".$row["artefact_type_name"]; ?>
		</td>
		<td class="gen">
			<img src="img/<?php echo $row["resource_img"]; ?>">
			<?php echo $row["resource_name"]." +".$row["artefact_bonus"]."%"; ?>
		</td>
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
			<th nowrap valign="middle"><a class="a.tab" href="javascript: switchResourceTab(<?php echo $t["resource_id"]; ?>)"><img src="img/<?php echo $t["resource_img"]; ?>"><?php echo $t["resource_name"]; ?></a></th>
		<?php } $resource_types->data_seek(0); ?>
		</tr>
	</table>
	<?php while($t = $resource_types->fetch_array()){?>
	<table summary="resTable" id="rt<?php echo $t["resource_id"]; ?>" width="580" border="0" cellpadding="5" cellspacing="1" class="outline" style="display: none; background-color: #DFDFDF; filter:progid:DXImageTransform.Microsoft.Shadow(color=#707070, direction=135, strength=5);">
		<tr>
			<td bgcolor="#F5F5F5">&nbsp;</td>
			<?php while($c = $artefact_sizes->fetch_array()){ ?>
			<td class="gen"  align="center" bgcolor="#F5F5F5">
			<img src="img/<?php echo $c["artefact_size_img"]; ?>"><br>
			<?php echo $c["artefact_size_name"]; ?>
			</td>
			<?php } $artefact_sizes->data_seek(0); ?>
		</tr>
		<?php for($r=0; $r<7; $r++){?>
		<tr>
			<td class="gen" nowrap bgcolor="#F5F5F5" width="28%">
			<?php $r1 = $artefact_types->fetch_array(); ?>
			<img src="img/<?php echo $r1["artefact_type_img"]; ?>">
			<?php echo $r1["artefact_type_name"] ?>
			</td>
			<?php while($c = $artefact_sizes->fetch_array()){ ?>
			<td class="gen" align="center" bgcolor="#FFFFFF" width="12%">
				<?php
				$row = $result->fetch_array();
				echo $row["artefact_bonus"];
				?>
				<br>
				<input type="radio" name="artefact" value="<?php echo $row["artefact_id"]; ?>">
			</td>
			<?php } $artefact_sizes->data_seek(0); ?>
		</tr>
		<?php } ?>
		<tr>
			<td bgcolor="#F5F5F5">&nbsp</td>
			<td colspan="6" align="right" bgcolor="#FFFFFF">
				<input type="submit" name="btnSubmit" value="     ОК     ">
				<input type="button" name="btnCancel" onClick="wndAddArtefact.style.display='none'" value="Отменить">
			</td>
		</tr>
	</table>
	<?php } ?>
</span>
</form>

</body>
</html>