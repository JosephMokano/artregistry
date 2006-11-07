<?php
require_once "lib/ICollection.interface.php";
require_once "lib/IDBObject.interface.php";

class PlayerCollection implements ICollection, IDBObject
{
	private $item;
	
	public function __construct()
	{
		
	}
	
	public function add(Player $item)
	{
		
	}
}

?>