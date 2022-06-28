<?php
   session_start();
   include('config.php');
   
     if (isset($_POST['submit'])) {
       $name = $_POST['name'];
       $password = $_POST['password'];
        if(empty($_POST['name']) || empty($_POST['password']))
         {
           echo "
           <script>alert('Please fill all fields')</script>
                 ";
         }
         else
         {
           $search = "SELECT * FROM `admin` WHERE `name`= '$name' and `password`= '$password' ";
           $result = mysqli_query($connection, $search);
           if (mysqli_fetch_assoc($result))
           {
             $_SESSION['name'] = $_POST['name'];
             header('location:admin1/index.php');
           }
           else{
             echo "
             <div class=\"uk-alert-danger\" uk-alert>
             <a class=\"uk-alert-close\" uk-close></a>
             <p>Please enter correct email and password. </p>
         </div>";
           }
         }
   
     }
   
   ?>
<!doctype html>
<html class="no-js" lang="en">
   <?php include('_head.php');
      ?>
   <body>
      <!-- login section start -->
      <section class="login-wrapper">
         <div class="container mt-5">
         <center><h3>Admin Login</h3>
            <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
               <form action="adminLogin.php" method="post" enctype="multipart/form-data">
                  <input type="text" class="form-control input-lg" placeholder="User name" name="name"><br>
                  <input type="password" class="form-control input-lg" placeholder="Password" name="password"><br>
                  <button type="submit" class="btn btn-primary" name="submit">Login</button>
               </form>
            </div></center>
      </section>
      <!-- login section End -->	
   </body>
</html>