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

$resRace = $dblink->query($strSQL);

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
	<tr>
		<td class="gen">кадериум</td>
		<td class="gen"> </td>
		<td class="gen"> </td>
		<td class="gen"> </td>
		<td class="gen"> </td>
	</tr>
	<tr>
		<td class="gen">нано-кристаллы</td>
		<td class="gen"> </td>
		<td class="gen"> </td>
		<td class="gen"> </td>
		<td class="gen"> </td>
	</tr>
	<tr>
		<td class="gen">продиум</td>
		<td class="gen"> </td>
		<td class="gen"> </td>
		<td class="gen"> </td>
		<td class="gen"> </td>
	</tr>
	<tr>
		<td class="gen">еда</td>
		<td class="gen"> </td>
		<td class="gen"> </td>
		<td class="gen"> </td>
		<td class="gen"> </td>
	</tr>
	<tr>
		<td class="gen">энергия</td>
		<td class="gen"> </td>
		<td class="gen"> </td>
		<td class="gen"> </td>
	</tr>
</table>

&nbsp;
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#C0C0C0" class="outline">
	<tr>
		<th width="33%"> </th>
		<th width="33%">кол-во членов ала</th>
		<th width="33%">держат АА</th>
	</tr>
	<?php while($row = $resRace->fetch_array()){ ?>
	<tr>
		<td class="gen"><?php echo $row["race_name"]; ?></td>
		<td class="gen"> </td>
		<td class="gen"> </td>
	</tr>
	<?php } ?>
</table>

</body>
</html>