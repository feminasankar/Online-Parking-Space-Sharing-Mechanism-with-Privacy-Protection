  <?php 
session_start();
if(!isset($_SESSION["email"])){
  header("location:../index.php");
}

include("navbar.php");

 ?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body style="background-color: #34edd3">

 <div class="container-fluid">
  <ul class="nav nav-pills nav-justified">
    <li class="active" style="background-color: #FFF8DC"><a data-toggle="pill" href="#home">Property Lists</a></li>
    <li style="background-color: #FAF0E6"><a data-toggle="pill" href="#menu1">Owners Details</a></li>
    <li style="background-color: #FFFACD"><a data-toggle="pill" href="#menu2">User Details</a></li>
    <li style="background-color: #FAFACD"><a data-toggle="pill" href="#menu3">Booked Property</a></li>
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <center><h3>Parking Lists</h3></center>
      <div class="container-fluid">
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name">
            <div style="overflow-x:auto;">
              <table id="myTable">
                <tr class="header">
                  <th>Id.</th>
                  <th>City</th>
                  <th>Zone</th>
                  <th>Contact No.</th>
                  <th>Owner Id.</th>
                  <th>Property_photo.</th>
                  
                </tr>
                <?php 
        include("../config/config.php");

        $sql="SELECT * from add_property";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          $property_id=$rows['property_id'];
       ?>
                <tr>
                  <td><?php echo $rows['property_id'] ?></td>
                  <td><?php echo $rows['city'] ?></td>
                  <td><?php echo $rows['zone'] ?></td>
                   <td><?php echo $rows['contact_no'] ?></td>
                  <td><?php echo $rows['owner_id'] ?></td><td>
<?php $sql2="SELECT * from property_photo where property_id='$property_id'";
        $query=mysqli_query($db,$sql2);

        if(mysqli_num_rows($query)>0)
      {
          while($row=mysqli_fetch_assoc($query)){ ?>
                  <img src="../owner/<?php echo $row['p_photo'] ?>" width="50px">
                <?php }}}} ?>
                </td>
                </tr>
              </table> 
            </div>
    </div>
  </div>


    <div id="menu1" class="tab-pane fade">
      <center><h3>Owner Details</h3></center>
      <div class="container-fluid">
      <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search..." title="Type in a name">

              <table id="myTable2">
                <tr class="header">
                  <th>Id.</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Phone No.</th>
                  <th>Address</th>
                  <th>Id Proof</th>
                   <th>Permission</th>
                </tr>
                <?php 
        include("../config/config.php");

        $sql="SELECT * from owner";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                <tr>
                  <td><?php echo $rows['owner_id'] ?></td>
                  <td><?php echo $rows['full_name'] ?></td>
                  <td><?php echo $rows['email'] ?></td>
                  <td><?php echo $rows['password'] ?></td>
                  <td><?php echo $rows['phone_no'] ?></td>
                  <td><?php echo $rows['address'] ?></td>
                  <td><img id="myImg" src="../<?php echo $rows['id_photo'] ?>" width="50px"></td>
                  <?php if($rows["approvel"]=="Yes"){
                     ?> 
                     <td><?php echo $rows['approvel'] ?></td>
                     <?php
                  }
                  else{
                    ?>
                  <td><a href="approval.php?ownerid='<?php echo $rows['owner_id'];?> '" class="btn btn-primary" name="owner_approve" style="width:100%;margin-top: 10px;">Approval</a></td>

                  <?php $_SESSION["ownerid"]=$rows['owner_id'];}?>
                  
                  <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                  </div>
                </tr>
              <?php }} ?>
              </table>   
    </div>
    </div>


    <div id="menu2" class="tab-pane fade">
      <center><h3>User Details</h3></center>
      <div class="container">
      <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Search..." title="Type in a name">

              <table id="myTable3">
                <tr class="header">
                  <th>Id</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Vehicle Model</th>
                  <th>Vehicle Number</th>
                  <th>Type of proof</th>
                  <th>Id Photo</th>
                </tr>

      <?php 
        include("../config/config.php");
        

        $sql="SELECT * from user";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                <tr>
                  <td><?php echo $rows['user_id'] ?></td>
                  <td><?php echo $rows['full_name'] ?></td>
                  <td><?php echo $rows['email'] ?></td>
                  <td><?php echo $rows['password'] ?></td>
                  <td><?php echo $rows['vehicle_m'] ?></td>
                  <td><?php echo $rows['vehicle_n'] ?></td>
                  <td><?php echo $rows['id_type'] ?></td>
                  <td><img id="myImg2" src="../<?php echo $rows['id_photo'] ?>" width="50px"></td>

                  <div id="myModal2" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img02">
                    <div id="caption2"></div>
                  </div>

                </tr>
              <?php }} ?>
              </table> 
    </div>
    </div>




    <div id="menu3" class="tab-pane fade">
      <center><h3>Booked Property</h3></center>
      <div class="container">
        <input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Search..." title="Type in a name">

              <table id="myTable4">
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
        

        $sql="SELECT * from booking";
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
                
              <?php }} ?>
              </table> 
    </div>
    </div>



  </div>
</body>




<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  th = table.getElementsByTagName("th");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
      for(var j=0; j<th.length; j++){
        td = tr[i].getElementsByTagName("td")[j];      
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
          {
            tr[i].style.display = "";
            break;
           }
        }
      }
  }
}
</script>

<script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
  tr = table.getElementsByTagName("tr");
  th = table.getElementsByTagName("th");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
      for(var j=0; j<th.length; j++){
        td = tr[i].getElementsByTagName("td")[j];      
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
          {
            tr[i].style.display = "";
            break;
           }
        }
      }
  }
}
</script>

<script>
function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable3");
  tr = table.getElementsByTagName("tr");
  th = table.getElementsByTagName("th");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
      for(var j=0; j<th.length; j++){
        td = tr[i].getElementsByTagName("td")[j];      
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
          {
            tr[i].style.display = "";
            break;
           }
        }
      }
  }
}
</script>
<script>
function myFunction4() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput4");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable4");
  tr = table.getElementsByTagName("tr");
  th = table.getElementsByTagName("th");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
      for(var j=0; j<th.length; j++){
        td = tr[i].getElementsByTagName("td")[j];      
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
          {
            tr[i].style.display = "";
            break;
           }
        }
      }
  }
}
</script>


              <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

<script>
// Get the modal
var modal2 = document.getElementById("myModal2");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img2 = document.getElementById("myImg2");
var modalImg2 = document.getElementById("img02");
var captionText2 = document.getElementById("caption2");
img2.onclick = function(){
  modal2.style.display = "block";
  modalImg2.src = this.src;
  captionText2.innerHTML = this.alt;
}
var span2 = document.getElementsByClassName("close")[1];
span2.onclick = function() { 
  modal2.style.display = "none";
}
</script>

