<?php
include_once '../server/connection.php';
$conn = new Connection();
$jsonData = array();
$user = $_REQUEST['user'];
if(isset($user)){
	$sql = "SELECT u_id,u_firstname,u_lastname FROM users WHERE u_usertype='$user' AND u_assignedto IS NULL AND u_userstatus = 1";
	$result = $conn->getAll($sql);
	$nbrUsers = count($result);
	if($nbrUsers >0){
		foreach ($result as $res) {
				$jsonData[] = $res;
			}
		print(json_encode($jsonData));
	}
}

?>