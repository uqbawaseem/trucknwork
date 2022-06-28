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
<?php 
include('../config.php');
if (isset($_POST['submit'])){
    $contact = $_POST['contact_id'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $message = $_POST['message'];
     
    
    
    
        $sql="INSERT INTO `contact`( name, email, message) VALUES ('$name','$email','$message')";
        $result=mysqli_query($connection, $sql) or die ("ERROR");
       
        mysqli_close($connection);
        // session_start();
        // if (!isset($_SESSION['username'])){
        // header("location:{$hostname}/jober/login.php");
        // }
        }


?>
    <!--== BOTTOM FLOAT ICON ==-->
    <section class="login-wrapper">
			<div class="container">
            <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
					<form action="add-message.php" method="post" enctype= "multipart/form-data">
						<img class="img-responsive" alt="logo" src="../img/logo.png">
                        <input type="hidden" name="contact_id" class="form-control input-lg">
						<input type="text" name="name" class="form-control input-lg" placeholder="Your Name">
						<input type="email" name="email" class="form-control input-lg" placeholder="email">
                        <textarea class="form-control" name="message" placeholder="Message"></textarea>
						<button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
						
					</form>
				</div>
				 
					

                    
              
                </div>
				</div>
			</div>
		</section>

    <!--======== SCRIPT FILES =========-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>