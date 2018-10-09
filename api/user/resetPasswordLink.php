<?php
include_once '../../server/connection.php';
$conn = new Connection();
$host = $_SERVER['SERVER_NAME'];

	$email = $_POST['email'];

	$sql = "SELECT u_id,u_unique,u_firstname FROM users WHERE u_email  = '$email'";
	$result = $conn->getAll($sql);
	$nbrUsers = count($result);
	if ($nbrUsers >0) {
		$row = $result[0];
		$id = $row['u_id'];
		$unique = $row['u_unique'];
		$firstname = $row['u_firstname'];
		$encodedId = base64_encode($id);
		$encodedUnique = base64_encode($unique);

		$to = $email;
        $subject = "GKMS - Password Reset Link";
         
        $message = "Dear ".$firstname.",";
        $message .= "<p>We have sent you this mail to reset the passowrd for gkms.in.<br>";
        $message .= "Kindly click on the below link to redirect to the Reset Password Page.</p>";
        $message .= "<p><a href='http://".$host."/ResetPassword/index.html?tokenId=".$encodedId."&token=".$encodedUnique."'>Click Here To Reset Password</a></p>";
        $message .= "<p>Regards,<br>Team GKMS";
         
        $header = "From:reset@gkms.in \r\n";
        $header .= "Cc:sumandinda123@gmail.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
         
        $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }


	}else{
		echo "No Account Is Asscosciated With This Email";
	}
