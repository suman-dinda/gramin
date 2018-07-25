<?php
include_once '../../server/connection.php';
$conn = new Connection();
$jsonData = array();

if (isset($_REQUEST['userkey'])){
	$key = $_REQUEST['userkey'];
	$sql = "SELECT u_subordinates FROM users WHERE u_unique = '$key'";

	$sod = $conn -> getOne($sql);
	$subord = $sod[0]['u_subordinates'];

	$getSOD = "SELECT `u_id`, `u_email`, `u_mobile`, `u_unique`, `u_firstname`, `u_lastname`, `u_dob`, `u_pan`, `u_usercreationdate`, `u_address`, `u_pincode` FROM `users` WHERE u_id IN ($subord)";
	$result = $conn -> getAll($getSOD);
	$nbrUsers = count($result);
	if($nbrUsers >0){
		foreach ($result as $res) {
				$jsonData[] = $res;
			}
		print(json_encode($jsonData));
	}else{
		print("No Data Found");
	}
}
?>