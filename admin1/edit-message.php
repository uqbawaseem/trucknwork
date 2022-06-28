<!DOCTYPE html>
<html lang="en">
   <?php 
   session_start();

      include('_head.php');
      ?>
   <body>
      <?php 
         include('_navbar.php');
         ?>
      <?php 
         include('_sidebar.php');
         ?>
      <!-- side bar end -->
      <div class="sb2-2">
         <!--== BOTTOM FLOAT ICON ==-->
         <?php
            include('../config.php');
            
            //  $contact_id=$_GET['contact_id'];
             $id=$_GET['id'];
            $result= mysqli_query($connection, "SELECT * FROM contact WHERE contact_id=$id");
            if(isset($_POST['update']))
            {	
            
            $id= mysqli_real_escape_string($connection, $_POST['contact_id']);
            $name = mysqli_real_escape_string($connection, $_POST['name']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $message = mysqli_real_escape_string($connection, $_POST['message']);
            
            
            
            // checking empty fields
            if(empty($name) || empty($email)|| empty($message) ) {	
            
            if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
            }
               
            if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
            }
                if(empty($message)) {
            echo "<font color='red'>Message field is empty.</font><br/>";
            }
            
            
            } else {	
            //updating the table
            $result = mysqli_query($connection, "UPDATE contact SET name='$name',email='$email',message='$message' WHERE contact_id=$id");
            if ($result) {?>
         <script>window.location.href=('all-message.php');</script>
         <?php }
            }
            }
            ?>
         <?php
            //getting id from url
            
            
            
            //selecting data associated with this particular id
            
            
            while($res = mysqli_fetch_array($result))
            {
            	$id=$res['contact_id'];
            	$name = $res['name'];
            	$email = $res['email'];
                $message = $res['message'];
            	
            }
            ?>
         <form action="edit-message.php" method="post" name="form2">
            <div class="form-group">
               <input type="hidden" name="contact_id" id="" value="<?php echo $id;?>">
               <input type="text" class="form-control" name="name" placeholder="NAME" value="<?php echo $name;?>">
            </div>
            <div class="col">
               <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="EMAIL" value="<?php echo $email;?>">
               </div>
            </div>
            <div class="col">
               <div class="form-group">
                  <input type="text" class="form-control" name="message" placeholder="MESSAGE" value="<?php echo $message;?>">
               </div>
            </div>
            <div class="form-group">
               <input type="submit" class="form-control" value="update" name="update">
            </div>
         </form>
      </div>
      <!--======== SCRIPT FILES =========-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/materialize.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>