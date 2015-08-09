<?php
require_once 'config/dbconnection.php';
db_open();
require_once 'phpInclude/functions.php';

/*add advertisement */
 if(isset($_POST['action']) && $_POST['action']=="register")
{
         // print_r($_POST);//die;
	$full_name = mysql_real_escape_string(trim($_POST['full_name']));
	$date_birth      = mysql_real_escape_string(trim($_POST['date_birth']));
	$password   = mysql_real_escape_string(trim($_POST['password']));
	$email   = mysql_real_escape_string(trim($_POST['email_address']));
	
	$condition = " email='".$email."' ";
	$check_user = getUserDetail($condition);
	if( mysql_num_rows($check_user) == 0)
	{
	$add_user = "Insert into users set username='".$full_name."' ,password='".$password."' ,";
	$add_user .=" birth_date='".$date_birth."',email='".$email."' ,created='".$date."',login_type='static' ";
	$mysql_user = mysql_query($add_user);
	if ($mysql_user)
	{
		$_SESSION['db_session_id']=mysql_insert_id();
		
		echo "success";
	} else 
	{
		echo "error";
	}
	}else
	{
	echo "exists";
	}
		
}

/*login*/
if(isset($_POST['action']) && $_POST['action']=="login")
{
	$email      = mysql_real_escape_string(trim($_POST['email']));
	$password   = mysql_real_escape_string(trim($_POST['password']));

	$condition = " email='".$email."'   and password = '".$password."' "; //and is_admin='no'


	/* check if email id is alreadye exists or not */
	$user   = getUserDetail($condition);
	if(mysql_num_rows($user)==1)
	{
		$res = mysql_fetch_assoc($user);
		$_SESSION['db_session_id'] = $res['id'];
		$_SESSION['username'] = $res['username'];
		$_SESSION['user_email'] = $res['email'];
		echo "success";
	}
	else
	{
		echo "not_found";
	}
}
/* send link */
/*fb login*/
if(isset($_POST['action']) && $_POST['action']=="fblogin")
{
	$data = json_decode($_POST['response'], true);print_r($data);
	$location= $pieces = explode(",", $data['location']['name']);
	$login_type="facebook";
	$profile_pic = "http://graph.facebook.com/".$data['id']."/picture?type=large";
	$condition 		 = " email = '".$data['email']."' ";
	$checkUserExists = UserExists($condition);
	if($checkUserExists['count'] == 0)									//SIGN UP
	{
		$fb_login="Insert into users set login_type='".mysql_real_escape_string(strip_tags(trim($login_type)))."',profile_image_url='".trim($profile_pic)."' ,";
		$fb_login .= "social_id='".mysql_real_escape_string(strip_tags(trim($data['id'])))."' ,username='".mysql_real_escape_string(strip_tags(trim($data['first_name'])))."' ,";
		$fb_login .= "fname='".mysql_real_escape_string(strip_tags(trim($data['first_name'])))."',lname='".mysql_real_escape_string(strip_tags(trim($data['last_name'])))."' ,";
		$fb_login .= "email='".mysql_real_escape_string(strip_tags(trim($data['email'])))."' ,birth_date='".mysql_real_escape_string( strip_tags(trim($data['birthday'])))."',";
		$fb_login .= "gender='".mysql_real_escape_string(strip_tags(trim($data['gender'])))."' ,city='".mysql_real_escape_string(strip_tags(trim($location[0])))."',";
		echo $fb_login .= "last_login=now() ";die;
		$mysql=mysql_query($fb_login) or die(mysql_error());
		if($mysql)
		{
			$id=mysql_insert_id();
			$_SESSION['message']['user_login'] = "succesfuly Login";
			$_SESSION['LoginUserId'] = $id;
			echo "success";
		}
		else
		{
			echo "error";
		}
	}
	else
	{
		$condition = " email = '".$data['email']."'";
		$user_login = userExists($condition);
		$_SESSION['message']['user_login'] = "succesfuly Login";
		$_SESSION['LoginUserId'] = $user_login['id'];
		lastVisit($user_login['id']);
		echo "success";
	}

}

/*change password*/
if(isset($_POST['change_pass']) && $_POST['change_pass']=="change_password")
{
	$current_pass      = mysql_real_escape_string(trim($_POST['current_pass']));
	$new_pass   = mysql_real_escape_string(trim($_POST['new_pass']));
	$user_id   = mysql_real_escape_string(trim($_POST['user_id']));

	$condition = " id='".$user_id."'   and password = '".$current_pass."' "; //and is_admin='no'


	/* check if email id is alreadye exists or not */
	$user   = getUserDetail($condition);
	if(mysql_num_rows($user)==1)
	{
		$update_pass = mysql_query("UPDATE users set password='".$new_pass."' WHERE id='".$user_id."' ");
		if($update_pass)
		{
		echo "success";
		}
		else
		{
			echo "error";
		}
	}else 
	{
		echo "wrong_pass";
	}
	
}

/*update profile*/
if(isset($_POST['action']) && $_POST['action']=="update_profile")
{
//print_r($_POST);print_r($_FILES);die;
	$first_name      = mysql_real_escape_string(trim($_POST['first_name']));
	$last_name   = mysql_real_escape_string(trim($_POST['last_name']));
	$interest   = mysql_real_escape_string(trim($_POST['interest']));
	$mobile   = mysql_real_escape_string(trim($_POST['mobile']));
	$user_id   = mysql_real_escape_string(trim($_POST['user_id']));
	/* file processing code starts here*/
	if(isset($_FILES["profile_pic"]["name"]) && $_FILES["profile_pic"]["name"]!="")
	{
		$image_name = trim($_FILES["profile_pic"]["name"]);
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["profile_pic"]["name"]);
		$file_extension = end($temporary);
		if ((($_FILES["profile_pic"]["type"] == "image/png") || ($_FILES["profile_pic"]["type"] == "image/jpg") || ($_FILES["profile_pic"]["type"] == "image/jpeg")
		) && ($_FILES["profile_pic"]["size"] < 100000)//Approx. 100kb files can be uploaded.
				&& in_array($file_extension, $validextensions)) {
			if ($_FILES["profile_pic"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["profile_pic"]["error"] . "<br/><br/>";
			}
			else
			{
				if (file_exists("profile/" . $_FILES["profile_pic"]["name"])) {
					echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
				}
				else
				{
					$sourcePath = $_FILES['profile_pic']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "profile/".$_FILES['profile_pic']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					//echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
					
				}
			}
		}
		else
		{
			echo "invalid_file";
		}
	} else if(isset($_POST['db_image']) && $_POST['db_image']!="")
	{
		$image_name=trim($_POST['db_image']);
	}
	/* file processing code end here*/
	$update_profile = mysql_query("UPDATE users set fname='".$first_name."',lname='".$last_name."',interest='".$interest."' ,phone='".$mobile."',profile_image_url='".$image_name."' WHERE id='".$user_id."' ");
	if($update_profile)
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
}
///////////user logout///////////////////
 if(isset($_GET['method']) && $_GET['method']==base64_encode("logout"))
{
	if(isset($_SESSION))
	{
		unset($_SESSION['id']);
	}
	$_SESSION['msg'] = "success";
	?>
		<script>
		window.location.href="index.php";
		</script>
	<?php 
}