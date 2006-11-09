<?php
require_once "lib/Player.class.php";
require_once "lib/ICollection.interface.php";
require_once "lib/IDBObject.interface.php";

class PlayerCollection implements ICollection, IDBObject
{
	private $item;
	
	public function __construct()
	{
		$this->item = NULL;
	}
	
	public function add($item)
	{
		$this->item[] = $item;
	}
	
	public function clear()
	{
		$this->$item = NULL;
	}
	
	public function contains($item)
	{
		return in_array($item, $this->item);
	}
	
	public function count()
	{
		return count($this->item);
	}
	
	public function remove($item)
	{
		
	}
	
	public function dbInsert()
	{
		if($this->item)
		{
			foreach($this->item as $player)
			{
				$player->dbInsert();
			}
		}
	}
	
	public function dbUpdate()
	{
		if($this->item)
		{
			foreach($this->item as $player)
			{
				$player->dbUpdate();
			}
		}
	}
	
	public function dbDelete()
	{
		if($this->item)
		{
			foreach($this->item as $player)
			{
				$player->dbDelete();
			}
		}
	}
}

?>