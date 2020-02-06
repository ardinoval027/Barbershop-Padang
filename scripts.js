window.onload=init;
var infoDua = [];
var markers = [];
var markersDua = [];
var markersDua1 = [];
var circles=[];
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
var server = "https://barbershoppdgapp.herokuapp.com/barbershoppdg/";
var kecamatan;


var cekRadiusStatus = "off";
function init(){
    basemap();
    kecamatanTampil();
    tampiltempat();
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


function tampiltempat()
{
  agent = new google.maps.Data();
    agent.loadGeoJson(server+'tampiltempat.php');
    agent.setStyle(function(feature){
    return({
            fillColor:'blue',
      strokeweight:2,
      strokecolor:'green',
      fillOpacity:0.5,
      clickable: false
          });          
        });
    agent.setMap(map);
}

function aktifkanGeolocation(){ //posisi saat ini

            navigator.geolocation.getCurrentPosition(function(position) {
             hapusMarkerInfowindow();
             hapusInfo();
              pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude

              };
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
    centerLokasi = new google.maps.LatLng(pos.lat, pos.lng);
    markers.push(marker);
    infowindow = new google.maps.InfoWindow();
    infowindow.setContent('Current Position');
    infowindow.open(map, marker);
    usegeolocation=true;
    google.maps.event.clearListeners(map, 'click');

}

function aktifkanRadius(){ //fungsi radius 
    if (pos == 'null'){
    alert ('Click button current position or manual position first !');
    }
    else {
    hapusRadius();
    var inputradiusbbs=document.getElementById("inputradiusbbs").value;
    var circle = new google.maps.Circle({
      center: pos,
      radius: parseFloat(inputradiusbbs*100),      
      map: map,
      strokeColor: "blue",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "blue",
      fillOpacity: 0.35
      });        
      map.setZoom(13);       
      map.setCenter(pos);
      circles.push(circle);     
    }   
    cekRadiusStatus = 'on';
    barbershopradius();
  }
  

 function barbershopradius(){ //menampilkan barbershop berdasarkan radius
   
    $('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
    clearroute();
     ;
      hapusMarkerTerdekat();
      cekRadius();

        $.ajax({ 
        url: server+'barbershopradius.php?lat='+pos.lat+'&lng='+pos.lng+'&rad='+rad, data: "", dataType: 'json', success: function(rows)
        {
            for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/saloon.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              markersDua.push(marker);
              map.setCenter(centerBaru);
        klikInfoWindow(id);
              map.setZoom(13);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailbarbershop(\""+id+"\");info1();'></a></td><td><a role='button' title='booking' class='btn btn-default fa fa-envelope' value='Booking' href=booking.php?id_bbs="+id+"></a></td></tr>");
            } 
            }    
          });
}



function tampilsemua(){ //menampilkan semua barbershop

  $.ajax({ url: server+'caribarber.php', data: "", dataType: 'json', success: function (rows){
    cari_barbershop(rows);
  }});
}

//cari berdasarkan nama barbershop

function carinamabarbershop(){
  if(caribarbershop.value==''){
    alert("Fill the input form first!");
    }else{
  
    $.ajax({ url: server+'caribarbershop.php?cari_nama='+caribarbershop.value, data: "", dataType: 'json', success: function (rows){
      cari_barbershop(rows);
    }});
  }
}


  
  //memunculkan info ketika di klik marker
function klikInfoWindow(id)
{
    google.maps.event.addListener(marker, "click", function(){
        detailbbs_infow(id);
       
      });

}

function caribbskec() 
  {
var kec=document.getElementById('kecamatan').value;
    $('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
    clearroute();
     ;
  hapusRadius();
      hapusMarkerTerdekat();
    //var kecamatan= kec.value;
    $.ajax({ 
        url: server+'kecamatan_bbs.php?kecamatan='+kec, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('Data Tidak Ditemukan');
            }
            
            else
            {
              $('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
    clearroute();
  hapusRadius();
      hapusMarkerTerdekat();
            if(rows==null)
            {
              alert('Usaha Penyewaan Tidak Ditemukan');
            }
        for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/saloon.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              markersDua.push(marker);
              map.setCenter(centerBaru);
              klikInfoWindow(id);
              map.setZoom(13);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailbarbershop(\""+id+"\");info1();'></a></td><td><a role='button' title='booking' class='btn btn-default fa fa-envelope' value='Booking' href=booking.php?id_bbs="+id+"></a></td></tr>");
            }
            } 
           
          }
        }); 
  }
function tempatbarbershop() 
    {
            ti = new google.maps.Data();
            ti.loadGeoJson(server+'barbershop.php');
            ti.setStyle(function(feature){
            return({
                    fillColor: '#2a9dd6',
                    strokeColor: '#2a9dd6',
                    strokeWeight: 1,
                    fillOpacity: 7
                   });          
              });
            ti.setMap(map);
        }

function tipesewa(){
  
  $('#tipesewalist .checkbox').remove();
  var v=tipesewalist.value;
  $.ajax({ url: server+'tipesewa.php?id='+v, data: "", dataType: 'json', success: function(rows){
    for (var i in rows){
      var row = rows[i];
      var id_tipe=row.id;
      var nama_tipe=row.nama;
      $('#tipesewalist').append('<div class="checkbox" style="color: #f3fff4"><label><input type="checkbox" name="tipe" value="'+id_tipe+'">'+nama_tipe+'</label></div>');
    }
  }});
}

function caritipesewa(){
$('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
    clearroute();
     ;
  hapusRadius();
      hapusMarkerTerdekat();
  var tip=tipesewalist.value;
  var arrayLay=[];
  for(i=0;i<$("input[name=tipe]:checked").length;i++){
    arrayLay.push($("input[name=tipe]:checked")[i].value);
  }
  if (arrayLay==''){
    alert('Pilih Tipe Sewa !');
  }else{

    $.ajax({ url: server+'caritipesewa.php?tip='+arrayLay, data: "", dataType: 'json', success: function(rows){
      if(rows==null)
            {
              alert('barbershop not found');
            }
        for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/saloon.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              markersDua.push(marker);
              map.setCenter(centerBaru);
         klikInfoWindow(id);
              map.setZoom(13);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailbarbershop(\""+id+"\");info1();'></a></td><td><a role='button' title='booking' class='btn btn-default fa fa-envelope' value='Booking' href=booking.php?id_bbs="+id+"></a></td></tr>");
            }

    }});
  }
}
function caripaket()
  {
$('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
    clearroute();
  hapusRadius();
      hapusMarkerTerdekat();
   var paket=c_paket.value;
    $.ajax({ 
        url: server+'caripaket.php?paket='+paket, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('barbershop Tidak Ditemukan');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/saloon.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              markersDua.push(marker);
              map.setCenter(centerBaru);
        klikInfoWindow(id);
              map.setZoom(13);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailbarbershop(\""+id+"\");info1();'></a></td><td><a role='button' title='booking' class='btn btn-default fa fa-envelope' value='Booking' href=booking.php?id_bbs="+id+"></a></td></tr>");
            }
           
          }
        });
  }
