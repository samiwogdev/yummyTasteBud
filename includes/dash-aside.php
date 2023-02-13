<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="index"><img src="../uploads/nopic.jpg" alt="User" style="height: 90px"></a></div>
                              <div class="detail">
                                <h4 style="font-size: 12px"><?php // echo $row['lastname']. " ". $row['firstname']. " ". $row['othername'] ?></h4>
                                <small><?php echo $_SESSION['email'] ?></small>
                            </div>
                        </div>
                    </li>
                    <li class="active open"><a href="index"><i class="fa fa-shopping-bag mr-2"></i><span>order</span></a></li>
                    <li class=""><a href="../"><i class="fa fa-home mr-2"></i><span>Home</span></a></li>
                    <li class=""><a href="log"><i class="text-danger zmdi zmdi-power"></i><span>logout</span></a></li>
                </ul>
            </div>
        </div>
    </div>    
</aside>

