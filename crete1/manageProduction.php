<?php include 'header.php';
    if (isset($_POST['save'])) {
        $productionid = $_POST['id'];
        $cprice = $_POST['price'];
        $qty = $_POST['qty'];
        $status = 1;
        $outprice = $cprice * $qty;

        $updPrd = dbConnect()->prepare("UPDATE production SET status = ?, available_prd = ?, outputqty = ?, unitPrice = ?, outputprice = ? WHERE id = ?");
        if ($updPrd->execute([$status, $qty, $qty, $cprice, $outprice, $productionid])) {
            $msg = "Production has been Completed, Product is Available for sell";
            echo("<script>alert('$msg');</script>");
        }else{
             $msg = "Error Updating Production. Please Try Again";
             echo("<script>alert('$msg');</script>");
        }

    }
?>
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
                        <h4 class="text-themecolor">Products</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Manage Product</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
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
                            <div class="card-body">
                                <h4 class="card-title">Manage Product</h4>
                                <h6 class="card-subtitle"><small>Edit/Delete</small></h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product</th>
                                                    <th>Input Cost</th>
                                                    <th>Output Price</th>
                                                    <th>Staff</th>
                                                    <th>Status</th>
                                                    <th>Raw Material</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $user = dbConnect()->prepare("SELECT * FROM production ORDER BY created desc");
                                            $user ->execute();
                                                $i = 0;
                                               while($rw=$user->fetch()){
                                                $status = ($rw['status'] == 0)?'Ongoing':'Finished';
                                               $i++;
                                               ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                               <?php 
                                               $pid = $rw['product'];
                                               $pname = dbConnect()->prepare("SELECT name FROM product_category WHERE id = ?");
                                                $pname->execute([$pid]);
                                                $name = $pname->fetch();
                                                echo $name['name'];
                                                ?>
                                            </td>
                                            <td><?php echo number_format($rw['inputcost']) ?></td>
                                            <td><?php echo number_format($rw['outputprice']) ?></td>
                                            <td>
                                                <?php 
                                                $userid = $rw['user'];
                                                $getName = dbConnect()->prepare("SELECT fname,lname FROM users WHERE id = ?");
                                                $getName->execute([$userid]);
                                                $row = $getName->fetch();
                                                $name = $row['fname']." ".$row['lname']; ?>
                                                <span class="label label-success"><?php echo $name ?></span> 
                                            </td>
                                            <td><?php echo $status?></td>
                                            <td width="30%">
                                                <?php
                                                
                                                    $rcode =$rw['code'];
                                                    $getInput = dbConnect()->prepare("SELECT input.input,input.qty,rawmaterial.material FROM input JOIN rawmaterial ON input.input = rawmaterial.id WHERE code = ?");
                                                    $getInput->execute([$rcode]);
                                                    if ($getInput->rowcount() > 0) {
                                                        while ($rows = $getInput->fetch()) {?>
                                                            <span class="label label-danger"><?php echo $rows['material'].' ('. $rows['qty'] .')';?></span>
                                                       <?php }
                                                    } else{?>
                                                        <span class="label label-info">Material Not Added</span>
                                                   <?php }
                                                   
                                                ?>
                                                
                                            </td>
                                            <td><span class="label label-info"><?php echo $rw['created'] ?></span> </td>
                                            <td class="text-center">
                                                <?php
                                                    if ($rw['status'] == 0) {?>
                                                        <h4><a href="" data-toggle="modal" data-target="#MyRaw<?php echo $i; ?>" class="icon icon-plus text-success"></a></h4>
                                                   <?php }else{?>
                                                        <h4><a href="input?code=<?php echo $rw['code'];?>"  class="icon icon-eye text-primary"></a></h4>
                                                  <?php  }
                                                ?>
                                            </td>
                                        </tr>

<div id="MyRaw<?php echo $i; ?>" class="modal fade in" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Finalize Production</h4>
            <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">×</button>
        </div>
       <form class="form-horizontal" method="POST">
            <div class="modal-body">
                <input type="hidden" readonly="" value="<?php echo $rw['id']?>" name="id">

                <div class="form-group">
                    <label class="col-md-12">Product</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo $rw['product'] ?>" readonly> 
                    </div>
                </div>

               <div class="form-group">
                    <label class="col-md-12">Unit Price</label>
                    <div class="col-md-12">
                        <input type="number" name="price" required  class="form-control"> 
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Quantity Produced</label>
                    <div class="col-md-12">
                        <input type="number" name="qty" class="form-control" placeholder="Input Quantity" required> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="save" class="btn btn-info waves-effect">Save</button>
                <button type="button" class="btn btn-default waves-effect"
                    data-dismiss="modal">Cancel</button>
            </div>
    </form>
    </div>
    <!-- /.modal-content -->
</div>
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
            © 2019 Eliteadmin by themedesigner.in
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