function kecamatanTampil()
  {
    kecamatan = new google.maps.Data();
    kecamatan.loadGeoJson(server+'kecamatan.php');
    
    kecamatan.setStyle(function(feature)
    {
      var gid = feature.getProperty('id');
      if (gid == 'K001'){ color = '#ed0202' 
        return({
          fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0.3,
          clickable: false
        }); 
      }else if(gid == 'K002'){ color = '#9398ec' 
          return({
          fillColor:color,
            strokeWeight:2.0,
            strokeColor:'black',
            fillOpacity:0.3,
            clickable: false
          });
      }else if(gid == 'K003'){ color = '#d51e5a' 
          return({
          fillColor:color,
            strokeWeight:2.0,
            strokeColor:'black',
            fillOpacity:0.3,
            clickable: false
          });
      }else if(gid == 'K004'){ color = '#42cb6f' 
          return({
          fillColor:color,
            strokeWeight:2.0,
            strokeColor:'black',
            fillOpacity:0.3,
            clickable: false
          });
      }else if(gid == 'K005'){ color = '#5c9ded' 
          return({
          fillColor:color,
            strokeWeight:2.0,
            strokeColor:'black',
            fillOpacity:0.3,
            clickable: false
          });
      }else if(gid == 'K006'){ color = '#373435' 
          return({
          fillColor:color,
            strokeWeight:2.0,
            strokeColor:'black',
            fillOpacity:0.3,
            clickable: false
          });
      }else if(gid == 'K007'){ color = '#ec87ec' 
          return({
          fillColor:color,
            strokeWeight:2.0,
            strokeColor:'black',
            fillOpacity:0.3,
            clickable: false
          });
      }else if(gid == 'K008'){ color = '#758c01' 
          return({
          fillColor:color,
            strokeWeight:2.0,
            strokeColor:'black',
            fillOpacity:0.3,
            clickable: false
          });
      }else if(gid == 'K009'){ color = '#4b0170' 
          return({
          fillColor:color,
            strokeWeight:2.0,
            strokeColor:'black',
            fillOpacity:0.3,
            clickable: false
          });
      }else if(gid == 'K010'){ color = '#fce8b7' 
          return({
          fillColor:color,
            strokeWeight:2.0,
            strokeColor:'black',
            fillOpacity:0.3,
            clickable: false
          });
      }else if(gid == 'K011'){ color = '#ff3300' 
        return({
          fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0.3,
          clickable: false
        }); 
      }
    });
    kecamatan.setMap(map);
  }


