<?php

class Db {
	protected $_link;
	protected $rs;
	protected $totalRow;
	protected $record;
	protected static $_instance = null;
	protected function __construct($config) {
		$this->_link = mysql_connect ( $config ['dbhost'], $config ['dbuser'], $config ['dbpwd'] );
		mysql_select_db ( $config ['dbname'], $this->_link );
		mysql_query("set names utf8");
	}
	
	static function getInstance($config) {
		if (self::$_instance == null) {
			$classname = __CLASS__;
			self::$_instance = new $classname ( $config );
		}
		return self::$_instance;
	}
	
	function execute($sql) {
		return mysql_query ( $sql, $this->_link );
	}
	function executeQuery($sql){
		$this -> rs = $this -> execute($sql);
		$this->totalRow = mysql_num_rows($this -> rs);
			return $this->totalRow;
	}
	
	function insert($table, $arr) {
		$fields = join ( ",", array_keys ( $arr ) );
		$values = join ( "','", array_values ( $arr ) );
		$sql = "insert {$table}({$fields}) values('{$values}')";
		return $this->execute ( $sql );
	}
	function executeUpdate($sql)
		{
			$this -> rs = $this -> execute($sql);
			return mysql_affected_rows($this->_link);
			//echo $row;
		}
	public function setCurrentRow($index)
		{
			
			mysql_data_seek($this->rs,$index);
			$this->record = mysql_fetch_array($this->rs);
		}	
	function getValue($colName)
		{
			return $this->record[$colName];
		}
	function executeCount($sql){
			$this -> rs = $this -> execute($sql);
			$row = mysql_fetch_row($this -> rs);
			return $row[0];
	}		
	
	function fetchAll($sql) {
		$this -> rs = $this->execute ( $sql );
		while ( $row = mysql_fetch_assoc ( $this -> rs ) ) {
			$rows [] = $row;
		}
		return $rows;
	}
	
	function getServerInfo(){
		
		return mysql_get_server_info($this -> _link);
		
	}
	
	

}

?>