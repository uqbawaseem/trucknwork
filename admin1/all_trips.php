<?php
   session_start();
       include("../config.php");
      
   ?>
<!DOCTYPE html>
<html lang="en">
   <?php 
      include('_head.php');
      ?>
   <body>
      <?php 
         include('_navbar.php');
         ?>
      <div class="row">
         <div class="col-md-3">
            <?php 
               include('_sidebar.php');
               ?>
            <!-- side bar end -->
         </div>
         <div class="col-md-9" style="margin-top: 160px;">
            <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
               <thead class="bg-dark text-light">
                  <tr>
                     <th scope="col">ID</th>
                     <th scope="col">User Email</th>
                     <th scope="col">User Phone</th>
                     <th scope="col">Origin Address</th>
                     <th scope="col">Destination Address</th>
                     <th scope="col">Distance Covered</th>
                     <th scope="col">Truck</th>
                     <th scope="col">Driver</th>
                     <th scope="col">Treveling Bill </th>

                     <th scope="col">total Bill</th>
                     <th scope="col">Bill Status</th>
                     <th scope="col">ACTIONS</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     $result = mysqli_query($connection, "SELECT * FROM trip ORDER BY `id` DESC");
                     
                        while($p = mysqli_fetch_array($result)){
                            echo "<tr><td>".$p['id']."</td>";
                            echo "<td>".$p['user_email']."</td>";
                            echo "<td>".$p['user_phone']."</td>";
                            echo "<td>".$p['originAddress']."</td>";
                            echo "<td>".$p['destinationAddress']."</td>";
                            echo "<td>".$p['distance_covered']."</td>";
                            echo "<td>".$p['truck_id']."</td>";
                            echo "<td>".$p['driver_id']."</td>";
                            echo "<td>".$p['bill']."</td>";
                            echo "<td>".$p['total_bill']."</td>";
                            echo "<td>".$p['bill_status']."</td>";
                            
                            echo "<td><a href=\"edit_trip.php?id=$p[id]\" class= \"btn btn-secondary\"><i class=\"fa fa-edit\"></i></a> <br><br> <a href=\"delete_trip.php?id=$p[id]\"  class= \"btn btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"fa fa-trash\" style=\"color:red;\"></i></a></td>";		         
                         }
                        ?>
               </tbody>
            </table>
         </div>
      </div>
      <!--======== SCRIPT FILES =========-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/materialize.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>