function cari_barbershop(rows) //fungsi cari barbershop berdasarkan nama
  {   
     $('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
    clearroute();
     ;
  hapusRadius();
      hapusMarkerTerdekat();
            if(rows==null)
            {
              alert('barbershop Not found');
            }
        for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var nama   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/saloon.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              markersDua.push(marker);
              map.setCenter(centerBaru);
        klikInfoWindow(id);
              map.setZoom(11);
              $('#hasilcari').append("<tr><td>"+nama+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info' onclick='detailbarbershop(\""+id+"\");info1();'></a></td><td><a role='button' title='booking' class='btn btn-default fa fa-envelope' value='Booking' href=booking.php?id_bbs="+id+"></a></td></tr>");
            }
            }

 

function detailbarbershop(id1){  //menampilkan informasi barbershop
   $('#info').empty();
   hapusInfo();
      clearroute2();
    clearroute();
      hapusMarkerTerdekat();
      $('#rating').empty();
       $.ajax({ 
      url: server+'detailbarbershop.php?cari='+id1, data: "", dataType: 'json', success: function(rows)
        { 
         for (var i in rows.data) 
          { 

            
            var row = rows.data[i];
            var id = row.id;
            var nama = row.name_barbershop;
            var alamat = row.address;
            var kontak = row.contact;
            var image = row.image;
            var latitude  = row.latitude; 
            var longitude = row.longitude;
            var rating = row.rating;
            var nilai = row.nilai;
            $('#id_barbershop_rating').val(id);
            if(rating == null){
              $('#point_rating').html("Rating: "+ "-");
            }else{
              $('#point_rating').html("Rating: "+(rating).toFixed(2));
            }
            if(nilai == null){
              $('#star_5').prop("checked",false);
              $('#star_4').prop("checked",false);
              $('#star_3').prop("checked",false);
              $('#star_2').prop("checked",false);
              $('#star_1').prop("checked",false);
            }else{
              $('#star_'+nilai).prop("checked",true);
            }
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/saloon.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
           $('#info').append("<tr><td><b>Nama</b></td><td>:</td><td> "+nama+"</td></tr>"+
            "<tr><td><b>Alamat</b></td><td>:</td><td> "+alamat+"</td></tr>"+
            "<tr><td><b>Kontak Barbershop</b></td><td>:</td><td> "+kontak+"</td></tr>")
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b><br><img src='"+fotosrc+image+"' alt='image in infowindow' width='150'></center><br><i class='fa fa-home'></i> "+nama+"<br><i class='fa fa-map-marker'></i> "+alamat+"<br><a role='button' title='tracking' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);

          //Paket barbershop
           var isi="<tr><td colspan='3'><br><b style='margin-left:20px'>Daftar Paket</b> <br><ol>";
          for (var i in rows.detail_paket){ 
            var row = rows.detail_paket[i];
            var id_paket = row.id_paket;
            var nama = row.nama;
            var harga = row.harga;
            var detail = row.detail;
            isi = isi+"<li>"+nama+"  ( Rp."+harga+")";
            isi = isi+"</li>";            
          }//end for
          isi = isi + "</ol></td></tr>";
          $('#info').append(isi);  

           //Barang barbershop
                     
          }  
        }
      }); 
  
}

