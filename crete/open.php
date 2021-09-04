<?php include 'header.php'; 

if(isset($_GET['close'])){                          
    $t_id = $_GET['close'];
    $dsupp = dbConnect()->prepare("UPDATE ticket SET status=2 WHERE id='$t_id' ");
    $dsupp->execute();
    if($dsupp){
    echo "<script> alert('This ticket is closed');window.location='open' </script>";
    }else{
        echo "<script> alert('Oops! Error occurs');window.location='open' </script>";
    }
}

if(isset($_GET['del'])){                          
    $dmarketer = $_GET['del'];
    $dsup = dbConnect()->prepare("DELETE FROM ticket WHERE id='$dmarketer' ");
    $dsup->execute();
    if($dsup){
    echo "<script> alert('Ticket has been deleted');window.location='open' </script>";
    }
}
?>
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
                        <h4 class="text-themecolor">Open Tickets</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Tickets</li>
                            </ol>
                            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#add-ticket"><i
                                    class="fa fa-plus-circle" ></i> Create New</button> -->
                                    <a href="aticket" class="btn btn-info d-none d-lg-block m-l-15"> <i class="icon icon-plus" ></i>Create New</a>
                        </div>
<!-- Modal to create new ticket here -->
 <!-- Add Contact Popup Model -->


<!-- Modal to create new ticket ends here -->



                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Support Ticket List</h4>
                                <h6 class="card-subtitle">List of ticket opend by customers</h6>
                                <div class="row m-t-40">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $atk; ?></h1>
                                                <h6 class="text-white">Total Tickets</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?php echo $rtk; ?></h1>
                                                <h6 class="text-white">Responded</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><?php echo $ritk; ?></h1>
                                                <h6 class="text-white">Resolve</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?php echo $ptk; ?></h1>
                                                <h6 class="text-white">Pending</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
                                <div class="table-responsive">
                                    <table id="example23" class="table m-t-30 table-hover no-wrap contact-list"
                                        data-paging="true" data-paging-size="7">
                                        <thead>
                                            <tr>
                                                <th>ID #</th>
                                                <th>Opened By</th>
                                                <th>Cust. Email</th>
                                                <th>Sbuject</th>
                                                <th>Status</th>
                                                <th>Assign to</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ct= dbConnect()->prepare("SELECT t.id, t.user_id,t.subject,t.customer,t.department,t.email,t.branch,t.note,t.file,t.status,t.created,u.fname,u.lname,u.image FROM ticket AS t INNER JOIN users AS u ON t.user_id=u.id");
                                                $ct->execute();
                                                $i=0;
                                                while($t=$ct->fetch()){
                                                    $i++;
                                                    if($t['status'] ==0){$status='Pending';}
                                                    elseif($t['status']==1){$status='Responded';}
                                                    else{$status='Resolved';}
                                                    $tid = $t['id'];
                                                    $nim = $t['fname'].' '.$t['lname'];
                                                ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i;?>
                                                    <?php if($t['status']==0){  ?>

                                                    <a class="" href="?close=<?php echo $tid;?>" onclick="return confirm('Are you sure you want to close this ticket?')"><i class="icon-close text-danger"></i></a>
                                                <?php } ?>
                                                    <!-- <a href=""><i class="icon-trash text-danger"></i></a> -->
                                                    <a href="" data-toggle="modal" data-target="#add-contact<?php echo $i;?>"><i class="icon-eye text-info"></i></a>
                                                        
                                                </td>
                                                <td>
                                                    <a href=""><img src="<?php if($t['image']==''){echo'../assets/images/users/1.jpg';}else{echo 'upload/'.$t['image'];}?>"
                                                            alt="user" class="img-circle" /> <?php echo $t['customer']; ?></a>
                                                </td>
                                                <td><?php echo $t['email'];?></td>
                                                <td><?php echo $t['subject'];?></td>
                                                <td><span class="label <?php if($t['status']==0){echo 'label-danger';}elseif($t['status']==1){echo'label-warning';}else{echo 'label-success';}?>"><?php echo $status;?></span> </td>
                                                <td><?php echo $nim;?></td>
                                                <td><?php echo $t['created'];?></td>

                                                <div id="add-contact<?php echo $i ;?>" class="modal fade in" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">View
                                                                    Ticket</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <from class="form-horizontal form-material">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control"
                                                                                value="<?php echo $t['customer'];?>"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control"
                                                                                value="<?php echo $t['subject'];?>"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control"
                                                                                value="<?php echo $t['department'];?>"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control"
                                                                                value="<?php echo $t['email'];?>"> </div>
                                                                        <div class="col-md-12 m-b-20">

                                                                        <div class="col-md-12 m-b-20">
                                                                           <textarea class="form-control">
                                                                               <?php  echo htmlspecialchars($t['note']); ?>
                                                                           </textarea>
                                                                        </div>
                                                                    </div>
                                                                </from>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <!-- <a href="?close=<?php echo $tid;?>" onclick="return confirm('Are you sure you want to close this ticket?')"  class="btn btn-info waves-effect"
                                                                    data-dismiss="modal">Close Tickect</a> -->
                                                                <button type="button"
                                                                    class="btn btn-default waves-effect"
                                                                    data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                  <!--   <button type="button" class="btn btn-info btn-rounded"
                                                        data-toggle="modal" data-target="#add-contact">Add New
                                                        Contact</button> -->
                                                </td>
                                                
                                                <td colspan="6">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                        </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a>
                                </li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a>
                                </li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark"
                                        class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark"
                                        class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a>
                                </li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark"
                                        class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark"
                                        class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark"
                                        class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img"
                                            class="img-circle"> <span>Varun Dhavan <small
                                                class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img"
                                            class="img-circle"> <span>Genelia Deshmukh <small
                                                class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img"
                                            class="img-circle"> <span>Ritesh Deshmukh <small
                                                class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img"
                                            class="img-circle"> <span>Arijit Sinh <small
                                                class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img"
                                            class="img-circle"> <span>Govinda Star <small
                                                class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img"
                                            class="img-circle"> <span>John Abraham<small
                                                class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img"
                                            class="img-circle"> <span>Hritik Roshan<small
                                                class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img"
                                            class="img-circle"> <span>Pwandeep rajan <small
                                                class="text-success">online</small></span></a>
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
         <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © <?php echo date('Y'); ?> Hybridsoft
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- Footable -->
    <script src="../assets/node_modules/moment/moment.js"></script>
    <script src="../assets/node_modules/footable/js/footable.min.js"></script>
    <!-- This is data table -->
    <script src="../assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(function () {
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        });

    </script>
    <script>
        $(function () {
            $('#demo-foo-addrow').footable();
        });
    </script>

</body>

</html>