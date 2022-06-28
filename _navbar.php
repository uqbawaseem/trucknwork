    
    <header class="site-navbar py-3" role="banner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-11 col-xl-2">
            <h1 class="mb-0"><a href="index.php" class="text-white h2 mb-0">TruckNwork</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <?php if(isset($_SESSION['email'])){?>
                <li><a href="#freight">My freights</a></li>
                <?php }?>
                <li><a href="contact.php">Contact</a></li>
                <!-- <li><a href="userLogin.php">Login</a></li> -->
                <li><?php
                    
                    if(isset($_SESSION['email'])){
                      echo "<li class=\"has-children\">
                            <a href=\"#\" class=\"dropdown-toggle text-uppercase\" data-toggle=\"dropdown\" style=\"color: yellow;\">" .$_SESSION['email']."</a>
                              <ul class=\"dropdown\">
                                <li><a href=\"userLogout.php?logout\">Logout</a></li>
                              </ul>";
                    }
                    else if(isset($_SESSION['name'])){
                      echo "<li class=\"has-children\">
                      <a href=\"#\" class=\"dropdown-toggle text-uppercase\" data-toggle=\"dropdown\" style=\"color: yellow;\">" .$_SESSION['name']."</a>
                        <ul class=\"dropdown\">
                          <li><a href=\"admin1/index.php\">Dashbourd</a></li>
                          <li><a href=\"adminLogout.php?logout\">Logout</a></li>
                        </ul>";
                      }
                    else
                    { 
                      echo "<a href=\"userLogin.php\">Login</a>";
                    }
                  ?>
                </li>
              </ul>
            </nav>
          </div>
          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
          </div>

        </div>
      </div>
      
    </header>
