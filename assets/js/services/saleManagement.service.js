app.service("saleManagement", function($http,$log){
	this.createSale = function(data){
		return $http({
	        method : "POST",
	        url : "../api/createSale.php",
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