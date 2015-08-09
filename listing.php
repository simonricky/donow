<?php
require_once 'config/dbconnection.php';
db_open();

print_r($_POST);

$search_query=trim($_POST['search_query']);
$datepicker = trim($_POST['datepicker']);
$ad_time = trim($_POST['ad_time']);
?>

