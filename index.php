<?php
//require_once 'config/dbconnection.php';
//db_open();
if(!isset($_SESSION))
{
 session_start();		
}
 //print_r($_SESSION);
 require_once 'phpInclude/header.php';
?>
<script>
  $(function() {
    $( "#date_of_birth" ).datepicker();
  });
  </script>

<div class="modal fade" id="howitwork_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"><!-- // HOW IT WORK MODAL // -->
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="images/close_icon.png" alt="close" /></span></button>
        <h4 class="modal-title" id="myModalLabel">How It Works</h4>
      </div>
      <div class="modal-body">
        <div class="row HowitRow">
        	<div class="col-sm-4 text-center">
            	<img src="images/icon_campas.png" class="responsiveimg" alt="search" />
                <h5>Make a search</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in dolor ac purus lacinia cursus.Etiam eu ultrices </p>
            </div>
            <div class="col-sm-4 text-center">
            	<img src="images/icon_calender.png" class="responsiveimg" alt="search" />
                <h5>Book place you love</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in dolor ac purus lacinia cursus.Etiam eu ultrices </p>
            </div>
            <div class="col-sm-4 text-center">
            	<img src="images/icon_heart.png" class="responsiveimg" alt="search" />
                <h5>Travel around the world</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in dolor ac purus lacinia cursus.Etiam eu ultrices </p>
            </div>
            <div class="col-sm-12"><p class="learnabt"><a href="javascript:void(0);">Learn more</a> about DoNow</p></div>
        </div>
      </div>
    </div>
  </div>
</div><!-- // HOW IT WORK MODAL // -->

<section class="Herobanner"><!-- // HERO SECTION // -->
	<a href="javascript:void(0);" class="visible-xs donow_moblogo"><img src="images/donow.png" alt="donow" class="img-responsive" /></a>
	<div class="container">
    	<div class="row">
        	<div class="col-xs-12 hidden-xs">
            	<header>
                	<a href="javascript:void(0);" class="logo"><img src="images/logo1.png" alt="DoNow" class="img-responsive" /></a>
                    <ul class="leftnav" id="menu">
                    	<li><a href="javascript:void(0);" data-toggle="modal" data-target="#accountpopup" class="loginlink"><i class="fa fa-key"></i> Login</a></li>
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#accountpopup" class="signuplink"><i class="fa fa-lock"></i> Signup</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-search"></i> Make your search</a></li>
                    </ul>
                </header>
            </div>
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 herotext text-center">
            	<h2>Explore the world with one click</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut lc.</p>
                <a href="javascript:void(0);" class="herobtn" data-toggle="modal" data-target="#howitwork_modal">How it work</a>
            </div>
        </div>
    </div>
    <div class="HeroTabs">
    	<section class="HomeSearch"><!-- // HOME SEARCH // -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <h3>Search Rental places and room near form you</h3>
                        <form class="searchfrom1" method="get" action="search.php">
                            <div class="row">
                                <div class="col-sm-9 col-xss-8 col-xs-12 pad7">
                                    <div class="form-group">
                                        <input type="text" placeholder="Place, City or zip code" class="form-control" id="tags" name="location"/>
                                        <span class="ip_icons"><img src="images/mapmarker_icon.png" alt="mapmarker" /></span>
                                    </div>
                                </div>
                               <!--  <div class="col-md-7 col-xs-12 pad7">
                                    <div class="row">
                                        <!-- <div class="col-md-3 col-xs-4 pad7">
                                            <div class="form-group">
                                                <input type="text" placeholder="Date" class="form-control" id="datepicker"/>
                                                <span class="ip_icons"><img src="images/calender_icon.png" alt="mapmarker" name="date"/></span>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-3 col-xs-4 pad7">
                                            <div class="form-group">
                                                <select class="form-control custom-select" name="time">
                                                    <option>Time</option>
                                                    <option>12:00 am</option>
                                                    <option>01:00 am</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-3 col-xs-4 pad7">
                                            <div class="form-group">
                                                <select class="form-control custom-select" name="distance">
                                                    <option>Distance</option>
                                                    <option>500 m</option>
                                                    <option>1 km</option>
                                                    <option>2 km</option>
                                                    <option>3 km</option>
                                                    <option>+5 km</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="col-sm-3 col-xss-4 col-xs-12 pad7">
                                            <div class="form-group">
                                                <input type="submit" value="Search" class="searchbtn" />
                                            </div>
                                        </div>
                                    <!-- </div>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section><!-- // HERO SECTION // -->

