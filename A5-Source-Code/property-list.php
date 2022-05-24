<?php 
include("config/config.php");
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.card {
  box-shadow: white;
  max-width: 100%;
  min-width: 100%;
  margin: auto;
  text-align: center;
  font-family: arial;
  color: black;
  display: inline;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  opacity: 0.8;
}

.container {
  padding: 2px 16px;
}

.btn {
  width: 100%;
 /* background-color:   #fcedce;*/
}

.image {
  min-width: 100%;
  min-height: 200px;
  max-width: 100%;
  max-height:200px;
}
</style>
</head>
<body style="background-color: #fff">
<?php 

$sql="SELECT * FROM add_property";
    $query=mysqli_query($db,$sql);

    if(mysqli_num_rows($query)>0)
    {
      while ($rows=mysqli_fetch_assoc($query)) {
        $property_id=$rows['property_id'];

?>

<div class="col-sm-2">
<div class="card">
<?php


        $sql2="SELECT * FROM property_photo where property_id='$property_id'";
    $query2=mysqli_query($db,$sql2);

    if(mysqli_num_rows($query2)>0)
    {
      $row=mysqli_fetch_assoc($query2); 
        $photo=$row['p_photo'];
        echo  '<img class="image" src="owner/'.$photo.'">'; }?>

  <p><?php echo $rows['city'].', '.$rows['zone'] ?></p> 
  <p><?php echo '<a href="view-property.php?property_id='.$rows['property_id'].'"  class="btn  btn-primary" style="background-color:#ff4c56;color:#000">View Property </a><br>'; ?></p><br>
</div>
</div>

</body>
</html> 


<?php 

}
    }
    ?>