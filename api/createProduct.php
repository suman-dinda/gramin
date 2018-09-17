<?php
include_once '../server/connection.php';
$conn = new Connection();

// Location
$location = '../upload/';

if(isset($_FILES)){
	// Count total files
	$countfiles = count($_FILES['file']['name']);

	$filename_arr = array(); 
	// Looping all files

	for ( $i = 0;$i < $countfiles;$i++ ){

	   	//$filename = $_FILES['file']['name'][$i];
	   	$temp = explode(".", $_FILES["file"]["name"][$i]);
	   	$filename = round(microtime(true)) . '.' . end($temp);
	   	// Upload file
	   	move_uploaded_file($_FILES['file']['tmp_name'][$i],$location.$filename);
	    
	  	$filename_arr[] = $filename;

	}

	$arr = array('name' => $filename_arr);
	$imageList = implode(",", $arr['name']);

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
	$gp_comission=$_REQUEST['gp_comission'];
	$taluk_commission = $_REQUEST['taluk_commission'];
	$dist_commission = $_REQUEST['dist_commission'];
	$zone_commission = $_REQUEST['zone_commission'];
	$status = 1;

	$sql = "INSERT INTO `products` (`product_code`,`product_name`,`product_unit`,`product_size`,`product_category`,`product_subcategory`,`product_brand`,`product_cost`,`product_dealerprice`,`product_tax`,`product_description`,`product_images`,`gp_comission`,`taluk_commission`,`dist_commission`,`zone_commission`,`status`) VALUES('$prdCode','$prdName','$prdUnit','$prdSize','$prdCategory','$prdSubCategory','$prdBrand','$prdCost','$prdDealerPrice','$prdTax','$prdDescription','$imageList','$gp_comission','$taluk_commission','$dist_commission','$zone_commission','$status')";
	$result = $conn->execute($sql);
	print($result);
}


//echo json_encode($arr);
//print_r($_REQUEST);

?>