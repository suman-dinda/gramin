<?php
include_once '../../server/connection.php';
$conn = new Connection();
$jsonData = array();

$getServiceList = "SELECT * FROM `service_types`";
$result = $conn -> getAll($getServiceList);
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