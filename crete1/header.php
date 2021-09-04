<?php 
session_start();
ob_start();
include '../connect/connect.php';

if(!isset($_SESSION['email']) && !isset($_SESSION['id'])){
    echo "<script> alert('Oop!, kindly login to view this page');window.location='../index'; </script>";
}
else{
//$user = new User();

    $email = $_SESSION['email'];
    $uid = $_SESSION['id'];


    
    $que= dbConnect()->prepare("SELECT * FROM users WHERE id=? ");
    $que->execute([$uid]);
    $user = $que->fetch();
    $name = $user['fname'].' '.$user['lname'];
    $fnam = $user['fname'];
    $grp = $user['role'];
    $branch = $user['branch'];



}

// All Staff Contact

$st = dbConnect()->prepare("SELECT count(id) as st FROM users WHERE role !=? or role !=?");
$st->execute(['customer','supplier']);
if(!empty($st)){$ast = $st->fetch()['st'];}else{$ast='0';}


// Active Staff Contact
$acs = dbConnect()->prepare("SELECT count(id) as acs FROM users WHERE role=? AND status=?");
$acs->execute(['user', 1]);
if(!empty($acs)){$acStf = $acs->fetch()['acs'];}else{$acStf='0';}

// Inactive Staff Contact
$inst = dbConnect()->prepare("SELECT count(id) as inst FROM users WHERE role=? AND status=?");
$inst->execute(['user', 0]);
if(!empty($inst)){$instf = $inst->fetch()['inst'];}else{$instf='0';}

// total branch
$br = dbConnect()->prepare("SELECT count(id) as br FROM branch");
$br->execute();
if(!empty($br)){$tbr = $br->fetch()['br'];}else{$tbr='0';}


// Active Branch
$bro = dbConnect()->prepare("SELECT count(id) as bro FROM branch WHERE status=?");
$bro->execute([1]);
if(!empty($bro)){$abro= $bro->fetch()['bro'];}else{$abro='0';}

// All Customer
$alc = dbConnect()->prepare("SELECT count(id) as alc FROM users WHERE role=?");
$alc->execute(['customer']);
if(!empty($alc)){$alcc = $alc->fetch()['alc'];}else{$alcc='0';}

// Active Customer
$ac = dbConnect()->prepare("SELECT count(id) as ac FROM users WHERE role=? AND status=?");
$ac->execute(['customer', 1]);
if(!empty($ac)){$acc = $ac->fetch()['ac'];}else{$acc='0';}

// In-Active Customer
$ic = dbConnect()->prepare("SELECT count(id) as ic FROM users WHERE role=? AND status=?");
$ic->execute(['customer', 0]);
if(!empty($ic)){$icc = $ic->fetch()['ic'];}else{$icc='0';}

// All Supplier
$als = dbConnect()->prepare("SELECT count(id) as als FROM users WHERE role=?");
$als->execute(['supplier']);
if(!empty($als)){$alss = $als->fetch()['als'];}else{$alss='0';}

// Active Supplier
$as = dbConnect()->prepare("SELECT count(id) as ais FROM users WHERE role=? AND status=?");
$as->execute(['supplier', 1]);
if(!empty($as)){$asp = $as->fetch()['ais'];}else{$asp='0';}

// In-Active Supplier
$is = dbConnect()->prepare("SELECT count(id) as iis FROM users WHERE role=? AND status=?");
$is->execute(['supplier', 0]);
if(!empty($is)){$isp = $is->fetch()['iis'];}else{$isp='0';}

// All Driver
$ad = dbConnect()->prepare("SELECT count(id) as ad FROM users WHERE role=?");
$ad->execute(['driver']);
if(!empty($ad)){$ald = $ad->fetch()['ad'];}else{$ald='0';}

// Active Driver
$aid = dbConnect()->prepare("SELECT count(id) as aid FROM users WHERE role=? AND status=?");
$aid->execute(['driver', 1]);
if(!empty($aid)){$add = $aid->fetch()['aid'];}else{$add='0';}

