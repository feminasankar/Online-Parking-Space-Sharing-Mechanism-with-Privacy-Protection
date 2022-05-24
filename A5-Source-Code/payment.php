<?php
session_start();
include('navbar.php');
$ownid=$_SESSION['owner_id'];
?>
<html>
<style>
	#customers ,h3{
		font-family: 'Roboto Slab', serif;
		border-collapse: collapse;
		letter-spacing: 2px;
		width: 100%;
	}

	#customers td, #customers th {
		border: 1px solid #ddd;

		padding: 8px;
	}

	#customers tr:nth-child(even){background-color: #f2f2f2;}

	#customers tr:hover {background-color: #ddd;}

	#customers th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color:#005298;
		color: #fff;
	}
	</style>
<center><h3>Booked Property</h3></center>
<div class="container">
	<table id="customers">
		<tr class="header">
			<th>Booking  Id</th>
			<th>Property Id</th>
			<th>User Id</th>
			<th>Starting Date</th>
			<th>Ending Date</th>
			<th>Time</th>
			<th>Amount</th>
			<th>Payment Status</th>
		</tr>

		<?php 
		include("../config/config.php");
		$sql="SELECT * from booking WHERE owner_id='$ownid'";
		$result=mysqli_query($db,$sql);
		if(mysqli_num_rows($result)>0)
		{
			while($rows=mysqli_fetch_assoc($result)){

				?>
				<tr>
					<td><?php echo $rows['booking_id'] ?></td>
					<td><?php echo $rows['property-id'] ?></td>
					<td><?php echo $rows['user_id'] ?></td>
					<td><?php echo $rows['fdate'] ?></td>
					<td><?php echo $rows['tdate'] ?></td>
					<td><?php echo $rows['stime'] ?></td>
					<td><?php echo $rows['etime'] ?></td>
					<td><?php echo $rows['payment'] ?></td>
				</tr>
				<?php 
			}
		} ?>
	</table> 
</div>

</html>