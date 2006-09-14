<?php

class Player
{
	protected $nickname;
	protected $artifacts;
	
	public function __get($name)
	{
		if(isset($this->$name))
		{
			return $this->$name;
		}
		
		return false;
	}
	
	public function __set($name, $val)
	{
		if(isset($this->$name))
		{
			$this->$name = $val;
			return true;
		}
		
		return false;
	}
}

?>