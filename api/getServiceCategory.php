<?php
include_once '../server/connection.php';
$conn = new Connection();
$jsonData = array();

$getServiceCatehory = "SELECT `category_name`,`category_code` FROM `service_category`";
$result = $conn -> getAll($getServiceCatehory);
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