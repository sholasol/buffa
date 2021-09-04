<?php include 'header.php';
    
    if (isset($_POST['save'])) {
        $ename = $_POST['ename'];
        if (empty($ename)) {
            echo "<script>alert('All Fields are required')</script>";
        }else{
            $val = dbConnect()->prepare("SELECT name FROM expenses_categories WHERE name = ?");
            $val->execute([$ename]);
            if ($val->rowcount()>0) {
                echo "<script>alert('Category Already Available')</script>";
            }else{
                $ins = dbConnect()->prepare("INSERT INTO expenses_categories (name)VALUES(?)");
                if ($ins->execute([$ename])) {
                    echo "<script>alert('Successfully Inserted')</script>";
                }else{
                    echo "<script>alert('An Error Occured! Try Again')</script>";
                }

            }
        }
    }

    if (isset($_POST['update-expenses'])) {
        $ename = $_POST['exp_name'];
        $eid = $_POST['id'];
        if (empty($ename)) {
            echo "<script>alert('All Fields are required')</script>";
        }else{
            $val = dbConnect()->prepare("UPDATE expenses_categories SET name = ? WHERE id = ?");
            $val->execute([$ename, $eid]);
            if ($val) {
                echo "<script>alert('Updated')</script>";
            }else{
                
                    echo "<script>alert('An Error Occured! Try Again')</script>";
                }

        }
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
                        <h4 class="text-themecolor">Expenses Category</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Expenses Category</li>
                            </ol>
                             <button type="button" data-toggle="modal" data-target="#add-contact" class="btn btn-info d-none d-lg-block m-l-15"><i
                                    class="fa fa-plus-circle"></i> Create New</button> 
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
                            <div class="contact-page-aside">
                                <!-- .left-aside-column-->
                                
                                <!-- /.left-aside-column-->
                                <div class=" ">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title mr-5 m-t-10">&nbsp;&nbsp;&nbsp;&nbsp; Expenses Category </h4>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="table-responsive">
                                        

                                        <table id="example23"
                                            class="table no-wrap table-bordered m-t-30 table-hover contact-list"
                                            data-paging="true" data-paging-size="7">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Expense Category</th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            
                                            
                                            <tbody>
                                            <?php
                                            $user = dbConnect()->prepare("SELECT * FROM expenses_categories ORDER BY id DESC");
                                            $user ->execute();
                                                $i = 0;
                                            while($rw = $user->fetch()){
                                               $i++;?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                               <?php echo $rw['name'] ?>
                                            </td>
                                            <td> 
                                                <a type="button" class="icon icon-pencil text-success" data-toggle="modal" data-target="#update-expenses<?php echo $rw['id'] ;?>"> </a>
                                                
<a href="?id=<?php echo $rw['id'];?>"class="icon icon-trash text-danger"  onclick="return confirm('Are you sure to delete?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to delete data"></a>
                                            </td>
                                        </tr>
                                            <?php 
                                            include 'modal/ecategory.php';
                                        }
                                        ?>
                                            </tbody>

                                            
                                               
                                        </table>
                                    </div>
                                    <!-- .left-aside-column-->
                                </div>
                                <!-- /.left-right-aside-column-->
                            </div>
                        </div>
                    </div>

                </div>
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Expense Category</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                       <form class="form-horizontal" method="POST">
                           
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-md-12">Expense Category</label>
                                    <div class="col-md-12">
                                        <input type="text" name="ename"  class="form-control"> 
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="save" class="btn btn-info waves-effect">Add Category</button>
                                <button type="button" class="btn btn-default waves-effect"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div><!--End Modal -->
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