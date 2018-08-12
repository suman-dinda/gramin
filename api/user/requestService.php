<?php
include_once '../../server/connection.php';
$conn = new Connection();


$customer_add = $_REQUEST['customer_add'];
$customer_contact  = $_REQUEST['customer_contact'];
$customer_name = $_REQUEST['customer_name'];
$payment_mode = $_REQUEST['payment_mode'];
$sell_date = $_REQUEST['sell_date'];
$service_cost = $_REQUEST['service_cost'];
$service_name = $_REQUEST['service_name'];
$amount_due = $_REQUEST['amount_due'];
$amount_paid = $_REQUEST['amount_paid'];
$service_no = $_REQUEST['service_no'];
if($amount_due > 0){
	$status = 2;
}else{
	$status = 1;
}

$user_unique = $_COOKIE['userkey'];

$sql = "INSERT INTO `service_request` (`service_no`,`service_name`,`service_amount`,`service_date`,`customer_name`,`customer_mobile`,`customer_address`,`payment_mode`,`amount_paid`,`amount_due`,`userkey`,`status`) VALUES ('$service_no','$service_name','$service_cost','$sell_date','$customer_name','$customer_contact','$customer_add','$payment_mode','$amount_paid','$amount_due','$user_unique','$status')";

$result = $conn->execute($sql);
print($result);
?>