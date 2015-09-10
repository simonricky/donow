
 var icon = new google.maps.MarkerImage("http://www.google.com/mapfiles/marker.png",
 new google.maps.Size(32, 32), new google.maps.Point(0, 0),
 new google.maps.Point(16, 32));
 var center = null;
 var map = null;
 var currentPopup;
 var bounds = new google.maps.LatLngBounds();
 function addMarker(lat, lng, info ,jobseeker,price) {
 var pt = new google.maps.LatLng(lat, lng);
 bounds.extend(pt);
 var marker = new google.maps.Marker({
 position: pt,
 icon: icon,
 map: map
 });
 var popup = new google.maps.InfoWindow({
 content: '<p id="hook">'+info + jobseeker+price+'</p>',
 maxWidth: 300
 });
 google.maps.event.addListener(marker, "mouseover", function() {
 if (currentPopup != null) {
 currentPopup.close();
 currentPopup = null;
 }
 popup.open(map, marker);
 currentPopup = popup;
 });
 google.maps.event.addListener(popup, "closeclick", function() {
 //map.panTo(center);
 currentPopup = null;
 });
 /*google.maps.event.addListener(marker, "dblclick", function() {alert(1);
	    marker.setMap(null);
	});*/
 }
 function initMap() {
 map = new google.maps.Map(document.getElementById("js-map-container"), {
 center: new google.maps.LatLng(-23.7003580,133.8808890),
 zoom: 4,
 disableDefaultUI: true,
 mapTypeId: google.maps.MapTypeId.ROADMAP,
 mapTypeControl: false,
 mapTypeControlOptions: {
 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
 },
 navigationControl: true,
 navigationControlOptions: {
 style: google.maps.NavigationControlStyle.SMALL
 }
 });
 //addMarker(lat, lng,image, name);		 
 center = bounds.getCenter();
 //map.fitBounds(bounds);
 map.toString();
 }
