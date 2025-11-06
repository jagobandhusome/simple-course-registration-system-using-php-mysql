<?php
class User extends Application{
	public $ip=null;
	//private $table = 'users';
	private $_table2 = 'course_registration';


	public function updateUser($values = null, $id = null){
		if(!empty($values) && !empty($id)) {
			if($this->db->update($this->_table2, $values, $id)) {
				return true;
			}
		}
	}


public function addUser($params = null, $email) {
		if(!empty($params) && !empty($email)) {
			if($this->db->insert($this->_table2, $params)) {

				$url = SITE_URL."?page=confirm_user&code=".$params['code']."";

				$to = $params['email'];
				$subject = 'Activate Your Account';
				$message ="Recently you rigister for the apps development course. \r\n";
				$message .='  your registered email is : '.$params['email'];
				$message .='  your reference code  is : '.$params['code'];
				$message .= "\r\n click on the link below";
				$message .= "    ".$url;
				$text = wordwrap($message, 70, "\r\n");
				$headers = 'From: admin@yourdomain.com' . "\r\n" .
    					   'Reply-To: admin@yourdomain.com' . "\r\n" .
    					   'X-Mailer: PHP/' . phpversion();

				mail($to,$subject,$text,$headers);


				$to_me ="aaaaaaaa@gmail.com";
				$user_Join = "Dear admin an user recently registered to your site";
				$join_message = $params['fullname'];
				$join_message .= " joined in your site. \n";
				$join_message .= $params['fullname'];
				$join_message .= " email is\n";
				$join_message .= $params['email'];
				mail($to_me, $user_Join, $join_message);

				//require_once("sendMail.php");
				return true;
			}
		}
	}





	public function getByHash($code = null) {
		if(!empty($code)) {
			$sql = "SELECT * FROM ".$this->_table2." WHERE code='".$code."'";
			return $this->db->fetchOne($sql);
		}
	}

	public function getByEmail($email = null) {
		if(!empty($email)) {
			$sql = "SELECT `id` FROM `{$this->_table2}` WHERE `email` = '".$this->db->escape($email)."' 
			AND `active` = '2'";
			return $this->db->fetchOne($sql);
		}
	}

	public function getByEmailNotActivated($email = null){
		if(!empty($email)) {
			$sql = "SELECT `id` FROM `{$this->_table2}` WHERE `email` = '".$this->db->escape($email)."' 
			AND `active` = '0'";
			return $this->db->fetchOne($sql);
		}

	}

	public function getUsers(){
		$sql  = "SELECT * FROM ".$this->_table2."";
		return $this->db->fetchAll($sql);
	}
}
?>