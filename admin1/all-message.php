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

    <!--== BOTTOM FLOAT ICON ==-->
    <div class="sb2-2">
    <table  id="dtDynamicVerticalScrollExample"
     class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th scope="col">ID</th>
                           <th scope="col">NAME</th>
                           <th scope="col">EMAIL</th>
                           <th scope="col">MESSAGE</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php 
                     $query="SELECT * FROM contact";
                     $result=mysqli_query($connection,$query) or die(mysqli_error($connection));
                           while($contact = mysqli_fetch_array($result)){
                              echo "<tr><td>".$contact['id']."</td>";
                              echo "<td>".$contact['first_name']."</td>";
                              echo "<td>".$contact['email']."</td>";
                              echo "<td>".$contact['message']."</td>";
                              }
                           ?>




                     </tbody>
                  </table>
                                </div>

    <!--======== SCRIPT FILES =========-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>