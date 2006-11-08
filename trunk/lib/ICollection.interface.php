<?php
require_once "lib/Object.class.php";

interface ICollection
{
	public function add(Object $item);
	public function clear();
	public function contains(Object $item);
	public function count();
	public function remove(Object $item);
}

?>