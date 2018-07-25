<?php
include_once '../server/connection.php';
$conn = new Connection();
$type = $_REQUEST['type'];
$id = $_REQUEST['id'];
if($type=="category"){
	$sql = "UPDATE `product_category` SET `status` = 0 WHERE `id`='$id'";
}else if($type == "subcategory"){
	$sql = "UPDATE `product_subcategory` SET `status` = 0 WHERE `id`='$id'";
}else if($type == "brand"){
	$sql = "UPDATE `product_brand` SET `status` = 0 WHERE `id`='$id'";
}
$result = $conn->execute($sql);
print($result);
?>