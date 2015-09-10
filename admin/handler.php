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
	//$end_time      			= mysql_real_escape_string(trim($_POST['end_time']));
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
		) //&& ($_FILES["photoimg"]["size"] < 100000)//Approx. 100kb files can be uploaded.
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
    $add_user .=" long_description='".$long_description."' ,address='".$location."' ,created_at='".$date."' ,user_id='0' ,opening_time='".$time_start."', ";
    $add_user .=" city='".$city."',state='".$state."' ,country='".$country."' ,latt='".$lat_long['lat']."' ,longt='".$lat_long['lng']."',activity_level='".$activity_level."' ";
	
	$mysql_user = mysql_query($add_user) or die(mysql_error());
	if ($mysql_user)
	{
		
		$id=mysql_insert_id();
		
		/*Insert advertise opening and closing timing with particular day*/
		
			/* $ad_time="INSERT into ad_timing set ad_id='".trim($id)."' ,open='".$time_start."'  ";
			$mysql_time = mysql_query($ad_time) or die(mysql_error());
			if($mysql_time)
			{
				echo "success";
			} else
			{
				echo "error";
			} */
		echo "success";
		
		
	} else 
	{
		echo "error";
	}
		
}
/* delete user */
if (isset($_POST['action']) && $_POST['action']=="delete_ad")
{
	$ad_id=trim($_POST['addId']);
	$sql = "Delete from tbl_advertisement where id='".$ad_id."' ";
	$query = mysql_query($sql) or die(mysql_error());
	if ($query)
	{
		echo "success";
	}else {
		echo "error";
	}
}
/* delete Business */
if (isset($_POST['action']) && $_POST['action']=="delete_bus")
{
	$ad_id=trim($_POST['addId']);
	$sql = "Update buiseness set status='Inactive' where id='".$ad_id."' ";
	$query = mysql_query($sql) or die(mysql_error());
	if ($query)
	{
		echo "success";
	}else {
		echo "error";
	}
}
/* delete user */
if (isset($_POST['del_action']) && $_POST['del_action']=="delete_user")
{
	$user_id=trim($_POST['userId']);
	$sql = "Delete from users where id='".$user_id."' ";
	$query = mysql_query($sql) or die(mysql_error());
	if ($query)
	{
		echo "success";
	}else {
		echo "error";
	}
}
/*admin login  */
if(isset($_POST['action']) && $_POST['action'] == 'admin_login')
{

	$email    = trim($_POST["email"]);
	$password = trim($_POST["password"]);
	/*****function for admin login ******/
	$condition = "  email='".$email."'   and password = '".$password."'  and is_admin='yes' ";
	$mysql = getUserDetail($condition);
	$count = mysql_num_rows($mysql);

	$data = mysql_fetch_assoc($mysql);


	if($count > 0)
	{



		$_SESSION['msg']="success";
		$_SESSION['admin_id']=$data['id'];

		$_SESSION['admin_session_id'] 	= $data['id'];
		$_SESSION['username'] 		= $data['username'];
		$_SESSION['user_email'] 	= $data['email'];
		$_SESSION['test'] = 'test';
		//print_r($_SESSION);die;
		echo "success";
	}
	else
	{
		$_SESSION['msg']= "failed";
		echo "error";

	}
	exit();die();
}
///////////user logout///////////////////
else if(isset($_GET['method']) && $_GET['method']==base64_encode("logout"))
{
	if(isset($_SESSION))
	{
		unset($_SESSION['db_session_id']);
	}
	?>
			<script>
			window.location.href="<?php echo $root;?>";
			</script>
		<?php 

}
/* delete user */
if (isset($_POST['action']) && $_POST['action']=="getDetail")
{
	$addId=trim($_POST['addId']);
	/*  getting current location*/
	$loc_info = file_get_contents("http://ipinfo.io/{$_SERVER['REMOTE_ADDR']}");
	$res = json_decode($loc_info);
	$srr = explode("," ,$res->loc);
	$latitude  = $srr[0];
	$longitude = $srr[1];
	$query = " , ( 3959 * acos( cos( radians($latitude) ) * cos( radians( a.latt ) )
	* cos( radians( a.longt ) - radians($longitude) ) + sin( radians($latitude) )
	* sin( radians( a.latt ) ) ) ) AS distance";
	/* getting distance */
	//$having = " HAVING distance <= '".($check*0.621371)."' ";
    $sql = " SELECT  a.* ".$query." , at.open as open_time,at.close as close_time  FROM tbl_advertisement as a LEFT JOIN ad_timing as at ON(a.id = at.ad_id) WHERE 1=1 AND a.id='".$addId."'  GROUP BY a.id ";
	$query = mysql_query($sql) or die(mysql_error($sql));
	if($query)
	{
		if(mysql_num_rows($query) > 0)
		{
			$status = "success";
			$fetch = mysql_fetch_assoc($query);
			$result[] = $fetch;
		}
		else
		{
			$status = "no_record";
		}
	}
	echo json_encode(array("status"=>$status,"result"=>$result));
}
/*update advertisement */
if(isset($_POST['action']) && $_POST['action']=="update_ad")
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
	//$end_time      			= mysql_real_escape_string(trim($_POST['end_time']));
	$price   				= mysql_real_escape_string(trim($_POST['price']));
	$activity_level   		= mysql_real_escape_string(trim($_POST['select_level']));
	$add_id   		= mysql_real_escape_string(trim($_POST['add_id']));
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
		) //&& ($_FILES["photoimg"]["size"] < 100000)//Approx. 100kb files can be uploaded.
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
	} else {
		$image_name = mysql_real_escape_string(trim($_POST['image']));
	}
	/* file processing code end here*/
	$map_address = $location.",".$city.",".$state.",".$country;
	$lat_long = Get_LatLng_From_Google_Maps($map_address) ;

	$add_user = "Update tbl_advertisement set heading='".$title."' ,short_description='".$short_description."' ,price='".$price."' ,image='".$image_name."' ,";
	$add_user .=" long_description='".$long_description."' ,address='".$location."' ,created_at='".$date."' ,user_id='0' ,opening_time='".$time_start."', ";
	$add_user .=" city='".$city."',state='".$state."' ,country='".$country."' ,latt='".$lat_long['lat']."' ,longt='".$lat_long['lng']."',activity_level='".$activity_level."' WHERE id='".$add_id."' ";

	$mysql_user = mysql_query($add_user) or die(mysql_error());
	if ($mysql_user)
	{

		//$id=mysql_insert_id();

		/*Insert advertise opening and closing timing with particular day*/

		/* $ad_time="Update ad_timing set open='".$time_start."'  WHERE ad_id='".trim($add_id)."' ";
		$mysql_time = mysql_query($ad_time) or die(mysql_error());
		if($mysql_time)
		{
			echo "success";
		} else
		{
			echo "error";
		} */

		echo "success";

	} else
	{
		echo "error";
	}

}