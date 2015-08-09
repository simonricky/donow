
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '230186673805927', // Set YOUR APP ID
      channelUrl : 'http://hayageek.com/examples/oauth/facebook/oauth-javascript/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
 
    FB.Event.subscribe('auth.authResponseChange', function(response) 
    {
     if (response.status === 'connected') 
    {
        document.getElementById("message").innerHTML +=  "<br>Connected to Facebook";
        //SUCCESS
 
    }    
    else if (response.status === 'not_authorized') 
    {
        document.getElementById("message").innerHTML +=  "<br>Failed to Connect";
 
        //FAILED
    } else 
    {
        document.getElementById("message").innerHTML +=  "<br>Logged Out";
 
        //UNKNOWN ERROR
    }
    }); 
 
    };
 
    function Login()
    {
 
        FB.login(function(response) {
           if (response.authResponse) 
           {
                getUserInfo();
            } else 
            {
             console.log('User cancelled login or did not fully authorize.');
            }
         },{scope: 'email,user_photos,user_videos,publish_stream,user_likes,user_birthday'});
 
    }
 
  function getUserInfo() {
        FB.api('/me', function(response) {
 
		  var fbResponse=JSON.stringify (response);
    var form="response="+fbResponse+"&action=fblogin";
			$.ajax({
					type: "POST",
					url: "handler.php",
					data: form,
					cache: false,
					//contentType: false,
					//processData: false,
					success:  function(data){
						window.location.href = 'profile.php'; 
					}
				});
    });
    }
  
    function Logout()
    {
        FB.logout(function(){document.location.reload();});
    }
 
  // Load the SDK asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
 