function detailbbs_infow(id){  //menampilkan informasi barbershop
  
  $('#info').empty();
   hapusInfo();
      clearroute2();
    clearroute();
    ;
       $.ajax({ 
      url: server+'detailbarbershop1.php?cari='+id, data: "", dataType: 'json', success: function(rows)
        { 
         for (var i in rows) 
          { 
            var row = rows[i];
            var id = row.id;
            var nama = row.name_barbershop;
            var alamat=row.address;
            var image = row.image;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/saloon.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Information</b><br><img src='"+image+"' alt='image in infowindow' width='150'>"+
            "</center><br><i class='fa fa-home'></i>"+nama+"<br><i class='fa fa-map-marker'></i>"+alamat+"<br>"+
            "<a role='button' title='tracking' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);

          
          }  
           

        }
      }); 
}


function galeri(a){
    window.open(server+'gallery.php?idgallery='+a);    
   }


var rad_lat=0;
      var rad_lng=0;
      function tampil_sekitar(latitude,longitude,nama){
       
        rad_lat = latitude;
        rad_lng = longitude;
        document.getElementById("inputradius1").style.display = "inline";

        // POSISI MARKER
        centerBaru = new google.maps.LatLng(latitude, longitude);
          var marker = new google.maps.Marker({map: map, position: centerBaru, 
          icon:'assets/ico/saloon.png',
          animation: google.maps.Animation.DROP,
          clickable: true});                       
      }
    


function aktifkanRadiusSekitar(){
      hapusRadius();
      hapusMarkerTerdekat();
          var pos = new google.maps.LatLng(rad_lat, rad_lng);
          map.setCenter(pos);
          map.setZoom(16);
          var inputradius1=document.getElementById('inputradius1').value;
      var a=document.getElementById('check_h').value;
          var rad = parseFloat(inputradius1*100);
          var circle = new google.maps.Circle({
            center: pos,
            radius: rad,      
            map: map,
            strokeColor: "blue",
            strokeOpacity: 0.5,
            strokeWeight: 1,
            fillColor: "blue",
            fillOpacity: 0.35
          });        
          circles.push(circle);
      if (document.getElementById('check_t').checked) {
            owsekitar(rad_lat,rad_lng,rad);
      } 
      
      if (document.getElementById('check_h').checked) {
            hotelsekitar(rad_lat,rad_lng,rad);
      }
      
      if (document.getElementById('check_i').checked) {
            industrisekitar(rad_lat,rad_lng,rad);
      } 

      if (document.getElementById('check_oo').checked) {
            oleholehsekitar(rad_lat,rad_lng,rad);
      } 

      if (document.getElementById('check_k').checked) {
            kulinersekitar(rad_lat,rad_lng,rad);
      }  
      if (document.getElementById('check_r').checked) {
            restaurantsekitar(rad_lat,rad_lng,rad);
      }  
       
             

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
 
 function route_sekitar(lat1,lng1,lat,lng) {
          var start = new google.maps.LatLng(lat1, lng1);
          var end = new google.maps.LatLng(lat, lng);

          if(directionsDisplay){
              clearroute();  
              hapusInfo();
          }

          directionsService = new google.maps.DirectionsService();
          var request = {
            origin:start,
            destination:end,
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            provideRouteAlternatives: true
          };

          directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
             directionsDisplay.setDirections(response);
           }
          });
          
          directionsDisplay = new google.maps.DirectionsRenderer({
            draggable: false,
            polylineOptions: {
              strokeColor: "darkorange"
            }
          });

          directionsDisplay.setMap(map);
          rute.push(directionsDisplay);          
      }