<!-- // HOME SEARCH // -->

<section class="PlacesCont"><!-- // AMEZING PLACES SECTION // -->
	<div class="container">
    	<div class="row">
        	<div class="col-xs-12 heading text-center">
            	<h2>Discover Amazing Places</h2>
                <h5>DoNow is the best way to find great places, hotels and activities.</h5>
            </div>
        </div>
        
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-6"><!-- // LEFT COLUMNS // -->
            	<div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <a href="javascript:void(0);" class="largecont feturedplaces">
                            <img src="images/places/sanfrancisco.jpg" alt="sanfrancisco" class="img-responsive" />
                            <div class="placeinfo">
                                <h6>San Francisco</h6>
                                <p>Nullam posuere, enim vel placerat auctor, est elit condimentum metus, at placerat erat lorem vitae velit. Nunc ut est maximus, faucibus ex ut, vulputate libero. Pellentesque euismod sapien et leo accumsan, in rhoncus elit semper.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <a href="javascript:void(0);" class="smallcont feturedplaces">
                            <img src="images/places/sanfrancisco.jpg" alt="sanfrancisco" class="img-responsive" />
                            <div class="placeinfo">
                                <h6>San Francisco</h6>
                                <p>Nullam posuere, enim vel placerat auctor, est elit condimentum metus, at placerat erat lorem vitae velit. Nunc ut est maximus, faucibus ex ut, vulputate libero.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <a href="javascript:void(0);" class="smallcont feturedplaces">
                            <img src="images/places/sanfrancisco.jpg" alt="sanfrancisco" class="img-responsive" />
                            <div class="placeinfo">
                                <h6>San Francisco</h6>
                                <p>Nullam posuere, enim vel placerat auctor, est elit condimentum metus, at placerat erat lorem vitae velit. Nunc ut est maximus, faucibus ex ut, vulputate libero.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <a href="javascript:void(0);" class="smallcont feturedplaces">
                            <img src="images/places/sanfrancisco.jpg" alt="sanfrancisco" class="img-responsive" />
                            <div class="placeinfo">
                                <h6>San Francisco</h6>
                                <p>Nullam posuere, enim vel placerat auctor, est elit condimentum metus, at placerat erat lorem vitae velit. Nunc ut est maximus, faucibus ex ut, vulputate libero.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 hidden-xs hidden-sm">
                        <a href="javascript:void(0);" class="smallcont feturedplaces">
                            <img src="images/places/sanfrancisco.jpg" alt="sanfrancisco" class="img-responsive" />
                            <div class="placeinfo">
                                <h6>San Francisco</h6>
                                <p>Nullam posuere, enim vel placerat auctor, est elit condimentum metus, at placerat erat lorem vitae velit. Nunc ut est maximus, faucibus ex ut, vulputate libero.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div><!-- // LEFT COLUMNS // -->
            
            <div class="col-xs-12 col-sm-12 col-md-6"><!-- // RIGHT COLUMNS // -->
            	<div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <a href="javascript:void(0);" class="smallcont feturedplaces">
                            <img src="images/places/sanfrancisco.jpg" alt="sanfrancisco" class="img-responsive" />
                            <div class="placeinfo">
                                <h6>San Francisco</h6>
                                <p>Nullam posuere, enim vel placerat auctor, est elit condimentum metus, at placerat erat lorem vitae velit. Nunc ut est maximus, faucibus ex ut, vulputate libero.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <a href="javascript:void(0);" class="smallcont feturedplaces">
                            <img src="images/places/sanfrancisco.jpg" alt="sanfrancisco" class="img-responsive" />
                            <div class="placeinfo">
                                <h6>San Francisco</h6>
                                <p>Nullam posuere, enim vel placerat auctor, est elit condimentum metus, at placerat erat lorem vitae velit. Nunc ut est maximus, faucibus ex ut, vulputate libero.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <a href="javascript:void(0);" class="smallcont feturedplaces">
                            <img src="images/places/sanfrancisco.jpg" alt="sanfrancisco" class="img-responsive" />
                            <div class="placeinfo">
                                <h6>San Francisco</h6>
                                <p>Nullam posuere, enim vel placerat auctor, est elit condimentum metus, at placerat erat lorem vitae velit. Nunc ut est maximus, faucibus ex ut, vulputate libero.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 hidden-xs hidden-sm">
                        <a href="javascript:void(0);" class="smallcont feturedplaces">
                            <img src="images/places/sanfrancisco.jpg" alt="sanfrancisco" class="img-responsive" />
                            <div class="placeinfo">
                                <h6>San Francisco</h6>
                                <p>Nullam posuere, enim vel placerat auctor, est elit condimentum metus, at placerat erat lorem vitae velit. Nunc ut est maximus, faucibus ex ut, vulputate libero.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <a href="javascript:void(0);" class="largecont feturedplaces">
                            <img src="images/places/sanfrancisco.jpg" alt="sanfrancisco" class="img-responsive" />
                            <div class="placeinfo">
                                <h6>San Francisco</h6>
                                <p>Nullam posuere, enim vel placerat auctor, est elit condimentum metus, at placerat erat lorem vitae velit. Nunc ut est maximus, faucibus ex ut, vulputate libero. Pellentesque euismod sapien et leo accumsan, in rhoncus elit semper.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div><!-- // RIGHT COLUMNS // -->
        </div>
    </div>
