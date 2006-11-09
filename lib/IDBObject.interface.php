<?php

interface IDBObject
{
	public function dbInsert();
	public function dbUpdate();
	public function dbDelete();
}

?>