<?php
//require_once 'config/dbconnection.php';
//db_open();
if(!isset($_SESSION))
{
 session_start();		
}
/* if (!isset($_SESSION['db_session_id']) && $_SESSION['db_session_id']=="")
{
	header("Location:index.php#login");
} */
 if (isset($_GET['search_query']) && $_GET['search_query']!="")
 {
 	$search=trim($_GET['search_query']);
 }
require_once 'phpInclude/header.php';
require_once 'phpInclude/functions.php';
if (isset($_SESSION['db_session_id']) && $_SESSION['db_session_id']!="")
{
	$condition = "  id='".trim($_SESSION['db_session_id'])."' ";
	$user   = getUserDetail($condition);
	$data = mysql_fetch_assoc($user);
	//print_r($data);
	if (isset($data['profile_image_url']) && $data['profile_image_url']!="")
	{
		$image="profile/".trim($data['profile_image_url']);
	} else
	{
		$image="images/profile_user.jpg";
	}
}
?>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->
<!--</head>-->
 <script>
  $(function() {
    $( "#date_of_birth" ).datepicker({
	      changeMonth: true,
	      changeYear: true,
	      yearRange: '1960:2000',
	      dateFormat: 'mm-dd-yy'
	    });
  });
  </script>
<body style="overflow:hidden;">
<style type="text/css">
	#js-map-container{
		 min-height: 640px; border: 0px; padding: 0px;
	}
	</style>
<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="js/search.js"></script>
<!-- <script src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script> -->
	<script src="js/map.js"></script>

<section class="container-fluid headersection hidden-xs"><!-- INNER HEADER -->
	<a href="javascript:void(0);" class="visible-xs donow_moblogo"><img src="images/donow.png" alt="donow" class="img-responsive" /></a>
	<div class="row">
    	<div class="col-xs-12">
        	<header>
                <a href="<?php echo $root;?>search.php" class="logo"><img src="images/donow_lg.png" alt="DoNow" class="img-responsive" /></a>
                <a href="javascript:void(0);" class="navtoggle hidden-xs"><span></span><span></span><span></span></a>
                <ul class="leftnav" id="menu">
                <?php 
                if (isset($_SESSION['db_session_id']) && $_SESSION['db_session_id']!="")
                {
                ?>
                <li style="display:block;">
                    	<div class="usrpro_head">
                        	<a href="javascript:void(0);" class="usr_link">
								<span class="userimg"><img src="<?php echo $image;?>" class="img-responsive" alt="user" /></span>
								<h6><?php if (isset($data['fname'])){echo ucfirst($data['fname'])." ".$data['lname'];}?> <i class="fa fa-angle-down"></i></h6>
                            </a>
                            <ul class="usr_drop">
                            	<li><a href="user_profile.php">Account Setting</a></li>
                            	<!-- <li><a href="business_profile.php">Business Setting</a></li> -->
                                <li><a href="handler.php?method=<?php echo base64_encode("logout");?>">Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                <?php } else {?>
                
                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#accountpopup" class="loginlink"><i class="fa fa-key"></i> Login</a></li>
                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#accountpopup" class="signuplink"><i class="fa fa-lock"></i> Signup</a></li>
                    <li></li>
               
                <?php } ?>
                 </ul>
            </header>
        </div>
    </div>
</section><!-- INNER HEADER -->

