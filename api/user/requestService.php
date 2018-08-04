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
$status = 1;

$sql = "INSERT INTO `service_request` (`service_name`,`service_amount`,`service_date`,`customer_name`,`customer_mobile`,`customer_address`,`payment_mode`,`status`) VALUES ('$service_name','$service_cost','$sell_date','$customer_name','$customer_contact','$customer_add','$payment_mode','$status')";

$result = $conn->execute($sql);
print($result);
?>