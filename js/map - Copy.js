var 
    bounds,
    marker,
    base_url="http://localhost/donow/donow/";
    markersArray = Array();
 
$(window).ready(function(e){
        initialize();
});
function initialize() {
        var mapOptions = {
			center: new google.maps.LatLng(-23.7003580,133.8808890), 
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('js-map-container'), mapOptions);
        map.setZoom(2);
        //center = bounds.getCenter();
        
        //map.toString();
        //getMapData();
}

/* getMapData() {
    $.getJSON('properties.php',function(data){
        if(data.success == true) {
            if(data.data.length > 0){
                $.each(data.data,function(index, value){
                    lat = data.data[index].latitude;
                    lng = data.data[index].longitude;
                    name = data.data[index].name;
                    image = data.data[index].image;
                    price = data.data[index].price;
                    url = data.data[index].url;
                    addMarker(i, lat, lng,image, name, price,url);
                    i++;
                });
            }
        }
    });
}*/
function addMarker(i, lat, lng, img, name, price) {//alert(lat+"--"+ lng+"--"+ img+"--"+ name+"--"+ price);
    if (lat != null && lng != null) {
        myLatLng = new google.maps.LatLng(lat, lng);
        bounds = new google.maps.LatLngBounds();
        var imageUrl = base_url+ 'images/marker.png';
        var markerImage = new google.maps.MarkerImage(imageUrl);
        eval('var marker' + i + ' = new google.maps.Marker({ position: myLatLng,  map: map, icon: markerImage, zIndex: i});');
        var marker_obj = eval('marker' + i);
        bounds.extend(marker_obj.position);
        markersArray.push(eval('marker' + i));
        marker_obj.title = name;
        var li_obj = '.js-map-num' + i;
        image = '';
        if(img != ''){
           image = '<img src="'+base_url+'admin/uploads/'+img+'" class="img-responsive img-thumbnail" />';
        }
        var content = '<div class="">'+image+'<h4>' + name + '</h4><h4><span class="label label-danger"> $'+ price +'</span></h4></div>';
        eval('var infowindow' + i + ' = new google.maps.InfoWindow({ content: content,  maxWidth: 370});');
        var infowindow_obj = eval('infowindow' + i);
        var marker_obj = eval('marker' + i);
        google.maps.event.addListener(marker_obj, 'click', function () {
            infowindow_obj.open(map, marker_obj);
        });
    }
    //center = bounds.getCenter();
}