<?php
include 'header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

?>
<!-- Page wrapper  -->
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
                        <h4 class="text-themecolor">Drivers' Performance</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Report</li>
                            </ol>
                        </div>
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
                            <!-- .left-right-aside-column-->
                            <div class="contact-page-aside pl-3">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">Activities Log </h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive"> 
                                        <table id="example23"
                                            class="table no-wrap table-bordered m-t-30 table-hover contact-list"
                                            data-paging="true" data-paging-size="7">
                                            <thead>
                                                <tr>
                                                    <th width='5%'>#</th>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Destination</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
                                                $i = 0;
                                                $users = dbConnect()->prepare("SELECT * FROM transport WHERE driver_id='$id' ");
                                                $users->execute();
                                                while($user=$users->fetch()){
                                                $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo ($user['cust_name']); ?></td>
                                            <td><span class="text-info">₦ <?php echo number_format($user['amount']); ?></span> </td>
                                            <td>
                                                <?php echo $user['destination']; ?>
                                            </td>
                                            <td>
                                                <?php echo $user['created']; ?>
                                            </td>
                                        </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- .left-aside-column-->
                                <!-- </div> -->
                                <!-- /.left-right-aside-column-->
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
                
                <!-- Add Contact Popup Model -->
                                    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Add New Unit</h4>
                                                </div>
                                                <form class="form-horizontal form-material" method="POST">
                                                <div class="modal-body">
                                                    
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       name="name"  placeholder="Unit name" required> 
                                                            </div>
                                                            
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="text" class="form-control" name="unit" placeholder="Unit" required> 
                                                            </div>
                                                            
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    
                                                    <button type="submit" name="submit" class="btn btn-info waves-effect"
                                                        >Save</button>
                                                    <button type="button" class="btn btn-default waves-effect"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                        
                                        <!--  -->
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
            © <?php echo date('Y') ?> Buffalocrete
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
    <!--FooTable init-->
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