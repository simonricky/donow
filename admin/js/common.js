//////admin login code for validation and ajax form submit/////////////////
$(document).ready(function(){
	$.validator.setDefaults({ 
	    ignore: [],
	    // any other default options and/or rules
	});
	
///////// create account////////////
	$("#submit_buiseness").validate({
	
	    rules: {
	    	title: "required",
	    	short_description: {
			      required: true
			    },
			    location : "required",
			    price : "required",
			    select_level : "required",
				image : "required",
			    long_description : "required",
			    state : "required",
			    city : "required",
			    time_start: "required",
			    end_time :"required"
	    },
	    messages: {
	    	title: "Please enter heading",
	    	short_description: {
			      required: "Please enter short description"
			    },
			    location :"Please enter address",
			    price : "Please enter price",
			    select_level : "Please select activity level",
				image : "Please select ad image",
			    long_description : "Please enter long description",
			    state : "Please select state",
			    city : "Please enter city",
			    time_start: "Select start time",
			    end_time :"Select end time"
		   },
	    submitHandler: function(form) {
	    	var pgno = $('#page_no').val();//alert(pgno);
	    	var formData = new FormData($('#submit_buiseness')[0]);
			$.ajax({
				type: "POST",
				url: "handler.php",
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
					
					if($.trim(data)=="success")
					{
						$('#errors').html('<span style="color:green;">You have been logged in successfully.</span>');
						$('#submit_buiseness')[0].reset();
						setTimeout(function() {
						  // Do something after 5 seconds
							if($.trim(pgno)!="not_defined" ){
								window.location.href = 'manage_ads.php?pgno='+pgno;
							}else {
							window.location.href = 'manage_ads.php';
							}
					}, 2000);
					}else {
					$('#errors').html('<span style="color:red;">Some error occur ,please try again later.</span>');
					}
				}
					
				}); 
	    }
	});

	/**delete ad**/
    $("body").on("click", ".delete_ad", function() {
        var my = $(this);
        var alt = $(this).attr('data-id');
        var dataString = "addId=" + alt + "&action=delete_ad";
        var res = confirm("Are you sure you want to delete this add ?");
        if (res)
        {
            $.ajax({
                data: dataString,
                url: adminRoot+"handler.php",
                type: "POST",
                success: function(result) {
                  if($.trim(result)=="success")
                	 {
                	  	$("#msgs").show();
                	  	$("#msgs").html('');
	                    $("#msgs").html('<span style="color:green;">Add successfully deleted.</span>');
	                    jQuery('html,body').animate({scrollTop: 0}, 0);
	                    setTimeout(function() {
	                        window.location.reload();
	                    }, 3000);
                	 }
                }
            });
        }
    });

/**delete ad**/
$("body").on("click", ".delete_bus", function() {
    var my = $(this);
    var alt = $(this).attr('data-id');
    var dataString = "addId=" + alt + "&action=delete_bus";
    var res = confirm("Are you sure you want to delete this business ?");
    if (res)
    {
        $.ajax({
            data: dataString,
            url: adminRoot+"handler.php",
            type: "POST",
            success: function(result) {
              if($.trim(result)=="success")
            	 {
            	  	$("#msgs").show();
            	  	$("#msgs").html('');
                    $("#msgs").html('<span style="color:green;">Business successfully deleted.</span>');
                    jQuery('html,body').animate({scrollTop: 0}, 0);
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);
            	 }
            }
        });
    }
});
});
//////admin login code for validation and ajax form submit/////////////////
    $(document).ready(function(){
    	
    	/*admin login*/
    	/////////////// Add REP Form ///////////////////
    	$("#admin_login").validate({
    	    rules: {
    	    	
    		    password: "required",
    		   
    		    email: {
    	 		  required: true,
    	            email: true  
    	 	   }
    	    },
    	    messages: {
    	    	
            password:  "Please enter Password",
           
           email:  {
    		   required: "Please enter   Email",
                email: "Please enter valid  Email"  
    	   }
    	    },
    	    submitHandler: function(form) {

    	    	var dataString = $('#admin_login').serialize();
    			$.ajax({
    				type: "POST",
    				url: "handler.php",
    				data: dataString,
    				beforeSend: function(){
    				$('#showLoder').show();	
    			    },
    				success: function(data){
    				$('#showLoder').hide();	
    					if($.trim(data)=="success")
    						{
    						
    						$('#admin_login')[0].reset();
    						$('#error').removeClass("error_msg_main").addClass("success_msg_main").show();
    						$('#error').html('<span style="color:white;">you have been login successfully.</span>').show();
    						setTimeout(function() {
    						   window.location.href="users.php";
    						}, 3000);
    						} 
    						else 
    						{
    							$('#error').removeClass("success_msg_main").addClass("error_msg_main").show();
    							$('#error').html('<span style="color:white;">Email /Password not recognised .</span>').show();
    						}
    					
    					}
    				}); 
    	    
    	    }
    	});
    	/**delete user**/
        $("body").on("click", ".delete_user", function() {
            var my = $(this);
            var alt = $(this).attr('data-id');
            var dataString = "userId=" + alt + "&del_action=delete_user";
            var res = confirm("Are you sure you want to delete this User?");
            if (res)
            {
                $.ajax({
                    data: dataString,
                    url: "handler.php",
                    type: "POST",
                    success: function(result) {
                      if($.trim(result)=="success")
                    	 {
                    	  	$("#msgs").show();
                    	  	$("#msgs").html('');
    	                    $("#msgs").html('<span style="color:green;">User successfully deleted.</span>');
    	                    jQuery('html,body').animate({scrollTop: 0}, 0);
    	                    setTimeout(function() {
    	                        window.location.reload();
    	                    }, 3000);
                    	 }
                    }
                });
            }
        });
	});