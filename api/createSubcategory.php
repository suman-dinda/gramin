<?php
include_once '../server/connection.php';
$conn = new Connection();

$subcategoryname = $_REQUEST['subcategory_name'];
if(isset($_REQUEST['subcategory_desc'])){
	$subcategorydesc = $_REQUEST['subcategory_desc'];
}else{
	$subcategorydesc = "";
}

$category = $_REQUEST['category'];
$category_name = $_REQUEST['category_name'];

$sql = "INSERT INTO product_subcategory (`subcategory_name`,`subcategory_desc`,`category`,`category_name`,`status`) VALUES('$subcategoryname', '$subcategorydesc','$category','$category_name',1)";
$result = $conn->execute($sql);
print($result);
?>