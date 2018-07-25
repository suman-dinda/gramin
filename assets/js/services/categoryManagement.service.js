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