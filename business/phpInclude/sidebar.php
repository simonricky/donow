<?php 
 $pagename = basename($_SERVER['PHP_SELF']);

?>
<div class="sidebar"><!-- FIXED SIDEBAR -->
    	<h5>Overview</h5>
        <ul class="navigation">
        	<li><a href="<?php echo $adminRoot;?>dashboard.php" <?php if ($pagename=="dashboard.php"){ echo 'class="active"'; }?>><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="<?php echo $adminRoot;?>upload_business_ad.php" <?php if ($pagename=="upload_business_ad.php"){ echo 'class="active"'; }?>><i class="fa fa-cloud-upload"></i> <span>Upload ad</span> </a></li>
            <li><a href="<?php echo $adminRoot;?>manage_ads.php" <?php if ($pagename=="manage_ads.php"){ echo 'class="active"'; }?>><i class="fa fa-gears"></i> <span>Manage ads</span> </a></li>
            <li><a href="<?php echo $root;?>business_profile.php"><i class="fa fa-briefcase"></i> <span>Business setting</span></a></li>
            <li><a href="<?php echo $root;?>search.php"><i class="fa fa-search"></i> <span>Search Ad</span></a></li>
        </ul>
    </div>