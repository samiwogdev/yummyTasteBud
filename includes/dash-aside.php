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
                    <li class="active open"><a href="index"><i class="zmdi zmdi-home"></i><span>order</span></a></li>
                    <li class=""><a href="#!"><i class="zmdi zmdi-home"></i><span>Support</span></a></li>
                </ul>
            </div>
        </div>
    </div>    
</aside>

