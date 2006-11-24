<?php
require_once "IDBObject.interface.php";
require_once "DBL.class.php";
require_once "Artefact.class.php";
require_once "Alliance.class.php";

class Player implements IDBObject
{
	private $id;
	private $name;
	private $alliance;
	private $race;
	private $artifacts;
	
	public function __construct($id=NULL, $name=NULL, $alliance_id=NULL, $race=NULL)
	{
		$this->id = $id;
		$this->name = $name;
		$this->alliance = Alliance::dbGet($alliance_id);
		$this->race = $race;
		$this->artefacts = Artefact::dbGet($this->$id);
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($val)
	{
		$this->id = $val;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($val)
	{
		$this->name = $val;
	}
	
	public function getAlliance()
	{
		return $this->alliance;
	}
	
	public function setAlliance(Alliance $val)
	{
		$this->alliance = $val;
	}
	
	public function getRace()
	{
		return $this->race;
	}
	
	public function setRace($val)
	{
		$this->race = $val;
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
	
	public function dbAddArtefact($artefact_id)
	{
		$dbh = new DBL;
		
		$strSQL = "INSERT INTO player_artefact (player_id, artefact_id, player_artefact_date) VALUES (" .
					$this->getId() . ", " . $artefact_id . ", " . time() . ")";
		
		$dbh->query($strSQL);
		
		return true;
	}
}

?>