<?php
require_once '../config/dbconnection.php';
db_open();
require_once '../phpInclude/functions.php';

/*add advertisement */
 if(isset($_POST['action']) && $_POST['action']=="upload_ad")
{
          //print_r($_POST);print_r($_FILES);die;
	$title 					= mysql_real_escape_string(trim($_POST['title']));
	$short_description      = mysql_real_escape_string(trim($_POST['short_description']));
	$location   			= mysql_real_escape_string(trim($_POST['location']));
	$city   				= mysql_real_escape_string(trim($_POST['city']));
	$state   				= mysql_real_escape_string(trim($_POST['state']));
	$country   				= mysql_real_escape_string(trim($_POST['country']));
	$long_description  		= mysql_real_escape_string(trim($_POST['long_description']));
	$time_start 			= mysql_real_escape_string(trim($_POST['time_start']));
	$end_time      			= mysql_real_escape_string(trim($_POST['end_time']));
	$price   				= mysql_real_escape_string(trim($_POST['price']));
	$activity_level   		= mysql_real_escape_string(trim($_POST['select_level']));
	/* file processing code starts here*/
	if(isset($_FILES["photoimg"]["name"]) && $_FILES["photoimg"]["name"]!="")
	{
		ini_set('date.timezone', 'America/Denver');
		$now = date('Y-m-d-His');
		
		$image_name = trim($_FILES["photoimg"]["name"]);
		$image_name =$now."_".str_replace(" ","_",$image_name);
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["photoimg"]["name"]);
		$file_extension = end($temporary);
		if ((($_FILES["photoimg"]["type"] == "image/png") || ($_FILES["photoimg"]["type"] == "image/jpg") || ($_FILES["photoimg"]["type"] == "image/jpeg")
		) && ($_FILES["photoimg"]["size"] < 100000)//Approx. 100kb files can be uploaded.
				&& in_array($file_extension, $validextensions)) {
			if ($_FILES["photoimg"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["photoimg"]["error"] . "<br/><br/>";
			}
			else
			{
				if (file_exists("uploads/" . $image_name)) {
					echo $_FILES["photoimg"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
				}
				else
				{
					$sourcePath = $_FILES['photoimg']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "uploads/".$image_name; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					//echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
					
				}
			}
		}
		else
		{
			echo "invalid_file";
		}
	}
	/* file processing code end here*/
	$map_address = $location.",".$city.",".$state.",".$country;
	$lat_long = Get_LatLng_From_Google_Maps($map_address) ;
	
	$add_user = "Insert into tbl_advertisement set heading='".$title."' ,short_description='".$short_description."' ,price='".$price."' ,image='".$image_name."' ,";
    $add_user .=" long_description='".$long_description."' ,address='".$location."' ,created_at='".$date."' ,user_id='0' , ";
    $add_user .=" city='".$city."',state='".$state."' ,country='".$country."' ,latt='".$lat_long['lat']."' ,longt='".$lat_long['lng']."',activity_level='".$activity_level."' ";
	
	$mysql_user = mysql_query($add_user) or die(mysql_error());
	if ($mysql_user)
	{
		
		$id=mysql_insert_id();
		
		/*Insert advertise opening and closing timing with particular day*/
		
			$ad_time="INSERT into ad_timing set ad_id='".trim($id)."' ,open='".$time_start."' ,close='".$end_time."' ";
			$mysql_time = mysql_query($ad_time) or die(mysql_error());
			if($mysql_time)
			{
				echo "success";
			} else
			{
				echo "error";
			}
		
		
		
	} else 
	{
		echo "error";
	}
		
}

