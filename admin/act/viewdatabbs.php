<?php
require '../connect.php';
$username = $_SESSION['username'];
$id_barbershop = $_SESSION['id_barbershop'];
$query = "SELECT barbershop.id, barbershop.nama as barbershop_name, barbershop.alamat, barbershop.kontak, barbershop.image, 
          accounts.nama as admin_name, ST_X(ST_Centroid(geom)) As lng, ST_Y(ST_Centroid(geom)) As lat 
          FROM barbershop join accounts on accounts.id_barbershop=barbershop.id where barbershop.id='$id_barbershop'";
$hasil=pg_query($query);
while($row = pg_fetch_array($hasil)){
  $id= $id_barbershop;
  $barbershop_name=$row['barbershop_name'];
  $address=$row['alamat'];
  $contact=$row['kontak'];
  $admin_name=$row['admin_name'];
  $image=$row['image'];
  $lat=$row['lat'];
  $lng=$row['lng'];
  if ($lat=='' || $lng==''){
    $lat='<span style="color:red">Kosong</span>';
    $lng='<span style="color:red">Kosong</span>';
  }
    if ($image=='null' || $image=='' || $image==null){
    $image='foto.jpg';
  }
}
  ?>