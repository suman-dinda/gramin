<?php
include_once '../../server/connection.php';
$conn = new Connection();
$jsonData = array();
$products = array();
$data= new \stdClass();

if (isset($_REQUEST['userkey'])){
	$key = $_REQUEST['userkey'];

	$sql = "SELECT * FROM stock_list WHERE user_unique = '$key'";
	$sql2= "SELECT * FROM products WHERE id IN (SELECT product_id FROM `stock_list` WHERE `user_unique`='$key')";

	$result = $conn -> getAll($sql);
	$nbrUsers = count($result);
	if($nbrUsers >0){
		foreach ($result as $res) {
				$jsonData[] = $res;
			}

	$stocks = $jsonData;
	$data -> stocks = $stocks;
	}else{
		print("No Data Found");
	}

	$result2 = $conn -> getAll($sql2);
	$nbrUsers = count($result2);
	if($nbrUsers >0){
		foreach ($result2 as $res) {
				$products[] = $res;
			}
	
	$prd = $products;
	$data -> products = $prd;
	}else{
		print("No Data Found");
	}
	print(json_encode($data));
}
?>