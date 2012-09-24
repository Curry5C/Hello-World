<?php
class AdminModel {
	protected $_dblink;
	
	protected $_table = "administrator";
	
	function __construct($dblink) {
		
		$this->_dblink = $dblink;
		
	}
	
	function insert($arr){
		return $this -> _dblink -> insert($this -> _table,$arr);
	}
	
	function fetchAll(){
		$sql = "select * from " . $this -> _table;
		return $this -> _dblink -> fetchAll($sql); 
	}
	
	function update($sql)
		{
			
			return $this -> _dblink -> executeUpdate($sql);
		}
	
	function checkLogin($arr){
		$sql = "select * from " . $this -> _table. " where username='{$arr['username']}' and password='{$arr['password']}'";
		return $this -> _dblink -> executeQuery($sql);
	}
	
	function getCard($arr,$count){ 
		$row = $this -> checkLogin($arr);
		$this -> _dblink -> setCurrentRow(0);
	
		return $this -> _dblink -> getValue($count);
		
	}
	
	
	
}

?>