<?php
$code = URL::getParam('code');

if(!empty($code)) {
	$objUser = new User();
	$user = $objUser->getByHash($code);

	if(!empty($user)) {
		if ($user['active']=='1') {
			echo "Your account already activated";
			header('Refresh: 3;?page=index');
		}else{
			$values = array(
				'active' => '1'
			);	

			if ($objUser->updateUser($values, $user['id'])){
				echo "Your account successfully verified.I f you fetch any problem please contact with your email address and reference code.";
				//Helper::redirect('?page=index');
				header('Refresh: 4;?page=index');
			}
		}
	} else {
		echo "Sorry this is not related to our site";
		header('Refresh: 4;?page=index');
	}
}
