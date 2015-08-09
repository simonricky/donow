<?php
global $root, $con,$adminRoot ,$date;

//local database configuration ////////////
$DB_HOST     = 'localhost';
$DB_DATABASE = 'benjamin';
$DB_USER     = 'root';
$DB_PASSWORD = '';
$root        = "http://localhost/donow/"; 
$adminRoot	 = "http://localhost/donow/admin/";
$adminRecordsPerPage = 10;
$defaultProfileImage = "defaultavtar.jpg";
date_default_timezone_set('Australia/Melbourne');
$date = date("Y-m-d H:i:s");


?>