<?php
require_once "lib/IDBObject.interface.php";
require_once "lib/DBL.class.php";

class Player implements IDBObject
{
	private $name;
	private $artifacts;
	
	public function __construct($name=NULL)
	{
		$this->name = $name;
	}
	
	public function getName()
	{
		
	}
	
	public function setName($val)
	{
		$this->name = $val;
	}
	
	public function dbInsert()
	{
		
	}
	
	public function dbUpdate()
	{
		
	}
	
	public function dbDelete()
	{
		
	}
	
	public function dbGet($conditions=NULL)
	{
		$dbh = new DBL;
		
		$result = $dbh->get("player", $conditions);
		
		while($record = $result->fetch_array()){
			$buffer[] = new User($record);
		}
		
		$result->free();
		
		return $buffer;
	}
}

?>