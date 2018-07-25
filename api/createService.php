<?php
include_once '../server/connection.php';
$conn = new Connection();

$servicename = $_REQUEST['servicename'];
$serviceamount = $_REQUEST['serviceamount'];

$sql = "INSERT INTO service_types (`service_name`,`service_price`) VALUES('$servicename', '$serviceamount')";
$result = $conn->execute($sql);
print($result);
?>