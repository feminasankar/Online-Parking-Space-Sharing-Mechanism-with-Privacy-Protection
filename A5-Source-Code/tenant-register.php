<?php 

include("navbar.php");

?>
<body style="background-image:url(images/one.jpg)">
  <div class="container">
    <h3 style="font-weight: bold; text-align: center;color:#000;background-color: #fff;">User Register</h3><hr><br>
    <form method="POST" action="tenant-engine.php" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0" style="background-color: #000;padding: 10PX  ">
          <div class="form-group">
            <label for="full_name"style="color:#fff;">User Name:</label>
            <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name" required>
          </div>
          <div class="form-group">
            <label for="email"style="color:#fff;">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password1"style="color:#fff;">Password:</label>
            <input type="password" class="form-control" id="password1" placeholder="Enter Password" name="password" required>
          </div>
          <div class="form-group">
            <label style="color:#fff;">Vehicle Model:</label>
            <input type="text" class="form-control" id="Vehicle_m" name="Vehicle_m" placeholder="Enter Vehicle Model " required>
          </div>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0" style="background-color: #000;padding: 10PX  ">
          <div class="form-group">
            <label for="phone_no"style="color:#fff;">Vehicle Number</label>
              <input type="text" class="form-control" id="phone_no" placeholder="Enter Vehicle Number" name="Vehicle_n" required>
            </div>
            <div class="form-group">
              <label for="id_type"style="color:#fff;">Type of ID:</label>
              <select class="form-control" name="id_type" required>
                <option>Vehicle Insurance</option>
                <option>Driving Licence</option>
              </select>
            </div>
            <div class="form-group">
              <label for="card_photo"style="color:#fff;">Upload your Selected Card:</label>
              <input type="file" class="form-control" placeholder="Upload id photo" name="id_photo" accept="image/*" onchange="preview_image(event)" required>
            </div>
            <div class="form-group">
              <label style="color:#fff;">Your selected File:</label><br>
              <img src="" id="output_image"/ height="200px" required>
            </div>
          </div>
        </div>
        <hr>
        <center><button id="submit" name="tenant_register" style="background-color:#fff;color: #000;width: 25%;"class="btn btn-primary btn-block" onclick="return Validate()">Register</button></center><br>
        <div class="form-group text-right">
          <label class=""style="color:#fff;">Register as a <a href="owner-register.php"style="color:#fff;">Owner</a>?</label><br>
        </div><br><br>
      </form>
    </div>
  </body>
  <script type='text/javascript'>
    function preview_image(event)
    {
      var reader = new FileReader();
      reader.onload = function()
      {
        var output = document.getElementById('output_image');
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>