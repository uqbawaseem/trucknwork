<?php
   session_start();
   include('config.php');
   if (!isset($_SESSION['email'])){
      echo "<script>window.alert(\"Please Login First\");</script>";
      header("location:userLogin.php");
     }
   ?>
<!doctype html>
<html class="no-js" lang="en">	
<?php include('_head.php'); 
      ?>
   <body>
    <?php
         include_once("config.php");
         if(isset($_POST['submit'])) {
            $city = mysqli_real_escape_string($connection, $_POST['city']);
            $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
            $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
            $user_phone = mysqli_real_escape_string($connection, $_POST['user_phone']);
            $originAddress = mysqli_real_escape_string($connection, $_POST['originAddress']);
            $destinationAddress = mysqli_real_escape_string($connection, $_POST['destinationAddress']);
            $distance_covered = mysqli_real_escape_string($connection, $_POST['distance_covered']);
            $fuel_expense = mysqli_real_escape_string($connection, $_POST['fuel_expense']);
            $driver_expense = mysqli_real_escape_string($connection, $_POST['driver_expense']);
            $truck_id = mysqli_real_escape_string($connection, $_POST['truck_id']);
            $driver_id = mysqli_real_escape_string($connection, $_POST['driver_id']);
            if( empty($city) || empty($user_email) || empty($user_phone) || empty($user_id) || empty($originAddress) || empty($destinationAddress)|| empty($truck_id)||
            empty($driver_id) || empty($distance_covered)){
               if( empty($city) ){
                     echo "<font color= 'red'>Name field is empty. </font>";
               }
               if( empty($city) ){
                     echo "<font color= 'red'>TYPE field is empty. </font>";
               }
               if( empty($user_phone) ){
                     echo "<font color= 'red'>description field is empty. </font>";
               }
               if( empty($user_id) ){
                     echo "<font color= 'red'>salary field is empty. </font>";
               }
               if( empty($originAddress) ){
                     echo "<font color= 'red'>Origin Address field is empty. </font>";
               }
               if( empty($destinationAddress) ){
                     echo "<font color= 'red'>destinationAddress field is empty. </font>";
               }
               if( empty($distance_covered) ){
                  echo "<font color= 'red'>distane field is empty. </font>";
            }
               if( empty($truck_id) ){
                     echo "<font color= 'red'>Truck field is empty. </font>";
               }
               if( empty($driver_id) ){
                     echo "<font color= 'red'>Driver field is empty. </font>";
               }
            }
            else
               {
                  if($distance_covered <= 20){
                     $bill = 5000;
                  }
                  elseif($distance_covered <= 40){
                     $bill = 10000;
                  }
                  elseif($distance_covered <= 70){
                     $bill = 15000;
                  }
                  elseif($distance_covered <= 100){
                     $bill = 20000;
                  }
                  else{
                     $bill = 50000;
                  }
                     mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=0");
                     $total_bill = $bill+$fuel_expense+$driver_expense;
                     $query = "INSERT INTO `trip`(`city`, `user_email`, `originAddress`, `destinationAddress`, `distance_covered`, `truck_id`, `driver_id`, `user_id`, `user_phone`, `bill`, `total_bill`) VALUES ('$city','$user_email','$originAddress','$destinationAddress','$distance_covered','$truck_id','$driver_id','$user_id', '$user_phone', '$bill', '$total_bill')";
                     $result  = mysqli_query($connection, $query) or die ("ERROR");
                  
                     mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=1");
                     mysqli_close($connection);
                     header('location:index.php');
                     echo "<div class=\"uk-alert-primary\" uk-alert>
            <a class=\"uk-alert-close\" uk-close></a>
            <p>Trip Book successfully!</p>
               </div>";
                                          
               }

         }
?>
      <?php  
          if ($_SESSION['email']){
            $session_email = $_SESSION['email'];
            $query = "SELECT * from `user` WHERE email ='$session_email'";
            $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
            while($a = mysqli_fetch_array($result)){
      ?> 
      <div class="container mt-5">
         <h3 style="text-align: center;"> BOOK A TRUCK</h3>
         <form action="bookAtruck.php" method="POST" name="form2" enctype="multipart/form-data">
            <div class="col mt-3">
               <input type="hidden" name="user_id" class="form-control input-lg" value="<?php echo $a['id'];?>">
               <input type="hidden" name="fuel_expense" class="form-control input-lg" value="2000">
               <input type="hidden" name="driver_expense" class="form-control input-lg" value="1000">
               <input type="text" class="form-control" name="city" placeholder="City">
            </div><br>
            <div class="col">
               <div class="form-group">
                  <input type="email" class="form-control" name="user_email" placeholder="Email" value="<?php echo $a['email'];?>">
               </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control" name="user_phone" placeholder="Phone Number" value="<?php echo $a['phone'];?>">
                </div>
                <?php }} ?>
            </div>
            <div class="col">
               <div class="form-group">
                  <input type="text" class="form-control" name="originAddress" placeholder="Origin Address">
               </div>
            </div>
            <div class="col">
               <div class="form-group">
                  <input type="text" class="form-control" name="destinationAddress" placeholder="Destination Address">
               </div>
            </div>
            <div class="col">
               <div class="form-group">
                  <input type="number" class="form-control" name="distance_covered" placeholder="Distance In KM">
               </div>
            </div>
            <div class="col">
               <select  id="driver_id" name="driver_id" class="form-group" required>
                  <option value="">Select Driver</option>
                  <?php
                     include("config.php");
                     $query=mysqli_query($connection,"SELECT * FROM driver ORDER BY name ASC") or die(mysqli_error());
                     while($c=mysqli_fetch_array($query)){
                     ?>
                  <option class="form-control" value="<?php echo $c['id'];?>"><?php echo $c['name'];?></option>
                  <?php }?>
               </select>
            </div>
            <div class="col">
               <select  id="truck_id" name="truck_id" class="form-group" required>
                  <option class="form-control" value="">Select Truck</option>
                  <?php
                     include('config.php');
                     $query=mysqli_query($connection,"SELECT * FROM truck ORDER BY company_name ASC") or die(mysqli_error());
                     while($t=mysqli_fetch_array($query)){
                     ?>
                  <option class="form-control" value="<?php echo $t['id'];?>"><?php echo ucwords($t['company_name']);?> Model <?php echo $t['model'];?></option>
                  <?php }?>
               </select>
            </div>
            <div class="form-group">
               <center><button type="submit" class="btn btn-primary" name="submit">Submit</button></center>
            </div>
         </form>
      </div>
   </body>