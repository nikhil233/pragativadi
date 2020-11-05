<?php
class DbConfig 
{	
	private $_host = 'localhost';
	private $_username = 'root';
	private $_password = '';
	private $_database = 'news_manag';
	
	protected $connection;
	
	public function __construct()
	{	date_default_timezone_set('Asia/Kolkata');
		if (!isset($this->connection)) {
			
			$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
			
			if (!$this->connection) {
				echo 'Cannot connect to database server';
				exit;
			}			
		}	
		
		return $this->connection;
	}
}
?>
