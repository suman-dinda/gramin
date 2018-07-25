app.controller('dashboardController', function($scope,dataPassing){
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
	setTimeout(function(){
		$('#sidebar > li > a').each(function(i,v){
			var temp = $(this).attr('href');
			$(this).removeAttr('href');
			$(this).attr('data-target',temp);
		});
	},1000)
	
});


app.controller("viewSubordinates", function($scope,$location,dataPassing,userManagement){
	$scope.title = "View Your SubOrdinates";
	$scope.userType = dataPassing.getCookie('user_type');
	console.log($scope.userType);
	if($scope.userType == 'gram_panchayat'){
		$location.path('/user-dashboard');
	}else{
		$scope.key = dataPassing.getCookie('userkey');
		userManagement.getSubordinates($scope.key)
		.then(function(response){
			$scope.userData = response;
		});

	}


});

app.controller('requestProduct', function($scope,productManagement,stockManagement,dataPassing){
	$scope.title = "Request Product";
	$scope.formData = {};
	productManagement.getAllProduct()
	 .then(function(data){
	 	$scope.products = data;
	 });
	 setTimeout(function(){ 	
	 	$('.select2').select2({
	 		width:'100%'
	 	});
	 },777);
	 $scope.requestProduct = function(){
	 	$scope.formData.prd_name = $('#product_name')[0].selectedOptions[0].innerHTML;
	 	$scope.formData.prd_id = $('#product_name').val();
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