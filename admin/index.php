<?php 
ini_set("display_errors", 0);
if(!isset($_SESSION))
{
	session_start();
}
require '../config/dbconnection.php';
db_open();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="css/bootstrap_global.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css' />
<link href="fonts/fonts.css" type="text/css" rel="stylesheet" />
<link href="../font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/png" href="<?php echo $root;?>images/favicon.png"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="../js/global.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
</head>
<style>
label.error{
color:red !important;
}
/*==================== LOGIN ====================*/
.LoginCont{display:table; margin:0 auto; position:relative; top:50%; margin-top:-200px;}
.LoginCont form{background:#111; width:450px; border-radius:5px; border:1px solid #191919; overflow:hidden; position:relative; box-shadow:0 5px 10px 5px rgba(0,0,0,0.3);}
.LoginCont form:after{content:""; display:block; position:absolute; height:1px; width:100px; left:20%; background:linear-gradient(left, #111, #444, #b6b6b8, #444, #111); top:0;}
.LoginCont form:before{content:""; display:block; position:absolute; width:8px; height:5px; border-radius:50%; left:34%; top:-7px; box-shadow: 0 0 6px 4px #fff;}
.LoginCont .inset{padding:20px; border-top:1px solid #19191a;}
.LoginCont form h1{font-size:24px; text-shadow:0 1px 0 black; text-align:center; padding:15px 0; border-bottom:1px solid rgba(0,0,0,1); position:relative; color:#ffffff; font-family:'Raleway'; text-transform:uppercase;}
.LoginCont form h1:after{content:""; display:block; width:250px; height:100px; position:absolute; top:0; left:50px; pointer-events:none; transform:rotate(70deg); -webkit-transform: rotate(70deg); background:linear-gradient(50deg, rgba(255,255,255,0.15), rgba(0,0,0,0)); background-image: -webkit-linear-gradient(50deg, rgba(255,255,255,0.05), rgba(0,0,0,0));}
.LoginCont label{color:#666; display:block; padding-bottom:9px; font-family:'latobold'; color:#ffffff; font-size:15px;}
.LoginCont input[type=text], .LoginCont input[type=password]{width:100%; padding:10px 10px; background-color:#ededed; border:1px solid #222; box-shadow:0 1px 0 rgba(255,255,255,0.1); border-radius:3px; margin-bottom:20px; height:auto; color:#333333; font-size:16px;}
.LoginCont input[type=text]:focus, .LoginCont input[type=password]:focus {border-color: #66afe9; outline: 0; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6); box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6); outline:none;}
.LoginCont input[type=checkbox]{display:inline-block; vertical-align:top;}
.LoginCont .p-container{padding:0 20px 20px 20px;}
.LoginCont .p-container:after{clear:both; display:table; content:"";}
.LoginCont .p-container .frgtLink{display:block; float:left; color:#289dcc; padding-top:8px;}
.LoginCont input[type=submit]{padding:7px 20px; border:1px solid rgba(0,0,0,0.4); text-shadow:0 -1px 0 rgba(0,0,0,0.4); box-shadow:inset 0 1px 0 rgba(255,255,255,0.3), inset 0 10px 10px rgba(255,255,255,0.1); border-radius:0.3em; background:#0184ff; color:white; float:right; cursor:pointer; font-size:16px; text-transform:uppercase; font-family:'latoregular';}
.LoginCont input[type=submit]:hover{box-shadow:inset 0 1px 0 rgba(255,255,255,0.3),inset 0 -10px 10px rgba(255,255,255,0.1);}
/*----------- CUSTOM CHECK BOX -----------*/
input[type=checkbox].css-checkbox{position:absolute; z-index:-1000; left:-1000px; overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;}
input[type=checkbox].css-checkbox + label.css-label, input[type=checkbox].css-checkbox + label.css-label.clr{padding-left:30px; height:20px; display:inline-block; line-height:20px; background-repeat:no-repeat; background-position: 0 0;vertical-align:middle; cursor:pointer;}
input[type=checkbox].css-checkbox:checked + label.css-label, input[type=checkbox].css-checkbox + label.css-label.chk{background-position: 0 -20px;}
label.css-label{background-image:url(../images/custom_checkbox_img.png); -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;}
/*----------- CUSTOM CHECK BOX -----------*/
/*==================== LOGIN ====================*/
</style>
<body style="background-color:rgba(40, 157, 204, 0.4);">

<div class="LoginCont">
 <div id="error">
                    </div>
    <form action="javascript:void(0);" name="admin_login" id="admin_login" method="POST">
      <h1>Admin Login</h1>
      <div class="inset">
      <div class="form-group">
        <label for="email">EMAIL ADDRESS</label>
        <input type="text" name="email" id="email" class="form-control" />
      </div>
      <div class="form-group">
        <label for="password">PASSWORD</label>
        <input type="password" name="password" id="password" class="form-control" />
      </div>
      <!-- <div class="form-group">
      	<input type="checkbox" name="checkboxG4" id="checkboxG4" class="css-checkbox" />
      	<label for="checkboxG4" class="css-label radGroup1">Remember me</label>
      </div> -->
      </div>
       <input type="hidden" name="action" value="admin_login" class="form-control" />
      <div class="p-container">
        <a href="<?php echo $adminRoot;?>forgot_password.php" class="frgtLink">Forgot password? </a>
        <input type="submit" name="login" id="login" value="Log in">
      </div>
    </form>
</div>

</body>
</html>
