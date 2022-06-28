<?php
include('../config.php');
$query="SELECT * FROM admin";
$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
while($j=mysqli_fetch_array($result)){
?> 
 
 <!--== MAIN CONTRAINER ==-->
 <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-6 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="index.php" class="logo"><img src="images/logo.png" alt="" />
                </a>
            </div>
            <!--== SEARCH ==-->
            
            
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-6 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a  class='waves-effect dropdown-button top-user-pro text-primary text-uppercase font-weight-bold' href='#' data-activates='top-menu'><?php echo $j ['name']?><i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="setting.php" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>Admin Setting</a>
                    </li>
                    <li><a href="hotel-all.php" class="waves-effect"><i class="fa fa-building-o" aria-hidden="true"></i> Hotels</a>
                    </li>
                    <li><a href="package-all.php" class="waves-effect"><i class="fa fa-umbrella" aria-hidden="true"></i> Tour Packages</a>
                    </li>
                    <li><a href="event-all.php" class="waves-effect"><i class="fa fa-flag-checkered" aria-hidden="true"></i> Events</a>
                    </li>
                    <li><a href="user-add.php" class="waves-effect"><i class="fa fa-user-plus" aria-hidden="true"></i> Add New User</a>
                    </li>
                    <li><a href="#" class="waves-effect"><i class="fa fa-undo" aria-hidden="true"></i> Backup Data</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php }?>