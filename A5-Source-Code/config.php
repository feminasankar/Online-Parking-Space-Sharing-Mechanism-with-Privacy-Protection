<?php 

$db = new mysqli('localhost','root','','parking');

if($db->connect_error){
	echo "Error connecting database";
}

 ?>