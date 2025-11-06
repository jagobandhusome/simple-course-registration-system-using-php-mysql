<?php

class Upload{

	public $_files;
	public $_types = array('image/jpeg', 'image/jpg', 'image/png');
	//default size
	public $_size = 1024;
	public $_dbfield = 'pictureid';
	public $_post = Array();
	public function __construct() {
		$this->getUploads();
	}

	public function getUploads() {
		if(!empty($_FILES)) {
			foreach($_FILES as $key=>$value){
				$this->_files[$key] = $value;
			}
		}
	}

	public function upload($path) {
		if(!empty($path) && is_dir($path) && !empty($this->_files)) {
			foreach($this->_files as $key=>$value) {
				if(!empty($value) && $this->checkType($value['type']) && $this->checkSize($value['size'])) {
					$name = $value['name']; 
					$rename = "img-".mt_rand(0, 100)."-".$this->shortFileName($name).".".$this->getExtension($name);  
					
					if(!move_uploaded_file($value['tmp_name'], $path.DS.$rename)) {
						$this->_errors[] = $key;
					}
				} else {
					$this->_errors[] = $key;
				}
			}
			return empty($this->_errors) ? true : false;
		}
		return false;
	}

	public function checkType($type){
		if (!empty($type) && !empty($this->_types)) {
			return in_array($type, $this->_types) ? true : false;
		}
		return false;
	}

	public function checkSize($size = null){
		if (!empty($size) && !empty($this->_size)) {			
			return $this->_size >= ($size / 1024) ? true : false;  
		}
		return false;
	}
	
	public function getExtension($file) {
	  $pos = strrpos($file, '.');
	  return substr($file, $pos+1);
	}

	public function shortFileName($file){
		$file_name =  basename($file,'.'.$this->getExtension($file));
		$cut = substr($file_name,0,10);
		return $cut; 


	}

}

?>