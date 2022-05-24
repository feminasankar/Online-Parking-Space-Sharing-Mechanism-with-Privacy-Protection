<?php 
// session_start();
// if(isset($_SESSION["email"])){
//   header("location:index.php");
// }
include("navbar.php");
?>
<body style="background-image:url(images/one.jpg)" >
    <section class="container-fluid sign-in-form-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 sign-up" style="text-align: center;">
                    <h3 style="background-color: #fff;color: #000;font-weight: bold;">How do you want to Login?</h3>                <p style="background-color: #fff;color: #000;">If you want to sign in as a User click on User login button otherwise click on owner login button.</p><br><br>
                    <div class="card col-sm-4">
                        <img src="images/use.png">
                        <a class="btn btn-info"  href='tenant-login.php'style="margin-top:10px;width:200px;background-color: #fff;color:#000;">User Login</a>
                    </div>
                    <div class="card col-sm-4">
                        <img src="images/own.png">
                        <a  class="btn btn-info"  href='owner-login.php'style="margin-top:10px;width:200px;background-color: #fff;color:#000;">Owner Login</a>
                    </div>
                    <div class="card col-sm-4">
                        <img src="images/admin.png">
                        <a  class="btn btn-info" href='admin-login.php' style="margin-top:10px;width:200px;background-color: #fff;color:#000;">Admin Login</a>
                    </div>
                </div>   
            </div>
        </div>
    </section>
</body>