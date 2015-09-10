
	
	$(document).ready(function(){
		
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
		$("#loading").html("<img src='images/loader.gif' />");
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	

   //Default Starting Page Results
   
	$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_Load();
	
	//$("#content").load("pagination_data.php?page=1", Hide_Load());
	load_data("1");


	//Pagination Click
	$("#pagination li").click(function(){
			
		//Display_Load();
		
		//CSS Styles
		$("#pagination li")
		.css({'border' : 'solid #dddddd 1px'})
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		//alert(pageNum);
		//$("#content").load("pagination_data.php?page=" + pageNum, Hide_Load());
		load_data(pageNum);
	});
	
});
	function load_data(pageNum){
		$.ajax({
			type: "POST",
			url: "pagination_data.php?page=" + pageNum,
			data: "data="+pageNum ,
			dataType:'json',
			success: function(response){
			//alert(JSON.stringify(response.result));
			var html='';
			if(response.status == 'success')
			{
				$.each(response.result,function(key,value){
						html +='<div class="ads_row">';
						html +='<div class="row">';
						html +='<div class="col-sm-3 col-xss-4 col-xs-8"><span class="adimgcont"><img src="uploads/'+value.image+'" alt="ad1" class="img-responsive" /></span></div>';
						html +='<div class="col-sm-2 col-xss-8 col-xs-4 col-sm-push-7 mob_pad0">';
						html +='<nav>';
						html +='<ul>';
						html +='<li><a href="javascript:void(0);" data-toggle="tooltip" title="Edit Ad" data-id=="'+value.id+'" class="edit_ad"><i class="fa fa-pencil"></i></a></li>';
						html +='<li><a href="javascript:void(0);" data-toggle="tooltip" title="Delete Ad" data-id="'+value.id+'" class="delete_ad"><i class="fa fa-times"></i></a></li>';
						html +='</ul>';
						html +='</nav>';
						html +='</div>';
						html +='<div class="col-sm-7 col-xs-12 ad_info col-sm-pull-2">';
						html +='<h4>'+value.heading+'</h4>';
						html +='<p>'+value.short_description+'</p>';
						html +='<span class="location"><i class="fa fa-map-marker"></i> '+value.city+'</span>';
						html +='<ul class="filteredlist">';
						html +='<li><i class="fa fa-dollar"></i> '+value.price+'</li>';
						html +='<li><i class="fa fa-clock-o"></i> 01:30 PM</li>';	
						html +='<li><i class="fa fa-bolt"></i> level '+value.activity_level+'</li>';
						html +='</ul>';
						html +='</div>';
						html +='</div>';
						html +='</div>';
				});
				
				$("#display").html(html);
			}
			}
		});
	}
	