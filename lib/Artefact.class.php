<?php
require_once "IDBObject.interface.php";

class Artefact implements IDBObject
{
	private $bonus;
	private $resource;
	private $size;
	private $name;
	
	public function __construct($bonus = NULL, $resource = NULL, $size = NULL, $name = NULL)
	{
		$this->bonus = $bonus;
		$this->resource = $resource;
		$this->size = $size;
		$this->name = $name;
	}
	
	public function getBonus()
	{
		return $this->bonus;
	}
	
	public function setBonus($val)
	{
		$this->bonus = $val;
	}
	
	public function getResource()
	{
		return $this->resource;
	}
	
	public function setResource($val)
	{
		$this->resource = $val;
	}
	
	public function getSize()
	{
		return $this->size;
	}
	
	public function setSize($val)
	{
		$this->size = $val;
	}
	
	public function getName()
	{
		return $this->name;
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
}

?>