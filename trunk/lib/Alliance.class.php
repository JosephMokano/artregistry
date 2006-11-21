<?
require_once "IDBObject.interface.php";

class Alliance implements IDBObject
{
	private $name;
	private $code;
	private $description;
	private $sphere;
	
	public function __construct($name=NULL)
	{
		$this->name = $name;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($val)
	{
		$this->name = $val;
	}
	
	public function getCode()
	{
		return $this->code;
	}
	
	public function setCode($val)
	{
		$this->code = $val;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function setDescription($val)
	{
		$this->description = $val;
	}
	
	public function getSphere()
	{
		return $this->sphere;
	}
	
	public function setSphere($val)
	{
		$this->sphere = $val;
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
	
	public static function dbGet($id=NULL)
	{
		
	}
}

?>