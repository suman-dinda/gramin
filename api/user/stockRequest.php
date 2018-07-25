<?php
include_once '../../server/connection.php';
$conn = new Connection();


$prd_id = (int)$_REQUEST['prd_id'];
$prd_name = $_REQUEST['prd_name'];
$stock_req = (int)$_REQUEST['stock_req'];
$user_unique = $_REQUEST['user_unique'];
$user_id = (int)$_REQUEST['userid'];

$sql = "INSERT INTO `requestedstock` (`user_unique`,`user_id`,`product_id`,`product_name`,`stock_unit`,`status`) VALUES ('$user_unique','$user_id','$prd_id','$prd_name','$stock_req', 1)";

$result = $conn->execute($sql);
print($result);
?>