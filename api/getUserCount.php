<?php
	include_once '../server/connection.php';
	$conn = new Connection();
	$jsonData = array();
	$user = $_REQUEST['usertype'];
	if(isset($user)){
		$sql = "SELECT COUNT(*) FROM users WHERE u_usertype='$user' AND u_userstatus = 1";
		$result = $conn->getOne($sql);
		foreach ($result as $res) {
			$jsonData[] = $res;
		}
		print(json_encode($jsonData));
	}
?>