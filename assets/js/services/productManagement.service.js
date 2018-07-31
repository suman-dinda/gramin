app.service("productManagement",function($http,$log){
	this.createProduct = function(data){
		return $http({
	        method : "POST",
	        url : "../api/createProduct.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	}
	this.getAllProduct = function(){
		return $http({
	        method : "POST",
	        url : "../api/getAllProducts.php",
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	}
	this.getSingleProduct = function(id){
		var data={};
		data.id = id;
		return $http({
	        method : "POST",
	        url : "../api/getSingleProduct.php",
	        params: data,
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        return response.data;
	    }, function error(response) {
	        $log.error('ERROR:', response);
            throw response;
	    });
	}
	this.getProductStock = function(userkey){
		var data = {};
		data.userkey = userkey;

		return $http({
	        method : "POST",
	        url : "../api/user/getUserProductStock.php",
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