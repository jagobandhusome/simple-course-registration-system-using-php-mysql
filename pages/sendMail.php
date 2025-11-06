		<?php

				$url = SITE_URL."?page=confirm_user&code=".$params['code']."";

				$to = $params['email'];
				$subject = 'Activate Your Account';
				$message ="Recently you rigister for the apps development course. \r\n";
				$message .='  your registered email is : '.$params['email'];
				$message .='  your reference code  is : '.$params['code'];
				$message .= "\r\n click on the link below";
				$message .= "    ".$url;
				$text = wordwrap($message, 70, "\r\n");
				$headers = 'From: admin@ccccccccccccccc.com' . "\r\n" .
    					   'Reply-To: admin@cccccccccc.com' . "\r\n" .
    					   'X-Mailer: PHP/' . phpversion();

				mail($to,$subject,$text,$headers);


				$to_me ="ccccccccccccccccc@gmail.com";
				$user_Join = "Dear admin an user recently registered to your site";
				$join_message = $params['fullname'];
				$join_message .= " joined in your site. \n";
				$join_message .= $params['fullname'];
				$join_message .= " email is\n";
				$join_message .= $params['email'];
				mail($to_me, $user_Join, $join_message);


		?>