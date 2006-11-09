<?php

interface ICollection
{
	public function add($item);
	public function clear();
	public function contains($item);
	public function count();
	public function remove($item);
}

?>