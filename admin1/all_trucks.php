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
            <a href="add_truck.php">
               <button type="button" class="btn btn-dark float-right mr-5 mb-4">
               ADD NEW TRUCK
               </button> 
            </a>
            <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
               <thead class="bg-dark text-light">
                  <tr>
                     <th scope="col">ID</th>
                     <th scope="col">Company Name</th>
                     <th scope="col">Name Plate</th>
                     <th scope="col">Model</th>
                     <th scope="col">ACTIONS</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     $result = mysqli_query($connection, "SELECT * FROM truck ORDER BY `id` DESC");
                     
                        while($p = mysqli_fetch_array($result)){
                            echo "<tr><td>".$p['id']."</td>";
                            echo "<td>".$p['company_name']."</td>";
                            echo "<td>".$p['name_plate']."</td>";
                            echo "<td>".$p['model']."</td>";
                            
                            echo "<td><a href=\"delete_truck.php?id=$p[id]\"  class= \"btn btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"fa fa-trash\" style=\"color:red;\"></i></a></td>";		         
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