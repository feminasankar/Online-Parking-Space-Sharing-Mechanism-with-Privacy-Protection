<?php 
include("navbar.php");
include("owner-engine.php");

?>
<body style="background-image:url(images/one.jpg)">
  <div class="container">
    <h3 style="font-weight: bold; text-align: center;color: #000;background-color: #FFF">Owner Login</h3><br><br>
    <div style="margin-right:100px; padding-left:300px">    
      <div class="card" style="width: 45rem;">
        <div class="card-body col-sm-12"style="background-color: #000;color:#fff;padding:10px;margin-left:65px">
          <form method="POST">
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
            </div>
            <div class="form-group">
              <a style="color:#FFf" href="forgot-password-owner.php">Lost your Password ? </a> 
            </div>
            <center><input style="width:25%;background-color: #fff;color:#000"type="submit" id="submit" name="owner_login" class="btn btn-primary btn-block" value="Login"></center>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>