<?php include 'header.php';?>
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
                        <h4 class="text-themecolor">Sales Managements</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Manage Sales</li>
                            </ol>
                            <!--<button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                                    class="fa fa-plus-circle"></i> Create New</button> -->
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
                            <div class="card-body">
                                <h4 class="card-title">Manage Sales</h4>
                                <h6 class="card-subtitle"><small>Edit/Delete</small></h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                    <!-- <th>#</th> -->
                                                    <th>Sales ID</th>
                                                    <th>Customers</th>
                                                    <th>Staff</th>
                                                    <th>Total </th>
                                                    <th>Products</th>
                                                    <th>Date</th>
                                                    <th style="width:40px;">Action</th>
                                                    <th>Delivery</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $user = dbConnect()->prepare("SELECT * FROM sales_activity ORDER BY id desc");
                                            $user ->execute();
                                            $i = 0;
                                            while($rw=$user->fetch()){
                                               $i++;
                                               ?>
                                        <tr>
                                            <!-- <td><?php// echo $i; ?></td> -->
                                            <td>
                                               <?php echo $rw['sales_id'] ?>
                                            </td>
                                            <td><?php echo $rw['cust_name'] ?></td>
                                            <td><?php $id = $rw['staffid'];
                                                $dbx = dbConnect()->prepare("SELECT fname, lname, phone FROM users WHERE id='$id'");
                                                $dbx->execute();
                                                $ry = $dbx->fetch();
                                                $staff = $ry['fname'].' '.$ry['lname'];
                                                echo($staff);
                                            ?></td>
                                            <td>
                                                <?php 
                                                    $sales_id = $rw['sales_id'];
                                                    $getprd = dbConnect()->prepare("SELECT * FROM sold_items WHERE sales_id = ?");
                                                     $getprd->execute([$sales_id]);
                                                    $total = 0;
                                                    while ($row = $getprd->fetch()) {
                                                        $iprice = $row['quantity'] * $row['unitPrice'];
                                                        $total = $total + $iprice;
                                                    }
                                                    /*$getprd = dbConnect()->prepare("SELECT sold_items.Product,sold_items.quantity, sold_items.sales_id,production.product,production.unitPrice FROM sold_items JOIN production ON sold_items.product = production.id WHERE sales_id = ? ");
                                                    $getprd->execute([$sales_id]);
                                                    $total = 0;
                                                    while ($row = $getprd->fetch()) {
                                                        $iprice = $row['quantity'] * $row['unitPrice'];
                                                        $total = $total + $iprice;
                                                    } */

                                                            ?>
                                        <b> &#8358;<?php echo $total ?></b> </td>
                                        <td width="30%">
                                            <?php 
                                            $sales_id2 = $rw['sales_id'];
                                                $getprd2 = dbConnect()->prepare("SELECT sold_items.product,pc.name FROM sold_items JOIN product_category AS pc ON sold_items.product = pc.id WHERE sales_id = ? ");
                                                        $getprd2->execute([$sales_id2]);
                                                        while ($row = $getprd2->fetch()) {?>
                                                          <span class="label label-info"> <?php echo $row['name'];?></span>
                                                       <?php }
                                            ?>
                                                
                                            </td>
                                            <td><span class="label label-info"><?php echo date("d-m-y h:i:s a", $rw['date']) ?></span> </td>
                                            <td class="text-center">
                                                <span align="center" title="Invoice">
                                                    <a href="invoice?id=<?php echo $sales_id?>" class="icon-docs" style="font-size:15px;"></a> 
                                                </span>

                                                <span align="center" title="Invoice">
                                                    <a href="view-sales?id=<?php echo $sales_id?>" class="icon-eye" style="font-size:15px;" ></a> 
                                                </span>

                                                <span align="center" title="Invoice">
                                                    <a href="?delete=<?php echo $sales_id?>" class="icon-trash" style="font-size:15px;"></a> 
                                                </span>
                                            </td>
                                            <td>
                                                <h3 align="center" title="Transportation"> <a href="transport?id=<?php echo $sales_id?>" class="ti-car"></a></h3>
                                            </td>
                                        </tr>
                                            <?php }?>
                                            </tbody>
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
<!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            ?? 2019 Eliteadmin by themedesigner.in
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
</body>

</html>

