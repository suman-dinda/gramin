<?php
include_once '../../server/connection.php';
$conn = new Connection();

$password = $_POST['password'];
$userId = base64_decode($_POST['tokenId']);
$userUnique = base64_decode($_POST['token']);

$sql = "UPDATE users SET u_password = '$password' WHERE u_id='$userId' AND u_unique='$userUnique'";

$result = $conn->execute($sql);
if($result == 1){
	echo "true";
}else{
	echo $result;
}
?>
