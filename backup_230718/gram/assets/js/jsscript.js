$('#login-form').submit(function(e){
	e.preventDefault();
	var loginData = new FormData($('#login-form')[0]);

	$.ajax({
	    url: '../api/login.php',
	    data: loginData,
	    contentType: false,
	    processData: false,
	    type: 'POST',
	    success: function(data){
	    	if(data == "Login Successful"){
	    		$.notify({
					message: 'Login Successful. Redirecting...' 
				},{
					type: 'success'
				});
				setTimeout(function(){ location.href="../dashboard"; }, 2000);
	    	}else{
	    		$.notify({
					message: 'Login Failed' 
				},{
					type: 'danger'
				});
	    	}
	        
	    },
	    error: function(error){
	    	alert("Error"+error);
	    }
	});
});

$('#ulogin-form').submit(function(e){
	e.preventDefault();
	var loginData = new FormData($('#ulogin-form')[0]);

	$.ajax({
	    url: '../api/user/ulogin.php',
	    data: loginData,
	    contentType: false,
	    processData: false,
	    type: 'POST',
	    success: function(data){
	    	if(data == "Login Successful"){
	    		$.notify({
					message: 'Login Successful. Redirecting...' 
				},{
					type: 'success'
				});
				setTimeout(function(){ location.href="../user-dashboard"; }, 2000);
	    	}else{
	    		$.notify({
					message: 'Login Failed' 
				},{
					type: 'danger'
				});
	    	}
	        
	    },
	    error: function(error){
	    	alert("Error"+error);
	    }
	});
});