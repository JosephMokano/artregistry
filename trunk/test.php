<?php

$link = new mysqli('localhost', 'root', 'lazgi2006', 'artregistry');

$result = $link->query("SELECT * FROM artefact_size");

while($row = $result->fetch_array())
echo "<br>" . $row["artefact_size_id"] . " " . $row["artefact_size_name"];

?>