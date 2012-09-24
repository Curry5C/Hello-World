<?php
class InfoFamilyModel {
	protected $_dblink;
	
	protected $_table = "info_family";
	
	function __construct($dblink) {
		
		$this->_dblink = $dblink;
		
	}
	
	function insert($arr){
		return $this -> _dblink -> insert($this -> _table,$arr);
	}
	
	function execute($sql){
		return $this -> _dblink -> executeQuery($sql);
	}
	
	function count($sql){
		return $this -> _dblink -> executeCount($sql);
	}
	
	function fetchAll(){
		$sql = "select * from " . $this -> _table;
		return $this -> _dblink -> fetchAll($sql); 
	}
	
	function getCard($arr,$count){ 
		$row = $this -> checkLogin($arr);
		$this -> _dblink -> setCurrentRow(0);
	
		return $this -> _dblink -> getValue($count);
		
	}
	
	
	
}

?>