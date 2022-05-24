<?php
session_start();
include("config/config.php");
include('navbar.php');
$id=$_SESSION['slot_d'];
$user=$_SESSION['user_id'];
$property_id=$_SESSION['prop'];
isset($_SESSION["email"]);
isset($_SESSION["user_id"]);
isset($_SESSION["slot_d"]);
isset($_SESSION["ownid"]);
?>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="css/bootstrap.min.js"></script>
	<script src="css/jquery-1.11.1.min.js"></script>
	<style>
		.submit-button {
			margin-top: 10px;
		}
	</style>
</head>
<title>Payment</title>
<body style="background-color: #34edd3">
	<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="css/bootstrap.min.js"></script>
	<script src="css/jquery-1.11.1.min.js"></script>
	<div class="container">
		<div class='row'>
			<div class='col-md-4'></div>
			<div class='col-md-4'>
				<script src='https://js.stripe.com/v2/' type='text/javascript'></script>
				<form accept-charset="UTF-8" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" /><input name="_method" type="hidden" value="PUT" /><input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div>
					<div class='form-row'>
						<div class='col-xs-12 form-group required'>
							<label class='control-label'>Name on Card</label>
							<input class='form-control' size='4' type='text'>
						</div>
					</div>
					<div class='form-row'>
						<div class='col-xs-12 form-group card required'>
							<label class='control-label'>Card Number</label>
							<input autocomplete='off' class='form-control card-number' size='20' type='text'>
						</div>
					</div>
					<div class='form-row'>
						<div class='col-xs-4 form-group cvc required'>
							<label class='control-label'>CVC</label>
							<input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
						</div>
						<div class='col-xs-4 form-group expiration required'>
							<label class='control-label'>Expiration</label>
							<input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
						</div>
						<div class='col-xs-4 form-group expiration required'>
							<label class='control-label'> </label>
							<input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
						</div>
					</div>
					<div class='form-row'>
						<div class='col-md-12'>
							<?php

							if(isset($_POST['bookt']))
							{
								$tdate=$_POST['tdate'];
								$fdate=$_POST['fdate'];
								$ttime=$_POST['ttime'];
								$ftime=$_POST['ftime'];
								$ttime1=$ttime*20;
								$oid=$_SESSION['ownid'];
								$sql2 = "INSERT INTO booking VALUES( NULL,'$property_id','$user','$fdate','$tdate','$ftime','$ttime1','no','$id','$oid')";
								$result4 = $db->query($sql2);

								$sql3="UPDATE slot SET available='no' WHERE slot_d=$id";
								$result5 = $db->query($sql3);

							}
							elseif(isset($_POST['booku'])){
								$ttime=$_POST['exttime'];
								$ttime1=$ttime*20;
							}
							?>
							<h3>Total Amount : <?php echo $ttime1; ?></h3>
							<h3>Amount per Hour : 20/- </h3>

						</div>
					</div>
					<div class='form-row'>
						
						<div class='col-md-12 form-group'>
							<input type="submit" name="pay"class='form-control btn btn-primary submit-button'value="PAY">
						</div>
					</div>
					<div class='form-row'>
						<div class='col-md-12 error form-group hide'>
							<div class='alert-danger alert'>
								Please correct the errors and try again.
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class='col-md-4'></div>
		</div>
	</div>
</body>
</html>
<?php
if(isset($_POST['pay']))
{
	$sql1="UPDATE booking SET payment='completed'";
	echo '<script>alert("Payment Confirmed");window.location.href="home.php"</script>';
	$result = $db->query($sql1);

}
?>

