<?php
$db = new mysqli('localhost','root','','parking');

if($db->connect_error){
	echo "Error connecting database";
}

if(isset($_POST['add_property'])){
	add_property();
}
if(isset($_POST['owner_update'])){
	owner_update();
}
session_start();
function add_property(){
session_start();
$city=$_POST['city'];
$zone=$_POST['zone'];
$lat=$_POST['lati'];
$lon=$_POST['long'];
$contact=$_POST['contact'];
$slots=$_POST['slot'];
$booked="No";
$owner_id= $_SESSION["owner_id"];
$query= "insert into add_property values(NULL,'$city','$zone','$lat','$lon','$contact','$booked','$slots','$owner_id')";
include("../config/config.php");
mysqli_query($db,$query);
$property_id = mysqli_insert_id($db);

$countfiles =count($_FILES['p_photo']['name']);

for($i=0;$i<$countfiles;$i++){
  $paths = $_FILES['p_photo']['tmp_name'][$i];
  if($paths!="")
  {
    $path="product-photo/" . $_FILES['p_photo']['name'][$i];
    if(move_uploaded_file($paths, $path)) {
      $sql2 = "INSERT INTO property_photo(p_photo,property_id) VALUES('$path','$property_id')";
      $query=mysqli_query($db,$sql2);
    }}
  }
  for($s=1;$s<=$slots;$s++){
    $sql3="INSERT INTO slot  values(NULL,'$property_id','yes')";
    $query1=mysqli_query($db,$sql3);
  }
  header("Location:owner-index.php");
}?>
<?php
function owner_update(){
	global $owner_id,$full_name,$email,$password,$phone_no,$address,$id_type,$id_photo,$errors,$db;
	$owner_id=validate($_POST['owner_id']);
	$full_name=validate($_POST['full_name']);
	$email=validate($_POST['email']);
	$phone_no=validate($_POST['phone_no']);
	$address=validate($_POST['address']);
	
			$sql = "UPDATE owner SET full_name='$full_name',email='$email',phone_no='$phone_no',address='$address' WHERE owner_id='$owner_id'";
		$query=mysqli_query($db,$sql);
    header("location:owner-index.php");
		if(!empty($query)){
			?>

<style>
.alert {
  padding: 20px;
  background-color: #DC143C;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<script>
	window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
<div class="container">
<div class="alert" role='alert'>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <center><strong>Your Information has been updated.</strong></center>
</div></div>
<?php
}}

function validate($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>