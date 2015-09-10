<?php 
require_once '../config/dbconnection.php';
db_open();
require_once '../phpInclude/functions.php';
if (!isset($_SESSION['admin_session_id']) && $_SESSION['admin_session_id']=="")
{
	header("Location:index.php");
} else 
{
	$user_condition = "  id='".trim($_SESSION['admin_session_id'])."' ";
	$user   = getUserDetail($user_condition);
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
$condition = "";
if(isset($_GET['search'])&& !empty($_GET['search']))
{
	$condition .= " and a.heading LIKE '%".$_GET['search']."%' ";
}
$totalrecords = "";
if(isset($_GET['results']) && !empty($_GET['results']))
{
	$recordperpage = $_GET['results'];
}
else
{
	$recordperpage = 5;
}
$pageno        		= isset($_GET['pgno'])?$_GET['pgno']:'1';
$start         		= (($pageno)-1)*$recordperpage;
$limit	= " LIMIT ".$start.", ".$recordperpage;
  //getting number of rows and calculating no of pages
 $query = mysql_query(" SELECT  SQL_CALC_FOUND_ROWS  a.* ,at.open , at.close FROM tbl_advertisement as a LEFT JOIN ad_timing as at ON(a.id = at.ad_id) WHERE 1=1 ".$condition."  GROUP BY a.id  ") or die(mysql_error());
  $totalrecords = mysql_num_rows($query);
  
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
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/global.js"></script>
<script type="text/javascript" src="js/common.js"></script>

<style type="text/css">
th,td
{
padding:5px;
}
/*---------------PAGINATION---------------------*/
.pagging{padding-top:5px; padding-bottom:5px; height:26px; width:auto; text-align:center;}
.pagging ul{margin:0; padding:0; text-align:center;}
.pagging ul li{margin:0; padding:0; list-style:none; display:inline; font-size:13px; text-align:center;}
.pagging a{padding:4px 8px; line-height:26px; margin-left:3px; background:#e6e7e9; color:#6d6e72;}
.pagging a.disable{  background:#e6e7e9; color:#999999 !important; cursor:default;}
.pagging a:hover { background:#5a84d8; color:#ffffff;}
.pagging a.active { background:#5a84d8; color:#fff; font-weight:bold;}
.pagging a.disable:hover { background:#e6e7e9; color:#ffffff;}
.org_btn_loader{ float:left; margin: 16px 0 0 12px;}
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
                <a href="<?php echo $root;?>" class="logo hidden-xs"><img src="images/logo.png" alt="DoNow" class="img-responsive" /></a>
                <form>
                <div class="headsearch hidden-xs hidden-sm">
                	<i class="fa fa-search"></i>
                    <input type="search" placeholder="Type to search" name="search" value="<?php if(isset($_GET['search'])&& !empty($_GET['search'])){echo $_GET['search'];}?>"/>
                </div>
                </form>
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
                        <li>Manage ads</li>
                    </ul>
                </div>
                <div class="col-xs-12">
                	<h2 class="heading">Manage ads</h2>
                    <div class="InnrCont">
                    	<h3 class="subhead" >Manage your ads</h3>
                    	<div id="msgs" style="display:none;"></div>
                    	<div id="display">
                    	<?php 
                    	$query = " SELECT  SQL_CALC_FOUND_ROWS  a.* ,at.open , at.close FROM tbl_advertisement as a LEFT JOIN ad_timing as at ON(a.id = at.ad_id)   WHERE 1=1 AND  is_deleted='no' ".$condition."  GROUP BY a.id  ".$limit;
                    	$record_query = mysql_query($query) or die(mysql_error());
                    	$num = mysql_num_rows($record_query);
                    	if($num > 0)
                    	{
                    		while($row = mysql_fetch_assoc($record_query))
                    		{/* echo "<pre>";
                    			print_r($row); *///die;
                    	?>
                    	<div class="ads_row">
						<div class="row">
						<div class="col-sm-3 col-xss-4 col-xs-8"><span class="adimgcont"><img src="uploads/<?php echo $row['image'];?>" alt="ad1" class="img-responsive" /></span></div>
						<div class="col-sm-2 col-xss-8 col-xs-4 col-sm-push-7 mob_pad0">
						<nav>
						<ul>
						<li><a href="update_business_ad.php?get=<?php echo base64_encode($pageno);?>&data=<?php echo base64_encode($row['id']);?>" data-toggle="tooltip" title="Edit Ad" data-id="<?php echo trim($row['id']);?>" class="edit_ad"><i class="fa fa-pencil"></i></a></li>
						<li><a href="javascript:void(0);" data-toggle="tooltip" title="Delete Ad" data-id="<?php echo trim($row['id']);?>" class="delete_ad"><i class="fa fa-times"></i></a></li>
						</ul>
						</nav>
						</div>
						<div class="col-sm-7 col-xs-12 ad_info col-sm-pull-2">
						<h4><?php echo trim($row['heading']);?></h4>
						<p><?php echo trim($row['city']);?></p>
						<span class="location"><i class="fa fa-map-marker"></i> <?php echo trim($row['address']);?></span>
						<ul class="filteredlist">
						<li><i class="fa fa-dollar"></i> <?php echo trim($row['price']);?></li>
						<li><i class="fa fa-clock-o"></i> <?php echo $row['opening_time'];//$time= date_getFullTimeDifference(trim($row['open']),trim($row['close']));echo $time['hours']." h : ".$time['minutes']." m";?> </li>
						<li><i class="fa fa-bolt"></i> level <?php echo trim($row['activity_level']);?></li>
						</ul>
						</div>
						</div>
						</div>
                        <?php 
                    		}
                    		
                    	} else {
                        ?>
                        <div class="ads_row">
						<div class="row">
						<p>There is no ad to show.</p>
						</div>
						</div>
						<?php }?>
                    </div>
                    <?php 
                    $url = "manage_ads.php";
                    $totalpages    		= ceil($totalrecords/$recordperpage);
				if($totalrecords>$recordperpage)
				{
				?>
			        <!-----------------------------	html for paging start here--------------------------->
					<div class="pagging">
					<ul>
					<li><a <?php if($pageno==1) { echo "class='disable'"; }?><?php if($pageno!=1) { ?>href='<?php echo $url."?pgno=1"; } ?>'>First</a></li>
					<li><a <?php if(!($pageno >= 2)) { echo "class='disable'"; }?><?php //if($pageno==1) echo "display:none"?> <?php  if($pageno >= 2) { ?>href='<?php echo $url."?pgno=".($pageno-1);  } ?>' >Prev</a></li>
					<?php 
					if($pageno==1)
					{
						$pagingstart=$pageno;
						$pagingend=$pageno+1;
					}
					else if($pageno==$totalpages)
					{
						$pagingstart=$pageno-1;
						$pagingend=$pageno;
					}
					else 
					{
						$pagingstart=$pageno-1;
						$pagingend=$pageno+1;
					}
					for($i=$pagingstart;$i<=$pagingend;$i++)
					{
					?>
						<li><a <?php if($i==$pageno){ ?>class=<?php echo 'active'/* 'paging' */; } else{?>class=<?php echo 'paging_inactive';}?> href='<?php echo $url."?pgno=".$i;?>'><?php echo $i;?></a></li>
					<?php 
					}
					?>
					<li><a <?php if(!($pageno <= ($totalpages-1))) { echo "class='disable'"; }?><?php //if($pageno==$totalpages) echo "display:none"?>" <?php  if($pageno <= ($totalpages-1)) { ?>href='<?php echo $url."?pgno=".($pageno+1);?>' <?php  } ?>>Next</a></li>
					<li><a <?php if($pageno == $totalpages) { echo "class='disable'"; } ?><?php if($pageno != $totalpages) { ?>href='<?php echo $url."?pgno=".$totalpages; ?>'<?php } ?>>Last</a></li>
					</ul>
		           
					</div>
					</div>
					<div class="clear"></div>
					</div>
		            <!-----------------------------	html for paging end here--------------------------->
		             <?php }?>
                </div>
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
