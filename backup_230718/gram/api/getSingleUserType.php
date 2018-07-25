<?php
include_once '../server/connection.php';
$conn = new Connection();
$jsonData = array();
$usertype = $_REQUEST['usertype'];
$sql = "SELECT u_id,u_email,u_mobile,u_firstname,u_lastname,u_pincode,u_usercreationdate,u_assignedto FROM `users` WHERE `u_usertype`='$usertype' AND `u_userstatus`=1";


$result = $conn->getAll($sql);
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