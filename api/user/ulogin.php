<?php
include_once '../../server/connection.php';
$conn = new Connection();
session_start();

$name = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT u_id,u_email,u_unique,u_usertype FROM users WHERE `u_email`='$name' AND `u_password`='$pass'";
$result = $conn->getAll($sql);
$nbrUsers = count($result);
$row = $result[0];
if ($nbrUsers >0) {
	setcookie("user_id", $row['u_id'], time() + (86400*20),"/");
	setcookie("user_name", $row['u_email'], time() + (86400 * 30), "/");
	setcookie("user_type", $row['u_usertype'], time() + (86400 * 30), "/");
	setcookie("userkey", $row['u_unique'], time() + (86400 * 30), "/");
	print("Login Successful");
}else{
	print("Login Error !!");
}
//print_r($_POST);
?>