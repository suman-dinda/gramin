app.controller('homeController',function($scope,$route,userManagement){
	$scope.title = "Dashboard";
	$scope.zone_count = 0;$scope.district_count= 0;$scope.taluk_count = 0;
	$scope.grampanchayat_count = 0;
	$scope.taskList = [];
		
	
	$scope.add_task = "";
	userManagement.getUserCount("zone_head")
	.then(function(data){
		$scope.zone_count = data;
	});
	userManagement.getUserCount("district_head")
	.then(function(data){
		$scope.district_count=data;
	});
	userManagement.getUserCount("taluk_head")
	.then(function(data){
		$scope.taluk_count = data;
	});
	userManagement.getUserCount("gram_panchayat")
	.then(function(data){
		$scope.grampanchayat_count = data;
	});

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

  // jvectormap data
  var visitorsData = {
    US: 398, // USA
    SA: 400, // Saudi Arabia
    CA: 1000, // Canada
    DE: 500, // Germany
    FR: 760, // France
    CN: 300, // China
    AU: 700, // Australia
    BR: 600, // Brazil
    IN: 800, // India
    GB: 320, // Great Britain
    RU: 3000 // Russia
  };
  // World map by jvectormap
  $('#world-map').vectorMap({
    map              : 'world_mill_en',
    backgroundColor  : 'transparent',
    regionStyle      : {
      initial: {
        fill            : '#e4e4e4',
        'fill-opacity'  : 1,
        stroke          : 'none',
        'stroke-width'  : 0,
        'stroke-opacity': 1
      }
    },
    series           : {
      regions: [
        {
          values           : visitorsData,
          scale            : ['#92c1dc', '#ebf4f9'],
          normalizeFunction: 'polynomial'
        }
      ]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != 'undefined')
        el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
    }
  });

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
	$scope.addTask = function(task){
		var obj ={};
		obj.taskName = task;
		obj.taskId = Math.floor((Math.random() * 99999) + 1);
		$scope.taskList.push(obj);
		//localStorage.setItem("tasklist",$scope.taskList);
	}


});


//create new user
app.controller('createUser',function($scope,$routeParams,userManagement){
	$scope.newUserType = $routeParams.usertype;
	$scope.formData ={};
	setTimeout(function(){
	 	$('#dob').datepicker({
	 		autoclose: true
	 	});
	 	$('.multiple_select2').select2()
	}, 777);
	
	if($scope.newUserType == "zone_head"){
		$scope.title = "Create New Zone Head";
		$scope.assignDropdownLabel = "Assign Distric Head";
		userManagement.getDropdownUsers("district_head")
		.then(function(data){
			$scope.usersList = data;
			console.log("User List",$scope.usersList);
		});
	}else if($scope.newUserType == "district_head"){
		$scope.title = "Create New District Head";
		$scope.assignDropdownLabel = "Assign Taluk Head";
		userManagement.getDropdownUsers("taluk_head")
		.then(function(data){
			$scope.usersList = data;
			console.log("User List",$scope.usersList);
		});
	}else if($scope.newUserType == "taluk_head"){
		$scope.title = "Create New Taluk Head";
		$scope.assignDropdownLabel = "Assign Gram Panchayat";
		userManagement.getDropdownUsers("gram_panchayat")
		.then(function(data){
			$scope.usersList = data;
			console.log("User List",$scope.usersList);
		});
	}else if($scope.newUserType == "gram_panchayat"){
		$scope.title = "Create New Gram Panchayat Co-Ordinator";
	}

	$scope.createNewUser = function(){
		$scope.formData.dob = $('#dob').val();
		var subordinates = $('.multiple_select2').val();
		if($scope.newUserType == "gram_panchayat"){
			$scope.formData.subordinates = "";
		}else{
			$scope.formData.subordinates = subordinates.toString();
		}
		$scope.formData.password = Math.random().toString(36).slice(-8);
		$scope.formData.usertype = $scope.newUserType;
		userManagement.create($scope.formData)
		.then(function(data){
			$scope.response = data;
			if($scope.response == 1){
				$.notify({
					message: 'New User Added' 
				},{
					type: 'success'
				});
				setTimeout(function(){
					location.reload();
				},1000);
				$('#createUserForm')[0].reset();
			}else if($scope.response == '407'){
				$.notify({
					message: 'ERROR ! E-Mail Already Exist' 
				},{
					type: 'danger'
				});
			}
			else{
				$.notify({
					message: 'ERROR ! User Couldnot Be Added' 
				},{
					type: 'danger'
				});
			}
			console.log("Form Res",$scope.response);
		});
		
	}
	
	
});

