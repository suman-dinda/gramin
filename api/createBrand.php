<?php
include_once '../server/connection.php';
$conn = new Connection();

$brandname = $_REQUEST['brand_name'];
if(isset($_REQUEST['brand_desc'])){
	$branddesc = $_REQUEST['brand_desc'];
}else{
	$branddesc = "";
}

$sql = "INSERT INTO product_brand (`brand_name`,`brand_description`,`status`) VALUES('$brandname', '$branddesc',1)";
$result = $conn->execute($sql);
print($result);
?>