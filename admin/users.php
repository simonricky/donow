<?php 
require_once '../config/dbconnection.php';
db_open();
require_once('phpInclude/header.php');
require_once('../phpInclude/functions.php');
if (!isset($_SESSION['admin_session_id']) && $_SESSION['admin_session_ids']=="")
{
	header("Location:index.php");
}
//print_r($_SESSION);
?>
<link href="css/datatable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/datatable.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	 $('#example').dataTable(
			 {
			      /*  "columnDefs": [
			            {
			                "targets": [ 0 ],
			                "visible": false,
			                "searchable": false
			            }
			        ], */
			        "order": [[ 0, "ASC" ]]
			    } 
			 );
	 //$('#example th').css('background-color','#289dcc');
});

</script>   
<style>
table.display th {
 
	background-color:#289dcc !important;
}
</style>     
<title>Dashboard</title>
<div class="container-fluid">
	<div class="row">
    	<div class="middleCont">
        	<?php require_once 'phpInclude/sidebar.php';?>
        	 <div class="col-sm-10">
            	<div class="PageContainer">
                	
                   
                    <div id="msgs">
                    
                    </div>
                    <div class="dashboard_main BlogsListOtr">
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr class="pretty">
             <th>DATE</th>
                
                <th>Name</th>
				<th>Email</th>
				<th>D.O.B</th>
                <th>Action</th>
            </tr>
        </thead>
 
     <!--    <tfoot>
            <tr>
            <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Enabled</th>
            </tr>
        </tfoot> -->
 
        <tbody>
        <?php 
        $condition= " is_admin='no' ORDER BY created DESC ";
$post = getUserDetail($condition);
//$getAllEvent = mysql_query($post);
if($post)
{
	if(mysql_num_rows($post) > 0)
	{
		$countNum=1;
		while($event = mysql_fetch_assoc($post))
		{//print_r($event);die;
		?>
		     <tr>
		     <td><?php echo date('m-d-Y',strtotime($event['created'])); ?></td>
                
                <td><?php echo $event['fname']; ?></td>
				<td><?php echo $event['email']; ?></td>
                
                <td>
                 <?php echo $event['birth_date']; ?>
                </td>
               <td>
                <!-- <a href="" title="Edit user"><i class="fa fa-pencil-square-o fa-lg"></i> </a> |&nbsp; -->
				<a href="javascript:void(0);" class="delete_user" data-id="<?php echo $event['id']; ?>" title="Delete user"><i class="fa fa-times fa-lg"></i></a> 
                </td>
            </tr>
		<?php 
		$countNum++;
		}
	}
}
?>
       
            
        </tbody>
    </table>
    </div>
    	</div>
    		</div>
    		</div>
    		</div>
    		</div>
    		
  <!-- ////// JQUERY ////// -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
	// TOOL TIP //
	$('[data-toggle="tooltip"]').tooltip();
	
	// SIDER BAR SLIDER NAV //
    $('.navtoggle').click(function() {
        $('body .mainSection').toggleClass('maincollapsed');
		$('.mainSection .sidebar').toggleClass('collapsed');
    });
	
	// SIDER BAR MOBILE SLIDER NAV //
	$('.mob_navtoggle').click(function() {
        $('body .mainSection').toggleClass('mob_maincollapsed');
		$('.mainSection .sidebar').toggleClass('mob_collapsed');
    });
});
</script>
</body>
</html>