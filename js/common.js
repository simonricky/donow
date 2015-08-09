//////admin login code for validation and ajax form submit/////////////////
$(document).ready(function(){
	$.validator.setDefaults({ 
	    ignore: [],
	    // any other default options and/or rules
	});
	
///////// create account////////////
	$("#register").validate({
	
	    rules: {
	    	
	    	full_name : "required",
	    	email_address : {
	    	      required: true,
	    	      email: true
	    	    },
	    	password : "required",
	    	confirm_pass: {
	    	      equalTo: "#password"
	    	    },
				date_birth : {
					
					required :"required"
				}
	    },
	    messages: {
	    	
	    	full_name :"Please enter full name",
	    	email_address :  {
	    	      required: "Please enter email address",
	    	      email: "Please enter valid email address"
	    	    },
	    	password : "Please enter password",
	    	confirm_pass: {
	    	      equalTo: "Password must be same"
	    	    } ,
				date_birth :{
					
					required : "Please enter date of birth"
				}
			   
		   },
	    submitHandler: function(form) {
	    	var email = $('#email_address').val();
	    	var dataString = $('#register').serialize();
			$.ajax({
				type: "POST",
				url: root+"handler.php",
				data: dataString,
				beforeSend: function(){
				$('#showLoder').show();	
			    },
				success: function(data){
					$('#showLoder').hide();	
					if($.trim(data)=="exists")
					{
						$('#errors').html('<span style="color:red;">Email address already exists,please try login.</span>');
						$('#loginform').css('display','block');
						$('#signupform').css('display','none');
						$('#email').val($.trim(email));
					}else 
					if($.trim(data)=="success")
					{
						$('#errors').html('<span style="color:green;">Successfully registered with us. Please login to continue.</span>');
					}else {
					$('#errors').html('<span style="color:red;">Some error occur ,please try again later.</span>');
					}
				}
					
				}); 
	    }
	});
	
///////// login user////////////
	$("#login").validate({
	
	    rules: {
	    	
	    	
			    email : "required",
			    password : "required"
	    },
	    messages: {
	    	
	    	
			    email :"Please enter email or username",
			    
			    password : "Please enter password"
		   },
	    submitHandler: function(form) {
	    	var dataString = $('#login').serialize();
			$.ajax({
				type: "POST",
				url: root+"handler.php",
				data: dataString,
				beforeSend: function(){
				$('#showLoder').show();	
			    },
				success: function(data){
					$('#showLoder').hide();	
					if($.trim(data)=="not_found")
					{
						$('#errors').html('<span style="color:red;">Invalid credential,please check you email or password.</span>');
					}else 
					if($.trim(data)=="success")
					{
						$('#errors').html('<span style="color:green;">You have been logged in successfully.</span>');
						setTimeout(function() {
						  // Do something after 5 seconds
							window.location.href = 'user_profile.php';
					}, 2000);
					}else {
					$('#errors').html('<span style="color:red;">Some error occur ,please try again later.</span>');
					}
				}
					
				}); 
	    }
	});

///////// change password////////////
$("#password_info").validate({

    rules: {
    	
    	
    	current_pass : "required",
		    new_pass : "required",
		    new_pass_again: {
	    	      equalTo: "#new_pass"
	    	    }
    },
    messages: {
    	
    	
    	current_pass :"Please enter current password",
		    
    	new_pass : "Please enter new password",
    	new_pass_again: {
  	      equalTo: "Password must be same to the new password"
  	    }
	   },
    submitHandler: function(form) {
    	var dataString = $('#password_info').serialize();
		$.ajax({
			type: "POST",
			url: root+"handler.php",
			data: dataString,
			beforeSend: function(){
			$('#showLoder').show();	
		    },
			success: function(data){
				$('#showLoder').hide();	
				if($.trim(data)=="wrong_pass")
				{
					$('#errors').html('<span style="color:red;">Current password is wrong ,please check again.</span>');
				}else 
				if($.trim(data)=="success")
				{
					$('#errors').html('<span style="color:green;">Password changed successfully.</span>');
					setTimeout(function() {
					  // Do something after 5 seconds
						window.location.href = 'user_profile.php';
				}, 2000);
				}else {
				$('#errors').html('<span style="color:red;">Some error occur ,please try again later.</span>');
				}
			}
				
			}); 
    }
});
///////// update profile////////////
$("#pro_update").click(function(){
    	//var dataString = $('#personal_info').serialize();
    	var formData = new FormData($('#personal_info')[0]);
    	//alert(formData);
		$.ajax({
			type: "POST",
			url: root+"handler.php",
			data: formData,
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			mimeType:"multipart/form-data",
			beforeSend: function(){
			$('#showLoder').show();	
		    },
			success: function(data){
				$('#showLoder').hide();	
				if($.trim(data)=="wrong_pass")
				{
					$('#errors').html('<span style="color:red;">Current password is wrong ,please check again.</span>');
				}else 
				if($.trim(data)=="success")
				{
					$('#errors').html('<span style="color:green;">Info changed successfully.</span>');
					setTimeout(function() {
					  // Do something after 5 seconds
						window.location.href = 'user_profile.php';
				}, 2000);
				}else {
				$('#errors').html('<span style="color:red;">Some error occur ,please try again later.</span>');
				}
			}
				
			}); 
    
});
});