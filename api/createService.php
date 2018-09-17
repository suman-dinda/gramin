<?php
include_once '../server/connection.php';
$conn = new Connection();

$servicename = $_REQUEST['servicename'];
$serviceamount = $_REQUEST['serviceamount'];
$gp_comission=$_REQUEST['gp_comission'];
$taluk_commission = $_REQUEST['taluk_commission'];
$dist_commission = $_REQUEST['dist_commission'];
$zone_commission = $_REQUEST['zone_commission'];

$sql = "INSERT INTO service_types (`service_name`,`service_price`,`gp_comission`,`taluk_commission`,`dist_commission`,`zone_commission`) VALUES('$servicename', '$serviceamount','$gp_comission','$taluk_commission','$dist_commission','$zone_commission')";
$result = $conn->execute($sql);
print($result);
?>