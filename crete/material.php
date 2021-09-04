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
                        <h4 class="text-themecolor">Materials</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Material</li>
                            </ol>
                            <button type="button" data-toggle="modal" data-target="#add-contact" class="btn btn-info d-none d-lg-block m-l-15"><i
                                    class="icon icon-plus-circle"></i> Create New</button>
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
                                        <li class="box-label"><a href="javascript:void(0)">All Categories
                                                <span>123</span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="staff">Staff <span>103</span></a></li>
                                        <li><a href="driver">Drivers <span>19</span></a></li>
                                        <li><a href="suplier">Suppliers <span>623</span></a></li>
                                        <li><a href="customer">Customers <span>53</span></a></li>
                                        <li class="box-label"><a href="#" data-toggle="modal" data-target="#add-contact"" class="btn btn-info text-white">+ Create Material
                                                Category</a></li> 
                                    </ul>
                                </div>
                                <!-- /.left-aside-column-->
                                <div class="right-aside ">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">Material List </h4>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="table-responsive">
                                        <?php 

                                        if(isset($_POST['submit'])){

                                           if(empty($_POST['material'])) {

                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> This field is required.

                                                        </div>";
                                           }
                                           if(empty($_POST['cost'])) {

                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> This field is required.

                                                        </div>";
                                           }
                                           if(empty($_POST['unit'])) {

                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> This field is required.

                                                        </div>";
                                           }else{


                                                $mat = check_input($_POST['material']);
                                                $cost = check_input($_POST['cost']);
                                                $unit = check_input($_POST['unit']);
                                                $qty = check_input($_POST['qty']);
                                                $created = date('Y-m-d');
                                                $branch = check_input($_POST['branch']);
                                                $costprice = $qty * $cost;

                                                $db= dbConnect()->prepare("INSERT INTO rawmaterial  SET material=?, cost=?, unit=?, created=?, qty=?, costprice=?, branch=?");
                                                if( $db->execute([$mat, $cost, $unit, $created, $qty, $costprice, $branch ])){
                                                    echo "<script> alert('Operation successful');window.location='material' </script>";
                                                }


                                           }

                                        }

                                    function check_input($data) {
                                    $data = trim($data);
                                    $data = stripslashes($data);
                                    $data = htmlspecialchars($data);
                                    return $data;
                                    } 
                                    ?>  
                                        <table id="example23"
                                            class="table no-wrap table-bordered m-t-30 table-hover contact-list"
                                            data-paging="true" data-paging-size="7">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Unit</th>
                                                    <th>Cost Price</th>
                                                    <th>Quantity</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $user = dbConnect()->prepare("SELECT rm.material,rm.cost,rm.qty,rm.created,units.unit FROM rawmaterial AS rm JOIN units ON rm.unit = units.id");
                                            $user ->execute();
                                                $i = 0;
                                             while($rw = $user->fetch()){
                                               $i++;
                                               ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                               <?php echo $rw['material'] ?>
                                            </td>
                                            <td><span class="label label-info"><?php echo $rw['unit'] ?></span> </td>
                                            <td><span class="label label-primary"><?php echo number_format($rw['cost']) ?></span> </td>
                                            <td><span class="label label-primary"><?php echo ($rw['qty']) ?></span> </td>
                                            <td><span class="label label-info"><?php echo $rw['created'] ?></span> </td>
                                        </tr>
                                            <?php }?>
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
                
                <!-- Add Contact Popup Model -->
<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"
        aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Add New Material</h4>
</div>
<form class="form-horizontal form-material" method="POST">
<div class="modal-body">
    
        <div class="form-group">
            <div class="form-group">
                <input type="text" class="form-control"
                       name="material"  placeholder="Material name" required> 
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="qty" placeholder="Quantity" required="required">
            </div>
<div class="form-group">
    <select name="unit" class="form-control">
        <option selected disabled>Select Unit</option>
        <?php
        $getUnit = dbConnect()->prepare("SELECT unit, id FROM units ");
        $getUnit->execute();
        if ($getUnit->rowcount() > 0 ) {
            while ($row = $getUnit->fetch()) {?>
                <option value="<?php echo $row['id']?>"><?php echo $row['unit']?></option>
           <?php }
        }
        ?>
    </select>
</div>

<div class="form-group">
    <select name="branch" class="form-control">
        <option selected disabled>Select Branch</option>
        <?php
        $getUnit = dbConnect()->prepare("SELECT name, id FROM branch ");
        $getUnit->execute();
        if ($getUnit->rowcount() > 0 ) {
            while ($row = $getUnit->fetch()) {?>
                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
           <?php }
        }
        ?>
    </select>
</div>
            <div class="col-md-12 m-b-20">
                <input type="number" class="form-control" name="cost" placeholder="Cost Price" required> 
            </div>

            <!-- <div class="col-md-12 m-b-20">
                <input type="number" class="form-control" name="uprice" placeholder="Unit Price" required> 
            </div> -->
            
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

                                        <!-- <div id="myModal" class="modal fade in" tabindex="-1" role="dialog"
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
                                                                <label class="col-md-12">Material Category</label>
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
                                            </div>
                                        </div> -->
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