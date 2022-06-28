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
            <!--== BOTTOM FLOAT ICON ==-->
            <section>
               <div class="fixed-action-btn vertical">
                  <a class="btn-floating btn-large red pulse">
                  <i class="large material-icons">mode_edit</i>
                  </a>
                  <ul>
                     <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a>
                     </li>
                     <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a>
                     </li>
                     <li><a class="btn-floating green"><i class="material-icons">publish</i></a>
                     </li>
                     <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a>
                     </li>
                  </ul>
               </div>
            </section>
         </div>
         <div class="col-md-9" style="margin-top: 160px;">
            <div class="uk-alert-primary" uk-alert>
               <a class="uk-alert-close" uk-close></a>
               <p>Login successfully! </p>
            </div>
            <a href="add-admin.php">
            <button type="button" class="btn btn-dark float-right mr-5 mb-4">
            ADD NEW ADMIN
            </button> 
            </a>
            <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
               <thead class="bg-dark text-light">
                  <tr>
                     <th scope="col">ID</th>
                     <th scope="col">NAME</th>
                     <th scope="col">Email</th>
                     <th scope="col">PASSOWRD</th>
                     <th scope="col">ACTIONS</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     $result = mysqli_query($connection, "SELECT * FROM admin ORDER BY `id` DESC");
                     
                        while($p = mysqli_fetch_array($result)){
                            echo "<tr><td>".$p['id']."</td>";
                            echo "<td>".$p['name']."</td>";
                            echo "<td>".$p['email']."</td>";
                            echo "<td>".$p['password']."</td>";
                            echo "<td><a href=\"edit-admin.php?id=$p[id]\" class= \"btn btn-secondary\"><i class=\"fa fa-edit\"></i></a> <br><br> <a href=\"admin-delete.php?id=$p[id]\"  class= \"btn btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"fa fa-trash\" style=\"color:red;\"></i></a></td>";		         
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