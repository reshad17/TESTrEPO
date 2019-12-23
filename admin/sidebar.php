

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
               
                
                <li class="sub-menu">
                    <a class="<?php if($page=="welcome" ||$page=="admin_welcome" ){echo "active";} else {echo "";} ?>" href="admin_welcome.php">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>    
                    </a>
                           <?php 
                        if ($_SESSION['adminRole'] == 'Admin' || $_SESSION['adminRole'] =='SuperAdmin') { ?>

                        <a class="<?php if ($page=="admin_add_event") {echo "active";} else {echo "";}?>" href="admin_add_event.php">
                        <i class="fa fa-tasks"></i>

                        <span>Add Event </span>    
                    </a>


                     <?php       
                        }

                    ?>


                       <a class="<?php if ($page=="event_list" || $page=="all_event_list" || $page=="edit_event") {echo "active";} else {echo "";}?>"href="event_list.php">
                        <i class="fas fa-align-justify"></i>
                        <span>Event List</span>    
                    </a>
                 


                    <?php 
                        if ($_SESSION['adminRole'] == 'Admin' || $_SESSION['adminRole'] == 'SuperAdmin') { ?>
                        <a class="<?php if ($page=="admin_add_user") {echo "active";} else {echo "";}?>" href="admin_add_user.php">
                        </i><i class="fas fa-user-plus"></i>
                        <span>Add New Admin</span>    
                    </a>

                     <?php       
                        }

                    ?>

                          <?php 
                        if ($_SESSION['adminRole'] == 'Admin' || $_SESSION['adminRole'] == 'SuperAdmin') { ?>
                        <a class="<?php if ($page=="admin_user_list" || $page=="edit_users") {echo "active";} else {echo "";}?>" href="admin_user_list.php">
                        <i class="fas fa-user-friends"></i>
                        <span>Admin Panel List</span>    
                    </a>

                     <?php       
                        }

                    ?>


                        <a class="<?php if ($page=="view_registered_users" || $page=="admin_registered_users_all_info") {echo "active";} else {echo "";}?>" href="view_registered_users.php">
                         <i class="fas fa-users"></i>
                        <span>Registered Users</span>    
                    </a>
                     


                        <a class="<?php if ($page=="view_all_info") {echo "active";} else {echo "";}?>" href="view_all_info.php">
                        <i class="fas fa-money-check"></i>
                        <span>Donation Details</span>    
                    </a>


                      <a class="<?php if ($page=="admin_change_password") {echo "active";} else {echo "";}?>" href="admin_change_password.php">
                        <i class="fa fa-refresh"></i>
                        <span>Change Password</span>   
                    </a>

                       <a href="logout.php">
                        <i class="fa fa-power-off"></i>
                        <span>Log Out</span>   
                    </a>

                </li>

                


            </ul>            
        </div>


        

        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