function booked()
{
  alert('Please login!');
}

 function posisiawal(){ //POSISI AWAL

        if (awal==0) {
            $('#text_awal').empty();
            $('#text_awal').append("<div class='alert alert-info' style='display: inline-block;padding: 6px 12px;width:100%'>Silahkan klik posisi anda</div>");   
        } else { 
            $('#text_awal').empty();
            $('#text_awal').append("<div class='alert alert-danger' style='display: inline-block;padding: 6px 12px;width:100%'>Reset Dulu</div>");   
        }
    
        map.addListener('click', function(event) {
          if (awal == 0) {
              marker_awal = new google.maps.Marker({
               //icon: "assets/img/biru1.ico",
                position : event.latLng,
                map: map,
                animation: google.maps.Animation.DROP,
                });

              posisi_1 = {
              lat: event.latLng.lat(),
              lng: event.latLng.lng() }

              document.getElementById('input_posisi_awal_lat').value=posisi_1.lat;
              document.getElementById('input_posisi_awal_lng').value=posisi_1.lng;

              marker_awal.info = new google.maps.InfoWindow({
                  content: "<center><a style='color:black;'>Anda Disini</a></center>",
                  pixelOffset: new google.maps.Size(0, -1)
                    });
                  marker_awal.info.open(map, marker_awal);

              marker_1.push(marker_awal);
              awal=1;
              $('#text_awal').empty();
              $('#text_awal').append("<div class='alert alert-success' style='display: inline-block;padding: 6px 12px;width:100%'>Lokasi telah dipilih</div>");   
          }//end awal == 0
        });//end add listener
      }

      function posisitujuan(){ //POSISI TUJUAN

        if (tujuan==0) {
            $('#text_tujuan').empty();
            $('#text_tujuan').append("<div class='alert alert-info' style='display: inline-block;padding: 6px 12px;width:100%'>Silahkan klik posisi anda</div>"); 
          } else {
            $('#text_tujuan').empty();
            $('#text_tujuan').append("<div class='alert alert-danger' style='display: inline-block;padding: 6px 12px;width:100%'>Reset dulu</div>"); 
          }

        map.addListener('click', function(event) { 
          if (tujuan == 0) {
            for (var i = 0; i < marker_2.length; i++) {
              marker_2[i].setMap(null);        
            } 

            marker = new google.maps.Marker({
             //icon: "assets/img/biru1.ico",
              position : event.latLng,
              map: map,
              animation: google.maps.Animation.DROP,
              });

            posisi_2 = {
            lat: event.latLng.lat(),
            lng: event.latLng.lng() }

            document.getElementById('input_posisi_tujuan_lat').value=posisi_2.lat;
            document.getElementById('input_posisi_tujuan_lng').value=posisi_2.lng;

            marker.info = new google.maps.InfoWindow({
                content: "<center><a style='color:black;'>Tujuan Anda Disini </a></center>",
                pixelOffset: new google.maps.Size(0, -1)
                  });
                marker.info.open(map, marker);

            marker_2.push(marker);
            tujuan =1;
            $('#text_tujuan').empty();
            $('#text_tujuan').append("<div class='alert alert-success' style='display: inline-block;padding: 6px 12px;width:100%'>Lokasi telah dipilih</div>"); 

          }//end tujuan ==0
       });//end addlistener

      }
    
    

    function call_rute(){ // Panggil Track
        //loader                 
         $('#hasilcari1').show();
    $('#hasilcari').empty();
    $('#hasilcari').append("<thead><th>Angkot Code</th><th>Route</th><th>Gallery</th></thead>");
      hapusInfo();
      clearroute2();
    clearroute();
      hapusMarkerTerdekat();   

        var lat1= document.getElementById('input_posisi_awal_lat').value;
        var lng1= document.getElementById('input_posisi_awal_lng').value;
        var lat2 = document.getElementById('input_posisi_tujuan_lat').value
        var lng2 = document.getElementById('input_posisi_tujuan_lng').value;

        

        if (lat1==""||lng1==""||lat2==""||lng2=="") {
          $('#kanan_rute').append("<div class='alert alert-danger' style='font-size:12px; display: inline-block;padding: 6px 12px;width:100%'><b>Pilih Lokasi Anda Terlebih Dahulu</b></div>");
        } else {
          var url_tujuan = server+'track.php?lat1='+lat1+'&lng1='+lng1+'&lat2='+lat2+'&lng2='+lng2+'&rad=300';
          $.ajax({url: url_tujuan, data: "", dataType: 'json', success: function(rows){
            for (var i in rows.data){ 
              var row = rows.data[i];
              var data = row.data;
        var id_angkot = row.id_angkot;
              var rute="";
              var fungsi="";
              for(var x in data){
                var isi = data[x];
                if (rute=="") {
                  rute = isi;                   
                }else{
                  rute = rute+' - '+isi;
                }
                fungsi = fungsi + "detailangkot(\'"+isi+"\');";
              }//end for
              $('#hasilcari').append("<tr><td>"+isi+"</td><td><a role='button' class='btn btn-success fa fa-search' onclick=\"hapus_kecuali_landmark();"+fungsi+"\"></a></td><td><a role='button' class='btn btn-primary fa fa-picture-o' onclick='galeriangkot(\""+isi+"\")'></a></td></tr>");                          
            }//end for
            if (rows.jumlah == 0) {
              $('#kanan_rute').empty();
              $('#kanan_rute').append("<div class='alert alert-danger' style='font-size:12px; display: inline-block;padding: 6px 12px;width:100%'><b>Tidak ada angkot di sekitar posisi pilihan anda</b></div>"); 
            }//end if   
            //loader                 
            $("#loader").hide();
            $("#loader_text").hide();               
          }});//end ajax      
        }

      }
    
