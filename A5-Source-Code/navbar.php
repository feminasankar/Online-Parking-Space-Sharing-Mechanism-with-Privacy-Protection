<!DOCTYPE html>
<html lang="en">
<head>
  <title>Parking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<nav class="navbar navbar-expand-sm navbar-light justify-content-between" style="background-color:#ff4c56;color:#000;margin-left: -15px">
  <div class="container-fluid">
  <a class="navbar-header" href="index.php">
    <img src="../images/logo2.png" alt="logo" style="height:50px;">
  </a>
  
  <!-- Links -->
  <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link" style="color:black;color:black;font-family:'elephant';font-size: 14px"href="owner-index.php">Home</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" style="color:black;color:black;font-family:'elephant';font-size: 14px"href="payment.php">payments</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color:black;color:black;font-family:'elephant';font-size: 14px"href="addproperty.php">Add Slots</a>
    </li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <?php 
if(isset($_SESSION["email"]) && !empty($_SESSION['email'])){
  echo '<li><a  style="font-family:elephant;font-size: 14px;color:black"href="../logout.php">Logout</a></li>';
}

else {?>
      <li><a href="../how-to-register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="../how-to-login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <?php } ?>
    </ul>
  </div>
</nav>

</body>
</html>
