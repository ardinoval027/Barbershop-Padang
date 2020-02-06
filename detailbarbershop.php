<?php
session_start();
require 'connect.php';
$cari = $_GET["cari"];
$querysearch ="SELECT barbershop.id, barbershop.nama as name_barbershop, alamat, kontak, image,
 ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat from barbershop where barbershop.id='$cari'";	   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{

		  $id=$row['id'];
		  $name_barbershop=$row['name_barbershop'];
		  $address=$row['alamat'];
		  $contact=$row['kontak'];
		  $image=$row['image'];
		  $longitude=$row['lng'];
          $latitude=$row['lat'];
          $querySearch = "SELECT * FROM rating_pelanggan where id_barbershop='$id'";
          $search = pg_query($querySearch);
          $rating = null;
          $nilai = null;
          if(pg_num_rows($search) > 0){
              $queryRating = "select sum(nilai) as total, count(nilai) as jumlah from rating_pelanggan where id_barbershop = '$id'";
              $pg_rating = pg_query($queryRating);
              $data_rating = pg_fetch_array($pg_rating);
              $rating = $data_rating['total'] / $data_rating['jumlah'];

              $nilai = null;
              if(isset($_SESSION['C'])){
                  $username = $_SESSION['username'];
                  $myRating = "select nilai from rating_pelanggan where id_barbershop = '$id' and id_pelanggan='$username'";
                  $pg_myrating = pg_query($myRating);
                  $data_myrating = pg_fetch_array($pg_myrating);
                  $nilai = $data_myrating['nilai'];
              }

          }

		  $dataarray[]=array('id'=>$id,'name_barbershop'=>$name_barbershop,'address'=>$address,'contact'=>$contact, 'image'=>$image,'longitude'=>$longitude,'latitude'=>$latitude,'rating'=>$rating,'nilai'=>$nilai);

		  if ($image=='null' || $image=='' || $image==null){
			$image='foto/foto.jpg';
		  }
	}

   $query_detail_paket="SELECT paket.id, paket.nama,  paket.harga_paket FROM paket 
                        left join barbershop on barbershop.id = paket.id_barbershop where barbershop.id = '".$cari."' "; 
    $hasil4=pg_query($query_detail_paket);
    while($baris1 = pg_fetch_array($hasil4)){
        $id_paket=$baris1['id'];
        $paket_nama=$baris1['nama'];
        $harga=$baris1['harga_paket'];
        $baris1['detail'] = 
        $data_detail_paket[]=array('id'=>$id_paket,'nama'=>$paket_nama,'harga'=>$harga);
    }
	$arr=array("data"=>$dataarray, "detail_paket"=>$data_detail_paket);
    echo json_encode($arr);
?>
