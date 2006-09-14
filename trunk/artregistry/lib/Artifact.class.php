<?php

class Artifact
{
	protected $description;
	protected $type;
	protected $size;
	protected $bonus;
	
	public function __construct()
	{
		
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function setDescription($val)
	{
		$this->description = $val;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	public function setType($val)
	{
		$this->type = $val;
	}
	
	public function getSize()
	{
		return $this->size;
	}
	
	public function setSize($val)
	{
		$this->size = $val;
	}
	
	public function getBonus()
	{
		return $this->bonus;
	}
	
	public function setBonus($val)
	{
		$this->bonus = $val;
	}
}

?>