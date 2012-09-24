<?php
class FamilyModel {
	protected $_dblink;
	
	protected $_table = "family";
	
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
	
	function checkRegister($arr){
		$sql = "select * from " . $this -> _table . " where identify_card='{$arr['identify_card']}' and name='{$arr['name']}'";
		return $this -> _dblink -> executeQuery($sql);
	}
	
	function update($family_card){
		$sql = "update " . $this -> _table. " set family_count = family_count-1 where family_card=" . $family_card;
		return $this -> _dblink -> executeUpdate($sql);
	}
	
	function getCard($arr,$count){
		$sql = "select * from " . $this -> _table . " where identify_card='{$arr['identify_card']}'"; 
		$row = $this -> _dblink -> executeQuery($sql);
		$this -> _dblink -> setCurrentRow();
	
		return $this -> _dblink -> getValue($count);
		
	}
	
}

?>