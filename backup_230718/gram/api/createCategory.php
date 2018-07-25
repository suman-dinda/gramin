<?php
include_once '../server/connection.php';
$conn = new Connection();

$categoryname = $_REQUEST['category_name'];
if(isset($_REQUEST['category_desc'])){
	$categorydesc = $_REQUEST['category_desc'];
}else{
	$categorydesc = "";
}

$sql = "INSERT INTO product_category (`category_name`,`category_description`,`status`) VALUES('$categoryname', '$categorydesc',1)";
$result = $conn->execute($sql);
print($result);
?>