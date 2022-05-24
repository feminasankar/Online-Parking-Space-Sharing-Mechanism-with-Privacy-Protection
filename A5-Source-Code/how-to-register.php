<?php 
include("navbar.php");

?>

<body style="background-image: url('images/one.jpg')";>
    <section class="container-fluid sign-in-form-section">
        <div class="container">
            <div class="row">

                <div class="col-md-12 sign-up" style="text-align: center;">
                    <h3 style="background-color:#fff;font-weight: bold;color:#000;">How do you want to Register?</h3>
                    <p style="color:#000;background-color:#fff">If you want to register as a User click on User register button otherwise click on owner register button.</p><br><br>
                    <CENTER>
                        <div class="card col-sm-4" style="margin-left: 180px;">
                            <img src="images/use.png">
                            <button type="submit" class="btn btn-info"  onclick="window.location.href='tenant-register.php'" style="width:200px; background-color: #fff;color:#000;">User Register</button>
                        </div>
                        <div class="card col-sm-4">
                            <img src="images/own.png">
                            <button type="submit" class="btn btn-info"  onclick="window.location.href='owner-register.php'" style="width:200px; background-color: #fff;color:#000;">Owner Register</button>
                        </div>

                    </CENTER>

                </div>
            </div>
        </div>
        </section>
    </body>
