<?php 
require_once 'phpInclude/functions.php';
if(!isset($_SESSION))
{
 //session_start();		
}
if (!isset($_SESSION['db_session_id']) && $_SESSION['db_session_id']=="")
{
	header("Location:index.php#login");
}
 //print_r($_SESSION);
 require_once 'phpInclude/header.php';
?>
<script type="text/javascript">
 
var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      var out_two = document.getElementById('out_two');
      output.src = reader.result;
      out_two.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  
  function Warn() {
      alert ("Please complete your business profile first ");
      //document.write ("This is a warning message!");
   }
	</script>
	<style>
	fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
   width:inherit; /* Or auto */
    padding:16px 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
}
	</style>
<?php 
$field = " count(id) as num , id ,buiseness_name ,contact_no , australian_buis_num ,state ,city ,country ,logo,address	";
$table = " buiseness ";
$condition 	= "and user_id ='".$_SESSION['db_session_id']."' and status='Active' ";
$user_detail = getDetail($field,$table,$condition);//print_r($user_detail);
/* if( $user_detail[0]['num'] > 0)
{ */
  //print_r($data);
  if (isset($user_detail[0]['logo']) && $user_detail[0]['logo']!="")
  {
  	$image="profile/".trim($user_detail[0]['logo']);
  } else 
  {
  	$image="images/logo.png";
  }
//}
  ?>
<section class="container-fluid headersection hidden-xs"><!-- INNER HEADER -->
	<a href="javascript:void(0);" class="visible-xs donow_moblogo"><img src="images/donow.png" alt="donow" class="img-responsive" /></a>
	<div class="row">
    	<div class="col-xs-12">
        	<header>
                <a href="<?php echo $root;?>" class="logo"><img src="images/donow_lg.png" alt="DoNow" class="img-responsive" /></a>
                <a href="javascript:void(0);" class="navtoggle hidden-xs"><span></span><span></span><span></span></a>
                <ul class="leftnav" id="menu">
                    <li style="display:none;"><a href="javascript:void(0);" data-toggle="modal" data-target="#accountpopup" class="loginlink"><i class="fa fa-key"></i> Login</a></li>
                    <li style="display:none;"><a href="javascript:void(0);" data-toggle="modal" data-target="#accountpopup" class="signuplink"><i class="fa fa-lock"></i> Signup</a></li>
                    <li style="display:block;">
                    	<div class="usrpro_head">
                        	<a href="javascript:void(0);"><h6><?php if (isset($data['fname'])){echo ucfirst($data['fname'])." ".$data['lname'];}?> <i class="fa fa-angle-down"></i></h6>
                            <span class="userimg"><img src="<?php echo $image;?>" class="img-responsive" alt="user" /></span></a>
                            <ul class="usr_drop">
                            	<li><a href="user_profile.php">Account Setting</a></li>
                            	<li><a href="business_profile.php">Business Setting</a></li>
                            	<li><a href="search.php">Search Ad</a></li>
                            	<?php if( $user_detail[0]['num'] > 0 && !empty($user_detail[0]['buiseness_name']) && !empty($user_detail[0]['australian_buis_num']) && !empty($user_detail[0]['address']) && !empty($user_detail[0]['contact_no'])){?>
                            	<li><a href="admin/upload_business_ad.php">Upload Ads</a></li>
                            	<?php } else {?>
                            	<li><a href="javascript:void(0);" onclick="Warn();" >Upload Ads</a></li>
                            	<?php }?>
                                <li><a href="handler.php?method=<?php echo base64_encode("logout");?>">Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
    </div>
</section><!-- INNER HEADER -->