</section><!-- // AMEZING PLACES SECTION // -->

<section class="WhyUsSection"><!-- // WHY CHOOSE US SECTION // -->
	<div class="container">
    	<div class="row">
        	<div class="col-xs-12">
            	<h3>Why Choose Us</h3>
            </div>
            <div class="col-xs-12 col-md-10 col-md-offset-1">
            	<div class="row">
                	<div class="col-sm-4 whyussteps text-center">
                    	<span class="roundicon"><i class="fa fa-dollar"></i></span>
                        <h5>Best Price Guarantee</h5>
                        <p>Eu lectus non vivamus ornare lacinia elementum faucibus natoque ullamcorper placerat</p>
                    </div>
                    <div class="col-sm-4 whyussteps text-center">
                    	<span class="roundicon"><i class="fa fa-lock"></i></span>
                        <h5>Trust & Safety</h5>
                        <p>Eu lectus non vivamus ornare lacinia elementum faucibus natoque ullamcorper placerat</p>
                    </div>
                    <div class="col-sm-4 whyussteps text-center">
                    	<span class="roundicon"><i class="fa fa-thumbs-up"></i></span>
                        <h5>Best Travel Agent</h5>
                        <p>Eu lectus non vivamus ornare lacinia elementum faucibus natoque ullamcorper placerat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- // WHY CHOOSE US SECTION // -->

<footer><!-- // FOOTER // -->
	<div class="container">
    	<div class="row">
        	<div class="col-md-2 col-sm-3 col-xs-12">
            	<a href="javascript:void(0);" class="ft_quicklinks visible-xs">Quick Links <i class="fa fa-plus-circle"></i></a>
            	<ul class="quicklinks">
                	<li><a href="javascript:void(0);"><i class="fa fa-caret-right"></i> Home</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-caret-right"></i> List you search</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-caret-right"></i> Sign in</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-caret-right"></i> Sign up</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-caret-right"></i> About</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-caret-right"></i> Terms & condition</a></li>
                </ul>
            </div>
            <div class="col-md-4 ft_about hidden-xs hidden-sm">
            	<img src="images/logo1.png" alt="DoNow" class="img-responsive" />
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse suscipit elit vitae commodo vulputate. Vivamus nec vehicula leo, vitae sagittis massa. Praesent neque erat, fermentum ut elit sit amet, elementum iaculis elit.</p>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 ft_contact">
            	<p><i class="fa fa-envelope"></i> company@website.com</p>
                <p><i class="fa fa-phone"></i> (00)1800123467</p>
                <p><i class="fa fa-building-o"></i> <b>DoNow</b><br/> Street Name, Unknown Place<br/>Scret Street, Country, CT99 9899</p>
            </div>
            <div class="col-md-3 col-sm-5 col-xs-12 ft_social">
            	<img src="images/ft_map.jpg" alt="map" class="responsiveimg hidden-xs" />
                <ul>
                	<li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyrightcont">
    	<div class="container">
        	<div class="row">
            	<div class="col-xs-12">
                	<p><i class="fa fa-copyright"></i> DoNow Copyright 2015. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- // FOOTER // -->


