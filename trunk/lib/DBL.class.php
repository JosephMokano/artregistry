<?php
/********************************************************************************************
 * Library for representing the Database Layer (DBL).
 * @author Polad Mirzayev <polad@skylife-travel.com>
 * @since 2006-11-08
 * @copyright Copyright (c) 2006 by Polad Mirzayev
 ********************************************************************************************/


/* Dependencies and includes of the DBI library */
//require_once "config.php";

 
/********************************************************************************************
 * Class that describes the DBI layer
 * @author Polad Mirzayev <polad@azindex.com>
 * @since 2003-07-03
 * @copyright Copyright (c) 2003 by Polad Mirzayev
 ********************************************************************************************/
class DBL
{
	private $dsn;
	private $dbh;
	
	public function __construct()
	{
		global $DSN;
		
		$this->dsn = $DSN;
		$this->connect();
	}
	
	public function connect()
	{
		$this->dbh = new mysqli('localhost', 'root', 'lazgi2006', 'artregistry');
		$this->dbh->query("SET NAMES UTF8");
		
		/*if (DB::isError($this->dbh)){
			die ($this->dbh->getMessage());
		}
		
		$this->dbh->setFetchMode(DB_FETCHMODE_ASSOC);*/
		
		return $this->dbh;
	}
	
	function get($table_name, $table_conditions=NULL, $table_sorting=NULL, $table_fields=NULL, $row_start=NULL, $row_count=NULL)
	{
		if(!$table_fields){
			$table_fields="*";
		}
		
		$strSQL = "SELECT " . $table_fields . " FROM " . $table_name;
		if($table_conditions){
			$strSQL .= " WHERE $table_conditions";
		}
		if($table_sorting){
			$strSQL .= " ORDER BY $table_sorting";
		}
		if(!is_null($row_start) && !is_null($row_count)){
			$result = $this->dbh->limitQuery($strSQL, $row_start, $row_count);
		}
		else {
			$result = $this->dbh->query($strSQL);
		}
		
		if (DB::isError($result)){
			die ($result->getMessage());
		}
		
		return $result;
	}
	
	function insert($table_name, $table_fields, $table_values)
	{
		$strSQL = $this->dbh->autoPrepare($table_name, $table_fields, DB_AUTOQUERY_INSERT);
		
		$result = $this->dbh->execute($strSQL, $table_values);
		
		if (DB::isError($result)){
			die ($result->getMessage());
		}
		
		return $result;
	}
	
	function update($table_name, $table_fields, $table_values, $table_conditions)
	{
		$strSQL = $this->dbh->autoPrepare($table_name, $table_fields, DB_AUTOQUERY_UPDATE, $table_conditions);
		
		$result = $this->dbh->execute($strSQL, $table_values);
		
		if (DB::isError($result)){
			die ($result->getMessage());
		}
		
		return $result;
	}
	
	function delete($table_name, $table_conditions)
	{
		$strSQL = "DELETE FROM $table_name WHERE $table_conditions";
		
		$result = $this->dbh->query($strSQL);
		
		if (DB::isError($result)){
			die ($result->getMessage());
		}
		
		return $result;
	}
}

?>