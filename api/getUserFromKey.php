<?php
include_once '../server/connection.php';
$conn = new Connection();
$jsonData = array();
$userkey = $_REQUEST['userkey'];
$sql = "SELECT `u_firstname`,`u_lastname`,`u_mobile` FROM `users` WHERE `u_unique` = '$userkey'";
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