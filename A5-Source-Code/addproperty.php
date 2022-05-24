 <?php 
session_start();

include("navbar.php");

?>
<body style="background-image:url('../images/ob1.jpg');color:#000">
  <div class="container" >
    <h3 style="font-weight: bold; text-align: center;color:#fff">Add Parking Slots</h3><br>
    <form method="post" action="addpro-engine.php" enctype="multipart/form-data">
      <div class="row" style="margin-left: 370PX;">
        <div class="col-sm-6" style="background-color: #fff;padding: 10px">
          <div class="form-group">
            <label for="City">City:</label>
            <input type="text" class="form-control" id="City" placeholder="Enter City" name="city" required>
          </div>
          <div class="form-group">
            <label for="Zone">Zone:</label>
            <input type="text" class="form-control" id="Zone" placeholder="Enter Zone." name="zone" required>
          </div>
          <div class="form-group">
            <label for="lati">Latitude:</label>
            <input type="number" step="0.0001" class="form-control" id="lati" placeholder="Enter Latitude." name="lati" required>
          </div>
          <div class="form-group">
            <label for="long">Longitude:</label>
            <input type="number" step="0.0001" class="form-control" id="long" placeholder="Enter Longitude." name="long" required>
          </div>
          <div class="form-group">
            <label for="Contact">Contact Number:</label>
            <input type="Contact" class="form-control" id="Contact" placeholder="Enter Contact number" name="contact" required>
          </div>
          <div class="form-group">
            <label   style="color:#fff;">Number of Availabile Slots</label>
            <input type="Number" class="form-control" id="lot" name="slot" placeholder="Number of Availabile Slots" required>
          </div>
          <div class="form-group"> 
            <label><b>Photo:</b></label>                    
            <input type="file" name="p_photo[]" placeholder="Photos" class="form-control name_list" required accept="image/*" />
          </div>
          <div class="form-group">
            <label>Your selected File:</label><br>
            <img src="" id="output_image"/ height="200px">
          </div>
          <center><button id="submit" name="add_property" class="btn btn-primary btn-block" style="background-color: #fff;color:#000;width:25%" onclick="return Validate()" href="owner-index.php">UPDATE</button></center><br>
        </div>
      </div>
    </form>
  </div>
</body>
<script
src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous"></script>

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
  // $(document).ready(function(){  
  //   var i=1;  
  //   $('#add').click(function(){  
  //    i++;  
  //    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="file" name="p_photo[]" placeholder="Photos" class="form-control name_list" required accept="image/*" /></td></td> <td><button id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
  //  });  
  // }
</script>