<section class="UserProSection">
	<div class="container">
    	<div class="row">
        	<div class="col-xs-12 col-sm-4 col-md-3">
            	<div class="UserInfo">
                	<span class="usrimgcont"><img src="<?php echo $image;?>" alt="user" class="responsiveimg" id="out_two"/></span>
                    <h6><?php if (isset($data['fname'])){echo ucfirst($data['fname'])." ".$data['lname'];}?></h6>
                    <ul>
                    	<!-- <li><a href="javascript:void(0);" class="active"><i class="fa fa-gear"></i>  Account Setting</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9">
            	<div class="container_from">
                	<div class="row tabhead">
                    	<div class="col-xs-12 col-sm-5">
                        	<h5>Business Setting</h5>
                        </div>
                        <div class="col-xs-12 col-sm-7">
                        	<ul>
                            	<!-- <li><a href="javascript:void(0);" id="personal_info_tab">Change Password</a></li> -->
                                <li><a href="javascript:void(0);" class="active"  id="change_pass_tab">Business Info</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-12">
                    	<div id="errors"></div>
                        	<form style="display:block;" id="buiseness_info"  enctype="multipart/form-data">
                            	<div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Business Name</label>
                                            <input type="text" placeholder="Enter Business Name" class="form-control" name="buis_name" value="<?php  if( $user_detail[0]['num'] > 0){echo $user_detail[0]['buiseness_name']; }?>"/>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" placeholder="Enter Contact Number" class="form-control" name="contact" value="<?php  if( $user_detail[0]['num'] > 0){echo $user_detail[0]['contact_no']; }?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" placeholder="Enter Business address" class="form-control" name="address" value="<?php  if( $user_detail[0]['num'] > 0){echo $user_detail[0]['address']; }?>"/>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                    	<div class="form-group">
                                            <label>City</label>
                                            <input type="text" placeholder="Enter City" class="form-control" name="city" value="<?php  if( $user_detail[0]['num'] > 0){echo $user_detail[0]['city']; }?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <select class="form-control custom-select search_filter" id="state" name="state">
											<option value="">Select State</option>
												<?php
												$sql = mysql_query("Select * from states ORDER BY  state ASC");
												while($res = mysql_fetch_assoc($sql) ){
												if( $user_detail[0]['num'] > 0 && $user_detail[0]['state']==trim($res['code']))
													{
														$selected = 'selected="selected"';
													}else
													{
														$selected = ' ';
													}
												?>
											<option value="<?php echo $res['code'];?>" <?php echo $selected;?>><?php echo $res['state'];?></option>
											<?php  } ?>
										</select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                    	<div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control custom-select" name="country">
													<option value="">Select Country</option>
														<?php
														$sql = mysql_query("Select * from country ORDER BY  country_name ASC");
														while($res = mysql_fetch_assoc($sql) ){
														if( $user_detail[0]['num'] > 0 && $user_detail[0]['country']==trim($res['country_code']))
														{
															$selected = 'selected="selected"';
														}
														else if(trim($res['country_name'])=="Australia")
														{
														$selected = 'selected="selected"';
														}
														else 
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
                                <div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label>ABN</label>
                                            <input type="text" placeholder="Enter Australian Business Number" class="form-control" name="abn" value="<?php  if( $user_detail[0]['num'] > 0){echo $user_detail[0]['australian_buis_num']; }?>"/>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- opening and closing time -->
                                <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Business opening and closing time</legend>
                                <?php 
                                /* if( $user_detail[0]['num'] > 0 )
                                { */
                                	/* $field = " * ";
                                	$table = " ad_timing ";
                                	$condition 	= " and buiseness_id ='".$user_detail[0]['id']."'  ";
                                	$time_detail = getDetail($field,$table,$condition); */
                                	$time_detail_query = mysql_query (" Select * from  ad_timing WHERE buiseness_id ='".$user_detail[0]['id']."'" );
                                	 $num=mysql_num_rows($time_detail_query);
                                	 if ($num!=0){
                                	while ($time_detail = mysql_fetch_assoc($time_detail_query))
                                	{
                                		/* echo "<pre>";
                                		 print_r($time_detail); */
                                		 ?>
                                		 <div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                         	<label><?php echo ucfirst($time_detail['day']);?></label>
                                           <select class="form-control custom-select" name="open[]">
												<option value="">Open</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {
												if($time_detail['open']== date('H:i',$halfhour).":00")
												{
													$selected = 'selected="selected"';
												}else
												{
													$selected = ' ';
												}
													?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                    	<div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <select class="form-control custom-select" name="close[]">
												<option value="">Close</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {
													if($time_detail['close']== date('H:i',$halfhour).":00")
													{
														$selected = 'selected="selected"';
													}else
													{
														$selected = ' ';
													}
													?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select>
                                        </div>
                                    </div>
                                    <input  type="hidden" name="days[]"  value="<?php echo $time_detail['day'];?>">
                                </div>
                                <?php 		 
                                	}
                                }
                                else {
                                ?>
                                <div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                         	<label>Sunday</label>
                                           <select class="form-control custom-select" name="open[]">
												<option value="">Open</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                    	<div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <select class="form-control custom-select" name="close[]">
												<option value="">Close</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select>
                                        </div>
                                    </div>
                                    <input  type="hidden" name="days[]"  value="sunday">
                                </div>
								<div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                         	<label>Monday</label>
                                           <select class="form-control custom-select" name="open[]">
												<option value="">Open</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                    	<div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <select class="form-control custom-select" name="close[]">
												<option value="">Close</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select>
                                        </div>
                                    </div>
                                    <input  type="hidden" name="days[]"  value="monday">
                                </div>
                                <div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                         	<label>Tuesday</label>
                                           <select class="form-control custom-select" name="open[]">
												<option value="">Open</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                    	<div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <select class="form-control custom-select" name="close[]">
												<option value="">Close</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select>
                                        </div>
                                    </div>
                                    <input  type="hidden" name="days[]"  value="tuesday">
                                </div>
                                <div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                         	<label>Wednesday</label>
                                           <select class="form-control custom-select" name="open[]">
												<option value="">Open</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                    	<div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <select class="form-control custom-select" name="close[]">
												<option value="">Close</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select>
                                        </div>
                                    </div>
                                    <input  type="hidden" name="days[]"  value="wednesday">
                                </div>
								<div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                         	<label>Thursday</label>
                                           <select class="form-control custom-select" name="open[]">
												<option value="">Open</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                    	<div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <select class="form-control custom-select" name="close[]">
												<option value="">Close</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select>
                                        </div>
                                    </div>
                                    <input  type="hidden" name="days[]"  value="thursday">
                                </div>
                                <div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                         	<label>Friday</label>
                                           <select class="form-control custom-select" name="open[]">
												<option value="">Open</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                    	<div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <select class="form-control custom-select" name="close[]">
												<option value="">Close</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select>
                                        </div>
                                    </div>
                                    <input  type="hidden" name="days[]"  value="friday">
                                </div>
                                <div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                         	<label>Saturday</label>
                                           <select class="form-control custom-select" name="open[]">
												<option value="">Open</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                    	<div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <select class="form-control custom-select" name="close[]">
												<option value="">Close</option>
												<?php
												$start=strtotime('00:00');
												$end=strtotime('23:30');
												for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {?>
												<option value="<?php echo date('H:i',$halfhour);?>" <?php echo $selected;?>><?php echo date('H:i',$halfhour);?></option>	   
												<?php }?>
											</select>
                                        </div>
                                    </div>
                                    <input  type="hidden" name="days[]"  value="saturday">
                                </div>
                                <?php } ?>
								</fieldset>
								<!-- opening and closing time code ends here -->
                                <div class="row">
                                	<div class="col-xs-12 col-sm-6">
                                        <div class="form-group ImgUpldOtr">
                                            <label>User Picture</label>
                                            <div class="img_prev"><img id="output" src="<?php echo $image;?>"/></div>
                                            <span class="CustomUpload">
                                                <input type="file"  onchange="loadFile(event)" class="responsiveimg" name="profile_pic"/>
                                                <span>Select Image</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-xs-12">
                                    	<div class="form-group">
                                    	<input type="hidden" name="user_id" value="<?php if (isset($_SESSION['db_session_id'])){echo $_SESSION['db_session_id'];}?>">
                                    	<input type="hidden" name="db_image" value="<?php  if( $user_detail[0]['num'] > 0){echo $user_detail[0]['logo']; }?>">
                                    	<input type="hidden" name="action" value="buiseness_profile" />
                                    	<input type="hidden" name="business_id" value="<?php  if( $user_detail[0]['num'] > 0){echo $user_detail[0]['id']; }?>"/>
                                 			<input type="submit" class="btn submitbtn" value="Save Changes"  />
                                            <input type="submit" class="btn cancelbtn" value="Cancel" />
                                        </div>
                                    </div>
                                </div>
                        	</form>
                            
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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
		$("label[for='state']").remove();
		var selectedOption = $(this).find(":selected").text();
		$(this).next(".holder").text(selectedOption);
	}).trigger('change');
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



// MOBILE LOGO APPEND //
$(document).ready(function(e) {
    $('.donow_moblogo').appendTo('.slicknav_menu');
	$('.headersection .navtoggle').click(function(){
		$(this).next().fadeToggle();
	})
	$('#change_pass_tab').click(function(){
		$('#personal_info_tab').removeClass('active');
		$(this).addClass('active');
		$('#personal_info').show();
		$('#password_info').hide();
	});
	$('#personal_info_tab').click(function(){
		$('#change_pass_tab').removeClass('active');
		$(this).addClass('active');
		$('#password_info').show();
		$('#personal_info').hide();
	});
});

// PRICE RANGE SLIDER //
$("#range_03").ionRangeSlider({
    type: "double",
    grid: false,
    min: 0,
    max: 1000,
    from: 0,
    to: 1000,
    prefix: "$"
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
