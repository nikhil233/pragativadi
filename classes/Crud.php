<?php
include_once 'DbConfig.php';
include_once ('constant.php') ;

class Crud extends DbConfig
{
    public function __construct()
	{
		parent::__construct();
	}
	
	public function getData($query)
	{		
		$result = $this->connection->query($query);
		
		if ($result == false) {
			return false;
			echo "false";
		} 
		
		$rows = array();
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
		
	public function execute($query) 
	{
		$result = $this->connection->query($query);
		if ($result == false) {
			echo 'Error: cannot execute the command';
			return false;
		} else {
			return true;
		}		
	}
	public function execute2($query) 
	{
		$result = $this->connection->query($query);
		$pid=mysqli_insert_id($this->connection);
		if ($result == false) {
			echo 'Error: cannot execute the command';
			return 0;
		} else {
			return $pid;
			//return true;
		}		
	}
	
	public function delete($id, $table) 
	{ 
		$query = "DELETE FROM $table WHERE id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			return false;
		} else {
			return true;
		}
	}
	
	public function escape_string($value)
	{
		$res = $this->connection->real_escape_string($value);
		return htmlspecialchars($res);
	}

}