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
});