//create service
app.controller('createService',function($scope,serviceManagement){
	$scope.title = "Create Service";
	$scope.serviceData = {};

	$scope.populateDopdownValues = function(){
		serviceManagement.getServiceCategory()
		.then(function(data){
			$scope.servCat = data;
			
		})
	}
	

	$scope.createNewService = function(){
		serviceManagement.createService($scope.serviceData)
		.then(function(data){
			if(data==1){
				$.notify({
					message: 'New Service Added' 
				},{
					type: 'success'
				});
				$('#createServiceForm')[0].reset();
			}else{
				$.notify({
					message: 'Error in adding service' 
				},{
					type: 'danger'
				});
			}
		});
	}
});



//productController
app.controller("productController",function($scope,$interval,categoryManagement,productManagement){
	$scope.productTitle = "Product List";
	$scope.addProductTitle = "Add Product";
	var date = new Date().getTime();
	$scope.formData={};
	var formdata = new FormData();
	$scope.formData.prd_code = "SKU-"+date;

	categoryManagement.getAllCategory()
	.then(function(response){
		console.log(response.data);
		$scope.categories = response.data;
	});

	categoryManagement.getAllBrand()
	 .then(function(response){
	 	$scope.brands = response.data;
	 });

	 productManagement.getAllProduct()
	 .then(function(data){
	 	$scope.products = data;
	 }).then(function(){
	 	$interval(function () {
	        $('.dataTable').DataTable();
	    }, 1000);
	 });
	 setTimeout(function(){ 	
	 	$('.select2').select2({
	 		width:'100%'
	 	});
	 },777);

	 /* $scope.getTheFiles = function ($files) {
	        angular.forEach($files, function (value, key) {
	            formdata.append(key, value);
	        });
	    }*/
	 $scope.addProduct = function(){
	 	var fd = new FormData();
	 	$scope.formData.prd_category = $('#prd_category')[0].selectedOptions[0].innerHTML;
	 	
        angular.forEach($scope.uploadfiles,function(file){
            fd.append('file[]',file);
        });
	 	productManagement.createProduct(fd,$scope.formData)
	 	.then(function(data){
	 		if(data==1){
				$.notify({
					message: 'New Product Added' 
				},{
					type: 'success'
				});
				setTimeout(function(){
					location.reload();
				},2000);
				
			}else{
				$.notify({
					message: 'Error in adding product' 
				},{
					type: 'danger'
				});
			}
	 	})
	 }

	$scope.getSubCategory = function(cat){
		var parms = {};
		$scope.subCategories = "";
		parms.cat_id = cat;
		categoryManagement.getSubCategory(parms)
		.then(function(response){
			$scope.subCategories = response.data;
		})
	}
});

