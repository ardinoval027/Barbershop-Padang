
window.onload=init;
var lokasipesta;
var lokasibarbershop;

function init(){
basemap();
callRoute();
rutetampil();

} 

function basemap(){
    map = new google.maps.Map(document.getElementById('map'), 
        {
          zoom: 10.2,
          center: new google.maps.LatLng(-0.924140, 100.403460),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        });

}

function callRoute(start, end) {
      if (pos == 'null' || typeof(pos) == "undefined"){
    alert ('Please click button current position or button manual position first');
    }
    else
    {
       directionsService = new google.maps.DirectionsService;
     directionsDisplay = new google.maps.DirectionsRenderer;
         
    
      directionsService.route
      (
        {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        }, 
        function(response, status) 
        {
            if (status === google.maps.DirectionsStatus.OK) 
            {
              directionsDisplay.setDirections(response);
            } 
            else 
            {
              window.alert('Directions request failed due to ' + status);
            }
          }
      );
      directionsDisplay.setMap(map);
      map.setZoom(16);
      $('#rute').append("<div class='box-body' style='max-height:350px;overflow:auto;'><div class='form-group' id='detailrute'></div></div></div>");
      directionsDisplay.setPanel(document.getElementById('detailrute'));
     }
 }

function rutetampil(){
  $("#att2").show();
}