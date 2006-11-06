<?php

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
	
	public function insert()
	{
		
	}
	
	public function update()
	{
		
	}
	
	public function delete()
	{
		
	}
}

?>