<?php 
require_once '../config/dbconnection.php';
db_open();
require_once '../phpInclude/functions.php';

   $per_page = 3;
  //getting number of rows and calculating no of pages
 $query = mysql_query("SELECT * from tbl_advertisement WHERE is_deleted='no' ");
  $count = mysql_num_rows($query);
  $pages = ceil($count/$per_page);
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
<script type="text/javascript" src="js/listing.js"></script>
<style>
#loading { 
width: 100%; 
position: absolute;
}

#pagination
{
text-align:center;
margin-left:120px;

}
#pagination li{	
list-style: none; 
float: left; 
margin-right: 16px; 
padding:5px; 
border:solid 1px #dddddd;
color:#0063DC; 
}

	</style>
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
                <a href="javascript:void(0);" class="logo hidden-xs"><img src="images/logo.png" alt="DoNow" class="img-responsive" /></a>
                <div class="headsearch hidden-xs hidden-sm">
                	<i class="fa fa-search"></i>
                    <input type="search" placeholder="Type to search" />
                </div>
            </div>
            <div class="col-md-6 col-sm-8 col-xs-10 mob_pad0">
            	<div class="left_nav pull-right">
                	<ul>
                    	<li class="notification"><a href="javascript:void(0);"><i class="fa fa-bell"><span>5</span></i></a></li>
                        <li class="wlcmUser">
                        	<a href="javascript:void(0);">
                            	<span class="usrimg"><img src="images/usrimg.jpg" alt="user" class="img-responsive" /></span>
                                <h5>Welcome<span>Administrator</span></h5>
                        	</a>
                        </li>
                        <li class="logout"><a href="javascript:void(0);"><span>Log out</span><i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header><!-- FIXED HEADER -->

<section class="mainSection">
	<div class="sidebar"><!-- FIXED SIDEBAR -->
    	<h5>Overview</h5>
        <ul class="navigation">
        	<li><a href="javascript:void(0);"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-cloud-upload"></i> <span>Upload ad</span> </a></li>
            <li><a href="javascript:void(0);" class="active"><i class="fa fa-gears"></i> <span>Manage ads</span> </a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-briefcase"></i> <span>Businesses</span></a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-users"></i> <span>Users</span></a></li>
        </ul>
    </div><!-- FIXED SIDEBAR -->
    
    <div class="InnerSection"><!-- INNER SECTION -->
    	<div class="container-fluid">
        	<div class="row">
            	<div class="col-xs-12">
                	<ul class="breadcrumb">
                    	<li><a href="javascript:void(0);">Home</a></li>
                        <li>Manage ads</li>
                    </ul>
                </div>
                <div class="col-xs-12">
                	<h2 class="heading">Manage ads</h2>
                    <div class="InnrCont">
                    	<h3 class="subhead" >Manage your ads</h3>
                    	<div id="display">
                    	
                        
                    </div>
                    
                    <ul id="pagination">
				<?php
				//Show page links
				for($i=1; $i<=$pages; $i++)
				{
					echo '<li id="'.$i.'">'.$i.'</li>';
				}
				?>
	</ul>
	
                </div>
                <div id="loading" ></div>
            </div>
        </div>
    </div><!-- INNER SECTION -->
</section>


<!-- ////// JQUERY ////// -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
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
});
</script>
</body>
</html>