//categoryController
app.controller("categoryController",function($scope,$routeParams,$interval,categoryManagement,dataPassing,$log,$location){
	$scope.categoryTitle = "Category List";
	$scope.addCategoryTitle = "Add Category";
	$scope.editCategoryTitle = "Edit Category";
	$scope.formData = {};
	//$scope.routeData = $routeParams.ecsb;
	if(dataPassing.getData() != undefined ){
		$scope.routeData = JSON.parse(dataPassing.getData());
	}else if($location.path() == "/editCategory"){
		$scope.routeData = JSON.parse(sessionStorage.getItem("dataPassing"));
	}else{
		//$location.path("/category");
	}
	


	categoryManagement.getSingle($scope.routeData)
	.then(function(response){
		var category = response.data[0]; 
		$scope.formData.category_name = category.category_name;
		$scope.formData.category_desc = category.category_description;
	})

	categoryManagement.getAllCategory()
	.then(function(response){
		$scope.categories = response.data;
	}).then(function(){
	 	$interval(function () {
	        $('.dataTable').DataTable();
	    }, 1000);
	 });

	$scope.addCategory = function(){
		categoryManagement.addCategory($scope.formData)
		.then(function(response){
			$scope.res = response.data;
			if($scope.res=="1"){
				$.notify({
					message: 'New Category Added' 
				},{
					type: 'success'
				});
				$('#add_category_form')[0].reset();
			}else{
				$.notify({
					message: 'Category Couldnot Be Added' 
				},{
					type: 'danger'
				});
			}
		})
	}

	$scope.editCSB = function(id){
		var data = {};
		data.type = "category";
		data.id = id ;
		var catData = JSON.stringify(data);
		dataPassing.setData(catData);
		sessionStorage.setItem("dataPassing", catData);
		$location.path("/editCategory");
	}

	$scope.deleteCSB = function(id){
		var response = confirm("Are you sure you want to delete ?");
		var data = {};
		data.type = "category";
		data.id = id;
		if(response == true){
			categoryManagement.deleteCSB(data)
			.then(function(res){
				$scope.response = res.data;
				if($scope.response == 1){
					$.notify({
						message: 'Category Deleted' 
					},{
						type: 'success'
					});
					setTimeout(function(){
						location.reload();
					},1000);
				}else{
					$.notify({
						message: 'Category Couldnot Be Deleted' 
					},{
						type: 'danger'
					});
				}
			});
		}else{
			console.log(response);
		}
	}
});

//subcategoryController
app.controller("subcategoryController",function($scope,$interval,$location,$routeParams,dataPassing,categoryManagement){
	$scope.subcategoryTitle = "SubCategory List";
	$scope.addSubCategoryTitle = "Add SubCategory";
	$scope.editSubCategoryTitle = "Edit Category";
	$scope.formData = {};

	if(dataPassing.getData() != undefined ){
		$scope.routeData = JSON.parse(dataPassing.getData());
	}else if($location.path() == "/editSubCategory"){
		$scope.routeData = JSON.parse(sessionStorage.getItem("dataPassing"));
	}else{
		//$location.path("/subcategory");
	}

	categoryManagement.getSingle($scope.routeData)
	.then(function(response){
		var scategory = response.data[0]; 
		$scope.formData.subcategory_name = scategory.subcategory_name;
		$scope.formData.subcategory_desc = scategory.subcategory_desc;
		$scope.formData.category = scategory.category;
	})

	categoryManagement.getAllCategory()
	.then(function(response){
		console.log(response.data);
		$scope.categories = response.data;
	});

	categoryManagement.getAllSubCategory()
	.then(function(response){
		console.log(response.data);
		$scope.subcategories = response.data;
	}).then(function(){
	 	$interval(function () {
	        $('.dataTable').DataTable();
	    }, 1000);
	 });

	setTimeout(function(){
	 	$('.select2').select2({
	 		width: '100%'
	 	});
	 },777);

	$scope.addSubCategory = function(){
		$scope.formData.category_name = $('#category')[0].selectedOptions[0].innerHTML;
		categoryManagement.addSubCategory($scope.formData)
		.then(function(response){
			$scope.res=response.data;
			if($scope.res=="1"){
				$.notify({
					message: 'New SubCategory Added' 
				},{
					type: 'success'
				});
				$('#add_subcategory_form')[0].reset();
			}else{
				$.notify({
					message: 'SubCategory Couldnot Be Added' 
				},{
					type: 'danger'
				});
			}
		});
	}

	$scope.editCSB = function(id){
		var data = {};
		data.type = "subcategory";
		data.id = id ;
		var scatData = JSON.stringify(data);
		dataPassing.setData(scatData);
		sessionStorage.setItem("dataPassing", scatData);
		$location.path("/editSubCategory");
	}

	$scope.deleteCSB = function(id){
		var response = confirm("Are you sure you want to delete ?");
		var data = {};
		data.type = "subcategory";
		data.id = id;
		if(response == true){
			categoryManagement.deleteCSB(data)
			.then(function(res){
				$scope.response = res.data;
				if($scope.response == 1){
					$.notify({
						message: 'SubCategory Deleted' 
					},{
						type: 'success'
					});
					setTimeout(function(){
						location.reload();
					},1000);
					
				}else{
					$.notify({
						message: 'SubCategory Couldnot Be Deleted' 
					},{
						type: 'danger'
					});
				}
			});
		}else{
			console.log(response);
		}
	}
});

