app.config(function($routeProvider) {
	$routeProvider
    .when("/", {
        templateUrl : "pages/home.php"
    })
    .when("/view/subordinates", {
        templateUrl : "pages/subordinates.php"
    })
    .when("/requestProduct", {
        templateUrl : "pages/requestProduct.php"
    })

 });