function legenda()
{
  $('#tombol').empty();
  $('#tombol').append('<a class="btn btn-default" role="button" id="hidelegenda" data-toggle="tooltip" onclick="hideLegenda()" title="Hide Legend"><i class="fa fa-eye-slash" style="color:black;"></i></a>');
  
  var layer = new google.maps.FusionTablesLayer(
    {
          query: {
            select: 'Location',
            from: '1NIVOZxrr-uoXhpWSQH2YJzY5aWhkRZW0bWhfZw'
          },
          map: map
        });
    var legend = document.createElement('div');
        legend.id = 'legend';
        var content = [];
        content.push('<p><div class="color a"></div>Usaha Penyewaan Perlnegkapan Pesta</p>');
        content.push('<p><div class="color b"></div>Koto Tangah</p>');
        content.push('<p><div class="color c"></div>Padang Utara</p>');
        content.push('<p><div class="color d"></div>Nanggalo</p>');
        content.push('<p><div class="color e"></div>Kuranji</p>');
        content.push('<p><div class="color f"></div>Padang Barat</p>');
        content.push('<p><div class="color g"></div>Padang Timur</p>');
        content.push('<p><div class="color h"></div>Lubuk Begalung</p>');
        content.push('<p><div class="color i"></div>Pauh</p>');
        content.push('<p><div class="color j"></div>Lubuk Kilangan</p>');
        content.push('<p><div class="color k"></div>Padang Selatan</p>');
        content.push('<p><div class="color l"></div>Bungus</p>');
        legend.innerHTML = content.join('');
        legend.index = 1;
        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
}
    
