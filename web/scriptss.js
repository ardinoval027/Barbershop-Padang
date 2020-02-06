window.onload=init;
var infoDua = [];
var markers = [];
var markersDua = [];
var markersDua1 = [];
var circles=[];
var angkot = [];
var jalurAngkot=[];
var rute = [];  //NAVIGASI
var pos ='null';
var infowindow;
var centerBaru;
var centerLokasi;
var fotosrc = 'foto/';
var directionsDisplay;
var marker_1 = []; //MARKER UNTUK POSISI SAAT INIvar marker_2 = []; //MARKER UNTUK POSISI SAAT INI
var marker_2 = [];
var awal = 0;
var tujuan = 0;

// var server = "http://gisfaisal.in/tourism_bkt/t2-eng/";
function init(){
    basemap();
}

function basemap() //google maps
{
    
    map = new google.maps.Map(document.getElementById('map'), 
        {
          zoom: 12,
          center: new google.maps.LatLng(-0.924140, 100.403460),
          mapTypeId: google.maps.MapTypeId.MAP,

        });
}

function aktifkanGeolocation(){ //posisi saat ini

            navigator.geolocation.getCurrentPosition(function(position) {
             hapusMarkerInfowindow();
             hapusInfo();
              pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
              };
              console.log(pos.lat);
              $('#geom').val(pos.lat + " " + pos.lng);
              marker = new google.maps.Marker({
              position: pos,
              map: map,
              animation: google.maps.Animation.DROP,
              });
              centerLokasi = new google.maps.LatLng(pos.lat, pos.lng);
              markers.push(marker);
              infowindow = new google.maps.InfoWindow({
              position: pos,
              content: "<a style='color:black;'>You Are Here</a> "
              });
              infowindow.open(map, marker);
              map.setCenter(pos);
            });   
          }

function manualLocation(){ //posisi manual
  hapusRadius();
  alert('Click the map');
  map.addListener('click', function(event) {
    addMarker(event.latLng);
    });
  }
  
    function addMarker(location){
    hapusposisi();
    marker = new google.maps.Marker({
      position : location,
      map: map,
      animation: google.maps.Animation.DROP,
      });
    pos = {
      lat: location.lat(), lng: location.lng()
    }
    console.log(pos.lat);
              $('#geom').val(pos.lat + " " + pos.lng);

    centerLokasi = new google.maps.LatLng(pos.lat, pos.lng);
    markers.push(marker);
    infowindow = new google.maps.InfoWindow();
    infowindow.setContent('Current Position');
    infowindow.open(map, marker);
    usegeolocation=true;
    google.maps.event.clearListeners(map, 'click');
  console.log(pos);

}


function hapusMarkerTerdekat() {
          for (var i = 0; i < markersDua.length; i++) {
                markersDua[i].setMap(null);
            }
        }

function hapusMarkerTerdekat1() {
          for (var i = 0; i < markersDua1.length; i++) {
                markersDua1[i].setMap(null);
            }
        }

function hapusMarkerInfowindow(){
         setMapOnAll(null);
         hapusMarkerTerdekat();
         pos = 'null';
    }
function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
        }
    }
function hapusInfo() {
        for (var i = 0; i < infoDua.length; i++) {
              infoDua[i].setMap(null);
              }
      }

function hapusRadius(){
  for(var i=0;i<circles.length;i++)
               {
                   circles[i].setMap(null);
               }
    circles=[];
  cekRadiusStatus = 'off';
  }
  

  function hapusposisi(){
  for (var i = 0; i < markers.length; i++){
    markers[i].setMap(null);
  }
  markers = [];
}

