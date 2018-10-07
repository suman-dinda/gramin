<?php
include_once '../server/connection.php';
$conn = new Connection();

$servicename = $_REQUEST['servicename'];
$serviceamount = $_REQUEST['serviceamount'];
$gp_commission=$_REQUEST['gp_commission'];
$taluk_commission = $_REQUEST['taluk_commission'];
$dist_commission = $_REQUEST['dist_commission'];
$zone_commission = $_REQUEST['zone_commission'];
if(isset($_REQUEST['servicecategory'])){
	$servicecategory = $_REQUEST['servicecategory'];
}else{
	$servicecategory = "default";
}


$sql = "INSERT INTO service_types (`service_name`,`service_category`,`service_price`,`gp_commission`,`taluk_commission`,`dist_commission`,`zone_commission`) VALUES('$servicename', '$servicecategory', '$serviceamount','$gp_commission','$taluk_commission','$dist_commission','$zone_commission')";
$result = $conn->execute($sql);
print($result);
?>