<section class="SearchSection"><!-- // FIND LOCATION SEARCH // -->
	<div class="container-fluid">
    	<div class="row">
        	<div class="locationMap hidden-xs" id="js-map-container"><!-- // LOCATION MAP // -->
            	<a href="javascript:void(0);" class="mapexpend_btn"><i class="fa fa-angle-left"></i></a>
            	<!-- <img src="images/searchmap.jpg" alt="map" style="width:100%; height:100%;" /> -->
            </div><!-- // LOCATION MAP // -->
            
            <div class="SearchList"<!-- // SEARCH LIST // -->
            	<div class="col-xs-12">
                	<div class="row">
                    	<div class="MobApplyFilter">
                        	<div class="col-xs-6">
                                <a href="javascript:void(0);" class="applybtn"><i class="fa fa-search"></i> Apply</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="javascript:void(0);" class="cancelbtn"><i class="fa fa-times-circle-o"></i> Cancel</a>
                            </div>
                        </div>
                    </div>
                	<ul class="row MobFilterHead">
                    	<li><a href="javascript:void(0);" class="filteropenbtn"><i class="fa fa-filter"></i> Filter</a></li>
                        <li><a href="javascript:void(0);" class="openshortbtn"><i class="fa fa-list"></i> Short</a></li>
                    </ul>
                	<div class="FilterCont"><!-- // FILTER CONTAINER // -->
						<form id="search_form">
						<input type='hidden' name='pgno' id='pgno' value='1'>
							<div class="FilterBtngrp">
								<a href="javascript:void(0);" class="searchbtn">Search</a>
								<a href="javascript:void(0);" class="advn_fltr_btn"><img src="images/plusicon_light.png" alt="plus" /> Advance Filter</a>
							</div>
							<div class="row">
								<div class="col-xs-12"><label class="lbl">Make you search</label></div>
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
										<input type="text" placeholder="What you want to do" class="form-control search" name="search_query" id="search_query" autocomplete="off" value="<?php if (isset($_GET['search_query']) && $_GET['search_query']!=""){echo $search;}?>"/>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12 col-xss-6 col-xxss-6 col-ss-12">
									<div class="form-group icon_field_group">
										<select class="form-control custom-select" name="select_level">
											<option value="">Activity Intensity</option>
											<option value="0">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12 col-xss-6 col-xxss-6 col-ss-12">
									<div class="form-group clearfix">
										<select class="form-control custom-select search_filter" name="ad_time" id="ad_time">
											<option value=''>Duration of Activity</option>
											<!-- <option value="01:00">1 AM</option> -->
											<?php
											$start=strtotime('00:00');
											$end=strtotime('23:30');
											for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
											<option value="<?php echo date('H:i',$halfhour);?>" ><?php echo date('H:i',$halfhour);?></option>	   
											<?php }?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label class="lbl">Price</label>
										<input type="range" id="range_03" name="price_range"/>
									</div>
								</div>
								<!--
								<div class="col-md-6">
									<div class="form-group">
										<label class="lbl">Location</label>
										<div class="icon_field_group">
											<input type="text" placeholder="Location" class="form-control search_filter" id="location" name="location"/>
											<span class="inputicon"><img src="images/mapmarker_icon.png" alt="map marker" /></span>
										</div>
									</div>
								</div>
								-->
								  <div class="col-md-6 col-xs-12 col-xss-6">
									<div class="form-group">
										<label class="lbl">City</label>
										<div class="icon_field_group">
											<input type="text" placeholder="City" class="form-control" id="city" name="city" autocomplete="off"/>
											<span class="inputicon"><img src="images/mapmarker_icon.png" alt="map marker" /></span>
										</div>
									</div>
								</div>
								  <div class="col-md-6 col-xs-12 col-xss-6">
									<div class="form-group icon_field_group">
										<label class="lbl">State</label>
										<!-- <input type="text" placeholder="State" class="form-control search_filter" id="state" name="state"/> -->
										<select class="form-control custom-select search_filter" id="state" name="state">
											<option value="">Select State</option>
												<?php
												$sql = mysql_query("Select * from states ORDER BY  state ASC");
												while($res = mysql_fetch_assoc($sql) ){
												
												?>
											<option value="<?php echo $res['code'];?>"><?php echo $res['state'];?></option>
											<?php  } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label class="lbl">Distance (within)</label>
									<ul class="distance_filter">
										<li>
											<input type="checkbox" id="check1" name="check" class="search_filter example" value="500"/>
											<label class="checkbox" for="check1"><img src="images/check.png" alt="check" /> 500 m</label>
										</li>
										<li>
											<input type="checkbox" id="check2" name="check" class="search_filter example" value="1"/>
											<label class="checkbox" for="check2"><img src="images/check.png" alt="check" /> 1 km</label>
										</li>
										<li>
											<input type="checkbox" id="check3" name="check" class="search_filter example" value="2.5"/>
											<label class="checkbox" for="check3"><img src="images/check.png" alt="check" /> 2.5 km</label>
										</li>
										<li>
											<input type="checkbox" id="check4" name="check" class="search_filter example" value="5" checked="checked"/>
											<label class="checkbox" for="check4"><img src="images/check.png" alt="check" /> +5 km</label>
										</li>
									</ul>
								</div>
								<div class="col-md-12">
									 <div class="filtertype">
										<h5>Result</h5>
										<span class="displaytype"><span>Display:</span>
											<a href="javascript:void(0);" class="active"><i class="fa fa-th"></i></a>
											<a href="javascript:void(0);" class="hidden-xs"><i class="fa fa-list"></i></a>
										</span>
									 </div>
								</div>
							</div>
							<input type="hidden" name="search_advertisement" value="1">
							<input type="hidden" name="price_from" id="price_from" value="">
							<input type="hidden" name="price_to" id="price_to" value="">
						</form>
                    </div><!-- // FILTER CONTAINER // -->
					
                    
                    <div class="SearchResult"><!-- SEARCH RESULT -->
                        <div class="row" id="display">
                        </div>
                        <div class="row"><!-- PAGGINATION ROW -->
                        	<div class="col-xs-12">
							
                            	<nav class="pull-right paging_outer">
                              
                                </nav>
                            </div>
                        </div><!-- PAGGINATION ROW -->
                    </div><!-- SEARCH RESULT -->
                    
                </div>
            </div><!-- // SEARCH LIST // -->
            
        </div>
    </div>
