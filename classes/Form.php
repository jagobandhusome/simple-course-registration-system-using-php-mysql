<?php

class Form {

	public function isPost($field = null) {
		if(!empty($field)) {
			if(isset($_POST[$field])) {
				return true;
			}
			return false;
		} else {
			if(!empty($_POST)){
				return true;
			}
			return false;
		}

		return false;
	}

	public function getPost($field) {
		if(!empty($field)){
			return $this->isPost($field) ? strip_tags($_POST[$field]) : null;
		}
	}

	public function stickyText($field = null) {
		if($this->isPost($field)) {
			return stripcslashes($this->getPost($field));
		}
	}


	public function stickySelect($field, $value, $default){
		if ($this->isPost($field) && $this->getPost($field)==$value) {
			return 'selected="selected"';			
		} else {
			return !empty($default) && $default == $value ?
			"selected='selected'": null; 
		}
	}

	public function getPostArray($expected = null) {
		$out = array();
		if($this->isPost()) {
			foreach($_POST as $key => $value) {
				if(!empty($expected)) {
					if(in_array($key, $expected)) {
						$out[$key] = $value;
					}
				}
			}
		}
		return $out;
	}

}
