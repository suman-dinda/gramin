<?php
	include_once 'connection.php';
	
	
	class Commission{
		

		function calculateCommission($userPercent, $billAmount, $userType) {

			//echo $userPercent.", ".$billAmount.". ".$userType;
			$amount = $userPercent * $billAmount;
			$user_unique = $_COOKIE['userkey'];
			$userString = $this -> getSubOrdinateUser($user_unique, $userType);
			$userKey = trim(preg_replace('/\s\s+/', ' ', $userString));
			echo $userString." UserKey:".$userKey;
			$status = $this -> updateCommission($userkey,$amount);
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
			echo $gpUserKey."][][".$user_type;
			$conn = new Connection();
			$user = "";
			$userType = $this ->$user_type;
			$response = $conn -> getAll("CALL `getUsers`('$gpUserKey');");
			$nbrUsers = count($response);
			if($nbrUsers >0){
				foreach ($response as $res) {
						$user = $res['$userType'];
				}
				return $user;
			}else{
				return "No Data Found";
			}
		}
	}


?>

