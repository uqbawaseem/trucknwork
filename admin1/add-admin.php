<?php 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php 
include('_head.php');
?>

<body>
<?php 
    include('_navbar.php');
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
                
                include_once("../config.php");
                if(isset($_POST['submit'])) {
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
                            $query = "INSERT INTO `admin`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
                            $result  = mysqli_query($connection, $query);

                            echo "<div class=\"uk-alert-primary\" uk-alert>
                            <a class=\"uk-alert-close\" uk-close></a>
                            <p>Admin added successfully!</p>
                        </div>";
                                                   
                        }

                }
?>
            <h3>ADD NEW Admin</h3>
            <form class="mt-4" action="add-admin.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                </div>  
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
    
    

    <!--======== SCRIPT FILES =========-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>