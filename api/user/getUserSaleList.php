<?php
include_once '../../server/connection.php';
$conn = new Connection();
$jsonData = array();

if (isset($_REQUEST['userKey'])){
	$key = $_REQUEST['userKey'];

	$getSaleList = "SELECT * FROM `sales` WHERE `sale_userunique` = '$key'";
	$result = $conn -> getAll($getSaleList);
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