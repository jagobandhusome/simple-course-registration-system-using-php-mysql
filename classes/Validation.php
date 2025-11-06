<?php

class Validation {
	public $objForm;
	public $_message = array(
		'fullname' => "Please provide your full name.",
		'fathername' => "Please provide your Father's name.",
		'mothername' => "Please provide your Mother's name.",
		'email' =>  "Please provide your valid email",
		'emailagain' => "Please provide your Email again",
		'address' => "You must have to provide mailing address!",
		'degree' => "Please provide your degree",
		'gpa' => "GPA/Division field is required!",
		'board' => "Board field is required",
		'year'=>'Provide your passing year',
		'contactnumber'=>'Contact number not valid',
		'payment'=>'Please provide your payment details',
		'already_registered_not_activated'=> "This email is already registered but your account is not activated ! check your inbox",
		'length_not_valid' => "You should input between 2 to 20 character in the field !",
		'error_uploading'=> 'An eeror occoured while uploading',
		'ensure_uploading_image'=>'Please ensure you are uploading an image.',
		'unsupported_filetype'=> 'Unsupported filetype Uploaded',
		'exceeds_size_limit'=> 'File uploaded exceeds maximum upload size.',
		'file_already_exists'=> 'The file you are trying is already in our database',
		'picture_not_selected'=> 'No picture selected',
		'uploading_error_to_destination'=> 'Error uploading file  check destination is writeable'
		);

	public $_errors = array();

	public $_expected = array();

	public $_required = array();

	public $_special = array();

	public $_posts = array();

	public $_post_remove = array();

	public $_post_format = array();

	public function __construct($objForm) {

		$this->objForm = $objForm;

	}


	public function process(){
		if($this->objForm->isPost() && !empty($this->_expected)) {
			$this->_posts = $this->objForm->getPostArray($this->_expected);
			if(!empty($this->_posts)) {
				foreach($this->_posts as $key => $value){
					$this->check($key, $value);
				}
			}
		}
	}


	public function add2Errors($key) {
		$this->_errors[] = $key;
	}


	public function check($key, $value) {
		if(!empty($this->_special) && array_key_exists($key, $this->_special)) {
			$this->checkSpecial($key, $value);
		} else {
			if(in_array($key, $this->_required) && empty($value)) {
				$this->add2Errors($key);
			}
		}
	}


	public function checkSpecial($key, $value) {
		switch ($this->_special[$key]) {
			case 'email':
				if(!$this->isEmail($value)) {
					$this->add2Errors($key);
				}
				break;
		}
	}


	public function isEmail($value) {
		if(!empty($value)) {
			$result = filter_var($value, FILTER_VALIDATE_EMAIL);
			return !$result ? false : true;
		}
	}


	public function isValid(){
		$this->process();
		if(empty($this->_errors) && !empty($this->_posts)) {
			if(!empty($this->_post_remove)) {
				foreach($this->_post_remove as $value) {
					unset($this->_posts[$value]);
				}
			}
			if(!empty($this->_post_format)){
				foreach ($this->_post_format as $key => $value) {
					$this->format($key, $value);
				}
			}
			return true;			
		}
		return false;
	}



	public function format($key, $value){
		switch($value){
			case 'password':
			$this->_posts[$key] = Helper::string2hash($value);
			break;
		}
	}



	public function validate($field = null) {
		if(!empty($this->_errors) && in_array($field, $this->_errors)) {
			return $this->wrapWarn($field);
		}

	}

	public function wrapWarn($key) {
		echo "<span style='color:red'>".$this->_message[$key]."</span><br>";
	}
}