function hideLegenda() {
  $('#legend').remove();
  $('#tombol').empty();
  $('#tombol').append('<a class="btn btn-default" role="button" id="showlegenda" data-toggle="tooltip" onclick="legenda()" title="Legend"><i class="fa fa-eye" style="color:black;"></i></a>');
}
    
    function cek()
        {
         document.getElementById('km').innerHTML=document.getElementById('inputradiusbbs').value*100
        }
    
     function cek1()
        {
         document.getElementById('km1').innerHTML=document.getElementById('inputradius1').value*100
        }
    
    function reset_rute () { //RESET KLIK RUTE
          tujuan=0;
          awal=0;
          hapus_kecuali_landmark();
          basemap();
      $('#hasilcari').empty();
      $('#hasilcari').append("<thead><th>Angkot Code</th><th>Route</th><th>Gallery</th></thead>");

      }
    
    function hapus_kecuali_landmark(){
            hapusRadius();
            hapusMarkerTerdekat();
            hapusInfo();
             ;
            clearroute();
          }
 

function reset(){
  $("#hasilcari1").hide();

  hapusInfo();
  clearroute2();
  clearroute();
  /* hapusMarkerTerdekat(); */
  $("#att2").hide();
}

function owtampil(){
  $("#att1").show();
  $("#att2").hide();
  $("#radiuss").hide();
  $("#infoo1").hide();
  $("#infoev").hide(); 
}

function rutetampil(){
  $("#att2").show();
  $("#att1").hide();
  $("#radiuss").hide();
  $("#infoo1").hide();
  $("#infoev").hide();
  $("#infoo").show();
}

function info1(){
  $("#infoo").show();
  $("#att2").hide();
  $("#radiuss").hide()
  $("#infoo1").hide();;
  
  $("#infoev").hide();   
}

function infoev(){
  $("#infoo").hide();
  $("#att2").hide();
  $("#infoev").show();
  $("#radiuss").hide()
  $("#infoo1").hide();
 
  
}

function info12(){
  $("#infoo1").show();
  $("#radiuss").hide();
  $("#infoo").hide();
  $("#att2").hide();
  $("#infoev").hide();   
}

function eventt(){
  $("#eventt").show();
  $("#result").hide();
  $("#att1").hide();
  $("#hide2").show();
  $("#infoo").hide();
  $("#showlist").hide();
  $("#radiuss").hide();
  $("#infoo1").hide();
  $("#att2").hide();
  $("#infoev").hide();   
}

function resultt(){
  $("#result").show();
  $("#resultaround").hide();
  $("#eventt").hide();
  $("#infoo").hide();
  $("#att1").hide();
  $("#hide2").show();
  $("#showlist").hide();
  $("#radiuss").hide();
  $("#infoo1").hide();
  $("#att2").hide();
  $("#infoev").hide(); 
}

function resultt1(){
  $("#result").show();
  $("#resultaround").show();
  $("#eventt").hide();
  $("#infoo").hide();
  $("#att1").hide();
  $("#hide2").show();
  $("#showlist").hide();
  $("#radiuss").hide();
  $("#infoo1").hide();
  $("#att2").hide();
  $("#infoev").hide(); 
}

function list(){
  $("#result").hide();
  $("#eventt").hide();
  $("#infoo").hide();
  $("#att1").hide();
  $("#hide2").hide();
  $("#showlist").show();
  $("#radiuss").hide();
  $("#infoo1").hide();
  $("#att2").hide();
  $("#infoev").hide(); 
}

function resetangkot(){
  $("#eventt").hide();
  $("#infoo").show();
  $("#att1").hide();
  $("#showlist").hide();
  $("#radiuss").hide();
  $("#infoo1").hide();
  $("#infoev").hide();
}


function cekRadius(){
          rad = inputradiusbbs.value*100;
          }
      
function cekRadiusangkot(){
          rad = inputradiusangkot.value*100;
          }
      
function cekRadius1(){
          rad = inputradius1.value*100;
          }

function clearroute2(){      
    if(typeof(directionsDisplay) != "undefined" && directionsDisplay.getMap() != undefined){
    directionsDisplay.setMap(null);
    $("#detailrute").remove();
    }     

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

 function clearroute(){
          for (i in rute){
            rute[i].setMap(null);
          } 
          rute=[]; 
        }