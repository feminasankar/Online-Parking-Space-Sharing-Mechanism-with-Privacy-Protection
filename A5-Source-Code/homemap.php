<?php 
session_start();

include("navbar.php");
include("config/config.php");
 ?>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.css"/>
        <style>
            #map{
                height:500px;
                margin:0px 20%;
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> 
        <script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/bundle.min.js"></script>
 <style>
body, html {
  background-image: url("images/one.jpg");
  background-repeat: no-repeat;

  background-size:cover;
      background-color:#fff;  
  height: 100%;
  margin: 0;
}



.fa {
  padding: 20px;
  font-size: 30px;
  text-align: left;
  text-decoration: none;
  margin: 5px 2px;
}
.fa:hover {
    opacity: 0.7;
}
.fa-facebook {
  background: #3B5998;
  color: white;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
}
.active-cyan-3 input[type=text] {
  border: 1px solid #fff;
  box-shadow: 0 0 0 1px #fff;
}
</style>

         
<?php
echo " <script>jQuery(document).ready(function($) { 
              
  var map = L.map('map', {center: [13.0524615, 80.2220993], zoom:12}); 
//Creates a leaflet map centered at center [latitude, longitude] coordinates.

L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href=\'https://www.openstreetmap.org/copyright\'>OpenStreetMap</a>',subdomains: ['a', 'b', 'c'] }).addTo(map); 
//Creates the attribution box at the top bottom right of map.

const provider = new window.GeoSearch.OpenStreetMapProvider();
const search = new GeoSearch.GeoSearchControl({provider: provider, style: 'bar', updateMap: true, autoClose: true,}); 
// Include the search box with usefull params. Autoclose and updateMap in my case. Provider is a compulsory parameter.
map.addControl(search);";
$sql1="SELECT * FROM add_property INNER JOIN property_photo ON add_property.property_id = property_photo.property_id";
$query1=mysqli_query($db,$sql1);

    if(mysqli_num_rows($query1)>0)
    {
      while ($rows=mysqli_fetch_assoc($query1)) {
        $photo=$rows['p_photo'];
        $lat=$rows['latitude'];
        $lon=$rows['longitude'];
        $city=$rows['city'];
        $zone=$rows['zone'];
        $id=$rows['property_id'];
    echo "L.marker([$lat,$lon]).addTo(map).bindPopup('<img class=\'image\' width=\'125px\' src=\'owner/$photo\'><br><p>$zone,$city</p><br> <a href=\'view-property.php?property_id=$id\' class=\'btn  btn-primary\' style=\'background-color:#ff4c56;color:#000\'>View Property </a><br>'); ";
      }
      echo "});</script>";
    }

?>

<div id="map"></div> 