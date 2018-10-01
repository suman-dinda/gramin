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
    .when("/sell_service/:serviceName", {
        templateUrl : "pages/sellService.php"
    })
    .when("/service_list", {
        templateUrl : "pages/serviceList.php"
    })
    .when("/profile", {
        templateUrl : "pages/profile/profile.php"
    })
    .when("/edService", {
        templateUrl : "pages/sell_UnpaidService.php"
    })
    .when("/showProducts", {
        templateUrl : "pages/products/showProducts.php"
    })
    .when("/sales", {
        templateUrl : "pages/sales/sales_list.php"
    })
    .when("/showProducts/:showprod", {
        templateUrl : "pages/products/showSingleProduct.php"
    })
    .when("/product_details/:id", {
        templateUrl : "pages/products/product_description.php"
    })
    .when("/checkOut", {
        templateUrl : "pages/checkOut.php"
    })
    

 });