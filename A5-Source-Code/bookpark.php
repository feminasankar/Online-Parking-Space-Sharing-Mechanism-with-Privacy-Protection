<?php 
session_start();
isset($_SESSION["email"]);
isset($_SESSION["user_id"]);
?>
<?php
include("config/config.php");
include('navbar.php');
$id = $_GET["sid"];
$_SESSION["slot_d"]=$id;
echo $id;
$oid=$_SESSION['ownid'];
echo $oid;
$user=$_SESSION['user_id'];
echo $user;
$property_id=$_SESSION['prop'];
echo $property_id;
$sql3="SELECT * FROM user WHERE user_id=$user";
$result4 = $db->query($sql3);
$sql4="SELECT * FROM add_property WHERE property_id=$property_id";
$result5 = $db->query($sql4);
$sql = "SELECT * FROM slot WHERE slot_d=$id";
$result = $db->query($sql);
$sql1 = "SELECT * FROM owner WHERE owner_id=$oid";
$result1 = $db->query($sql1);
if ($result4->num_rows) {
    $data4 = $result4->fetch_assoc();
    if ($result5->num_rows) {
        $data3 = $result5->fetch_assoc();
        if ($result->num_rows) {
            $data = $result->fetch_assoc();
            if ($result1->num_rows) {
                $data1 = $result1->fetch_assoc();
                ?>
                <body style="font-family:Verdana, Helvetica, sans-serif;font-size:20px ;background-image: url('images/bg.jpg');background-position:fixed">
                    <div class="row" >
                        <div class=" card col-sm-6" style="margin-left: 25%;margin-top: 10px;background-color: #000;color: white">
                            <table>
                                <tr>
                                    <td>
                                        <h4>Parking id: <?php echo $data['slot_d']; ?></h4> 
                                    </td>
                                    <td>
                                        <h4>&nbsp;&nbsp;available: <?php echo $data['available']; ?></h4>
                                    </td>   
                                </tr>
                                <tr>
                                  <td>
                                    <h4>Owner Name: <?php echo $data1['full_name']; ?></h4> 
                                </td>
                                <td>
                                    <h4>&nbsp;&nbsp;Owner Contact : <?php echo $data1['phone_no']; ?></h4>
                                </td>   
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <form method="post" action="pay.php">
                        <div class="card col-sm-3" style="margin-left: 25%;margin-top: 10px;background-color: #000;color: white">
                            <div class="form-group">
                                <label for="">from Date</label>
                                <input id="date1" name="fdate" type="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">To Date</label>
                                <input id="date2" name="tdate" type="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Vehicle</label>
                                <select id="date2" name="option" type="model" class="form-control" required>
                                <option>Four Wheeler </option>
                                <option>Two Wheeler </option>
                            </select>
                            </div>
                        </div>
                        <div class="card col-sm-3" style="margin-left:10px;margin-top: 10px;background-color: #000;color: white;padding: 10px;">
                            <div class="form-group">
                                <label for="">Starting Time</label>
                                <input id="time1" name="ftime" type="time" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for=""> Time in hours </label>
                                <input id="time2" name="ttime" type="number" class="form-control" required>
                            </div>
                            <br>
                            <button class="btn btn-block btn-primary" type="submit" name="bookt" id="apply">Confirm Booking</button>
                        </div>
                        
                        </div>
                    </form>
                </div>
            </body>
        <?php        } } }}

        ?>
        

