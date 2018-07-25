<?php
include_once '../server/connection.php';
$conn = new Connection();
session_start();

$name = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM superadmin WHERE `username`='$name' AND `password`='$pass'";
$result = $conn->getAll($sql);
$nbrUsers = count($result);

if ($nbrUsers >0) {
	$_SESSION["username"] = $name;
	print("Login Successful");
}else{
	print("Login Error !!");
}
//print_r($_POST);
?>