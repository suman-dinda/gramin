<?php
include_once '../server/connection.php';
$conn = new Connection();

$prdCode = $_REQUEST['prd_code'];;
$prdName = $_REQUEST['prd_name'];
$prdUnit = $_REQUEST['prd_unit'];
$prdSize = $_REQUEST['prd_size'];
$prdCategory = $_REQUEST['prd_category'];
$prdSubCategory = $_REQUEST['prd_subcategory'];
$prdBrand = $_REQUEST['prd_brand'];
$prdCost = $_REQUEST['prd_cost'];
$prdDealerPrice = $_REQUEST['prd_delear_price'];
$prdTax = $_REQUEST['prd_tax'];
$prdDescription = $_REQUEST['prd_description'];
$status = 1;

$sql = "INSERT INTO `products` (`product_code`,`product_name`,`product_unit`,`product_size`,`product_category`,`product_subcategory`,`product_brand`,`product_cost`,`product_dealerprice`,`product_tax`,`product_description`,`status`) VALUES('$prdCode','$prdName','$prdUnit','$prdSize','$prdCategory','$prdSubCategory','$prdBrand','$prdCost','$prdDealerPrice','$prdTax','$prdDescription','$status')";
$result = $conn->execute($sql);
print($result);
?>