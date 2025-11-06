<?php
class Dbase{
	public $_host = "localhost";
	public $_user = "0000000";
	public $_pass = "0000000";
	public $dbname = "0000000";


	public $_dbcon = false;
	public $_last_query;
	public $affected_rows;

	public $_insert_keys = array();
	public $_insert_values = array();
	public $_update_sets = array();
	public $_id;
	public $result;
   
	function __construct(){
		$this->connect();
	}

	public function connect(){
		$this->_dbcon = mysqli_connect($this->_host, $this->_user, $this->_pass);
		if(!$this->_dbcon){
			die("Database connection failed!");
		} else {
			$_select = mysqli_select_db($this->_dbcon,$this->dbname);
			if(!$_select) {
				die("Database not selected" . mysqli_error($this->_dbcon));
			}
		}
		mysqli_set_charset($this->_dbcon,"utf-8");
	}
	public function close(){
		mysqli_close($this->_dbcon);
	}
	public function query($sql){
		$this->_last_query = $sql;
		$this->result = mysqli_query($this->_dbcon,$sql);
		$this->displayQuery($this->result);

		return $this->result;
	}
	public function displayQuery($result){
		if(!$result){
			$output  = "Database query failed ". mysqli_error($this->_dbcon);
			$output .= "<br> Last query was ". $this->_last_query;
			die($output);
		} else {
			$this->affected_rows = mysqli_affected_rows($this->_dbcon);
		}
	}
	public function fetchAll($sql){
		$results = $this->query($sql);
		$out = array();
		while($row = mysqli_fetch_assoc($results)) {
			$out[] = $row;
		}
		return $out;

	}
	public function fetchOne($sql){
		$out = $this->fetchAll($sql);
		return array_shift($out);
	}

	public function lastInsertId(){
		return mysqli_insert_id($this->_dbcon);
	}

	public function escape($value=null){
		if(!empty($value)){
			return mysqli_real_escape_string($this->_dbcon,$value);
		}
		return false;
	}

//$array['phone'] = "phone";
//INSERT INTO `user` (`` ,`` ,`` ,``) VALUES ('','','','');

	public function prepareInsert($array = null){
		if(!empty($array)){
			foreach($array as $key => $value){
				$this->_insert_keys[] = $key;
				$this->_insert_values[] = $this->escape($value);
			}
		}

	}

//mysqli_query();
	public function insert($table = null, $values){
		$this->prepareInsert($values);
		if(!empty($table) && 
		   !empty($this->_insert_keys) &&
		   !empty($this->_insert_values)
			){
			$sql = "INSERT INTO `".$table."` ";
			$sql .= "(`";
			$sql .= implode("`, `", $this->_insert_keys);
			$sql .= "`) VALUES('";
			$sql .= implode("', '", $this->_insert_values);
			$sql .= "')";
			
			//$sql = "INSERT INTO `user` VALUES ('','Tapash','Datta','39793','97397','1')";
			
			if($this->query($sql)) {
				$this->_id = $this->lastInsertId();
			return true;
			
			}

			return false;
		}
		return false;
	}

	public function prepareUpdate($array = null) {
		if(!empty($array)) {
			foreach($array as $key => $value) {
				$this->_update_sets[] = "`{$key}` = '".$this->escape($value)."'";
			}			
		}
		return false;
	}

	public function update($table, $values, $id){
		$this->prepareUpdate($values);
		if(!empty($table) && !empty($id) && !empty($this->_update_sets)) {
			$sql = "UPDATE `{$table}` SET ";
			$sql .= implode(", ", $this->_update_sets);
			$sql .= " WHERE `id` = '".$this->escape($id)."'";			
			return $this->query($sql);
		}
		return false;


	}

	public function noRows() {
		if(!empty($this->result)) {
			return mysqli_num_rows($this->result);
		}
		return false;
	}

//$array['phone'] = "phone";
//DELETE FROM TABLE `user` WHERE  (`` ,`` ,`` ,``) VALUES ('','','','');

}
?>