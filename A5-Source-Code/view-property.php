<?php 
session_start();
isset($_SESSION["email"]);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.css"/>
        <style>
            #map{
                height:500px;
               
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> 
        <script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/bundle.min.js"></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  <style>
   #mapid { height: 180px; }
   .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 100%;
    min-width: 100%;
    margin: auto;
    text-align: center;
    font-family: arial;
    color: #fff;
    display: inline;
    
  }
  .image1 {
    min-width: 40%;
    min-height: 100px;
    max-width: 100%;
    max-height:80px;
  }

</style>
</head>
<body style="color: #000;">




  <?php 
  include('config/config.php');
  include('navbar.php');
  include('review-engine.php');

  ?>

<?php

$property_id=$_GET['property_id'];
$sql="SELECT * from add_property where property_id='$property_id'";
$query=mysqli_query($db,$sql);


if(mysqli_num_rows($query)>0)
{
  while($rows=mysqli_fetch_assoc($query)){         
    $_SESSION['ownid']=$rows['owner_id'];
     $_SESSION['prop']=$rows['property_id'];
    $lat=$rows['latitude'];
    $long=$rows['longitude'];

echo " <script>
var lat=0;
var log=0;
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = 'Geolocation is not supported by this browser.';
  }


function showPosition(position) {
  lat = position.coords.latitude ;
  console.log(lat);
  log = position.coords.longitude;
  console.log(log);
}
jQuery(document).ready(function($) { 
            
  var map = L.map('map', {center: [13.0524615, 80.2220993], zoom:12}); 
//Creates a leaflet map centered at center [latitude, longitude] coordinates.

L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href=\'https://www.openstreetmap.org/copyright\'>OpenStreetMap</a>',subdomains: ['a', 'b', 'c'] }).addTo(map); 
//Creates the attribution box at the top bottom right of map.

const provider = new window.GeoSearch.OpenStreetMapProvider();
const search = new GeoSearch.GeoSearchControl({provider: provider, style: 'bar', updateMap: true, autoClose: true,}); 
// Include the search box with usefull params. Autoclose and updateMap in my case. Provider is a compulsory parameter.
map.addControl(search);";

  
    echo "L.Routing.control({
      waypoints: [
          
          L.latLng(lat,log),
          L.latLng($lat,$long)
      ],
      routeWhileDragging: true
  }).addTo(map);";
      echo "});</script>";
 

?>

  <?php



      $sql2="SELECT * FROM property_photo where property_id='$property_id'";
      $query2=mysqli_query($db,$sql2);

      $rowcount=mysqli_num_rows($query2);
      ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">


            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <?php
                for($i=1;$i<=$rowcount;$i++)
                {
                  $row=mysqli_fetch_array($query2);
                  $photo=$row['p_photo']; 
                  ?>

                  <?php 
                  if($i==1)
                  {
                    ?>
                    <div class="item active">
                      <img class="d-block img-fluid" src="owner/<?php echo $photo ?>" alt="First slide" width="100%" style="max-height: 600px; min-height: 600px;">
                    </div>
                    <?php 
                  }
                  else
                  {
                    ?> 
                    <div class="item">
                      <img class="d-block img-fluid" src="owner/<?php echo $photo ?>" alt="First slide" width="100%" style="max-height: 600px; min-height: 600px;">
                    </div>

                    <?php
                  }
                }
                ?>

              </div>

            </div>

          </div>
          <div class="col-sm-6">
            <center><h1> PARKING AVAILABILE</h1></center>
            <table >
              <tr>
                <td><h3>City:&nbsp;<br></h3></td>
                <td><h3><?php echo $rows['city']; ?></h3></td>
              </tr>
              <td><h3>Zone:&nbsp;<br></h3></td>
              <td><h3><?php echo $rows['zone']; ?></h3></td>
            </tr>
            <tr style="display:none;">
              <td><h3>Contact No.:</h3></td>
              <td><h4><?php echo $rows['contact_no']; ?></h4></td>
            </tr>
          </table>
          <div id="map"></div> 
          <div class="row">
            <?php
            $sql= "SELECT * FROM slot WHERE property_id=$property_id";
            $query=mysqli_query($db,$sql);
            if(mysqli_num_rows($query))
            { 
             while ($rows=mysqli_fetch_assoc($query)) {
              if($rows["available"]=='yes'){
                ?>
                <div class="col-sm-3">
                  <div class="card" style="width:30%;margin:10px;">
                    <div class="card-body"style="background-color:black;color:#fff;padding: 10px;">
                      <h4 class="card-title">Park id:<?php echo $rows["slot_d"] ?></h4>
                      <img style="width:80%;"src="images/image.png">
                      <h6 class="card-title">Available:<?php echo $rows["available"] ?></h6>
                      <a href="bookpark.php?sid=<?php echo $rows["slot_d"] ?>" class="btn btn-danger">Book now</a>
                    </div>
                  </div>
                </div>

                <?php
              }
              else{
                ?>
                <div class="col-sm-3">
                  <div class="card" style="width:30%;margin:10px; ">
                    <div class="card-body"style="background:red;color: #fff;padding: 10px;">
                      <h4 class="card-title">Park id:<?php echo $rows["slot_d"] ?></h4>
                      <img style="width:80%;"src="images/image.png">
                      <h6 class="card-title">Available:<?php echo $rows["available"] ?></h6>
                    </div>
                  </div>
                </div>
                <?php   
              }
            }}
            else{
             echo '<script>alert("No Parking Space is availabile");window.location.href="home.php"</script>';
            }
            ?>
          </div>
        </div>

      </div> 


    </div>
  </div>
  <br>
  
  <br>
<?php }} ?>
</div>

