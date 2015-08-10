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
<!-- <!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DoNow</title>

<link href="css/grid.css" type="text/css" rel="stylesheet" />
<link href="css/owl.carousel.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<link href="fonts/fonts.css" type="text/css" rel="stylesheet" />
<link href="css/slicknav.min.css" type="text/css" rel="stylesheet" />
<link href="css/responsive.css" type="text/css" rel="stylesheet" />

<link href="css/ion.rangeSlider.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->
<!--</head>

<body> -->
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript" src="js/search.js"></script>
<section class="container-fluid headersection hidden-xs"><!-- INNER HEADER -->
	<a href="javascript:void(0);" class="visible-xs donow_moblogo"><img src="images/donow.png" alt="donow" class="img-responsive" /></a>
	<div class="row">
    	<div class="col-xs-12">
        	<header>
                <a href="javascript:void(0);" class="logo"><img src="images/donow_lg.png" alt="DoNow" class="img-responsive" /></a>
                <a href="javascript:void(0);" class="navtoggle hidden-xs"><span></span><span></span><span></span></a>
                <ul class="leftnav" id="menu">
                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#accountpopup" class="loginlink"><i class="fa fa-key"></i> Login</a></li>
                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#accountpopup" class="signuplink"><i class="fa fa-lock"></i> Signup</a></li>
                    <li></li>
                </ul>
            </header>
        </div>
    </div>
</section><!-- INNER HEADER -->

