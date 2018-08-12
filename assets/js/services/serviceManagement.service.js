app.service("serviceManagement",function($http,$log){
	this.createService = function(data){
		return $http({
	        method : "POST",
	        url : "../api/createService.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	}
	 this.getService = function(data){
	 	return $http({
	        method : "POST",
	        url : "../api/user/getService.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	 }
	 this.requestService = function(formdata){
	 	return $http({
	        method : "POST",
	        url : "../api/user/requestService.php",
	        params: formdata,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	 }

	 this.getIndividualServiceList = function(userkey){
	 	var data = {userKey:userkey};
	 	return $http({
	        method : "POST",
	        url : "../api/user/getIndividualServiceList.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	 }
	 this.updaterequestService = function(formdata){
	 	return $http({
	        method : "POST",
	        url : "../api/user/updaterequestService.php",
	        params: formdata,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	 }
});