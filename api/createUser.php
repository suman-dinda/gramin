<?php
include_once '../server/connection.php';
$conn = new Connection();

$aadhar = $_REQUEST['aadhar'];
$account = $_REQUEST['account'];
$accounttype = $_REQUEST['accounttype'];
$address = $_REQUEST['address'];
$bank = $_REQUEST['bank'];
$district = $_REQUEST['district'];
$dob = $_REQUEST['dob'];
$email = $_REQUEST['email'];
$fathersname = $_REQUEST['fathersname'];
$firstname = $_REQUEST['firstname'];
$ifsc = $_REQUEST['ifsc'];
$lastname = $_REQUEST['lastname'];
$mobile = $_REQUEST['mobile'];
$pan = $_REQUEST['pan'];
$password = $_REQUEST['password'];
$pincode = (int)$_REQUEST['pincode'];
$subordinates = $_REQUEST['subordinates'];
$taluk = $_REQUEST['taluk'];
$usertype = $_REQUEST['usertype'];
$status = 1;
$today = date("Y-m-d H:i:s"); 
$unique = $conn->generateRandomString(7);

$sql = "INSERT INTO `users` (`u_email`,`u_password`,`u_mobile`,`u_unique`,`u_firstname`,`u_lastname`,`u_fathersname`,`u_dob`,`u_pan`,`u_aadhar`,`u_district`,`u_taluk`,`u_address`,`u_pincode`,`b_accno`,`b_ifsc`,`b_acctype`,`b_bank`,`u_subordinates`,`u_usertype`,`u_usercreationdate`,`u_userstatus`)
    VALUES ('$email','$password','$mobile','$unique','$firstname','$lastname','$fathersname','$dob','$pan','$aadhar','$district','$taluk','$address','$pincode','$account','$ifsc','$accounttype','$bank','$subordinates','$usertype','$today','$status')";
try{
	$result = $conn->execute($sql);
	if($result==1){
		print($result);
	}
	
	if($subordinates != ""){
		if($result == 1){
			$subOrd = explode(",", $subordinates);
			foreach ($subOrd as $key) {
				$updateSql = "UPDATE users SET u_assignedto='$unique' WHERE u_id='$key'";
				$conn->execute($updateSql);
			}
		}
	}
}catch(Exception $e){
	print("Error ".$e);
}

?>