<div class="modal fade AccountModal" id="accountpopup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"><!-- // LOGIN & SIGNUP MODAL // -->
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<a href="javascript:void(0);" class="clickme"><i class="fa fa-times fa-pencil"></i>
        	<span class="tooltip">Click Me</span>
        </a>
      </div>
      <div class="modal-body">
      	<div class="formOtr">
      	<div id="errors"></div>
        	<div id="loginform" style="display:block;">
                <form id="login">
                    <h5>Sign in to continue your account</h5>
                    <img src="images/user_img.jpg" alt="login" class="responsiveimg usrimg" />
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter you email here" name="email" id="email"/>
                        <i class="fa fa-user icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter password" name="password"/>
                        <i class="fa fa-key icons"></i>
                        
                        <a href="javascript:void(0);" class="forgot_pass">Forgot your password?</a>
                    </div>
                    <div class="form-group">
                        <div class="switch">
                            <input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-round" type="checkbox">
                            <label for="cmn-toggle-1"><i class="fa fa-times"></i><i class="fa fa-check"></i></label>
                            <span class="rembrme">Remenber me!</span>
                        </div>
                        <input type="hidden" name="action" value="login"/>
                        <input type="submit" value="Sign in" class="signin_btn" />
                    </div>
                    <span class="or_seprator"><span>OR</span></span>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="socialbtn fbbtn" onclick="Login()"><i class="fa fa-facebook"></i> Login with facebook</a>
                    </div>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="socialbtn gplusbtn"><i class="fa fa-google-plus"></i> Login with google+</a>
                    </div>
                    <p class="content-text-outr">Not a registered user yet?  &nbsp;&nbsp;<a href="javascript:void(0);"> Sign up now!</a></p>
                </form>
            </div>
            <div id="signupform" style="display:none;">
                <form id="register">
                    <h5>Creat an account</h5>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name" name="full_name"/>
                        <i class="fa fa-user icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email Address" name="email_address" id="email_address"/>
                        <i class="fa fa-envelope-o icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password"/>
                        <i class="fa fa-lock icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_pass"/>
                        <i class="fa fa-lock icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Date of Birth(dd/mm/yy)" name="date_birth" id="date_of_birth"/>
                        <i class="fa fa-birthday-cake icons"></i>
                    </div>
                    <div class="form-group">
                    <input type="hidden" name="action" value="register"/>
                        <input type="submit" value="Register Now!" class="signin_btn registerbtn" id="save"/>
                    </div>
                    <span class="or_seprator"><span>OR</span></span>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="socialbtn fbbtn"><i class="fa fa-facebook"></i> Signup with facebook</a>
                    </div>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="socialbtn gplusbtn"><i class="fa fa-google-plus"></i> Signup with google+</a>
                    </div>
                    <p class="content-text-outr">Already have an account?  &nbsp;&nbsp;<a href="javascript:void(0);"> Login now!</a></p>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- // LOGIN & SIGNUP MODAL // -->


<!-- ////// JQUERY ////// -->
<script src="<?php echo $root;?>js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $root;?>js/jquery.slicknav.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".custom-select").each(function(){
		$(this).wrap("<span class='select-wrapper'></span>");
		$(this).after("<span class='holder'></span>");
	});
	$(".custom-select").change(function(){
		var selectedOption = $(this).find(":selected").text();
		$(this).next(".holder").text(selectedOption);
	}).trigger('change');

	// LOGIN & SIGNUP FORM //
	$('.clickme').click(function(){
	   $(this).children('i').toggleClass('fa-pencil');
	   $('#loginform').animate({height: "toggle", opacity: "toggle"}, "slow");
	   $('#signupform').animate({height: "toggle", opacity: "toggle"}, "slow");
	});

	$('.loginlink').click(function(){
		$('#loginform').css('display','block');
		$('#signupform').css('display','none');
	});
	$('.signuplink').click(function(){
		$('#loginform').css('display','none');
		$('#signupform').css('display','block');
	});
});

// FOOTER QUICK LINKS ON MOBILE //
$('.ft_quicklinks').click(function(){
	$(this).addClass('active');
	$(this).next().slideToggle();
});

// SLIK NAV //
$(function(){
	$('#menu').slicknav();
});



// MOBILE LOGO APPEND //
$(document).ready(function(e) {
    $('.donow_moblogo').appendTo('.slicknav_menu');
});
</script>
<!-- ////// JQUERY ////// -->
</body>
</html>
