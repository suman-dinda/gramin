<?php
include_once '../../server/connection.php';
include_once '../../server/commission.php';
$conn = new Connection();
$comsn = new Commission();
$jsonData = array();
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
if(isset($_REQUEST['customer_pan'])){
	$customer_pan = $_REQUEST['customer_pan'];
}else{$customer_pan = "";}
if(isset($_REQUEST['customer_aadhar'])){
	$customer_aadhar = $_REQUEST['customer_aadhar'];
}else{$customer_aadhar="";}
if(isset($_REQUEST['transactionId'])){
	$transaction_id = $_REQUEST['transactionId'];
}else{$transaction_id="";}
$user_unique = $_COOKIE['userkey'];
/*
	commission value calculation
*/
	$gpCommission	= ((int)$_REQUEST['gp_commission']/100);
	$talukCommission = ((int)$_REQUEST['taluk_commission']/100);
	$distCommission	= ((int)$_REQUEST['dist_commission']/100);
	$zoneCommission = ((int)$_REQUEST['zone_commission']/100);
	$gpCommissionAmount = $comsn -> calculateCommission($gpCommission,$amount_paid,"gp");
	$talukCommissionAmount = $comsn -> calculateCommission($talukCommission,$amount_paid,"taluk_head");
	$distCommissionAmount = $comsn -> calculateCommission($distCommission,$amount_paid,"dist_head");
	$zoneCommissionAmount = $comsn -> calculateCommission($zoneCommission,$amount_paid,"zone_head");
	
if($amount_due > 0){
	$status = 2;
}else{
	$status = 1;
}
/*
	get Users from gp user key
*/
	
$sql = "INSERT INTO `service_request` (`service_no`,`service_name`,`service_amount`,`service_date`,`customer_name`,`customer_mobile`,`customer_pan`,`customer_aadhar`,`customer_address`,`payment_mode`,`amount_paid`,`amount_due`,`transaction_id`,`userkey`,`status`) VALUES ('$service_no','$service_name','$service_cost','$sell_date','$customer_name','$customer_contact','$customer_pan','$customer_aadhar','$customer_add','$payment_mode','$amount_paid','$amount_due','$transaction_id','$user_unique','$status')";
$result = $conn->execute($sql);
print($result);
?>