<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
               
                
                <li class="sub-menu">
                    <a class="<?php if ($page=="welcome" || $page=='event_confirm_pay' || $page=='event_pay_his' || $page=='event_details') {echo "active";} else {echo "";}?>" href="welcome.php">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>
                      
                    </a>
                    <a class="<?php if ($page=="add_info") {echo "active";} else {echo "";}?>" href="add_info.php">
                        <i class="fas fa-edit"></i>
                        <span>Add User Information</span>    
                    </a>

                     <a class="<?php if ($page=="view_info" || $page=="view_all_info") {echo "active";} else {echo "";}?>" href="view_info.php">
                        <i class="fas fa-address-book"></i>
                        <span>View User Information</span>    
                    </a>

                      <a class="<?php if ($page=="add_fund") {echo "active";} else {echo "";}?>" href="add_fund.php">
                        <i class="">৳</i>
                        <span>Add Fund</span>   
                    </a>

                     <a class="<?php if ($page=="suc_pay_his") {echo "active";} else {echo "";}?>" href="suc_pay_his.php">
                        <i class="far fa-list-alt"></i>
                        <span>Payment History</span>   
                    </a>

                    <a class="<?php if ($page=="on_going_event_list" || $page=="ongoing_event_detals") {echo "active";} else {echo "";}?>" href="on_going_event_list.php">
                        <i class="fas fa-clipboard-list"></i>
                        <span>On Going Event List</span>   
                    </a>

                     <a class="<?php if ($page=="suc_event_pay") {echo "active";} else {echo "";}?>" href="suc_event_pay.php">
                        <i class="fas fa-clipboard-check"></i>
                        <span>Successful Event Payment</span>   
                    </a>

                      <a class="<?php if ($page=="change_password") {echo "active";} else {echo "";}?>" href="change_password.php">
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