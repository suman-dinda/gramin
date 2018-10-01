<?php
include_once '../../server/connection.php';
$conn = new Connection();
$jsonData = array();

$serviceName = $_REQUEST['service_name'];
$getServiceList = "SELECT * FROM `service_types` WHERE `service_name` = '$serviceName'";
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