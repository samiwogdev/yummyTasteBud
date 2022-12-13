<?php
//include_once '../convig.php';
//$role = Role::getInstance();
//$user_role = $role->getUserByUsername($_SESSION['username']);
//if ($user_role['user_type'] == 1){ ?>

<aside id="leftsidebar" class="sidebar">
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="index"><img src="../uploads/nopic.jpg" alt="User" style="height: 90px"></a></div>
                            <div class="detail">
                                <h4>Admin</h4>
<!--                                <small>Bursar</small>-->
                            </div>
                        </div>
                    </li>
                    <li class="<?php if($page == "dash"){  echo "active open"; } ?>"><a href="#"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    <li class="<?php if($page == "def"){ echo "active open"; }?>"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-border-color"></i><span>Definition</span> </a>
                        <ul class="ml-menu">
                            <li><a href="../admin/menu"><i class="fas fa-utensils mr-2" style="color: #760076 !important;"></i>Menu</a></li>
                            <li><a href="../admin/shop"><i class="fa fa-shopping-bag mr-2" style="color: #760076;"></i>Shop</a></li>
                            <li><a href="../admin/delivery"><i class="fa fa-cart-plus mr-2" style="color: #760076;"></i>Delivery</a></li>
                            <li><a href="../admin/settings"><i class="fa fa-cog mr-2" style="color: #760076;"></i>Settings</a></li>
                        </ul>
                    </li>
<!--                      <li class="<?php // if($page == "report"){ echo "active open"; }?>"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Report</span> </a>
                        <ul class="ml-menu">
                            <li><a href="../admin/payment_history">Payment History</a></li>
                            <li><a href="../admin/payment-single">Single payment</a></li>
                            <li><a href="../admin/payment-multiple">Multiple Payment </a></li>
                        </ul>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>    
</aside>


<?php ?>
