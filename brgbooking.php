<?php
  include("connect.php");
  $id_paket = $_GET['id'];

  $query_detail_tipe="SELECT paket.id, paket.nama, paket.harga_paket AS harga FROM paket where paket.id = '".$id_paket."' "; 
  $hasil3=pg_query($query_detail_tipe);
  while($baris = pg_fetch_array($hasil3)){
        $id_tipe=$baris['id'];
        $name=$baris['nama'];
        $harga=$baris['harga'];
        $data[] = array('id'=>$id,'nama'=>$name, 'harga'=>$harga);
    }

    echo json_encode($data);
?>