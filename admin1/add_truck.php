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
                    $company_name = mysqli_real_escape_string($connection, $_POST['company_name']);
                    $name_plate = mysqli_real_escape_string($connection, $_POST['name_plate']);
                    $model = mysqli_real_escape_string($connection, $_POST['model']);
                    
                    if( empty($company_name) || empty($name_plate) || empty($model)){
                        if( empty($company_name) ){
                            echo "<font color= 'red'>company_name field is empty. </font>";
                        }
                        if( empty($name_plate) ){
                            echo "<font color= 'red'>name_plate field is empty. </font>";
                        }
                        if( empty($model) ){
                            echo "<font color= 'red'>model field is empty. </font>";
                        }
                        
                    }
                    else
                        {
                            $query = "INSERT INTO `truck`(`company_name`, `name_plate`, `model`) VALUES ('$company_name','$name_plate','$model')";
                            $result  = mysqli_query($connection, $query);

                            echo "<div class=\"uk-alert-primary\" uk-alert>
                            <a class=\"uk-alert-close\" uk-close></a>
                            <p>Truck added successfully!</p>
                        </div>";
                                                   
                        }

                }
?>
            <h3>ADD NEW TRUCK</h3>
            <form class="mt-4" action="add_truck.php" method="post">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter company_name" name="company_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name Plate</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name_plate" name="name_plate">
                </div>  
                <div class="form-group">
                    <label for="exampleInputPassword1">Model</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="model" name="model">
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