<section class="SearchSection"><!-- // FIND LOCATION SEARCH // -->
	<div class="container-fluid">
    	<div class="row">
        	<div class="locationMap hidden-xs"><!-- // LOCATION MAP // -->
            	<a href="javascript:void(0);" class="mapexpend_btn"><i class="fa fa-angle-left"></i></a>
            	<img src="images/searchmap.jpg" alt="map" style="width:100%; height:100%;" />
            </div><!-- // LOCATION MAP // -->
            
            <div class="SearchList"><!-- // SEARCH LIST // -->
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
							<div class="FilterBtngrp">
								<a href="javascript:void(0);" class="searchbtn">Search</a>
								<a href="javascript:void(0);" class="advn_fltr_btn"><img src="images/plusicon_light.png" alt="plus" /> Advance Filter</a>
							</div>
							<div class="row">
								<div class="col-xs-12"><label class="lbl">Make you search</label></div>
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
										<input type="text" placeholder="What you want to do" class="form-control search" name="search_query" id="search_query"/>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12 col-xss-6 col-xxss-6 col-ss-12">
									<div class="form-group icon_field_group">
										<select class="form-control custom-select" name="select_level">
											<option value="">Select Level (1 - 5)</option>
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
											<option value=''>Time</option>
											<option value="01:00">1 AM</option>
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
											<input type="text" placeholder="City" class="form-control search_filter" id="city" name="city"/>
											<span class="inputicon"><img src="images/mapmarker_icon.png" alt="map marker" /></span>
										</div>
									</div>
								</div>
								  <div class="col-md-6 col-xs-12 col-xss-6">
									<div class="form-group icon_field_group">
										<label class="lbl">State</label>
										<!-- <input type="text" placeholder="State" class="form-control search_filter" id="state" name="state"/> -->
										<select class="form-control custom-select" id="state" name="state">
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
											<input type="checkbox" id="check4" name="check" class="search_filter example" value="5"/>
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
                            <!-- <div class="col-xs-12 col-md-6"><!-- BLOCKS -->
                                <!--  <div class="SearchBlk">
                                    <div class="ad_imgcont">
                                    	<ul class="owl-carousel property_slide">
                                        	<li data-toggle="modal" data-target="#ad_detail_modal"><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li data-toggle="modal" data-target="#ad_detail_modal"><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li data-toggle="modal" data-target="#ad_detail_modal"><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                        </ul>
                                        <a href="javascript:void(0);" class="favriote"><i class="fa fa-heart"></i></a>
                                        <span class="price">$1,000 <span>New</span></span>
                                    </div>
                                    <div class="ad_info">
                                    	<a href="javascript:void(0);" data-toggle="modal" data-target="#ad_detail_modal"><h4>3645 Kenwood Place</h4></a>
                                        <ul class="loc">
                                            <li><img src="images/mapmarker_icon.png" alt="location" width="12px" />San Francisco</li>
                                        </ul>
                                        <ul class="ratinglist">
                                        	<li class="rt_main">
                                            	<ul class="starslist">
                                                	<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);" class="empty"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </li>
                                            <li class="rt_main"><a href="javascript:void(0);">10 Reviews</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --><!-- BLOCKS -->
                            
                            <?php /*<div class="col-xs-12 col-md-6"><!-- BLOCKS -->
                                <div class="SearchBlk">
                                    <div class="ad_imgcont">
                                    	<ul class="owl-carousel property_slide">
                                        	<li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                        </ul>
                                        <a href="javascript:void(0);" class="favriote"><i class="fa fa-heart"></i></a>
                                        <span class="price">$1,000 </span>
                                    </div>
                                    <div class="ad_info">
                                    	<h4>3645 Kenwood Place</h4>
                                        <ul class="loc">
                                            <li><img src="images/mapmarker_icon.png" alt="location" width="12px" />San Francisco</li>
                                        </ul>
                                        <ul class="ratinglist">
                                        	<li class="rt_main">
                                            	<ul class="starslist">
                                                	<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);" class="empty"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </li>
                                            <li class="rt_main"><a href="javascript:void(0);">10 Reviews</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- BLOCKS -->
                            
                            <div class="col-xs-12 col-md-6"><!-- BLOCKS -->
                                <div class="SearchBlk">
                                    <div class="ad_imgcont">
                                    	<ul class="owl-carousel property_slide">
                                        	<li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                        </ul>
                                        <a href="javascript:void(0);" class="favriote"><i class="fa fa-heart"></i></a>
                                        <span class="price">$1,000</span>
                                    </div>
                                    <div class="ad_info">
                                    	<h4>3645 Kenwood Place</h4>
                                        <ul class="loc">
                                            <li><img src="images/mapmarker_icon.png" alt="location" width="12px" />San Francisco</li>
                                        </ul>
                                        <ul class="ratinglist">
                                        	<li class="rt_main">
                                            	<ul class="starslist">
                                                	<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);" class="empty"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </li>
                                            <li class="rt_main"><a href="javascript:void(0);">10 Reviews</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- BLOCKS -->
                            
                            <div class="col-xs-12 col-md-6"><!-- BLOCKS -->
                                <div class="SearchBlk">
                                    <div class="ad_imgcont">
                                    	<ul class="owl-carousel property_slide">
                                        	<li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                        </ul>
                                        <a href="javascript:void(0);" class="favriote"><i class="fa fa-heart"></i></a>
                                        <span class="price">$1,000</span>
                                    </div>
                                    <div class="ad_info">
                                    	<h4>3645 Kenwood Place</h4>
                                        <ul class="loc">
                                            <li><img src="images/mapmarker_icon.png" alt="location" width="12px" />San Francisco</li>
                                        </ul>
                                        <ul class="ratinglist">
                                        	<li class="rt_main">
                                            	<ul class="starslist">
                                                	<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);" class="empty"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </li>
                                            <li class="rt_main"><a href="javascript:void(0);">10 Reviews</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- BLOCKS -->
                            
                            <div class="col-xs-12 col-md-6"><!-- BLOCKS -->
                                <div class="SearchBlk">
                                    <div class="ad_imgcont">
                                    	<ul class="owl-carousel property_slide">
                                        	<li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                        </ul>
                                        <a href="javascript:void(0);" class="favriote"><i class="fa fa-heart"></i></a>
                                        <span class="price">$1,000 <span>New</span></span>
                                    </div>
                                    <div class="ad_info">
                                    	<h4>3645 Kenwood Place</h4>
                                        <ul class="loc">
                                            <li><img src="images/mapmarker_icon.png" alt="location" width="12px" />San Francisco</li>
                                        </ul>
                                        <ul class="ratinglist">
                                        	<li class="rt_main">
                                            	<ul class="starslist">
                                                	<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);" class="empty"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </li>
                                            <li class="rt_main"><a href="javascript:void(0);">10 Reviews</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- BLOCKS -->
                            
                            <div class="col-xs-12 col-md-6"><!-- BLOCKS -->
                                <div class="SearchBlk">
                                    <div class="ad_imgcont">
                                    	<ul class="owl-carousel property_slide">
                                        	<li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                            <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                                        </ul>
                                        <a href="javascript:void(0);" class="favriote"><i class="fa fa-heart"></i></a>
                                        <span class="price">$1,000</span>
                                    </div>
                                    <div class="ad_info">
                                    	<h4>3645 Kenwood Place</h4>
                                        <ul class="loc">
                                            <li><img src="images/mapmarker_icon.png" alt="location" width="12px" />San Francisco</li>
                                        </ul>
                                        <ul class="ratinglist">
                                        	<li class="rt_main">
                                            	<ul class="starslist">
                                                	<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="javascript:void(0);" class="empty"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </li>
                                            <li class="rt_main"><a href="javascript:void(0);">10 Reviews</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- BLOCKS -->*/?>
                            
                        </div>
                        
                        <div class="row"><!-- PAGGINATION ROW -->
                        	<div class="col-xs-12">
                            	<nav class="pull-right">
                                  <p class="page_result_found">1 – 18 of 1000+ Rentals</p>
                                  <ul class="pagination">
                                    <li>
                                      <a href="javascript:void(0);" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                      </a>
                                    </li>
                                    <li class="active"><a href="javascript:void(0);">1</a></li>
                                    <li><a href="javascript:void(0);">2</a></li>
                                    <li><a href="javascript:void(0);">3</a></li>
                                    <li><a href="javascript:void(0);">4</a></li>
                                    <li><a href="javascript:void(0);">5</a></li>
                                    <li>
                                      <a href="javascript:void(0);" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                      </a>
                                    </li>
                                  </ul>
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
        	<div id="loginform" style="display:block;">
                <form>
                    <h5>Sign in to continue your account</h5>
                    <img src="images/user_img.jpg" alt="login" class="responsiveimg usrimg" />
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter you email here" />
                        <i class="fa fa-user icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter password" />
                        <i class="fa fa-key icons"></i>
                        
                        <a href="javascript:void(0);" class="forgot_pass">Forgot your password?</a>
                    </div>
                    <div class="form-group">
                        <div class="switch">
                            <input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-round" type="checkbox">
                            <label for="cmn-toggle-1"><i class="fa fa-times"></i><i class="fa fa-check"></i></label>
                            <span class="rembrme">Remenber me!</span>
                        </div>
                        <input type="submit" value="Sign in" class="signin_btn" />
                    </div>
                    <span class="or_seprator"><span>OR</span></span>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="socialbtn fbbtn"><i class="fa fa-facebook"></i> Login with facebook</a>
                    </div>
                    <div class="form-group">
                        <a href="javascript:void(0);" class="socialbtn gplusbtn"><i class="fa fa-google-plus"></i> Login with google+</a>
                    </div>
                    <p class="content-text-outr">Not a registered user yet?  &nbsp;&nbsp;<a href="javascript:void(0);"> Sign up now!</a></p>
                </form>
            </div>
            <div id="signupform" style="display:none;">
                <form>
                    <h5>Creat an account</h5>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name" />
                        <i class="fa fa-user icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email Address" />
                        <i class="fa fa-envelope-o icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter Password" />
                        <i class="fa fa-lock icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" />
                        <i class="fa fa-lock icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Date of Birth(dd/mm/yy)" />
                        <i class="fa fa-birthday-cake icons"></i>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Register Now!" class="signin_btn registerbtn" />
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


