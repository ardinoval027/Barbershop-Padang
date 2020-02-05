<?php
//function to get address by given latitude and longitude
  function getAddress($lat, $lon){
//Google map API (Freely Available)
   $url  = "http://maps.googleapis.com/maps/api/json?latlng=".
            $lat.",".$lon."&sensor=false";
//Get content from google map api in json format
   $json = @file_get_contents($url);
//decode data
   $data = json_decode($json);
   $status = $data->status;
   $address = '';
   if($status == "OK"){
      $address = $data->results[0]->formatted_address;
    }
   return $address;
  }
 
 //you can change according to requirement or make it dynamic
  $latitude = '28.448381';  
  $longitude = '77.066707';
 // Call Above function
  $address = getAddress($latitude, $longitude);
   
if($address)
{
echo 'Address = '.$address;
}
else
{
echo "Address Not found";
}
// Output is 1868, Block A, Green Wood City, Sector 45, Gurgaon, Haryana 122003, India
 ?>