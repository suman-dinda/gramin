<?php
if(isset($_COOKIE['user_id']) || isset($_COOKIE['user_name']) || isset($_COOKIE['user_type']) || isset($_COOKIE['userkey'])){
	//removing cookie data
	setcookie("user_id","",time() + (86400*20),"/");
	setcookie("user_name","",time() + (86400*20),"/");
	setcookie("user_type","",time() + (86400*20),"/");
	setcookie("userkey","",time() + (86400*20),"/");

	echo true;
}else{
	echo false;
}
?>