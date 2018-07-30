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
if($result == 1){
	$sql2 = "UPDATE `requestedstock` SET `status`=2 WHERE `id`='$req_id'";
	$res = $conn->execute($sql2);
	
	$updateActualStock = "UPDATE `products` SET `product_unit`=(product_unit - $stock_assigned) WHERE `id` = '$prd_id'";
	$rez = $conn -> execute($updateActualStock);

	print($result."-".$res."-".$rez);
}


?>