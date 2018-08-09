var app = angular.module("gramin", ["ngRoute"]);


let logout = () =>{
	$.ajax({
	    url: '../api/logout/logout.php',
	    contentType: false,
	    processData: false,
	    type: 'POST',
	    success: function(data){
	    	if(data == "1"){
	    		$.notify({
					message: 'Logged Out Successful. Redirecting Please Wait' 
				},{
					type: 'success'
				});
				setTimeout(function(){
				 	if(window.location.hostname == "localhost")
	        			location.href= window.location.protocol+"//"+window.location.hostname+"/gramin/admin/";
	        		else
	        			location.href= window.location.protocol+"//"+window.location.hostname+"/admin/";
				}, 2000);
	    	}else{
	    		$.notify({
					message: 'Logout Failed' 
				},{
					type: 'danger'
				});
	    	}
	        
	    },
	    error: function(error){
	    	alert("Error"+error);
	    }
	});
}
