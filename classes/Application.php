<?php
class Application extends Dbase {

	public $db;
	
	public function __construct() {
		$this->db = new Dbase();
	}
	
}
?>
