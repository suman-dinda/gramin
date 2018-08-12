app.service("userManagement",function($http,$log){
	this.create = function(data){
		return $http({
	        method : "POST",
	        url : "../api/createUser.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	}

	this.getDropdownUsers = function(user_type){
		var data = {user:user_type};
		return $http({
	        method : "POST",
	        url : "../api/getDropdownUser.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	}

	this.getUserCount = function(userType){
		var data = {usertype:userType};
		return $http({
	        method : "POST",
	        url : "../api/getUserCount.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        var a = response.data[0];
	        return a["COUNT(*)"];
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	}

	this.getSingleUserType = function(userType){
		return $http({
			method : "POST",
	        url : "../api/getSingleUserType.php",
	        params: userType,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
		}).then(function success(response){
			return response.data;
		},function error(response){
			$log.error('ERROR:', response);
            throw response;
		});
	}
	this.getSubordinates = function(userkey){
		var data = {userkey:userkey};
		return $http({
			method : "POST",
	        url : "../api/user/getSubordinates.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response){
			return response.data;
		},function error(response){
			$log.error('ERROR:', response);
            throw response;
		});
	}
	this.getUserDetailsFromKey = function(userkey){
		var data = {userkey:userkey};
		return $http({
			method : "POST",
	        url : "../api/getUserFromKey.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response){
			return response.data;
		},function error(response){
			$log.error('ERROR:', response);
            throw response;
		});
	}
	this.getUserProfileFromKey = function(userkey,usecase){
		var data = {};
		data.userkey = userkey;
		data.usecase = usecase;
		return $http({
			method : "POST",
	        url : "../api/getUserFromKey.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response){
			return response.data;
		},function error(response){
			$log.error('ERROR:', response);
            throw response;
		});
	}

});