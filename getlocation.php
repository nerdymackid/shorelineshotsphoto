<?php 
$long = $_GET['long'];
$lat = $_GET['lat'];
/*
$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$long.'&sensor=true');
$output= json_decode($geocode);
$city = $output->results[0]->geometry->location->lat;
$state = $output->results[0]->geometry->location->lat;
echo $city . ", " .$state;
*/


$url = "http://ws.geonames.org/findNearestAddressJSON?lat=".$lat."&lng=".$long;
$json = file_get_contents($url); 
$data = json_decode($json, true);
//Print Human Readable Array
//print_r($data);
$val = $data['address'];
echo $val["placename"].", ".$val["adminCode1"];
?>