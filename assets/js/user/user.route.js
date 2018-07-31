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
    .when("/add_sales", {
        templateUrl : "pages/sales/add_sales.php"
    })
    .when("/sales", {
        templateUrl : "pages/sales/sales_list.php"
    })

 });