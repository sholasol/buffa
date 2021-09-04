<?php include 'header.php';?>
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
                        <h4 class="text-themecolor">Products</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Product</li>
                            </ol>
                            <!-- <button type="button" data-toggle="modal" data-target="#add-contact" class="btn btn-info d-none d-lg-block m-l-15"><i
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
                            <!-- .left-right-aside-column-->
                            <div class="contact-page-aside">
                                <!-- .left-aside-column-->
                                <div class="left-aside bg-light-part">
                                    <ul class="list-style-none">
                                        <li class="box-label"><a href="product">All Categories
                                                <span>123</span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="?pprd=process">Processing Products <span>103</span></a></li>
                                        <li><a href="?pprd=finish">Finished Products <span>19</span></a></li>
                                    </ul>
                                </div>
                                <!-- /.left-aside-column-->
                                <div class="right-aside ">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">Product List </h4>
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
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Cost</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <?php
                                                if (!isset($_GET['pprd'])) {?>
                                                   
                                            
                                            <tbody>
                                            <?php
                                            $user = dbConnect()->prepare("SELECT * FROM production ORDER BY id DESC");
                                            $user ->execute();
                                                $i = 0;
                                            while($rw = $user->fetch()){
                                               $i++;
                                               $avl = $rw['available_prd'];
                                               $qtStatus = "";
                                               if ($avl <= 10) {
                                                   $qtStatus = "<span class='label label-warning'>Low!</span>";
                                               }
                                               if ($avl < 1) {
                                                   $qtStatus = "<span class='label label-danger'>Out of Stock!</span>";
                                               }
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
                                            <td><?php echo $avl." ".$qtStatus ?></td>
                                            <td><span class="label label-info"><?php echo number_format($rw['unitPrice']) ?></span> </td>
                                            <td><span class="label label-primary"><?php echo number_format($rw['outputprice']) ?></span> </td>
                                            <td>
                                                <?php
                                                    $status = $rw['status'];
                                                    if ($status == 0) {?>
                                                        <span class="label label-primary">Processing</span>
                                                   <?php
                                                    } else{?>
                                                        <span class="label label-info">Finished</span>
                                                  <?php  }
                                                ?>
                                                
                                            </td>
                                            <td><span class="label label-info"><?php echo $rw['created'] ?></span> </td>

                                            <td>
                                                 <?php
                                                if($grp ==10){
                                                ?>
                                                <a href="" class="icon icon-pencil text-success"></a>
                                                <a href="" class="icon icon-trash text-danger"></a>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                            <?php }?>
                                            </tbody>

                                            <?php
                                                } else if (isset($_GET['pprd']) && $_GET['pprd'] == 'finish' ){?>
                                                     <tbody>
                                            <?php
                                            $user = dbConnect()->prepare("SELECT * FROM production WHERE status != 0 ");
                                            $user ->execute();
                                                $i = 0;
                                             while($ro = $user->fetch()){
                                               $i++;
                                               ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                               <?php echo $ro['product'] ?>
                                            </td>
                                            <td><?php echo  $ro['outputqty'] ?></td>
                                            <td><span class="label label-info"><?php echo number_format( $ro['unitPrice']) ?></span> </td>
                                            <td><span class="label label-primary"><?php echo number_format( $ro['outputprice']) ?></span> </td>
                                            <td><span class="label label-info"><?php echo  $ro['created'] ?></span> </td>

                                            <td>
                                                <?php
                                                if($user_role =="admin"){
                                                ?>
                                                <a href="" class="icon icon-pencil text-success"></a>
                                                <a href="" class="icon icon-trash text-danger"></a>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                            <?php }?>
                                            </tbody>
                                               <?php 
                                                } 
                                                else if (isset($_GET['pprd']) && $_GET['pprd'] == 'process') {?>
                                                   <tbody>
                                            <?php
                                            $user = dbConnect()->prepare("SELECT * FROM production WHERE status = 0 ");
                                            $user ->execute();
                                                $i = 0;
                                            while($rw = $user->fetch()){
                                               $i++;
                                               ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                               <?php echo  $rw['product'] ?>
                                            </td>
                                            <td><?php echo $user->outputqty ?></td>
                                            <td><span class="label label-info"><?php echo number_format($rw['unitPrice']) ?></span> </td>
                                            <td><span class="label label-primary"><?php echo number_format($rw['outputprice']) ?></span> </td>
                                            <td><span class="label label-info"><?php echo $rw['created']?></span> </td>

                                            <td>
                                                <?php
                                                if($user_role =="admin"){
                                                ?>
                                                <a href="" class="icon icon-pencil text-success"></a>
                                                <a href="" class="icon icon-trash text-danger"></a>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                            <?php }?>
                                            </tbody>
                                              <?php  }
                                            ?>
                                        </table>
                                    </div>
                                    <!-- .left-aside-column-->
                                </div>
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
                                    <!-- <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
                                                </div>
                                                <form class="form-horizontal form-material" method="POST">
                                                <div class="modal-body">
                                                    
                                                        <div class="form-group">
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="text" class="form-control"
                                                                       name="product"  placeholder="Product name" required> </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <select class="form-control"  name="type" required>
                                                                    <option value="">Select Type</option>
                                                                    <option>High</option>
                                                                    <option>Medium</option>
                                                                    <option>Low</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="text" class="form-control"
                                                                       name="standard"    placeholder="Standard" required> </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="number" class="form-control"
                                                                       name="price"    placeholder="Price" required> </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="number" class="form-control"
                                                                       name="cost"    placeholder="Cost Price" required> </div>
                                                            
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="token" value="<?php //echo Token::generate(); ?>">
                                                    <button type="submit" name="submit" class="btn btn-info waves-effect"
                                                        >Save</button>
                                                    <button type="button" class="btn btn-default waves-effect"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content ->
                                        </div>
                                        <!-- /.modal-dialog ->
                                    </div> -->
                                        
                                       <!--  <div id="myModal" class="modal fade in" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Add Category</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <from class="form-horizontal">
                                                            <div class="form-group">
                                                                <label class="col-md-12">Product Category</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="type name"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-12">Select Number of people</label>
                                                                <div class="col-md-12">
                                                                    <select class="form-control">
                                                                        <option>All Contacts</option>
                                                                        <option>10</option>
                                                                        <option>20</option>
                                                                        <option>30</option>
                                                                        <option>40</option>
                                                                        <option>Custome</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </from>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-info waves-effect"
                                                            data-dismiss="modal">Save</button>
                                                        <button type="button" class="btn btn-default waves-effect"
                                                            data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content ->
                                            </div>
                                            <!-- /.modal-dialog ->
                                        </div> -->
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