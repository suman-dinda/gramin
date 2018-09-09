<?php
include_once '../../server/connection.php';
$conn = new Connection();
$jsonData = array();
if(isset($_REQUEST['category'])){
	$category = $_REQUEST['category'];

	$sql = "SELECT * FROM products WHERE `product_category`='$category' AND status = 1";
	$result = $conn->getAll($sql);
	$nbrUsers = count($result);
	if($nbrUsers >0){
		foreach ($result as $res) {
				$jsonData[] = $res;
			}
		print(json_encode($jsonData));
	}
	else{
		print("No Data Found");
	}
}else{
	print("Invalid Request");
}
