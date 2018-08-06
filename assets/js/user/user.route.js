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
    .when("/sell_service", {
        templateUrl : "pages/sellService.php"
    })
    .when("/service_list", {
        templateUrl : "pages/serviceList.php"
    })
    .when("/sales", {
        templateUrl : "pages/sales/sales_list.php"
    })
    

 });