</section><!-- // FIND LOCATION SEARCH // -->


<footer><!-- FOOTER -->
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
</footer><!-- FOOTER -->


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
                        <input type="text" class="form-control" placeholder="Enter you email here" name="email" id="email" value="<?php if (isset($_COOKIE['email']) && $_COOKIE['email']!=""){echo trim($_COOKIE['email']);}?>"/>
                        <i class="fa fa-user icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter password" name="password" value="<?php if (isset($_COOKIE['password']) && $_COOKIE['password']!=""){echo trim($_COOKIE['password']);}?>"/>
                        <i class="fa fa-key icons"></i>
                        
                        <a href="javascript:void(0);" class="forgot_pass">Forgot your password?</a>
                    </div>
                    <div class="form-group">
                        <div class="switch">
                            <input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-round" type="checkbox" value="select" name="remember_me">
                            <label for="cmn-toggle-1"><i class="fa fa-times"></i><i class="fa fa-check"></i></label>
                            <span class="rembrme">Remenber me!</span>
                        </div>
                        <input type="hidden" name="action" value="login"/>
                        <input type="submit" value="Sign in" class="signin_btn" />
                    </div>
                    <span class="or_seprator"><span>OR</span></span>
                    <small class="row txt_md">By joining DoNow, you agree to our <a href="/terms">Terms of Service</a> and <a href="/privacy">Privacy Policy</a></small>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="socialbtn fbbtn" onclick="Login()"><i class="fa fa-facebook"></i> Login with facebook</a>
                    </div>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="socialbtn gplusbtn"  onclick="login()"><i class="fa fa-google-plus"></i> Login with google+</a>
                    </div>
                    <p class="content-text-outr">Not a registered user yet?  &nbsp;&nbsp;<a href="javascript:void(0);" class="signuplink"> Sign up now!</a></p>
                </form>
            </div>
            <div id="signupform" style="display:none;">
                <form id="register">
                    <h5>Create an Account</h5>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name" name="full_name"/>
                        <i class="fa fa-user icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email Address" name="email_address" id="email_address"/>
                        <i class="fa fa-envelope-o icons"></i>
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" placeholder="ABN" name="abn" id="abn"/>
                        <i class="fa fa-envelope-o icons"></i>
                    </div> -->
                    <?php /*?><div class="form-group">
                        <input type="text" class="form-control" placeholder="Telephone" name="telephone" id="telephone"/>
                        <i class="fa fa-mobile icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Address" name="address" id="address"/>
                        <i class="fa fa-location-arrow icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="City" name="city" id="city"/>
                        <i class="fa fa-location-arrow icons"></i>
                    </div>
                    <div class="form-group">
                        <select class="form-control custom-select" name="state">
						<option value="">Select State</option>
							<?php
							$sql = mysql_query("Select * from states ORDER BY  state ASC");
							while($res = mysql_fetch_assoc($sql) ){
							
							?>
						<option value="<?php echo $res['code'];?>"><?php echo $res['state'];?></option>
						<?php  } ?>
					</select>
                    </div>
                    <div class="form-group">
                        <select class="form-control custom-select" name="country">
							<option value="">Select Country</option>
								<?php
								$sql = mysql_query("Select * from country ORDER BY  country_name ASC");
								while($res = mysql_fetch_assoc($sql) ){
								if(trim($res['country_name'])=="Australia")
								{
								$selected = 'selected="selected"';
								}else 
								{
								$selected = ' ';
								}
								
								?>
								<option value="<?php echo $res['country_code'];?>" <?php echo $selected;?>><?php echo $res['country_name'];?></option>
								<?php  } ?>
						</select>
                    </div><?php */ ?>
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
                    <small class="row txt_md">By joining DoNow, you agree to our <a href="/terms">Terms of Service</a> and <a href="/privacy">Privacy Policy</a></small>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="socialbtn fbbtn"><i class="fa fa-facebook"></i> Signup with facebook</a>
                    </div>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="socialbtn gplusbtn" onclick="login()"><i class="fa fa-google-plus"></i> Signup with google+</a>
                    </div>
                    <p class="content-text-outr">Already have an account?  &nbsp;&nbsp;<a href="javascript:void(0);"  class="loginlink"> Login now!</a></p>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- // LOGIN & SIGNUP MODAL // -->


