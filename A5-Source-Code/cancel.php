<?php 
session_start();
isset($_SESSION["email"]);
isset($_SESSION["user_id"]);
ISSET($_SESSION["slot_d"]);
isset($_GET['slot_d']);
include("navbar.php");
include("config/config.php");
$id=$_GET['sid'];
$user=$_SESSION['user_id'];
$sql = "DELETE FROM booking WHERE user_id = $user and slot_d=$id";
$result = $db->query($sql);
$sql3="UPDATE slot SET available='yes' WHERE slot_d=$id";
$result5 = $db->query($sql3);
 echo '<script>alert("booking canceled")</script>' ; 
 header('location:home.php');
?>
