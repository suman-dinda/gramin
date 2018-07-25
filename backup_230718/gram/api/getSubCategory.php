<?php
include_once '../server/connection.php';
$conn = new Connection();
$jsonData = array();
$cat_id = $_REQUEST['cat_id'];
$sql = "SELECT * FROM product_subcategory WHERE category = '$cat_id' AND status = 1";
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