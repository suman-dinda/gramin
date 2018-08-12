<?php
include_once '../server/connection.php';
$conn = new Connection();
$jsonData = array();
$userkey = $_REQUEST['userkey'];
if(isset($_REQUEST['usecase'])){
	$sql = "SELECT `u_firstname`,`u_lastname`,`u_mobile`,`u_fathersname`,`u_dob`,`u_pan`,`u_aadhar`,`u_email`,`u_district`,`u_taluk`,`u_pincode`,`u_address`,`b_accno`,`b_ifsc`,`b_acctype`,`b_bank` FROM `users` WHERE `u_unique` = '$userkey'";
}else{
	$sql="SELECT `u_firstname`,`u_lastname`,`u_mobile` FROM `users` WHERE `u_unique` = '$userkey'";
}

$result = $conn->getOne($sql);
$nbrUsers = count($result);
if($nbrUsers >0){
	foreach ($result as $res) {
			$jsonData[] = $res;
		}
	print(json_encode($jsonData));
}else{
	print("No Data Found");
}

?>