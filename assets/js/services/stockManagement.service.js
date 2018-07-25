app.service("stockManagement",function($http,$log){
	this.stockRequest = function(data){
		return $http({
	        method : "POST",
	        url : "../api/user/stockRequest.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	}

	this.getStockRequest = function(){
		return $http({
	        method : "POST",
	        url : "../api/stockRequestList.php",
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	}

});