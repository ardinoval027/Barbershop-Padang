window.onload=basemap;
var centerBaru;
var map;
var markersDua  = [];
var server = "https://barbershoppdgapp.herokuapp.com/barbershoppdg/admin/act/";

function init(){
    basemap();
    tampilsemua();
}
function basemap() //google maps
{
    map = new google.maps.Map(document.getElementById('map'), 
        {
          zoom: 10.2,
          center: new google.maps.LatLng(-0.924140, 100.403460),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        });
}
function tampilsemua(){ //menampilkan semua barbershop

  $.ajax({ url: server+'carilokasi.php', data: "", dataType: 'json', success: function (rows){
    cari_lokasi(rows);
  }});
}

function cari_lokasi(rows) //fungsi cari barbershop berdasarkan nama
  {   
        if(rows==null){
              alert('Lokasi Not found');
            }
        for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              map: map

            });
            console.log(id);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(13);
            }
}