//brandController
app.controller("brandController",function($scope,$interval,$location,$routeParams,categoryManagement,dataPassing){
	$scope.addBrandTitle = "New Brand";
	$scope.brandTitle = "Brands List";
	$scope.editBrandTitle = "Edit Brand";
	 $scope.formData = {};

	 if(dataPassing.getData() != undefined ){
		$scope.routeData = JSON.parse(dataPassing.getData());
	}else if($location.path() == "/editBrand"){
		$scope.routeData = JSON.parse(sessionStorage.getItem("dataPassing"));
	}else{
		//$location.path("/brands");
	}

	categoryManagement.getSingle($scope.routeData)
	.then(function(response){
		var brand = response.data[0]; 
		$scope.formData.brand_name = brand.brand_name;
		$scope.formData.brand_desc = brand.brand_description;
	})

	 categoryManagement.getAllBrand()
	 .then(function(response){
	 	$scope.brands = response.data;
	 }).then(function(){
	 	$interval(function () {
	        $('.dataTable').DataTable();
	    }, 1000);
	 });

	$scope.addBrand = function(){
		categoryManagement.addBrand($scope.formData)
		.then(function(response){
			$scope.res = response.data;
			if($scope.res=="1"){
				$.notify({
					message: 'New Brand Added' 
				},{
					type: 'success'
				});
				$('#add_brand_form')[0].reset();
			}else{
				$.notify({
					message: 'Brand Couldnot Be Added' 
				},{
					type: 'danger'
				});
			}
		})
	}

	$scope.editCSB = function(id){
		var data = {};
		data.type = "brand";
		data.id = id ;
		var brandData = JSON.stringify(data);
		dataPassing.setData(brandData);
		sessionStorage.setItem("dataPassing", brandData);
		$location.path("/editBrand");
	}

	$scope.deleteCSB = function(id){
		var response = confirm("Are you sure you want to delete ?");
		var data = {};
		data.type = "brand";
		data.id = id;
		if(response == true){
			categoryManagement.deleteCSB(data)
			.then(function(res){
				$scope.response = res.data;
				if($scope.response == 1){
					$.notify({
						message: 'Brand Deleted' 
					},{
						type: 'success'
					});
					setTimeout(function(){
						location.reload();
					},1000);
				}else{
					$.notify({
						message: 'Brand Couldnot Be Deleted' 
					},{
						type: 'danger'
					});
				}
			});
		}else{
			console.log(response);
		}
	}
});

