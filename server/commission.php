<?php
	include_once 'connection.php';
	
	
	class Commission{
		

		function calculateCommission($userPercent, $billAmount, $userType) {

			//echo $userPercent.", ".$billAmount.". ".$userType;
			$amount = $userPercent * $billAmount;
			$user_unique = $_COOKIE['userkey'];
			$status ="";
			$userString = $this -> getSubOrdinateUser($user_unique, $userType);
			$userKey = trim(preg_replace('/\s\s+/', ' ', $userString));

			if($userKey == ''){
				// echo "helo";
			}else{
				$status = $this -> updateCommission($userKey,$amount);
			}
			
			return $status;
		}
		
		function updateCommission($userKey,$amount){
			$conn = new Connection();
			$sql = "UPDATE `users` SET `commission` = (commission + $amount) WHERE `u_unique` = '$userKey'";
			$result = $conn -> execute($sql);
			if($result == '1'){
				return $result;
			}else{
				return "failed";
			}
		}

		function getSubOrdinateUser($gpUserKey, $user_type){
			//echo $gpUserKey."][][".$user_type;
			$conn = new Connection();
			$user = "";
			$response = $conn -> getAll("CALL `getUsers`('$gpUserKey');");
			$nbrUsers = count($response);
			if($nbrUsers >0){
				$res = $response[0];
				$user = $res[$user_type];
				return $user;
			}else{
				return "No Data Found";
			}
		}
	}


?>

