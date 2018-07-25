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