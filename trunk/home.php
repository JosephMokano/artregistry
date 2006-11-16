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
<link rel="stylesheet" href="templates/ipb.css" type="text/css">
<!--[if lte IE 6]><link rel="stylesheet" href="templates/ipb2.css" type="text/css"><![endif]-->
<link rel="stylesheet" href="templates/ipb3.css" type="text/css">
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






<div id="pun-main" class="main">
	<h1><span>Форум</span></h1>
	<div id="pun-category1" class="category">
		<h2><div class="catleft"><!-- --></div><span>QC</span><div class="catright"><!-- --></div></h2>
		<div class="container">
			<table cellspacing="0" summary="Список форумов в категории: QC">
			<thead>
				<tr>
					<th class="tcl" scope="col">Форум</th>
					<th class="tc2" scope="col">Тем</th>
					<th class="tc3" scope="col">Сообщений</th>
					<th class="tcr" scope="col">Последнее сообщение</th>
				</tr>
			</thead>
			<tbody class="hasicon">
				<tr id="forum_f2" class="alt1">
					<td class="tcl">
						<div class="intd">
							<div class="icon"><!-- --></div>
							<div class="tclcon"><h3><a href="http://qc.3bb.ru/viewforum.php?id=2">Уставы</a></h3><br /><span class="modlist">(Модераторы: <a href="http://qc.3bb.ru/profile.php?id=13">Brutarian</a>)</span></div>
						</div>
					</td>
					<td class="tc2">2</td>
					<td class="tc3">2</td>
					<td class="tcr"><a href="http://qc.3bb.ru/viewtopic.php?pid=4#p4">Торговый устав.</a><br />2006-10-16 04:34:26 - Fregatte</td>
				</tr>
				<tr id="forum_f8" class="alt2 inew">
					<td class="tcl">
						<div class="intd">
							<div class="icon inew"><!-- --></div>
							<div class="tclcon"><h3><a href="http://qc.3bb.ru/viewforum.php?id=8">Военное положение</a></h3><strong class="acchide">[ Новые&#160;сообщения ]</strong> <br /><span class="modlist">(Модераторы: <a href="http://qc.3bb.ru/profile.php?id=13">Brutarian</a>)</span></div>
						</div>
					</td>
					<td class="tc2">7</td>
					<td class="tc3">52</td>
					<td class="tcr"><a href="http://qc.3bb.ru/viewtopic.php?pid=195#p195">Логи боев.</a><br />Вчера 23:13:48 - PROINTEX</td>
				</tr>
				<tr id="forum_f3" class="alt1">
					<td class="tcl">
						<div class="intd">
							<div class="icon"><!-- --></div>
							<div class="tclcon"><h3><a href="http://qc.3bb.ru/viewforum.php?id=3">Заявки на вступление</a></h3><br /><span class="modlist">(Модераторы: <a href="http://qc.3bb.ru/profile.php?id=13">Brutarian</a>)</span></div>
						</div>
					</td>
					<td class="tc2">1</td>
					<td class="tc3">2</td>
					<td class="tcr"><a href="http://qc.3bb.ru/viewtopic.php?pid=179#p179">Форма заявки на вступление в альянс.</a><br />2006-11-05 12:34:45 - Sokol1854</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
	<div id="pun-category2" class="category">
		<h2><div class="catleft"><!-- --></div><span>Торговля</span><div class="catright"><!-- --></div></h2>
		<div class="container">
			<table cellspacing="0" summary="Список форумов в категории: Торговля">
			<thead>
				<tr>
					<th class="tcl" scope="col">Форум</th>
					<th class="tc2" scope="col">Тем</th>
					<th class="tc3" scope="col">Сообщений</th>
					<th class="tcr" scope="col">Последнее сообщение</th>
				</tr>
			</thead>
			<tbody class="hasicon">
				<tr id="forum_f5" class="alt1">
					<td class="tcl">
						<div class="intd">
							<div class="icon"><!-- --></div>
							<div class="tclcon"><h3><a href="http://qc.3bb.ru/viewforum.php?id=5">Ресурсы</a></h3>Обьявления о продаже и обмене ресурсов!<br /><span class="modlist">(Модераторы: <a href="http://qc.3bb.ru/profile.php?id=13">Brutarian</a>)</span></div>
						</div>
					</td>
					<td class="tc2">1</td>
					<td class="tc3">3</td>
					<td class="tcr"><a href="http://qc.3bb.ru/viewtopic.php?pid=95#p95">Кому нужна энергия?</a><br />2006-10-25 00:30:42 - Fregatte</td>
				</tr>
				<tr id="forum_f6" class="alt2">
					<td class="tcl">
						<div class="intd">
							<div class="icon"><!-- --></div>
							<div class="tclcon"><h3><a href="http://qc.3bb.ru/viewforum.php?id=6">Юниты</a></h3>Обьявления о продаже, обмене юнитов.<br /><span class="modlist">(Модераторы: <a href="http://qc.3bb.ru/profile.php?id=13">Brutarian</a>)</span></div>
						</div>
					</td>
					<td class="tc2">1</td>
					<td class="tc3">10</td>
					<td class="tcr"><a href="http://qc.3bb.ru/viewtopic.php?pid=175#p175">Кому какой прослой ...</a><br />2006-11-03 09:47:13 - PROINTEX</td>
				</tr>
				<tr id="forum_f7" class="alt1">
					<td class="tcl">
						<div class="intd">
							<div class="icon"><!-- --></div>
							<div class="tclcon"><h3><a href="http://qc.3bb.ru/viewforum.php?id=7">Артефакты</a></h3>Обьявления о продаже, обмене артефактов.<br /><span class="modlist">(Модераторы: <a href="http://qc.3bb.ru/profile.php?id=13">Brutarian</a>)</span></div>
						</div>
					</td>
					<td class="tc2">3</td>
					<td class="tc3">11</td>
					<td class="tcr"><a href="http://qc.3bb.ru/viewtopic.php?pid=120#p120">Нужна помощь артами</a><br />2006-10-27 15:53:13 - Brutarian</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
	<div id="pun-category3" class="category">
		<h2><div class="catleft"><!-- --></div><span>Обьявления.</span><div class="catright"><!-- --></div></h2>
		<div class="container">
			<table cellspacing="0" summary="Список форумов в категории: Обьявления.">
			<thead>
				<tr>
					<th class="tcl" scope="col">Форум</th>
					<th class="tc2" scope="col">Тем</th>
					<th class="tc3" scope="col">Сообщений</th>
					<th class="tcr" scope="col">Последнее сообщение</th>
				</tr>
			</thead>
			<tbody class="hasicon">
				<tr id="forum_f12" class="alt1">
					<td class="tcl">
						<div class="intd">
							<div class="icon"><!-- --></div>
							<div class="tclcon"><h3><a href="http://qc.3bb.ru/viewforum.php?id=12">Требуются модераторы на форум!</a></h3>Внимательно следим за обьявлениями!<br /><span class="modlist">(Модераторы: <a href="http://qc.3bb.ru/profile.php?id=13">Brutarian</a>)</span></div>
						</div>
					</td>
					<td class="tc2">1</td>
					<td class="tc3">3</td>
					<td class="tcr"><a href="http://qc.3bb.ru/viewtopic.php?pid=96#p96">Требуются модераторы!!!</a><br />2006-10-25 00:38:02 - Fregatte</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
	<div id="pun-category4" class="category">
		<h2><div class="catleft"><!-- --></div><span>Свободные темы</span><div class="catright"><!-- --></div></h2>
		<div class="container">
			<table cellspacing="0" summary="Список форумов в категории: Свободные темы">
			<thead>
				<tr>
					<th class="tcl" scope="col">Форум</th>
					<th class="tc2" scope="col">Тем</th>
					<th class="tc3" scope="col">Сообщений</th>
					<th class="tcr" scope="col">Последнее сообщение</th>
				</tr>
			</thead>
			<tbody class="hasicon">
				<tr id="forum_f11" class="alt1">
					<td class="tcl">
						<div class="intd">
							<div class="icon"><!-- --></div>
							<div class="tclcon"><h3><a href="http://qc.3bb.ru/viewforum.php?id=11">Юмор</a></h3>Дайте и другим посмеяться =)<br /><span class="modlist">(Модераторы: <a href="http://qc.3bb.ru/profile.php?id=13">Brutarian</a>)</span></div>
						</div>
					</td>
					<td class="tc2">3</td>
					<td class="tc3">8</td>
					<td class="tcr"><a href="http://qc.3bb.ru/viewtopic.php?pid=172#p172">Сказка!</a><br />2006-11-02 21:08:04 - Fregatte</td>
				</tr>
				<tr id="forum_f10" class="alt2">
					<td class="tcl">
						<div class="intd">
							<div class="icon"><!-- --></div>
							<div class="tclcon"><h3><a href="http://qc.3bb.ru/viewforum.php?id=10">Свободные темы.</a></h3>Разговариваем на любые интересующие вас темы!<br /><span class="modlist">(Модераторы: <a href="http://qc.3bb.ru/profile.php?id=13">Brutarian</a>)</span></div>
						</div>
					</td>
					<td class="tc2">5</td>
					<td class="tc3">28</td>
					<td class="tcr"><a href="http://qc.3bb.ru/viewtopic.php?pid=180#p180">Помогите опредилится куда мне селится</a><br />2006-11-05 12:58:35 - Fregatte</td>
				</tr>
				<tr id="forum_f13" class="alt1">
					<td class="tcl">
						<div class="intd">
							<div class="icon"><!-- --></div>
							<div class="tclcon"><h3><a href="http://qc.3bb.ru/viewforum.php?id=13">Голосования</a></h3>Голосуем на разные темы!<br /><span class="modlist">(Модераторы: <a href="http://qc.3bb.ru/profile.php?id=13">Brutarian</a>)</span></div>
						</div>
					</td>
					<td class="tc2">1</td>
					<td class="tc3">48</td>
					<td class="tcr"><a href="http://qc.3bb.ru/viewtopic.php?pid=134#p134">Нужно ли вводить торговый код?</a><br />2006-10-29 00:07:04 - MagKazak</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>


</body>
</html>