<div class="modal fade AdDetailModal" id="ad_detail_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"><!-- // HOW IT WORK MODAL // -->
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
        <h2>Midtown Manhattan Oversized</h2>
        <h5><i class="fa fa-map-marker"></i>&nbsp; 6782 Sarasea Circle, Siesta Key, FL 34242</h5>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-sm-6">
                <div class="ad_sliderCont">
                    <ul class="owl-carousel ad_modal_slide" id="ad_modal_slide">
                        <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                        <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                        <li><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>
                    </ul>
                    <span class="price">$1,000 <span>New</span></span>
                </div>
            </div>
            <div class="col-sm-6">
            	<h4>Overview</h4>
                <ul class="overviewlist">
                	<li><h6>Time</h6> <span>09:30am to 05:00 pm</span></li>
                    <li><h6>price</h6> <span class="pricetag">$ 1,000</span></li>
                    <li><h6>Distance from me</h6> <span>With in 5 km</span></li>
                </ul>
                <div class="short_des">
                    <h4>Short Description</h4>
                    <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-sm-6">
            	<div class="LongDescription">
                	<h4>Full Description</h4>
                    <p>Integer fermentum felis ac bibendum porta. Aenean at est gravida, consequat sapien vitae, sollicitudin nisl. Nullam interdum mollis nunc, sit amet dapibus mauris elementum id. Ut tempus aliquam nisl id ultricies. Donec varius vestibulum leo, faucibus venenatis magna semper ac. Morbi id euismod lacus, nec dictum purus. Phasellus at ligula nec augue placerat tincidunt ut at magna. Nulla facilisi.<br/><br/>

3 beds<br/>
3 bedroom<br/>
1 bathroom<br/>
1 kitchen</p>
                </div>
            </div>
            <div class="col-sm-6">
            	<div class="LongDescription">
                	<h4>Our Location</h4>
                    <img src="images/searchmap.jpg" alt="map" class="img-responsive" />
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
    max: 10000,
    from: 0,
    to: 10000,
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
<!-- ////// JQUERY ////// -->
</body>
</html>