// In-Active Driver
$iid = dbConnect()->prepare("SELECT count(id) as iid FROM users WHERE role=? AND status=?");
$iid->execute(['driver', 0]);
if(!empty($iid)){$idd = $iid->fetch()['iid'];}else{$idd='0';}


// All Marketer
$am = dbConnect()->prepare("SELECT count(id) as am FROM users WHERE role=?");
$am->execute(['marketer']);
if(!empty($am)){$alm = $am->fetch()['am'];}else{$alm='0';}

// Active Marketer
$aim = dbConnect()->prepare("SELECT count(id) as aim FROM users WHERE role=? AND status=?");
$aim->execute(['marketer', 1]);
if(!empty($aim)){$amm = $aim->fetch()['aim'];}else{$amm='0';}

// In-Active Marketer
$iim = dbConnect()->prepare("SELECT count(id) as iim FROM users WHERE role=? AND status=?");
$iim->execute(['marketer', 0]);
if(!empty($iim)){$imm = $iim->fetch()['iim'];}else{$imm='0';}

// All ticket
$tk = dbConnect()->prepare("SELECT count(id) as tk FROM ticket");
$tk->execute();
if(!empty($tk)){$atk = $tk->fetch()['tk'];}else{$atk='0';}

// pending ticket
$pd = dbConnect()->prepare("SELECT count(id) as pd FROM ticket WHERE status=?");
$pd->execute([0]);
if(!empty($pd)){$ptk = $pd->fetch()['pd'];}else{$ptk='0';}


// responded ticket
$rd = dbConnect()->prepare("SELECT count(id) as rd FROM ticket WHERE status=?");
$rd->execute([1]);
if(!empty($rd)){$rtk = $rd->fetch()['rd'];}else{$rtk='0';}


// resolved ticket
$rt = dbConnect()->prepare("SELECT count(id) as rt FROM ticket WHERE status=?");
$rt->execute([2]);
if(!empty($rt)){$ritk = $rt->fetch()['rt'];}else{$ritk='0';}



function subTotal($mon, $yr){
    $getSum = dbConnect()->prepare("SELECT SUM(net_amount) AS total FROM sales_activity WHERE month = ? AND year = ?");
    $getSum->execute([$mon, $yr]);
    $ft = $getSum->fetch();
    $total = $ft['total'];
    if ($total==NULL) {
        $total = "0.00";
    }
    return $total;
}

function monthlyExpenses($mon, $yr){
    $getSum = dbConnect()->prepare("SELECT SUM(amount) AS total FROM expenses WHERE MONTH(date) = ? AND YEAR(date) = ?");
    $getSum->execute([$mon, $yr]);
    $ft = $getSum->fetch();
    $total = $ft['total'];
    if ($total==NULL) {
        $total = "0.00";
    }
    return $total;
}

//total sales amount and sales count
$rev = dbConnect()->prepare("SELECT sum(total) AS total, count(id) AS id FROM sales_activity");
$rev->execute();
$r= $rev->fetch();
$revenue = $r['total'];
$tsale = $r['id'];


//total expenses
$ex = dbConnect()->prepare("SELECT sum(amount) AS total, count(id) AS id FROM expenses");
$ex->execute();
$rr = $ex->fetch();
$exp = $rr['total'];
$texp = $rr['id'];


//<<<<<<<<<<<<< Total Projects >>>>>>>>>>>>>>>>>
$totalProject = dbConnect()->prepare("SELECT count(p_id) as project FROM projects ");
$totalProject->execute();
$totPrj = $totalProject->fetch()['project'];

// <<<<<<<<<<< Ongoing Projects >>>>>>>>>>>>>>
$ongoing = dbConnect()->prepare("SELECT count(p_id) as onProj FROM projects WHERE status = ?");
$ongoing->execute([1]);
$ongo = $ongoing->fetch()['onProj'];

$completed = dbConnect()->prepare("SELECT count(p_id) as comPro FROM projects WHERE status = ?");
$completed->execute([2]);
$comp = $completed->fetch()['comPro'];

