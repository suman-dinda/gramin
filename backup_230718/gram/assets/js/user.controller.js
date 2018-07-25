app.controller('dashboardController', function($scope){
	$scope.title = "User Dashboard";
	$scope.userType = getCookie('user_type');
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

	function getCookie(cname) {
	    var name = cname + "=";
	    var decodedCookie = decodeURIComponent(document.cookie);
	    var ca = decodedCookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0) == ' ') {
	            c = c.substring(1);
	        }
	        if (c.indexOf(name) == 0) {
	            return c.substring(name.length, c.length);
	        }
	    }
	    return "";
	}
});