<div class="modal fade AdDetailModal" id="ad_detail_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"><!-- // HOW IT WORK MODAL // -->
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
        <h2 id="heading">Midtown Manhattan Oversized</h2>
        <h5 id="address"><i class="fa fa-map-marker"></i>&nbsp; 6782 Sarasea Circle, Siesta Key, FL 34242</h5>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-sm-6">
                <div class="ad_sliderCont">
                    <!-- <ul class="owl-carousel ad_modal_slide" id="ad_modal_slide">
                        <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li> -->
                        <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" id="adv_img"/></li>
                       <!--  <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                    </ul> -->
                    <span class="price">$1,000 <span>New</span></span>
                </div>
            </div>
            <div class="col-sm-6">
            	<h4>Overview</h4>
                <ul class="overviewlist">
                	<li><h6>Time of Activity</h6> <span id="time">09:30</span></li>
                    <li><h6>price</h6> <span class="pricetag">$ 1,000</span></li>
                    <li><h6>Distance from me</h6> <span id="distance">With in 5 km</span></li>
                </ul>
                <div class="short_des">
                    <h4>Short Description</h4>
                    <p id="short_desc">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-sm-6">
            	<div class="LongDescription">
                	<h4>Full Description</h4>
                    <p id="long_desc">Integer fermentum felis ac bibendum porta. Aenean at est gravida, consequat sapien vitae, sollicitudin nisl. Nullam interdum mollis nunc, sit amet dapibus mauris elementum id. Ut tempus aliquam nisl id ultricies. Donec varius vestibulum leo, faucibus venenatis magna semper ac. Morbi id euismod lacus, nec dictum purus. Phasellus at ligula nec augue placerat tincidunt ut at magna. Nulla facilisi.<br/><br/>

3 beds<br/>
3 bedroom<br/>
1 bathroom<br/>
1 kitchen</p>
                </div>
            </div>
            <div class="col-sm-6">
            	<div class="LongDescription">
                	<h4>Our Location</h4>
                    <div id="googleMap" style="width:453px;height:380px;"></div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- // HOW IT WORK MODAL // -->


<div class="col-xs-7 col-sm-4">
	
</div>



<!-- ////// JQUERY ////// -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.slicknav.min.js" type="text/javascript"></script>
<script src="js/ion.rangeSlider.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" type="text/javascript"></script>

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
	/*select only one checkbox*/
	$('input.example').on('change', function() {
	    $('input.example').not(this).prop('checked', false);  
	});
})

// FOOTER QUICK LINKS ON MOBILE //
$('.ft_quicklinks').click(function(){
	$(this).addClass('active');
	$(this).next().slideToggle();
});

// SLIK NAV //
$(function(){
	$('#menu').slicknav();
});

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

// MOBILE LOGO APPEND //
$(document).ready(function(e) {
    $('.donow_moblogo').appendTo('.slicknav_menu');
	$('.headersection .navtoggle').click(function(){
		$(this).next().fadeToggle();
	})
});

// PRICE RANGE SLIDER //
$("#range_03").ionRangeSlider({
    type: "double",
    grid: false,
    min: 0,
    max: 400,
    from: 0,
    to: 400,
    prefix: "$",
    onStart: function (data) {
        console.log("onStart");
    },
    onChange: function (data) {
        console.log("onChange");
    },
    onFinish: function (data) {
        console.log(data);
		$("#price_from").val(data.from);
		$("#price_to").val(data.to);
		search_ajax($("#search_form").serialize());
    },
    onUpdate: function (data) {
        console.log("onUpdate");
    }
});

// MAP EXPEND & COLLEPS //
$('.mapexpend_btn').click(function() {
    $(this).toggleClass('active');
	$(this).children().toggleClass('fa-angle-right');
	$(this).parent().toggleClass('MapFull');
});

// MOBILE FILTER //
$('.filteropenbtn').click(function(){
	$(this).parent().parent().slideToggle('fast');
	$('.SearchList').find('.MobApplyFilter').slideToggle('slow');
	$(this).parent().parent().next().slideToggle();
});
</script>
<script type="text/javascript">
$(document).ready(function() {
  	$(".property_slide").owlCarousel({
		dot:false,
		nav:true,
    	navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    	navRewind:true,
		items:1,
	});
	
});
$('#ad_detail_modal').on('shown.bs.modal', function (e) {
   $(".ad_modal_slide").owlCarousel({
		dot:false,
		nav:true,
    	navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    	navRewind:true,
		items:1,
		autoWidth: false,
	});
});
</script>
<script>
function initialize(lat,longt) {
	var myCenter=new google.maps.LatLng(lat,longt);
  var mapProp = {
    center:new google.maps.LatLng(lat,longt),
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  var marker=new google.maps.Marker({
	  position:myCenter,
	  });

	marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

</script>
<!-- ////// JQUERY ////// -->
</body>
</html>
