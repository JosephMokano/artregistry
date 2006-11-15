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

$strSQL = "SELECT resource.resource_name, ROUND(SUM(artefact.artefact_bonus), 3) AS aa_bonus, COUNT(player_artefact.artefact_id) AS aa_count
			FROM artefact, player_artefact, resource
			WHERE player_artefact.artefact_id = artefact.artefact_id AND resource.resource_id=artefact.resource_id
			GROUP BY resource.resource_name";

$rsAllianceBonus = $dblink->query($strSQL);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Реестр Альянсовых Артефактов</title>
<link rel="stylesheet" href="templates/style.css" type="text/css">
</head>
<body>

Добавить	Отчет		Выход

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
		<td class="gen" align="center"><?php echo rtrim($row["aa_bonus"], "0") . "% (" . $row["aa_count"] . " шт)"; ?>&nbsp;</td>
		<td class="gen" align="center">&nbsp;</td>
		<td class="gen" align="center">&nbsp;</td>
		<td class="gen" align="center">&nbsp;</td>
	</tr>
	<?php } ?>
</table>

&nbsp;
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

</body>
</html>