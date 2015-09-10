<?php
require_once '../config/dbconnection.php';
db_open();
$per_page = 3; 

if($_GET)
{
$page=$_GET['page'];
}



//get table contents
$start = ($page-1)*$per_page;
$sql = "SELECT * from tbl_advertisement WHERE is_deleted='no' order by id limit $start,$per_page";
$rsd = mysql_query($sql) or die(mysql_error());
?>


	
		
		<?php
		//Print the contents
		if(mysql_num_rows($rsd) > 0)
		{
			
			$status = "success";
			while($fetch = mysql_fetch_assoc($rsd))
			{
				$result[] = $fetch;
			}
			
		}
		else
		{
			$status = "no_record";
		}
	echo json_encode(array("status"=>$status,"result"=>$result));
?>
	

