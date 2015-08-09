<?php
ini_set("display_errors",0);
require_once 'config/dbconnection.php';
db_open();

$search_query=trim($_POST['search_query']);
$datepicker = trim($_POST['datepicker']);
$ad_time = trim($_POST['ad_time']);
if(isset($_POST['search_advertisement']))
{
	$status = "error";
	$result = array();
	$condition = "";
	$country = " AU ";
	foreach( $_POST as $key => $value )
	{
		
		if(!is_array($value))
		{
			$$key = mysql_real_escape_string(trim($value));
		}
		else
		{
			$$key = $value;
		}
		
	}
	if(!empty($search_query))
	{
		$condition .= " and (a.heading LIKE '%".$search_query."%' OR a.short_description LIKE '%".$search_query."%') ";
	}
	if(!empty($ad_time))
	{
		$condition .= " and (at.open >= CAST('".$ad_time."' AS time) AND at.close <= CAST('".$ad_time."' AS time) )";
	}
	
	$query = " ";
	$having = " ";
	if( (!empty($check)) && (!empty($city) || !empty($state)) )
	{
		$address = str_replace(" ", "+", $city.",".$state.",".$country);

		$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false");
		$json = json_decode($json);
		$latitude = (!empty($json->{'results'})) ? $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'} : 0;
		$longitude = (!empty($json->{'results'})) ? $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'} : 0;
			
		$query = " , ( 3959 * acos( cos( radians($latitude) ) * cos( radians( a.latt ) )
		* cos( radians( a.longt ) - radians($longitude) ) + sin( radians($latitude) )
		* sin( radians( a.latt ) ) ) ) AS distance";
		
		$having = " HAVING distance <= '".($check*0.621371)."' ";
	}
	
	if(!empty($city) && empty($check))
	{
		$condition .= " and a.city = '".$city."' ";
	}
	if(!empty($state) && empty($check))
	{
		$condition .= " and a.state = '".$state."' ";
	}
	
	if(!empty($price_to))
	{
	
		$condition .= " and a.price BETWEEN '".$price_from."' and '".$price_to."' ";
	}
	
	
	$sql = " SELECT a.* ".$query." FROM tbl_advertisement as a LEFT JOIN ad_timing as at ON(a.id = at.ad_id) WHERE 1=1 ".$condition.$having;
	$query = mysql_query($sql) or die(mysql_error($sql));
	if($query)
	{
		if(mysql_num_rows($query) > 0)
		{
			$status = "success";
			while($fetch = mysql_fetch_assoc($query))
			{
				$result[] = $fetch;
			}
		}
		else
		{
			$status = "no_record";
		}
	}
	
	echo json_encode(array("status"=>$status,"result"=>$result));
}
?>

