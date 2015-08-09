<?php
require_once 'config/dbconnection.php';
db_open();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DoNow</title>

<link href="<?php echo $root;?>css/grid.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $root;?>css/style.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $root;?>css/owl.carousel.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $root;?>font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $root;?>fonts/fonts.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $root;?>css/slicknav.min.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $root;?>css/responsive.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $root;?>css/ion.rangeSlider.css" type="text/css" rel="stylesheet" />
<!-- autocomplete ui jquery -->
<link rel="stylesheet" href="css/jquery-ui.css">

<script type="text/javascript" src="<?php echo $root;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $root;?>js/global.js"></script>
<script type="text/javascript" src="<?php echo $root;?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $root;?>js/common.js"></script>
  <script src="<?php echo $root;?>js/jquery-ui.js"></script>
<!--   <script type="text/javascript" src="js/facebook_login.js"></script> -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->
  <style>
  label.error{
  color :#FF3333 !important;
  }
  </style>
<script>
  //$(function() {
    /*var availableTags = [
'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
    /* datepicker */
   /* $( "#datepicker" ).datepicker({
    	dateFormat: 'yy-mm-dd',
        onSelect: function (date) {
        //defined your own method here
        	search_ajax(date);
        }
        });*/
  //});
  </script>
</head>

<body>