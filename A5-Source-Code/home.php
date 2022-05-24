<?php 
session_start();

include("navbar.php");

 ?>
 <style>
body, html {
  background-image: url("images/one.jpg");
  background-repeat: no-repeat;

  background-size:cover;
      background-color:#fff;  
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("images/hm.gif");
  /* Full height */
  height: 60%; 
  /* Center and scale the image nicely */
  background-position: bottom;
  background-repeat: no-repeat;
  background-color: transparent;
  background-size:auto ;
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

<div class="bg"></div><br>
<div class="container active-cyan-4 mb-4 inline">
	<form method="POST" action="search-property.php">
  <input class="form-control" type="text" placeholder="Enter location to check the parking slots" name="search_property" aria-label="Search">
  </form>
</div>
<br><br>
<?php 

include("property-list.php");

 ?>
 <br><br>