//transferController
app.controller("transferController",function($scope,stockManagement){
	$scope.transferTitle = "Transfer Stock";
	$scope.purchaseReqTitle = "Purchase Requested";
	$scope.af = {};
	stockManagement.getStockRequest()
	.then(function(data){
		$scope.stockReq = data;
	});
	$scope.assignStock = function(stock,index){
		$('#assineeModal').modal('show');
		$('#assineeModal').on('shown.bs.modal', function() {
	        $scope.$evalAsync(function($scope){
	        	var currentRequest = stock[index];
	        	$scope.af.product_name = currentRequest.product_name;
	        	$scope.af.stock_req = currentRequest.stock_unit;
	        	$scope.af.reqId = currentRequest.id;
	        	$scope.af.product_id = currentRequest.product_id;
	        	$scope.af.user_id = currentRequest.user_id;
	        	$scope.af.user_unique = currentRequest.user_unique;
	        });   
	    });
	}
	$('#assineeModal').submit(function(){
		console.log($scope.af);
		stockManagement.assignStock($scope.af)
		.then(function(data){
			$scope.response=data;
			if($scope.response == '1-1-1'){
				$.notify({
					message: 'Stock Transferred Successfully' 
				},{
					type: 'success'
				});
				setTimeout(function(){
					location.reload();
				},1000);
				$('#assigneeForm')[0].reset();
			}else{
				$('#assigneeForm')[0].reset();
				$('#assineeModal').modal('hide');
				$.notify({
					message: 'ERROR ! Stock could not be transfered' 
				},{
					type: 'danger'
				});
			}
			console.log("Form Res",$scope.response);
		});
		})

	});
//transferController
app.controller("viewUser",function($scope,$routeParams,$interval,userManagement){

	$scope.title = "View User";
	$scope.route = $routeParams;
	$scope.usertype = $scope.route.usertype;
	userManagement.getSingleUserType($scope.route)
	.then(function(data){
		$scope.userData = data;
		$interval(function () {
	        $('.dataTable').DataTable();
	    }, 1000);
	});

});


//salesController

app.controller("salesController",function($scope,$filter,dataPassing,productManagement,saleManagement){
	$scope.salesTitle = "Sales List";
	$scope.addSaleTitle = "Add Sale";
	$scope.cart = [];
	$scope.formData = {};
	$scope.totalcost = 0;
	$scope.pquantity = 0
	

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
	productManagement.getAllProduct()
	.then(function(response){
		$scope.products = response;
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
	$scope.addtoCart = function(pid){
		//alert(pid);
		productManagement.getSingleProduct(pid)
		.then(function(response){
			$scope.cartData = response[0];
			$scope.cart.push($scope.cartData);
		})
	}
	$scope.storeTblValues = function(){
		var TableData = new Array();
		$('#cartTable tr').each(function(row, tr){
        TableData[row]={
            "product_code" : $(tr).find('td:eq(0)').text()
            , "product_name" :$(tr).find('td:eq(1)').text()
            , "product_category" : $(tr).find('td:eq(2)').text()
            , "product_subcategory" : $(tr).find('td:eq(3)').text()
            , "product_quantity" : $(tr).find('input').val()
            , "product_mrp" : $(tr).find('td:eq(5)').text()
            , "product_tax" : $(tr).find('td:eq(6)').text()
            , "product_totprice" : $(tr).find('td:eq(7)').text()
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
		localStorage.setItem("printSale", $scope.formData);
		
		// saleManagement.createSale($scope.formData)
		// .then(function(response){
		// 	$scope.response = response;
		// 	console.log(response);
		// })
		dataPassing.setData($scope.formData);
		 window.open('http://localhost/gramin/print/print_bill.php', 'Print-Bill', 'width=500,height=400');
		 
	}

	// $scope.calulateSum = function(){
	// 	var sum = 0;
	// 	$('.totalAmt').each(function(){
	// 		var value=$(this).text();
	// 		if(!isNaN(value) && value.length != 0) {
	// 	        sum += parseFloat(value);
	// 	    }
	// 	});
	// 	console.log(sum);
	// }
});

//printController
app.controller("printController",function($scope,$routeParams,$interval,userManagement,dataPassing){
		$scope.salesprintTitle = "Print Sale";
		console.log(dataPassing.getData());
		$scope.printData = "BumbleBee";
});



/*
	Custom Validation
*/

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}