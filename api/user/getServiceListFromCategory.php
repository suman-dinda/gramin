<?php
include_once '../../server/connection.php';
$conn = new Connection();
$jsonData = array();
$serviceCategory = $_REQUEST['service_category'];
$getServiceList = "SELECT `service_name` FROM `service_types` WHERE `service_category` = '$serviceCategory'";
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