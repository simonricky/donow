var i = 1;
  $(function() {
	  var form_data=$("#search_form").serialize();
    var availableTags = [
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
    $( "#location" ).autocomplete({
      source: availableTags,
      select: function(event, ui) { 
          //alert(ui.item.value) ;
          var select_form=$("#search_form").serialize();
          search_ajax(select_form);
      }
    });
   
    /* datepicker */
    $( "#datepicker1" ).datepicker({
    	dateFormat: 'yy-mm-dd',
        onSelect: function (dateText) {
        //defined your own method here
        	var datepick_form = $("#search_form").serialize();
        	search_ajax(datepick_form);
        }
        });
 // });
  
//////search ajax/////////////////
//$(document).ready(function(){
	$("#search_query").keyup(function() {
		var query = $(this).val();
		if(query=="")
		{
		$("#display").html("");
		}
		else
		{
			var search_query = $("#search_form").serialize();
			search_ajax(search_query);
		}
		});
	$('#city').keyup(function() {
		var city = $(this).val();
		if(city=="")
		{
		$("#display").html("");
		}
		else
		{
			var search_query = $("#search_form").serialize();
			search_ajax(search_query);
		}
		});
	
	$(".search_filter").change(function(){
		var range_form = $("#search_form").serialize();
		search_ajax(range_form);
		});
	});

/*search ajax function on call event*/
function search_ajax(query)
{initialize();
	$.ajax({
		type: "POST",
		url: "listing.php",
		data: query ,
		dataType:'json',
		success: function(response){
		//alert(JSON.stringify(response.result));
		var html='';
		if(response.status == 'success')
		{
		
			$.each(response.result,function(key,value){
				lat = value.latt;
                lng = value.longt;
                name = value.heading;
                image = value.image;
                price = value.price;
               // url = value.short_description;
				addMarker(i, lat, lng,image, name, price);
			html +='<div class="col-xs-12 col-md-6">';
			html+='<div class="SearchBlk">';
			html+='<div class="ad_imgcont">';
			//html+='<ul class="owl-carousel property_slide">';
			//html+='<li data-toggle="modal" data-target="#ad_detail_modal"><img src="admin/uploads/'+value.image+'" alt="ad1" class="responsiveimg" /></li>';
			//html+='<li data-toggle="modal" data-target="#ad_detail_modal"><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>';
			//html+='<li data-toggle="modal" data-target="#ad_detail_modal"><img src="images/ads/ad1.png" alt="ad1" class="responsiveimg" /></li>';
			//html+='</ul>';
			html+='<img src="admin/uploads/'+value.image+'" alt="ad1" class="responsiveimg" />';
			html+='<a href="javascript:void(0);" class="favriote"><i class="fa fa-heart"></i></a>';
			html+='<span class="price">$'+value.price+'<span>New</span></span>';
			html+='</div>';
			html+='<div class="ad_info">';
			html+='<a href="javascript:void(0);" data-toggle="modal" data-target="#ad_detail_modal"><h4>'+value.heading+'</h4></a>';
			html+='<ul class="loc">';
			html+='<li><img src="images/mapmarker_icon.png" alt="location" width="12px" />'+value.city+', '+value.state+'</li>';
			html+='</ul>';
			html+='<ul class="ratinglist">';
			html+='<li class="rt_main">';
			html+='<ul class="starslist">';
			html+='<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>';
			html+='<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>';
			html+='<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>';
			html+='<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>';
			html+='<li><a href="javascript:void(0);" class="empty"><i class="fa fa-star"></i></a></li>';
			html+='</ul>';
			html+='</li>';
			html+='<li class="rt_main"><a href="javascript:void(0);">10 Reviews</a></li>';
			html+='</ul>';
			html+='</div>';
			html+='</div>';
			html+='</div>';
			i++;
			});
		}
		
		$("#display").html(html);
		}
		});
}