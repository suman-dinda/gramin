<?php
include_once '../server/connection.php';
$conn = new Connection();
$jsonData = array();

$id = $_REQUEST['id'];
$sql = "SELECT * FROM `products` WHERE `id`='$id'";
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