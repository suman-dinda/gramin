var app = angular.module("gramin", ["ngRoute"]);

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
		},function error(){
			$log.error('ERROR:', response);
            throw response;
		});
	}

});

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
});

app.factory('categoryManagement', function($http,$log){
	return{
		addCategory : function(data){
			return $http({
				method: "POST",
				url: "../api/createCategory.php",
				params: data,
				headers: { 'Content-Type': 'application/json; charset=UTF-8' }
			});
		},
		addSubCategory : function(data){
			return $http({
				method: "POST",
				url: "../api/createSubcategory.php",
				params: data,
				headers: { 'Content-Type': 'application/json; charset=UTF-8' }
			});
		},
		addBrand : function(data){
			return $http({
				method: "POST",
				url: "../api/createBrand.php",
				params: data,
				headers: { 'Content-Type': 'application/json; charset=UTF-8' }
			});
		},

		getAllCategory:function(){
			return $http({
				method: "GET",
				url: "../api/getCategory.php",
			});
		},
		getAllSubCategory:function(){
			return $http({
				method: "GET",
				url: "../api/getAllSubCategory.php",
			});
		},
		getAllBrand:function(){
			return $http({
				method: "GET",
				url: "../api/getAllBrand.php",
			});
		},
		getSubCategory:function(data){
			return $http({
				method: "GET",
				url: "../api/getSubCategory.php",
				params:data
			});
		},

		deleteCSB : function(data){
			return $http({
				method: "GET",
				url: "../api/deleteCSB.php",
				params:data
			});
		},
		getSingle : function(data){
			return $http({
				method: "GET",
				url: "../api/getSingle.php",
				params:data
			});
		}
	}

	
});

app.factory('dataPassing', function(){
	var ecsb = {};

	return {
		getData : function(){
			return ecsb.data;
		},
		setData : function(data){
			ecsb.data = data;
		}
	}
});


app.config(function($routeProvider) {
	$routeProvider
    .when("/", {
        templateUrl : "pages/home.php"
    })
    .when("/create/:usertype", {
        templateUrl : "pages/create_user.php"
    })
    .when("/view/:usertype", {
        templateUrl : "pages/view_user.php"
    })
    .when("/create_service", {
        templateUrl : "pages/create_service.php"
    })
    .when("/sales", {
        templateUrl : "pages/sales/sales_list.php"
    })
    .when("/add_sales", {
        templateUrl : "pages/sales/add_sales.php"
    })
    .when("/products", {
        templateUrl : "pages/product/product_list.php"
    })
    .when("/add_product", {
        templateUrl : "pages/product/add_product.php"
    })
    .when("/category", {
        templateUrl : "pages/category/category_list.php"
    })
    .when("/add_category", {
        templateUrl : "pages/category/add_category.php"
    })
    .when("/subcategory", {
        templateUrl : "pages/subcategory/subcategory_list.php"
    })
    .when("/add_subcategory", {
        templateUrl : "pages/subcategory/add_subcategory.php"
    })
    .when("/transfer", {
        templateUrl : "pages/transfer/transfer_stock.php"
    })
    .when("/purchase_request", {
        templateUrl : "pages/transfer/purchase_request.php"
    })
    .when("/brands", {
        templateUrl : "pages/brand/brand_list.php"
    })
    .when("/add_brand", {
        templateUrl : "pages/brand/add_brand.php"
    })
    .when("/editCategory", {
        templateUrl : "pages/category/edit_category.php"
    })
    .when("/editSubCategory", {
        templateUrl : "pages/subcategory/edit_subcategory.php"
    })
    .when("/editBrand", {
        templateUrl : "pages/brand/edit_brand.php"
    })
});