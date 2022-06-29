<!DOCTYPE html>
<html lang="en">
   <?php 
   session_start();

      include_once('_head.php');
      include_once('css/ui_alerts.html');
      
      ?>
   <body>
      <?php 
         include_once('_navbar.php');
         ?>
      <!-- side bar end -->
      <div class="row">
         <div class="col-md-3">
            <?php 
               include('_sidebar.php');
               ?>
         </div>
         <div class="col-md-9" style="margin-top:55px;">
            <?php
               include("../config.php");
               if(isset($_POST['update'])) {
                   $id = mysqli_real_escape_string($connection, $_POST['id']);
                   $city = mysqli_real_escape_string($connection, $_POST['city']);
                   $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
                   $originAddress = mysqli_real_escape_string($connection, $_POST['originAddress']);
                   $destinationAddress = mysqli_real_escape_string($connection, $_POST['destinationAddress']);
                   $distance_covered = mysqli_real_escape_string($connection, $_POST['distance_covered']);
                   $bill = mysqli_real_escape_string($connection, $_POST['bill']);
                   $fuel_expense = mysqli_real_escape_string($connection, $_POST['fuel_expense']);
                   $driver_expense = mysqli_real_escape_string($connection, $_POST['driver_expense']);
                   $bill_status = mysqli_real_escape_string($connection, $_POST['bill_status']);
               
                   if( empty($city) || empty($user_email) || empty($originAddress) || empty($destinationAddress) || empty($distance_covered) || empty($bill) || empty($fuel_expense) || empty($driver_expense) || empty($bill_status)){
                       if( empty($city) ){
                           echo "<font color= 'red'>city field is empty. </font>";
                       }
                       if( empty($user_email) ){
                           echo "<font color= 'red'>user_email field is empty. </font>";
                       }
                       if( empty($originAddress) ){
                           echo "<font color= 'red'>originAddress field is empty. </font>";
                       }
                       
                       if( empty($destinationAddress) ){
                        echo "<font color= 'red'>Destination Address field is empty. </font>";
                       }
                       if( empty($distance_covered) ){
                        echo "<font color= 'red'> Distance field is empty. </font>";
                       }
                       
                       if( empty($bill) ){
                        echo "<font color= 'red'> Bill field is empty. </font>";
                       }
                       if( empty($fuel_expense) ){
                        echo "<font color= 'red'> Fuel_expense field is empty. </font>";
                       }
                       if( empty($driver_expense) ){
                        echo "<font color= 'red'> Driver_expense field is empty. </font>";
                       }
                       if( empty($bill_status) ){
                        echo "<font color= 'red'> Bill status field is empty. </font>";
                       }
                       
                    }
                   else
                   {   $total_bill = $bill+$fuel_expense+$driver_expense;
                       $result  = mysqli_query($connection, "UPDATE `trip` SET `city`='$city',`user_email`='$user_email',`originAddress`='$originAddress',`destinationAddress`='$destinationAddress',`distance_covered`='$distance_covered',`bill`='$bill',`fuel_expense`='$fuel_expense',`driver_expense`='$driver_expense',`bill_status`='$bill_status',`total_bill`='$total_bill' WHERE `id`= $id");
                       if ($result) {
                          echo" <div class=\"uk-alert-primary\" uk-alert>
                           <a class=\"uk-alert-close\" uk-close></a>
                           <p>Update successfully! </p>";
                           ?>
            <script>window.location.href=('all_trips.php');</script>
            <?php }
               }
               
               }
               ?>
            <?php
               //getting id from url
               // $id = $_GET['id'];
               $id=isset($_GET['id']) ? $_GET['id'] : die("");
               $result = mysqli_query($connection, "SELECT * FROM `trip` WHERE id =$id");
               
               while($p = mysqli_fetch_array($result))
               {
                   $id = $p['id'];
                   $city = $p['city'];
                   $user_email = $p['user_email'];
                   $originAddress = $p['originAddress'];
                   $destinationAddress = $p['destinationAddress'];
                   $distance_covered = $p['distance_covered'];
                   $bill = $p['bill'];
                   $fuel_expense = $p['fuel_expense'];
                   $driver_expense = $p['driver_expense'];
                   $bill_status = $p['bill_status'];
               }
               ?>
            <h3>EDIT TRIP</h3>
            <form action="edit_trip.php" method="POST" class="mt-4" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="city">City</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $city?>" name="city">
                  <input type="hidden" name= "id" value="<?php echo $id;?>">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">User Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user_email?>" name="user_email">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">originAddress</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $originAddress?>" name="originAddress">
               </div>
               
               <div class="form-group">
                  <label for="exampleInputPassword1">Destination Address</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $destinationAddress?>" name="destinationAddress">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Bill</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" value="<?php echo $bill?>" name="bill">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Fuel_expense</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" value="<?php echo $fuel_expense?>" name="fuel_expense">
               </div>
               
               <div class="form-group">
                  <label for="exampleInputPassword1">Distance</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $distance_covered?>" name="distance_covered">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Driver_expense</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" value="<?php echo $driver_expense?>" name="driver_expense">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Bill Status</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $bill_status?>" name="bill_status">
               </div>
               <button type="submit" class="btn btn-primary" name="update" onclick="history.back();">Update</button>
            </form>
         </div>
      </div>
      <!--======== SCRIPT FILES =========-->
      <script src="js/jquery.min.js"></>
         <script src="js/bootstrap.min.js">
      </script>
      <script src="js/materialize.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>