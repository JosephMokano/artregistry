<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php

$link = new mysqli('localhost', 'root', 'lazgi2006', 'artregistry');
$link->query("SET NAMES UTF8");
$result = $link->query("SELECT * FROM artefact_size");

while($row = $result->fetch_array())
echo "<br>" . $row["artefact_size_id"] . " " . $row["artefact_size_name"];




$msg = "This is a message"; 
$aThings = array('one', 'two', 'three'); 

foreach ($aThings as $value) { 
    print $msg . ' - ' . $value . ' ';  
} 

?>
</body>
</html>