<?php
include_once '../server/connection.php';
$conn = new Connection();


$prd_name = $_REQUEST['product_name'];
$stock_requested = (int)$_REQUEST['stock_req'];
$req_id = (int)$_REQUEST['reqId'];
$prd_id = (int)$_REQUEST['product_id'];
$user_id = (int)$_REQUEST['user_id'];
$usr_unique = $_REQUEST['user_unique'];
$stock_assigned = (int)$_REQUEST['stock_assigned'];
$status = 1;

$sql = "INSERT INTO stock_list (`product_id`,`product_name`,`user_unique`,`user_id`,`stock_requested`,`stock_unit`,`req_id`,`status`) VALUES('$prd_id','$prd_name','$usr_unique','$user_id','$stock_requested','$stock_assigned','$req_id',1)";
$result = $conn->execute($sql);
print($result);
// if($result == 1){
// 	$sql2 = "SELECT product_unit FROM products WHERE id='$prd_id'";
// 	$res = $conn->getOne($sql2);
// 	if(isset($res)){
// 		$de
// 	}
// }


?>