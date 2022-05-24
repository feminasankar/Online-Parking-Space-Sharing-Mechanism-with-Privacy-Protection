<?php 
session_start();
include("config/config.php");
isset($_SESSION["email"]);
ISSET($_SESSION["slot_d"]);
include("navbar.php");
?>
<html>
<div class="card bg-primary col-sm-4" style="margin-left:38%;color: #fff">											
		<h4 class="card-title">Timing Extend For Parking Slot</h4>
		<div class="card-body">
			<form method="POST" action="pay.php">
				<div class="form-group">
					<label> Enter Time :</label>
					<input  type="number" class="form-control" style="width:100%"  placeholder="Hours"name="exttime" required>
					<br>
					<label>For the Reason :</label><br>
					<textarea type="text" class="form-control" style="width:100%"  name="name" required></textarea>  
				</div>
				<div class="form-group">
					<button class="btn btn-danger" id="submit" placeholder="Description" name="booku" style="margin-left: 40%"> submit</button>  
				</div>
			</form>
		</div>	
	</div>
</html>
<?php
if(isset($_POST['submit']))
{
	echo '<script>alert("Time Extended ");window.location.href="home.php"</script>';
}

?>