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
	
	$recordperpage = 5;
	$pageno        		= isset($_POST['pgno'])?$_POST['pgno']:'1';
	$start         		= (($pageno)-1)*$recordperpage;
	$limit 				= " LIMIT ".$start.", ".$recordperpage;
	
	$sql = " SELECT SQL_CALC_FOUND_ROWS  a.* ".$query." FROM tbl_advertisement as a LEFT JOIN ad_timing as at ON(a.id = at.ad_id) WHERE 1=1 ".$condition.$having." GROUP BY a.id ".$limit;
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
	
	$trecords 		= mysql_fetch_assoc(mysql_query("SELECT FOUND_ROWS()"));
	
	$totalrecords = $trecords['FOUND_ROWS()'];
	
	$totalpages    		= ceil($totalrecords/$recordperpage);
	$disp_total = (($pageno*$recordperpage)<$totalrecords)?$pageno*$recordperpage:$totalrecords;
$paging = '<p class="page_result_found" >Showing '.$start.' - '.($disp_total).' of '.($totalrecords).' Rentals</p>';
	if($totalrecords>$recordperpage)
	{
	
	
	       
		//$paging .= '';
			$paging .= '<ul class="pagination">';
			/*
			$paging .= '<li><a ';
			if($pageno==1) 
			{ 
				$paging .= ' class="disable"'; 
			}
			else
			{
				$paging .= ' class="ajax_paging "';
				
			}
			if($pageno!=1) 
			{ 
				$paging .= ' alt="1" ';
			} 
			$paging .= ' href="javascript:void(0);" >First</a></li>';
			*/
			$paging .= '<li><a ';
			if(!($pageno >= 2))
			{
				$paging .= ' class="disable"';
				
			}
			else
			{
				$paging .= ' class="ajax_paging "';
				$paging .=  ' alt="'.($pageno-1).'" ';
			}
			$paging .= '" href="javascript:void(0);" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>';
			
			if($pageno==1)
			{
				$pagingstart=$pageno;
				$pagingend=$pageno+1;
			}
			else if($pageno==$totalpages)
			{
				$pagingstart=$pageno-1;
				$pagingend=$pageno;
			}
			else 
			{
				$pagingstart=$pageno-1;
				$pagingend=$pageno+1;
			}
			for($i=$pagingstart;$i<=$pagingend;$i++)
			{
			
				$paging .= '<li><a ';
				if($i==$pageno)
				{ 
					$paging .= 'class="active"'; 
				}
				else
				{
					$paging .= 'class="paging_inactive ajax_paging"';
				}
				$paging .= ' href="javascript:void(0);" ';
				$paging .= ' alt="'.$i.'">'.$i.'</a></li>';
			}
			
			$paging .= '<li><a ';
			if(!($pageno <= ($totalpages-1))) 
			{
				$paging .= ' class="disable "';
			}
			else
			{
				$paging .= ' class="ajax_paging "';
			}
			
			if($pageno <= ($totalpages-1))
			{ 
				$paging .= ' alt="'.($pageno+1).'"';
			}
			$paging .= ' href="javascript:void(0);" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>';
			/*
			$paging .= '<li><a ';
			if($pageno == $totalpages) 
			{
				$paging .= ' class="disable"';
			}
			else
			{
				$paging .= ' class="ajax_paging "';
				
			}			
			if($pageno != $totalpages)
			{ 
			$paging .= ' alt="'.$totalpages.'"';
			}
			$paging .= '>Last</a></li>';
			*/
			$paging .= '</ul>';
            
        }
			 
	echo json_encode(array("status"=>$status,"result"=>$result,"paging"=>$paging));
}
?>

