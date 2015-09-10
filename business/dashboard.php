<?php 
require_once '../config/dbconnection.php';
db_open();
require_once '../phpInclude/functions.php';
if (!isset($_SESSION['db_session_id']) && $_SESSION['db_session_id']=="")
{
	header("Location:index.php");
}
else {
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
$ads=mysql_query("Select count(*) as row from tbl_advertisement WHERE is_deleted='no' ");
$row = mysql_fetch_assoc($ads);
//echo $row['row'];  
$users=mysql_query("Select count(*) as unum from users WHERE is_deleted='0' ");
$urow = mysql_fetch_assoc($users);
//echo $urow['unum'];
/* calculate businesses */
$buis=mysql_query("Select count(*) as busn from buiseness WHERE status='Active' ");
$busi_row = mysql_fetch_assoc($buis);
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
                    	<!-- <li class="notification"><a href="#" id="notificationLink"><i class="fa fa-bell"><span>5</span></i></a></li> -->
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
	?>
	<!-- FIXED SIDEBAR -->
    <div class="InnerSection"><!-- INNER SECTION -->
    	<div class="container-fluid">
        	<div class="row">
            	<div class="col-xs-12">
                	<ul class="breadcrumb">
                    	<li><a href="javascript:void(0);">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
                <div class="col-xs-12">
                	<h2 class="heading">Dashboard</h2>
                    <div class="row">
                    	<div class="col-xs-12">
                        	<ul class="DashboardList">
                            	<li>
                                	<div class="boards bluebg">
                                    	<div class="txtset">
                                        	<span class="cell">
                                            	<h3><?php echo $urow['unum'];?> <span>All users</span></h3>
                                            </span>
                                        </div>
                                    	<span class="iconset"><img src="images/user_icon.png" alt="usres" /></span>
                                    </div>
                                </li>
                                <li>
                                	<div class="boards Orng">
                                    	<div class="txtset">
                                        	<span class="cell">
                                            	<h3><?php echo $row['row'];?> <span>Ads Uploaded</span></h3>
                                            </span>
                                        </div>
                                    	<span class="iconset orngbg"><img src="images/cloud_upload_icon.png" alt="upload" /></span>
                                    </div>
                                </li>
                                <li>
                                	<div class="boards Grn">
                                    	<div class="txtset">
                                        	<span class="cell">
                                            	<h3><?php echo $busi_row['busn'];?> <span>Total Business</span></h3>
                                            </span>
                                        </div>
                                    	<span class="iconset grnbg"><img src="images/business_icon.png" alt="business" /></span>
                                    </div>
                                </li>
                                <li>
                                	<div class="boards Ylw">
                                    	<div class="txtset">
                                        	<span class="cell">
                                            	<h3>444 <span>Total Visit</span></h3>
                                            </span>
                                        </div>
                                    	<span class="iconset ylwbg"><img src="images/heart_icon.png" alt="visit" /></span>
                                    </div>
                                </li>
                            </ul>
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
$(document).ready(function() {
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
});
</script>
</body>
</html>
  