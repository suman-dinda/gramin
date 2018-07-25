<?php
include_once '../server/connection.php';
$conn = new Connection();
$jsonData = array();
$sql = "SELECT * FROM product_category WHERE status = 1";
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