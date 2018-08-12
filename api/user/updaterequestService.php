<?php
include_once '../../server/connection.php';
$conn = new Connection();

$sell_date = $_REQUEST['sell_date'];
$service_cost = $_REQUEST['service_cost'];
$service_name = $_REQUEST['service_name'];
$amount_due = $_REQUEST['amount_due'];
$amount_paid = $_REQUEST['amount_paid'];
$service_no = $_REQUEST['service_no'];
$service_status = $_REQUEST['status'];
if($amount_due > 0){
	$status = 2;
}else{
	$status = 1;
}

$user_unique = $_COOKIE['userkey'];

$sql = "UPDATE `service_request` SET `amount_due`='$amount_due', `amount_paid`=(amount_paid + $amount_paid), `status`='$status' WHERE `service_no`= '$service_no'";

$result = $conn->execute($sql);
print($result);
?>