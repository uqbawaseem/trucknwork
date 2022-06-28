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
               
                   $name = mysqli_real_escape_string($connection, $_POST['name']);
                   $email = mysqli_real_escape_string($connection, $_POST['email']);
                   $password = mysqli_real_escape_string($connection, $_POST['password']);
               
                   if( empty($name) || empty($email) || empty($password)){
                       if( empty($name) ){
                           echo "<font color= 'red'>Name field is empty. </font>";
                       }
                       if( empty($email) ){
                           echo "<font color= 'red'>Email field is empty. </font>";
                       }
                       if( empty($password) ){
                           echo "<font color= 'red'>Password field is empty. </font>";
                       }
                       
                   }
                   else
                   {
                       $result  = mysqli_query($connection, "UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password' WHERE `id`= $id");
                       if ($result) {
                          echo" <div class=\"uk-alert-primary\" uk-alert>
                           <a class=\"uk-alert-close\" uk-close></a>
                           <p>Update successfully! </p>";
                           ?>
            <script>window.location.href=('index.php');</script>
            <?php }
               }
               
               }
               ?>
            <?php
               //getting id from url
               // $id = $_GET['id'];
               $id=isset($_GET['id']) ? $_GET['id'] : die("");
               $result = mysqli_query($connection, "SELECT * FROM `admin` WHERE id =$id");
               
               while($p = mysqli_fetch_array($result))
               {
                   $id = $p['id'];
                   $name = $p['name'];
                   $email = $p['email'];
                   $password = $p['password'];
               }
               ?>
            <h3>EDIT NEW COMPANY</h3>
            <form action="edit-admin.php" method="POST" class="mt-4" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $name?>" name="name">
                  <input type="hidden" name= "id" value="<?php echo $id;?>">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $email?>" name="email">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" value="<?php echo $password?>" name="password">
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