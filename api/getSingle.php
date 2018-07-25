<?php
include_once '../server/connection.php';
$conn = new Connection();
$jsonData = array();
$type = $_REQUEST['type'];
$id = $_REQUEST['id'];
if($type=="category"){
	$sql = "SELECT * FROM `product_category` WHERE `id`='$id'";
}else if($type == "subcategory"){
	$sql = "SELECT * FROM `product_subcategory` WHERE `id`='$id'";
}else if($type == "brand"){
	$sql = "SELECT * FROM `product_brand` WHERE `id`='$id'";
}
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