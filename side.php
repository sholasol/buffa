 <?php 
$d= dbConnect()->prepare("SELECT count(p_id) AS no FROM projects");
$d->execute();
$tr=$d->fetch();
$n=$tr['no'];
?>
<!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php
                        if($user_role =="admin"){
                        ?>
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark text-success" href="javascript:void(0)" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu"><?php echo $fnam; ?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                                <!--<li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>-->
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                                <li><a href="logout"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="dashboard" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Human Resource</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="staff">Staff</a></li>
                                <li><a href="customer">Customer</a></li>
                                <li><a href="supplier">Supplier</a></li>
                                <li><a href="driver">Drivers</a></li>
                                <li><a href="marketer">Marketer</a></li>
                                <li><a href="staff">Other Staff</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Products</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="product">Products</a></li>
                                <li><a href="material">Material</a></li>
                                <li><a href="materialUnit">Manage Units</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon icon-briefcase"></i><span class="hide-menu">Production</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="production">New Production</a></li>
                                <li><a href="manageProduction">Manage Production</a></li>
                                <!-- <li><a href="rawMaterial">Raw Material</a></li> -->
                            </ul>
                        </li>
                       <!--  <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Messaging</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="app-email.html">Mailbox</a></li>
                                <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                                <li><a href="app-compose.html">Compose Mail</a></li>
                            </ul>
                        </li> -->
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-palette"></i><span class="hide-menu">Project <span class="badge badge-pill badge-primary text-white ml-auto"><?php echo $n; ?></span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="project">All Projects</a></li>
                                <li><a href="cproject">Completed Project</a></li>
                                <li><a href="onproject">Ongoing Project</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-palette"></i><span class="hide-menu">Inventory <span class="badge badge-pill badge-primary text-white ml-auto"><?php //echo  $n; ?></span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="sold-product">Sold Products</a></li>
                                <li><a href="produced-product">Produced Products</a></li>
                                <li><a href="used-material">Used Materials</a></li>
                            </ul>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="expenses" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Expenses</span></a></li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Tasks</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="task">All Tasks</a></li>
                                <li><a href="ctask">Completed Tasks</a></li>
                                <li><a href="ptask">Pending Tasks</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Assets</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="create-assets">Create Assets</a></li>
                                <li><a href="manageAssets">Manage Assests</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-shopping-cart-full"></i><span class="hide-menu">Sales Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="sales">Create Sales</a></li>
                                <li><a href="manage-sales">Manage Sales</a></li>
                                <!--<li><a href="marketer-sales">Marketer Sales</a></li>-->
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-briefcase"></i><span class="hide-menu"> Marketing</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="Mactivity">Manage Activities</a></li>
                                <li><a href="marketing">Create Activity</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-gallery"></i><span class="hide-menu">Logistics</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="transportLog">Delivery Report</a></li>
                                <li><a href="manage-sales">Transporting</a></li>
                                <li><a href="driverR">Driver Report</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-files"></i> <span class="hide-menu">Support & Ticket </span></a>
                            <ul aria-expanded="false" class="collapse">
                            <li><a href="ticket">All Ticket</a></li>
                            <li><a href="open">Opened</a></li>
                            <li><a href="close">Closed</a></li>
                        </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-pie-chart"></i><span class="hide-menu">Account</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="incomeR">Income Report</a></li>
                                <li><a href="vRevenue">Vehicle Revenue</a></li>
                                <li><a href="expenseR">Expense</a></li>
                                <li><a href="profitR">P/L</a></li>
                        </li>
                        <?php } ?>
                        <?php
                        if($user_role =="marketer"){
                        ?>
                        <li> <a class="waves-effect waves-dark" href="dashboardx" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark text-success" href="javascript:void(0)" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu"><?php echo $fnam; ?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                                <!--<li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>-->
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                                <li><a href="logout"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-briefcase"></i><span class="hide-menu"> Marketing</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="Mactivity">Manage Activities</a></li>
                                <li><a href="marketing">Create Activity</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Tasks</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="task">All Tasks</a></li>
                                <li><a href="ctask">Completed Tasks</a></li>
                                <li><a href="ptask">Pending Tasks</a></li>
                            </ul>
                        </li>
                        <?php }?>
                        <?php
                        if($user_role =="driver"){
                        ?>
                        <li> <a class="waves-effect waves-dark" href="dashboardx" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark text-success" href="javascript:void(0)" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu"><?php echo $fnam; ?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                                <!--<li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>-->
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                                <li><a href="logout"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-gallery"></i><span class="hide-menu">Logistics</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="transportLog">Delivery Report</a></li>
                                <li><a href="manage-sales">Transporting</a></li>
                                <li><a href="driverR">Driver Report</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Tasks</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="task">All Tasks</a></li>
                                <li><a href="ctask">Completed Tasks</a></li>
                                <li><a href="ptask">Pending Tasks</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-files"></i> <span class="hide-menu">Support & Ticket </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="ticket">All Ticket</a></li>
                                <li><a href="open">Opened</a></li>
                                <li><a href="close">Closed</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                                    
<?php
if($user_role =="production"){
?>
<li> <a class="waves-effect waves-dark" href="dashboardx" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>
<li class="user-pro"> <a class="has-arrow waves-effect waves-dark text-success" href="javascript:void(0)" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu"><?php echo $fnam; ?></span></a>
    <ul aria-expanded="false" class="collapse">
        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
        <!--<li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
        <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>-->
        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
        <li><a href="logout"><i class="fa fa-power-off"></i> Logout</a></li>
    </ul>
</li>

<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Tasks</span></a>
    <ul aria-expanded="false" class="collapse">
        <li><a href="task">All Tasks</a></li>
        <li><a href="ctask">Completed Tasks</a></li>
        <li><a href="ptask">Pending Tasks</a></li>
    </ul>
</li>
<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Products</span></a>
    <ul aria-expanded="false" class="collapse">
        <li><a href="product">Products</a></li>
        <li><a href="material">Material</a></li>
        <li><a href="materialUnit">Manage Units</a></li>
    </ul>
</li>
<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon icon-briefcase"></i><span class="hide-menu">Production</span></a>
    <ul aria-expanded="false" class="collapse">
        <li><a href="production">New Production</a></li>
        <li><a href="manageProduction">Manage Production</a></li>
        <!-- <li><a href="rawMaterial">Raw Material</a></li> -->
    </ul>
</li>
<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-palette"></i><span class="hide-menu">Project <span class="badge badge-pill badge-primary text-white ml-auto"><?php echo $n; ?></span></span></a>
    <ul aria-expanded="false" class="collapse">
        <li><a href="project">All Projects</a></li>
        <li><a href="cproject">Completed Project</a></li>
        <li><a href="onproject">Ongoing Project</a></li>
    </ul>
</li>
<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-files"></i> <span class="hide-menu">Support & Ticket </span></a>
    <ul aria-expanded="false" class="collapse">
        <li><a href="ticket">All Ticket</a></li>
        <li><a href="open">Opened</a></li>
        <li><a href="close">Closed</a></li>
    </ul>
</li>
<?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       