// <<<<<<<<<<<<<<<<<<< Available Products >>>>>>>>>>>>
$totalProject = dbConnect()->prepare("SELECT count(id) as prod FROM production WHERE available_prd !=? AND status =? ");
$totalProject->execute([0,1]);
$prod = $totalProject->fetch()['prod'];

// <<<<<<<<<<<<<<<<<<< Available Products >>>>>>>>>>>>
// $today = strtotime(date('d'));
// $totalProject = dbConnect()->prepare("SELECT count(id) as t_sales FROM sales_activity WHERE DAY(date) = '$today' ");
// $totalProject->execute();
// $prod = $totalProject->fetch()['prod'];

// Total Assets
$assets = dbConnect()->prepare("SELECT count(id) as ass FROM assets ");
$assets->execute();
$totalAssets = $assets->fetch()['ass'];

$allusers = dbConnect()->prepare("SELECT count(id) as alu FROM users ");
$allusers->execute();
$totalUsers = $allusers->fetch()['alu'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Buffalo Crete</title>
    <!-- This page CSS -->
    <!-- Footable CSS -->
    <link href="../assets/node_modules/footable/css/footable.bootstrap.min.css" rel="stylesheet">
    <!-- Page CSS -->
    <link href="../assets/node_modules/wizard/steps.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/node_modules/summernote/dist/summernote-bs4.css">
    <link href="dist/css/pages/inbox.css" rel="stylesheet">
    <link href="dist/css/pages/contact-app-page.css" rel="stylesheet">
    <link href="dist/css/pages/footable-page.css" rel="stylesheet">
    <link href="../assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="../assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="../assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="../assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="../assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="../assets/node_modules/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    
    
    
    
    <!-- Daterange picker plugins css -->
    <link href="../assets/node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="../assets/node_modules/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css"
        href="../assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="../assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
      <!-- Calendar CSS -->
    <link href="../assets/node_modules/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- chartist CSS -->
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/node_modules/html5-editor/bootstrap-wysihtml5.css" />
    <!-- Dashboard 1 Page CSS -->

    <!-- Summer note css -->
    <link href="dist/css/summernote-bs4.min.css" rel="stylesheet">
    
    
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">BuffaloCrete</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/buffalo-crete-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/buffalo-crete-text.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <!-- <img src="../assets/images/buffalo-crete-text.png" alt="homepage" class="dark-logo" />
                         Light Logo text    
                         <img src="../assets/images/buffalo-crete-text.png" class="light-logo" alt="homepage" /></span> </a> -->
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Search & enter">
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-layout-width-default"></i></a>
                            <div class="dropdown-menu animated bounceInDown">
                                <ul class="mega-dropdown-menu row">
                                    <li class="col-lg-3 col-xlg-2 m-b-30">
                                        <h4 class="m-b-20">CAROUSEL</h4>
                                        <!-- CAROUSEL -->
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container"> <img class="d-block img-fluid" src="../assets/images/big/img1.jpg" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img2.jpg" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img3.jpg" alt="Third slide"></div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                        </div>
                                        <!-- End CAROUSEL -->
                                    </li>
                                    <li class="col-lg-3 m-b-30">
                                        <h4 class="m-b-20">ACCORDION</h4>
                                         <!-- Accordian -->
                                        <div class="accordion" id="accordionExample">
                                            <div class="card m-b-0">
                                                <div class="card-header bg-white p-0" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Collapsible Group Item #1
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card m-b-0">
                                                <div class="card-header bg-white p-0" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo">
                                                            Collapsible Group Item #2
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card m-b-0">
                                                <div class="card-header bg-white p-0" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                                            aria-controls="collapseThree">
                                                            Collapsible Group Item #3
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">CONTACT US</h4>
                                        <!-- Contact -->
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </li>
                                    <li class="col-lg-3 col-xlg-4 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down"><?php echo $name; ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> &nbsp;<!-- <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a> --></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <?php  include 'side.php'; ?>

