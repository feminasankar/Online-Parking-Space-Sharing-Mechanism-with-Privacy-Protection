<?php
  include("../config/config.php");
if (isset($_GET['ownerid'])) {
    $sw=$_GET['ownerid'];
  
    $sqlo="UPDATE owner SET approvel='Yes' WHERE owner_id =$sw";
   
    mysqli_query($db,$sqlo);
    header("location:admin-index.php");
  }



?>