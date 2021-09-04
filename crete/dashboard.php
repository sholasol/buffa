<?php 
session_start();
include 'header.php'; ?>
<!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Overview</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-desktop"></i> Dashboard</button>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-screen-desktop"></i></h3>
                                            <p class="text-muted">AVAILABLE PRODUCTS</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-primary"><?php echo $prod?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-note"></i></h3>
                                            <p class="text-muted">TOTAL PROJECTS</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-cyan"><?php echo $totPrj?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-wallet"></i></h3>
                                            <p class="text-muted">Monthly Sales</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h5 class="counter text-purple">&#8358;<?php echo '23'//number_format(subTotal(date('m'), date('Y')), 2);?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">TOTAL ASSETS</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-success"><?php echo $totalAssets?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                <div class="row">
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Monthly Sales</h4>
                                <div>
                                    <canvas id="chart1" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Monthly Expenses</h4>
                                <div>
                                    <canvas id="chart2" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex m-b-40 align-items-center no-block">
                                    <h5 class="card-title ">YEARLY SALES</h5>
                                    <div class="ml-auto">
                                        <ul class="list-inline font-12">
                                        <!-- <li><i class="fa fa-circle text-cyan"></i> Expenses</li> -->
                                        <li><i class="fa fa-circle text-primary"></i> Sales</li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="morris-area-chart" style="height: 340px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-md-12">
                        <div class="row">
                            <!-- Column -->
                        <div class="col-md-12">
                                <div class="card bg-white">
                                    <div class="card-body ">
                                        
                                        <h4 class="card-title">Projects</h4>
                                <div id="morris-donut-chart" style="height: 340px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- <div class="col-md-12">
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <div id="myCarouse2" class="carousel slide" data-ride="carousel">
                                            <!-- Carousel items --
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <h4 class="cmin-height">My Acting blown <span class="font-medium">Your Mind</span> and you also <br/>laugh at the moment</h4>
                                                    <div class="d-flex no-block">
                                                        <span><img src="../assets/images/users/1.jpg" alt="user" width="50" class="img-circle"></span>
                                                        <span class="m-l-10">
                                                    <h4 class="text-white m-b-0">Govinda</h4>
                                                    <p class="text-white">Actor</p>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <h4 class="cmin-height">My Acting blown <span class="font-medium">Your Mind</span> and you also <br/>laugh at the moment</h4>
                                                    <div class="d-flex no-block">
                                                        <span><img src="../assets/images/users/2.jpg" alt="user" width="50" class="img-circle"></span>
                                                        <span class="m-l-10">
                                                    <h4 class="text-white m-b-0">Govinda</h4>
                                                    <p class="text-white">Actor</p>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <h4 class="cmin-height">My Acting blown <span class="font-medium">Your Mind</span> and you also <br/>laugh at the moment</h4>
                                                    <div class="d-flex no-block">
                                                        <span><img src="../assets/images/users/3.jpg" alt="user" width="50" class="img-circle"></span>
                                                        <span class="m-l-10">
                                                    <h4 class="text-white m-b-0">Govinda</h4>
                                                    <p class="text-white">Actor</p>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Column -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Comment - table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- Comment widgets -->
                    <!-- ============================================================== -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Recently Produced Products</h5>
                            </div>
                            <!-- ============================================================== -->
                            <!-- Comment widgets -->
                            <!-- ============================================================== -->
                           <div class="table-responsive"> <table id="example23"
                                            class="table table-hover no-wrap"
                                            data-paging="true" data-paging-size="7">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Cost</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            // $user = dbConnect()->query("SELECT * FROM production WHERE status != 0 ORDER BY id DESC LIMIT 0,5");
                                            // if($user->numrow()<1){
                                            //     echo 'No record in the database';
                                            // }else{
                                            //     $i = 0;
                                            //    foreach($user->results() as $user){
                                            //    $i++;
                                            $query = dbConnect()->prepare("SELECT * FROM production WHERE status !=0 ORDER BY id DESC LIMIT 5");
                                            $query->execute();
                                            if(empty($query)){
                                                echo 'No record in the database';
                                            }else{
                                                $i =0;
                                                while($pr = $query->fetch()){
                                                    $i+=1;    
                                            
                                               ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                               <?php echo $pr['product'] ?>
                                            </td>
                                            <td><?php echo $pr['outputqty'] ?></td>
                                           
                                            <td><span class="label label-primary"><?php echo number_format($pr['outputprice']) ?></span> </td>
                                           
                                            <td><span class="label label-info"><?php echo $pr['created'] ?></span> </td>


                                        </tr>
                                           <?php 
                                            }
                                        }?>
                                            </tbody>
                                              
                                        </table>
                                    </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Table -->
                    <!-- ============================================================== -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Logistics Overview</h5>
                                        <h6 class="card-subtitle">Check the monthly sales <?php echo date('m')?> </h6>
                                    </div>
                                    <div class="ml-auto">
                                         <select class="form-control b-0" id="sales" > <!--onchange="getSales()" -->
                                            <option value="01"  <?php if(date('m')==01){echo "selected";}?>>January</option>

                                            <option value="02"  <?php if(date('m')==02){echo "selected";}?>>February</option>

                                            <option value="03" <?php if(date('m')==03){echo "selected";}?>>March</option>

                                            <option value="04"  <?php if(date('m')==04){echo "selected";}?>>April</option>

                                            <option value="05"  <?php if(date('m')==05){echo "selected";}?>>May</option>

                                            <option value="06"  <?php if(date('m')==06){echo "selected";}?>>June</option>

                                            <option value="07"  <?php if(date('m')==07){echo "selected";}?> >July</option>

                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>NAME</th>
                                            <th>STATUS</th>
                                            <th>DATE</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // $user = DB::getInstance()->query("SELECT * FROM transport WHERE status='Pending' ORDER BY id desc LIMIT 3");
                                            // if($user ->error()){
                                            //     //echo 'No record in the database';
                                            // }else{
                                            //     $i = 0;
                                            //    foreach($user->results() as $user){
                                                 
                                            //        $saleID = $user->sales_id ;
                                            //    $i++;
                                            $qrt = dbConnect()->prepare("SELECT * FROM transport WHERE status=? ORDER BY id DESC");
                                            $qrt->execute(['Pending']);
                                            if(empty($qrt)){
                                                echo "No record in the database";
                                            }else{
                                                $i = 0;
                                                while($tran = $qrt->fetch()){
                                                    $i+=1;
                                               ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td class="txt-oflo"><?php echo $tran['driver'] ?></td>
                                            <td><span class="badge badge-warning badge-pill"><?php echo $tran['status'] ?></span> </td>
                                            <td class="txt-oflo"><?php echo $tran['created'] ?></td>
                                            <td><span class="text-success"><?php echo $tran['amount'] ?></span></td>
                                        </tr>
                                            <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Comment - chats -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex m-b-40 align-items-center no-block">
                                    <h5 class="card-title ">SALES DIFFERENCE</h5>
                                    <div class="ml-auto">
                                        <ul class="list-inline font-12">
                                            <li><i class="fa fa-circle text-cyan"></i> SITE A</li>
                                            <li><i class="fa fa-circle text-primary"></i> SITE B</li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="morris-area-chart2" style="height: 340px;"></div>
                               <!-- <div id="morris-line-chart" style="height: 340px;"></div>-->
<!--                                <div id="morris-area-chart2" style="height: 340px;"></div>-->
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-md-12">
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">REVENUE</h5>
                                        <div class="row">
                                            <div class="m-t-30">
                                                <h2 class="text-info">₦ <?php echo number_format($revenue); ?></h2>
                                                <p class="text-muted">Till Date</p>
                                                <b><?php echo number_format($tsale); ?> Sales</b> </div>
                                           <!-- <div class="col-6">
                                                <div id="sparkline2dash" class="text-right"></div>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-12">
                                <div class="card bg-purple text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">EXPENSES</h5>
                                        <div class="row">
                                            <div class="col-6  m-t-30">
                                                <h1 class="text-white">₦ <?php echo number_format($exp); ?></h1>
                                                <p class="light_op_text">Till Date</p>
                                                <b class="text-white"><?php echo number_format($texp); ?> Items</b> </div>
                                            <div class="col-6">
                                                <div id="sales1" class="text-right"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Todo, chat, notification -->
                <!-- ============================================================== -->


                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h5 class="card-title m-b-0">TASKS LIST</h5>
                                    </div>
                                    <div class="ml-auto">
                                        <button class="pull-right btn btn-circle btn-success" ><i class="ti-list-ol"></i></button>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- To do list widgets -->
                                <!-- ============================================================== -->
                                <div class="to-do-widget m-t-20" id="todo" style="height: 400px;position: relative;">
                                    <!-- .modal for add task -->
                                    <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                    <?php
                                    $task = dbConnect()->prepare("SELECT * FROM tasks ORDER BY id DESC");
                                    $task->execute();
                                    if(empty($task)){
                                        echo "No record in the database";
                                    }else{
                                        $i = 0;
                                        while($tsk = $task->fetch()){
                                        $i+=1;
                                        $timestamp = $tsk['created'];
                                       ?>
                                        
                                        <li class="list-group-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">
                                                    <span><?php echo $tsk['name'] ?></span>
                                                </label>
                                            </div>
<ul class="assignedto">
    <?php
        $pid = $tsk['p_id'];
        $getUsers = dbConnect()->prepare("SELECT users.image FROM task_assigned JOIN users ON task_assigned.staffid=users.id WHERE taskid = ?");
        $getUsers->execute([$pid]);
        while ($psp = $getUsers->fetch()) {
            ?>
                <li><img src="upload/<?php echo $psp['image']?>" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave"></li>
            <?php
        }
        ?>         
    
    <!-- <li><img src="../assets/images/users/2.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jessica"></li>
    <li><img src="../assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
    <li><img src="../assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li> -->
</ul>
                                            <div class="item-date"> 
                                                <span class="badge badge-pill badge-primary float-right">
                                                        <?php 
                                                            $time1 = new DateTime($timestamp);
                                                            $now = new DateTime();
                                                            $interval = $time1->diff($now,true);

                                                            if ($interval->y) echo $interval->y . ' years';
                                                            elseif ($interval->m) echo $interval->m . ' months';
                                                            elseif ($interval->d) echo $interval->d . ' days';
                                                            elseif ($interval->h) echo $interval->h . ' hours';
                                                            elseif ($interval->i) echo $interval->i . ' minutes';
                                                            else echo "less than 1 minute";
                                                        ?>
                                                    </span>
                                            </div>
                                        </li>
                                            <?php }}?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">YOU HAVE 5 NEW CUSTOMERS</h5>
                                <div class="message-box" id="msg" style="height: 430px;position: relative;">
                                    <div class="message-widget message-scroll">
                                        <!-- Message -->
                                        <?php
                                            $qrr = dbConnect()->prepare("SELECT * FROM users WHERE role=? ORDER BY id DESC LIMIT 5");
                                            $qrr->execute(['customer']);
                                            if(empty($qrr)){
                                                echo "No record in the database";
                                            }else{
                                                $i = 0;
                                                while($fra = $qrr->fetch()){
                                                    $i+=1;
                                               ?>
                                                <a href="javascript:void(0)">
                                                    <div class="user-img"> <img src="upload/<?php echo $fra['image']?>" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5><?php echo $fra['fname'].' '.$fra['lname'] ?></h5> <span class="mail-desc"><?php echo $fra['phone']; ?></span> <span class="time badge badge-pill badge-primary"><?php echo $fra['joined'] ?></span> </div>
                                                </a>
                                            <?php }} ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CHAT</h5>
                                <div class="chat-box" id="chat" style="height: 327px;position: relative;">
                                    <!--chat Row -->
                                    <ul class="chat-list">
                                        <!--chat Row -->
                                        <li>
                                            <div class="chat-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                            <div class="chat-content">
                                                <h5>James Anderson</h5>
                                                <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing &amp; type setting industry.</div>
                                            </div>
                                            <div class="chat-time">10:56 am</div>
                                        </li>
                                        <!--chat Row -->
                                        <li>
                                            <div class="chat-img"><img src="../assets/images/users/2.jpg" alt="user"></div>
                                            <div class="chat-content">
                                                <h5>Bianca Doe</h5>
                                                <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                            </div>
                                            <div class="chat-time">10:57 am</div>
                                        </li>
                                        <!--chat Row -->
                                        <li class="odd">
                                            <div class="chat-content">
                                                <div class="box bg-light-inverse">I would love to join the team.</div>
                                                <br>
                                            </div>
                                            <div class="chat-time">10:58 am</div>
                                        </li>
                                        <!--chat Row -->
                                        <li class="odd">
                                            <div class="chat-content">
                                                <div class="box bg-light-inverse">Whats budget of the new project.</div>
                                                <br>
                                            </div>
                                            <div class="chat-time">10:59 am</div>
                                        </li>
                                        <!--chat Row -->
                                        <li>
                                            <div class="chat-img"><img src="../assets/images/users/3.jpg" alt="user"></div>
                                            <div class="chat-content">
                                                <h5>Angelina Rhodes</h5>
                                                <div class="box bg-light-info">Well we have good budget for the project</div>
                                            </div>
                                            <div class="chat-time">11:00 am</div>
                                        </li>
                                        <!--chat Row -->
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-8">
                                        <textarea placeholder="Type your message here" class="form-control border-0"></textarea>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fas fa-paper-plane"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
       <?php include 'footer.php'; ?>