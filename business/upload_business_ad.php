<?php
require_once '../config/dbconnection.php';
db_open();
require_once '../phpInclude/functions.php';
if (!isset($_SESSION['db_session_id']) && $_SESSION['db_session_id']=="")
{
	header("Location:index.php");
}
else 
{
	$condition = "  id='".trim($_SESSION['db_session_id'])."' ";
	$user   = getUserDetail($condition);
	$data = mysql_fetch_assoc($user);
	//print_r($data);
	if (isset($data['profile_image_url']) && $data['profile_image_url']!="")
	{
		$image="../profile/".trim($data['profile_image_url']);
	} else
	{
		$image="../images/profile_user.jpg";
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DoNow Admin</title>

<link href="css/grid.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/responsive.css" type="text/css" rel="stylesheet" />
<link href="font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<link href="fonts/fonts.css" type="text/css" rel="stylesheet" />

 <script type="text/javascript" src="js/jquery.min.js"></script> 
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript">

var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
<Style>
label.error {color : red !important;}
</Style>
</head>

<body>

<header><!-- FIXED HEADER -->
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-6 col-sm-4 col-xs-2">
            	<a href="javascript:void(0);" class="navtoggle hidden-xs hidden-sm">
                	<span></span>
                    <span></span>
                    <span></span>
                </a>
                <a href="javascript:void(0);" class="mob_navtoggle hidden-md hidden-lg">
                	<span></span>
                    <span></span>
                    <span></span>
                </a>
                <a href="<?php echo $root;?>" class="logo hidden-xs"><img src="images/logo.png" alt="DoNow" class="img-responsive" /></a>
                <div class="headsearch hidden-xs hidden-sm">
                	<i class="fa fa-search"></i>
                    <input type="search" placeholder="Type to search" />
                </div>
            </div>
            <div class="col-md-6 col-sm-8 col-xs-10 mob_pad0">
            	<div class="left_nav pull-right">
                	<ul>
                    	<!-- <li class="notification"><a href="javascript:void(0);"><i class="fa fa-bell"><span>5</span></i></a></li> -->
                        <li class="wlcmUser">
                        	<a href="javascript:void(0);">
                            	<span class="usrimg"><img src="<?php echo $image;?>" alt="user" class="img-responsive" /></span>
                                <h5>Welcome<span><?php if (isset($data['fname'])){echo ucfirst($data['fname'])." ".$data['lname'];}?></span></h5>
                        	</a>
                        </li>
                        <li class="logout"><a href="handler.php?method=<?php echo base64_encode("logout");?>"><span>Log out</span><i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header><!-- FIXED HEADER -->

<section class="mainSection">
	<?php 
	require_once 'phpInclude/sidebar.php';
	?><!-- FIXED SIDEBAR -->
    
    <div class="InnerSection"><!-- INNER SECTION -->
    	<div class="container-fluid">
        	<div class="row">
            	<div class="col-xs-12">
                	<ul class="breadcrumb">
                    	<li><a href="javascript:void(0);">Home</a></li>
                        <li>Upload ads</li>
                    </ul>
                </div>
                <div class="col-xs-12">
                	<h2 class="heading">Upload ads</h2>
                    <div class="InnrCont">
                    	<h3 class="subhead">Upload your business ad</h3>
                        <div class="upload_ad_otr">
                        	<form id="submit_buiseness" enctype="multipart/form-data">
                            	<div class="row">
                                	<div class="col-sm-6 col-xs-12">
                                    	<div class="form-group">
                                        	<label>Title</label>
                                            <input type="text" placeholder="Ad heading" class="form-control" name="title"/>
                                        </div>
                                        <div class="form-group">
                                        	<label>Short Description</label>
                                            <input type="text" placeholder="Enter Short Description" class="form-control" name="short_description"/>
                                        </div>
                                        <div class="form-group">
                                        	<label>Location</label>
                                            <input type="text" placeholder="Enter Your Location" class="form-control" name="location"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                    	<div class="form-group">
                                        	<label>Title</label>
                                            <textarea class="form-control" placeholder="Enter Long Description" name="long_description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- developer code starts-->
                                <div class="row">
                                	<div class="col-sm-4 col-xs-12">
                                    	<div class="form-group">
                                            <label>State</label>
                                            <div class="selectcell">
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
                                       	</div>
                                    </div>
									<div class="col-sm-4 col-xs-12">
										<div class="form-group">
											<label>City</label>
											<input type="text" placeholder="City" class="form-control" name="city"/>
										</div>
									</div>
									<div class="col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <div class="selectcell">
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
                                            </div>
                                       	</div>
                                    </div>
                                </div>
                                <!--Developer code ends here  -->
                                <div class="row">
                                	<div class="col-sm-4 col-xs-12">
                                    	<div class="form-group">
                                            <label>Average Time of activity</label>
                                            <div class="selectcell">
                                                <!-- <div class="cell_left"> -->
                                                    <select class="form-control custom-select" name="time_start">
                                                        <option value="">Select Average Time</option>
                                                        <?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" ><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
                                                    </select>
                                                <!-- </div> -->
                                                <?php /*<div class="cell_right">
                                                    <select class="form-control custom-select" name="end_time">
                                                        <option value="">End Time</option>
                                                        <?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" ><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
                                                    </select>
                                                </div>*/?>
                                            </div>
                                       	</div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12 col-xss-6">
                                    	<div class="form-group">
                                        	<label>Price</label>
                                            <div class="input-group">
                                            	<i class="addon_input fa fa-dollar"></i>
                                            	<input type="text" placeholder="0.00" class="form-control" name="price"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12 col-xss-6">
                                    	<div class="form-group clearfix">
                                        	<label>Activity Level <span class="activityTip" data-toggle="tooltip" title="How active the activity is?">?</span></label>
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
                                </div>
                                
                            	<div class="row">
                                	<div class="col-sm-4 col-xs-12">
                                    	<div class="form-group ImgUpldOtr">
                                        	<label>UpLoad Image</label>
                                            <div class="img_prev" id='preview'><img id="output" /></div></div>
                                            <span class="CustomUpload">
                                            	<input type="file" accept="image/*" onchange="loadFile(event)" class="responsiveimg" name="photoimg"/>
                                                <span>Select Image</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="image" id="image" value="sdsa"/>
                                 <input type="hidden" name="action" value="upload_ad"/>
                                 <input type="hidden" name="page_no"  id="page_no" value="not_defined"/>
                                <input type="submit" name="save" value="SAVE" id="save" class="signin_btn submitbtn1"/>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- INNER SECTION -->
</section>


<!-- ////// JQUERY ////// -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$(".custom-select").each(function(){
		$(this).wrap("<span class='select-wrapper'></span>");
		$(this).after("<span class='holder'></span>");
	});
	$(".custom-select").change(function(){
		$('#state-error').remove();
		$('#time_start-error').remove();
		$('#end_time-error').remove();
		$('#select_level-error').remove();
		var selectedOption = $(this).find(":selected").text();
		$(this).next(".holder").text(selectedOption);
	}).trigger('change');
	
	// TOOL TIP //
	$('[data-toggle="tooltip"]').tooltip();
	
	// SIDER BAR SLIDER NAV //
    $('.navtoggle').click(function() {
        $('body .mainSection').toggleClass('maincollapsed');
		$('.mainSection .sidebar').toggleClass('collapsed');
    });
	
	// SIDER BAR MOBILE SLIDER NAV //
	$('.mob_navtoggle').click(function() {
        $('body .mainSection').toggleClass('mob_maincollapsed');
		$('.mainSection .sidebar').toggleClass('mob_collapsed');
    });
})

</script>
</body>
</html>
