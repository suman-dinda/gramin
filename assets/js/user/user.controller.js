app.run(function($rootScope,dataPassing){
	$rootScope.key = dataPassing.getCookie('userkey');

});
app.filter('stockFilter',function(dataPassing){
	return function(x){
		var stockArray = dataPassing.getData();
		var stockUnit ='';
		angular.forEach(stockArray, function(key,value){
			console.log(key.product_id);
			if(x == key.product_id){
				stockUnit = key.stock_unit;
			}
		});
		//console.log("Stocks Array",stockArray);
		return stockUnit;
	}
})
app.controller('dashboardController', function($scope,$http,$location,dataPassing){
	$scope.titl = "User Dashboard";
	$scope.userType = dataPassing.getCookie('user_type');
	$scope.subown = 'true';
	if($scope.userType == "gram_panchayat"){
		$scope.subown = 'false';
	}

	//dashboard js
	  $('.connectedSortable').sortable({
	    placeholder         : 'sort-highlight',
	    connectWith         : '.connectedSortable',
	    handle              : '.box-header, .nav-tabs',
	    forcePlaceholderSize: true,
	    zIndex              : 999999
	  });
	  $('.connectedSortable .box-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');

	  // jQuery UI sortable for the todo list
	  $('.todo-list').sortable({
	    placeholder         : 'sort-highlight',
	    handle              : '.handle',
	    forcePlaceholderSize: true,
	    zIndex              : 999999
	  });

	  // bootstrap WYSIHTML5 - text editor
	  $('.textarea').wysihtml5();

	  $('.daterange').daterangepicker({
	    ranges   : {
	      'Today'       : [moment(), moment()],
	      'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	      'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
	      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	      'This Month'  : [moment().startOf('month'), moment().endOf('month')],
	      'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	    },
	    startDate: moment().subtract(29, 'days'),
	    endDate  : moment()
	  }, function (start, end) {
	    window.alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	  });

	  /* jQueryKnob */
	  $('.knob').knob();

	  

	  // Sparkline charts
	  var myvalues = [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021];
	  $('#sparkline-1').sparkline(myvalues, {
	    type     : 'line',
	    lineColor: '#92c1dc',
	    fillColor: '#ebf4f9',
	    height   : '50',
	    width    : '80'
	  });
	  myvalues = [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921];
	  $('#sparkline-2').sparkline(myvalues, {
	    type     : 'line',
	    lineColor: '#92c1dc',
	    fillColor: '#ebf4f9',
	    height   : '50',
	    width    : '80'
	  });
	  myvalues = [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21];
	  $('#sparkline-3').sparkline(myvalues, {
	    type     : 'line',
	    lineColor: '#92c1dc',
	    fillColor: '#ebf4f9',
	    height   : '50',
	    width    : '80'
	  });

	  // The Calender
	  $('#calendar').datepicker();

	  // SLIMSCROLL FOR CHAT WIDGET
	  $('#chat-box').slimScroll({
	    height: '250px'
	  });


	  /* The todo list plugin */
	  $('.todo-list').todoList({
	    onCheck  : function () {
	      window.console.log($(this), 'The element has been checked');
	    },
	    onUnCheck: function () {
	      window.console.log($(this), 'The element has been unchecked');
	    }
	  });

	//dashboard js end
	$scope.logout = function(){
		$http({
	        method : "POST",
	        url : "../api/logout/logout-user.php",
	        headers: { 'Content-Type': 'application/json; charset=UTF-8' }
	    }).then(function success(response) {
	        if(response.data == '1'){
	        	$.notify({
					message: 'Logged Out Successfully. Redirecting Login' 
				},{
					type: 'success'
				});
	        	setTimeout(function(){
	        		if(window.location.hostname == "localhost")
	        			location.href= window.location.protocol+"//"+window.location.hostname+"/gramin/user/";
	        		else
	        			location.href= window.location.protocol+"//"+window.location.hostname+"/user/";
	        	},1000);

	        }else{
	        	$.notify({
					message: 'LoggingOut Failed' 
				},{
					type: 'danger'
				});
	        }
	    }, function error(response) {
            throw response;
	    });
	}

	setTimeout(function(){
		$('#sidebar > li > a').each(function(i,v){
			var temp = $(this).attr('href');
			$(this).removeAttr('href');
			$(this).attr('data-target',temp);
		});
	},1000)

	$scope.changePaswd = function(){
		alert("InProgress");
	}
	
});


app.controller("viewSubordinates", function($scope,$rootScope,$location,dataPassing,userManagement){
	$scope.title = "View Your SubOrdinates";
	$scope.userType = dataPassing.getCookie('user_type');
	console.log($scope.userType);
	if($scope.userType == 'gram_panchayat'){
		$location.path('/user-dashboard');
	}else{
		$scope.key = dataPassing.getCookie('userkey');
		$rootScope.key = $scope.key;
		userManagement.getSubordinates($scope.key)
		.then(function(response){
			$scope.userData = response;
		});

	}


});

app.controller('requestProduct', function($scope,$rootScope,productManagement,stockManagement,dataPassing){
	$scope.title = "Request Product";
	$scope.showProductsTitle = "Your Products";
	$scope.formData = {};
	$scope.userKey = $rootScope.key;
	productManagement.getAllProduct()
	 .then(function(data){
	 	$scope.products = data;
	 });
	 setTimeout(function(){ 	
	 	$('.select2').select2({
	 		width:'100%'
	 	});
	 },777);

	 $scope.showProducts = function(){

	 	productManagement.getProductStock($scope.userKey)
		.then(function(response){
			$scope.productStock = response.products;
			$scope.userStocks = response.stocks;
			dataPassing.setData($scope.userStocks);
		});
	 }
	 $scope.requestProduct = function(product_id,product_name){
	 	if(product_id===undefined && product_name===undefined){
	 		$scope.formData.prd_name = $('#product_name')[0].selectedOptions[0].innerHTML;
	 		$scope.formData.prd_id = $('#product_name').val();
	 	}else{
	 		$scope.formData.prd_name = product_name;
	 		$scope.formData.prd_id = product_id;
	 	}
	 	
	 	$scope.formData.user_unique = dataPassing.getCookie('userkey');
	 	$scope.formData.userid = dataPassing.getCookie('user_id');

	 	stockManagement.stockRequest($scope.formData)
	 	.then(function(data){
	 		$scope.response = data;
	 		if($scope.response==1){
				$.notify({
					message: 'Stock Request Sent' 
				},{
					type: 'success'
				});
				$('#requestProduct')[0].reset();
				
			}else{
				$.notify({
					message: 'Error in adding product' 
				},{
					type: 'danger'
				});
			}
	 	})


	 }
});
app.controller("salesController", function($scope,$rootScope,$filter,dataPassing,productManagement,saleManagement,userManagement){
	$scope.addSaleTitle = "Add Sales";
	$scope.salesTitle = "Your Sales List";

	$scope.cart = [];
	$scope.formData = {};
	$scope.userKey = $rootScope.key;
	$scope.pquantity = 0;
	var date = new Date();
	var x = Math.floor((Math.random() * 10000) + 1);
	$scope.formData.sale_no = "SL-"+x;

	setTimeout(function(){
	 	$('.datepicker').datepicker({
	 		autoclose: true,
	 		format: 'dd/mm/yyyy'
	 	});
	 	$('.datepicker').datepicker('setDate',date);
	 	// $('.select2').select2()
	}, 777);
	productManagement.getProductStock($scope.userKey)
	.then(function(response){
		$scope.products = response;
	});
	userManagement.getUserDetailsFromKey($scope.userKey)
	.then(function(response){
		var data = response[0];
		$scope.formData.userFullName = data;
	});
	
	$scope.gi = function(){
		var sum = 0;
		$('.totalAmt').each(function(){
			var value=$(this).text();
			if(!isNaN(value) && value.length != 0) {
		        sum += parseFloat(value);
		    }
		});
		$scope.totalAmount = sum;
		//alert(sum);
	}
	
	$scope.getUserSale = function(){
		saleManagement.getSaleDataForUser($scope.userKey)
		.then(function(data){
			$scope.saleList = data;
			console.log(data);
		});
	}

	$scope.viewSaleDetails = function(sale, index){
		console.log(sale);
		console.log(index);
	}

	$scope.addtoCart = function(pid){
		//alert(pid);
		var currentStock = $('#sale_product')[0].selectedOptions[0].getAttribute('data-stock')
		var currentPid = $('#sale_product')[0].selectedOptions[0].getAttribute('data-id');
		productManagement.getSingleProduct(currentPid)
		.then(function(response){
			$scope.cartData = response[0];
			$scope.cartData.stock = currentStock;
			$scope.cart.push($scope.cartData);
		})
	}
	$scope.storeTblValues = function(){
		var TableData = new Array();
		$('#cartTable tr').each(function(row, tr){
        TableData[row]={
            "product_code" : $(tr).find('td:eq(0)').text()
            , "product_id" :$(tr).find('td:eq(1)').text()
            , "product_name" :$(tr).find('td:eq(2)').text()
            , "product_category" : $(tr).find('td:eq(3)').text()
            , "product_quantity" : $(tr).find('input').val()
            , "product_stock" : $(tr).find('td:eq(5)').text()
            , "product_mrp" : $(tr).find('td:eq(6)').text()
            , "product_tax" : $(tr).find('td:eq(7)').text()
            , "product_totprice" : $(tr).find('td:eq(8)').text()
        }    
    }); 
		 TableData.shift();  // first row will be empty - so remove
		return TableData;
	}

	$scope.addSale = function(){
		$scope.formData.sale_date = $('#sale_date').val();
		var TableData;
		TableData = $scope.storeTblValues();
		$scope.formData.cart = JSON.stringify(TableData);
		$scope.formData.totalBill = $scope.totalAmount;
		//localStorage.setItem("printSale", $scope.formData);
		
		saleManagement.createSale($scope.formData)
		.then(function(response){
			$scope.response = response;
			if($scope.response == "1-1"){
				var GET = btoa(JSON.stringify($scope.formData));
				$('#add_sale_form')[0].reset();
				window.open('http://localhost/gramin/print/print_bill_user.php?data='+GET, 'Print-Bill', 'width=500,height=400'); 
			}else{
				$.notify({
					message: 'Error in adding sale' 
				},{
					type: 'danger'
				});
				$('#add_sale_form')[0].reset();
			}
		});
		
	}

});
// //printController
// app.controller("printController",function($scope,$routeParams,$interval,userManagement,dataPassing){
// 		$scope.salesprintTitle = "Print Sale";
// 		console.log(dataPassing.getData());
// 		$scope.printData = dataPassing.getData();
// 		$scope.printData = "BumbleBee";
// });
//sellService
app.controller("sellService",function($scope,$rootScope,$location,dataPassing,serviceManagement,userManagement){
	$scope.titl = "Sell Service";
	$scope.ServiceList = "Service List";
	$scope.formData = {};
	$scope.srvData = {};
	$scope.userKey = $rootScope.key;
	var date = new Date();
	var x = Math.floor((Math.random() * 10000) + 1);
	$scope.formData.service_no = "SR-"+x;
	 

	setTimeout(function(){
	 	$('.datepicker').datepicker({
	 		autoclose: true,
	 		format: 'dd/mm/yyyy'
	 	});
	 	$('.datepicker').datepicker('setDate',date);
	 	// $('.select2').select2()
	}, 777);

	userManagement.getUserDetailsFromKey($scope.userKey)
	.then(function(response){
		var data = response[0];
		$scope.formData.userFullName = data;
		$scope.srvData.userFullName = data;
	});
	
	serviceManagement.getService()
	.then(function(data){
		$scope.services = data;
	});


	$scope.getServiceAmount = function(data){
		$scope.formData.service_cost = data.service_price;
	}

	$scope.getAmountDue = function(){
		$scope.formData.amount_due = $scope.formData.service_cost - + $scope.formData.amount_paid;
	}
	$scope.requestService = function(){
		$scope.formData.sell_date = document.getElementById('sell_date').value;
		$scope.formData.service_name = document.getElementById('service').selectedOptions[0].innerHTML;
		serviceManagement.requestService($scope.formData)
		.then(function(data){
			$scope.response = data;
			if($scope.response==1){
				var GET = btoa(JSON.stringify($scope.formData));
				window.open('http://localhost/gramin/print/print_bill_service.php?data='+GET, 'Print-Service', 'width=500,height=400'); 
				$.notify({
					message: 'Service Request Sent' 
				},{
					type: 'success'
				});
				$('#requestService')[0].reset();
				
			}else{
				$.notify({
					message: 'Service Request Failed' 
				},{
					type: 'danger'
				});
			}
		})
	}
	$scope.updaterequestService = function(){
		var _FormData = dataPassing.getData();
		_FormData.sell_date = document.getElementById('sell_date').value;
		var GET = btoa(JSON.stringify(_FormData));

		if(_FormData.status == '2'){
			if(parseInt(_FormData.prevAmount) + parseInt(_FormData.amount_paid) == _FormData.service_cost ){
				serviceManagement.updaterequestService(_FormData)
				.then(function(data){
					$scope.response = data;
					if($scope.response==1){
						window.open('http://localhost/gramin/print/print_bill_service.php?data='+GET, 'Print-Service', 'width=500,height=400'); 
						$.notify({
							message: 'Service Request Sent' 
						},{
							type: 'success'
						});
						$location.path('service_list');
						
					}else{
						$.notify({
							message: 'Service Request Failed' 
						},{
							type: 'danger'
						});
					}
				})
			}
		}else{
			window.open('http://localhost/gramin/print/print_bill_service.php?data='+GET, 'Print-Service', 'width=500,height=400'); 
		}
	}

	$scope.getIndividualServiceList = function(){
		serviceManagement.getIndividualServiceList($scope.userKey)
		.then(function(data){
			$scope.serviceList = data;
		});
	}
	$scope.showService=function(data){
		dataPassing.setData(data);
		$location.path("edService");
	}
	$scope.getServiceData = function(){
		
		var serviceData = dataPassing.getData();
		$scope.srvData.service_no = serviceData.service_no;
		$scope.srvData.status = serviceData.status;
		if($scope.srvData.status == '2'){
			$scope.srvData.prevAmount = serviceData.amount_paid;
			$scope.srvData.amount_due = 0;
			$scope.srvData.amount_paid = serviceData.amount_due;
		}else{
			$scope.srvData.amount_due = serviceData.amount_due;
			$scope.srvData.amount_paid = serviceData.amount_paid;
		}
		$scope.srvData.service_cost = serviceData.service_amount;
		$scope.srvData.customer_add = serviceData.customer_address;
		$scope.srvData.customer_contact = serviceData.customer_mobile;
		$scope.srvData.customer_name = serviceData.customer_name;
		$scope.srvData.service_name = serviceData.service_name;
		$scope.srvData.payment_mode = serviceData.payment_mode;
		$scope.srvData.service_name = serviceData.service_name;
		$scope.srvData.service = serviceData.service_name;
		$scope.srvData.rid = serviceData.id;
		
		dataPassing.setData($scope.srvData);
	}
});

//profileController
app.controller("profileController",function($scope,$rootScope,userManagement){
	$scope.titl = "Your Profile";
	$scope.formData = {};
	$scope.userkey = $rootScope.key;

	$scope.loadProfile = function(){
		userManagement.getUserProfileFromKey($scope.userkey,"profile")
		.then(function(data){
			$scope.response = data[0];
			$scope.formData.firstname = $scope.response.u_firstname;
			$scope.formData.lastname = $scope.response.u_lastname;
			$scope.formData.fathersname = $scope.response.u_firstname;
			$scope.formData.dob = $scope.response.u_dob;
			$scope.formData.mobile = $scope.response.u_mobile;
			$scope.formData.aadhar = $scope.response.u_aadhar;
			$scope.formData.pan = $scope.response.u_pan;
			$scope.formData.email = $scope.response.u_email;
			$scope.formData.district = $scope.response.u_district;
			$scope.formData.taluk = $scope.response.u_taluk;
			$scope.formData.address = $scope.response.u_address;
			$scope.formData.pincode = $scope.response.u_pincode;
			$scope.formData.account = $scope.response.b_accno;
			$scope.formData.ifsc = $scope.response.b_ifsc;
			$scope.formData.accounttype = $scope.response.b_acctype;
			$scope.formData.bank = $scope.response.b_bank;

		})
	}
});