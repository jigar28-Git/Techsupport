 
 <?php 
  session_start();
  $cp = basename($_SERVER['PHP_SELF']);
?>  <!-- Start Main Wrapper -->
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Searchbox -->
            <div id="mws-searchbox" class="mws-inset">
                <form action="typography.html">
                    <input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <?php
                function active($currect_page){
                  $url_array =  explode('/', $_SERVER['PHP_SELF']) ;
                  $url = end($url_array);  
                  if($currect_page == $url){ 
                      echo 'active';
                  } 
                }
                ?>
                <ul>
                    <li class="<?php active('dashboard.php'); ?>"><a href="dashboard.php"><i class="icon-home"></i> Dashboard</a></li>
                    <li <?php echo($cp=='complaint_master.php' || $cp=='add_complaint.php')?'class="active"':''?>><a href="complaint_master.php"><i class="icon-book"></i> Complaint Master</a></li>

                    <li <?php echo($cp=='client_reg.php' || $cp=='add_client.php')?'class="active"':''?>><a href="client_reg.php"><i class="icon-user"></i> Client Register</a></li>

                    <li <?php echo($cp=='client_contact.php' || $cp=='add_contact.php')?'class="active"':''?>><a href="client_contact.php"><i class="icon-add-contact"></i> Client Contact Details</a></li>

                    
                    <li <?php echo($cp=='productcat_reg.php' || $cp=='add_productcat.php' || $cp=='product_reg.php' || $cp=='add_product.php'|| $cp=='client_product.php' || $cp=='add_clientprod.php')?'class="active"':''?>><a href="#"><i class="icon-list"></i> Products</a>
                        <ul>
                            <li <?php echo($cp=='productcat_reg.php' || $cp=='add_productcat.php')?'class="active"':''?> ><a href="productcat_reg.php">Product Catrgory</a></li>

                            <li <?php echo($cp=='product_reg.php' || $cp=='add_product.php')?'class="active"':''?>><a href="product_reg.php">Product Register</a></li>

                            <li <?php echo($cp=='client_product.php' || $cp=='add_clientprod.php')?'class="active"':''?>><a href="client_product.php">Client Product Details</a></li>
                        </ul>
                    </li>

                    <li <?php echo($cp=='problem_reg.php' || $cp=='add_prob.php')?'class="active"':''?>><a href="problem_reg.php"><i class="icon-info-sign"></i> Problem Master</a></li>

                    <li <?php echo($cp=='staff_master.php' || $cp=='add_staff.php')?'class="active"':''?>><a href="staff_master.php"><i class="icon-users"></i> Staff Master</a></li>

                    <li <?php echo($cp=='user_master.php' || $cp=='add_user.php')?'class="active"':''?>><a href="user_master.php"><i class="icon-official"></i> User Master</a></li>

                    
                </ul>
            </div>         
        </div>
        