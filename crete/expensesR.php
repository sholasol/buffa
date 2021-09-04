<?php include 'header.php';
    function expTotal($mon, $yr){
        $getSum = dbConnect()->prepare("SELECT SUM(amount) AS total FROM expenses WHERE MONTH(date) = ? AND YEAR(date) = ?");
        $getSum->execute([$mon, $yr]);
        $ft = $getSum->fetch();
        $total = $ft['total'];
        if ($total==NULL) {
            $total = "0.00";
        }
        return $total;
    }

    function monthTotal($cat, $mon, $yr){
        $getSum = dbConnect()->prepare("SELECT SUM(amount) AS total FROM expenses WHERE Category = ? AND MONTH(date) = ? AND YEAR(date) = ?");
        $getSum->execute([$cat, $mon, $yr]);
        $ft = $getSum->fetch();
        $total = $ft['total'];
        if ($total==NULL) {
            $total = "0.00";
        }
        return $total;
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
                        <h4 class="text-themecolor">Expenses Report</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Report</li>
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
                <!-- <div class="row">
                    <div class="col-12"> -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Expenses Report</h4>
                                <div class="table-responsive">
                                    <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                        <?php 
                                        // $yr = "";
                                        (!isset($_GET['year'])) ? $yr = date('Y') : $yr = $_GET['year'];
                                            $year = dbConnect()->prepare("SELECT DISTINCT YEAR(date) AS year FROM expenses ORDER BY id DESC");
                                            $year->execute();
                                            while ( $fy = $year->fetch()) {
                                                $y = $fy['year']?>
                                               <option <?php ($yr == $y)?print "selected" : print""?> value="expensesR?year=<?php echo $y?>">
                                                <?php echo $y?>
                                                </option>
                                           <?php }
                                         ?>
                                        
                                    </select>
                                    <table id="example23" class="table teable-stripped table-bordered mt-3">
                                        <thead>
                                           <tr>
                                                <th>Category</th><th>Jan</th><th>Feb</th>
                                                <th>Mar</th><th>Apr </th><th>May</th>
                                                <th>Jun</th><th>Jul</th><th>Aug</th>
                                                <th>Sep</th><th>Oct </th><th>Nov</th>
                                                <th>Dec</th><th>Year (<?php echo $yr;?>)</th>
                                            </tr>
                                        </thead>

                                            <tbody>
                                                 <?php
                                                     $users = dbConnect()->prepare("SELECT * FROM expenses_categories");
                                                    $users->execute();
                                                    while($user = $users->fetch()){
                                                ?>
                                                <tr>
                                                    <td><?php echo $user['name'];?></td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'] ;
                                                            echo(monthTotal($cat, 01, $yr));
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $mon = 02;
                                                            echo(monthTotal($cat, $mon, $yr))
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $mon = 03;
                                                            echo(monthTotal($cat, $mon, $yr))
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $mon = 04;
                                                            echo(monthTotal($cat, $mon, $yr))
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $mon = 05;
                                                            echo(monthTotal($cat, $mon, $yr))
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $mon = 06;
                                                            echo(monthTotal($cat, $mon, $yr))
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $mon = 07;
                                                            echo(monthTotal($cat, $mon, $yr))
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $mon = 8;
                                                            echo(monthTotal($cat, $mon, $yr))
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $mon = 9;
                                                            echo(monthTotal($cat, $mon, $yr))
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $mon = 10;
                                                            echo(monthTotal($cat, $mon, $yr))
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $mon = 11;
                                                            echo(monthTotal($cat, $mon, $yr))
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $mon = 12;
                                                            echo(monthTotal($cat, $mon, $yr))
                                                        ?>
                                                    </td>
                                                    <!-- Yearly Expenses -->
                                                    <td>
                                                        <?php
                                                            $cat = $user['id'];
                                                            $getSum = dbConnect()->prepare("SELECT SUM(amount) AS total FROM expenses WHERE Category = ? AND year = ?");
                                                            $getSum->execute([$cat, $yr]);
                                                            $ft = $getSum->fetch();
                                                            $total = $ft['total'];
                                                            if ($total==NULL) {
                                                                $total = "0.00";
                                                            }
                                                            echo $total;
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                             <tbody>
                                                <tr>
                                                    <td>Net Amount <br> <small>(Sub total)</small></td>
                                                    <td><strong><?php echo(expTotal(01, $yr))?></strong></td>
                                                    <td><strong><?php echo(expTotal(02, $yr))?></strong></td>
                                                    <td><strong><?php echo(expTotal(03, $yr))?></strong></td>
                                                    <td><strong><?php echo(expTotal(04, $yr))?></strong></td>
                                                    <td><strong><?php echo(expTotal(05, $yr))?></strong></td>
                                                    <td><strong><?php echo(expTotal(06, $yr))?></strong></td>
                                                    <td>
                                                        <strong>
                                                        <?php echo(expTotal(7, $yr))?>
                                                    </strong></td>
                                                    <td>
                                                        <strong>
                                                        <?php echo(expTotal(8, $yr))?>
                                                            
                                                        </strong></td>
                                                    <td><strong>
                                                        <?php echo(expTotal(9, $yr))?></strong></td>
                                                    <td><strong><?php echo(expTotal(10, $yr))?></strong></td>
                                                    <td><strong><?php echo(expTotal(11, $yr))?></strong></td>
                                                    <td><strong><?php echo(expTotal(12, $yr))?></strong></td>
                                                    <td style="font-weight:bolder;"><strong>
                                                        <?php
                                                            $getSum = dbConnect()->prepare("SELECT SUM(amount) AS total FROM expenses WHERE year = ?");
                                                            $getSum->execute([$yr]);
                                                            $ft = $getSum->fetch();
                                                            $total = $ft['total'];
                                                            if ($total==NULL) {
                                                                $total = "0.00";
                                                            }
                                                            echo $total;
                                                        ?>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tbody> 
                                    </table>
                                    
                                </div>
                            </div>
                       <!--  </div>
                    </div> -->
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
            © <?php echo date('Y')?> Powered by: Hybridsoft Solution
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
            // $('#example23').DataTable({
            //     dom: 'Bfrtip',
            //     buttons: [
            //         'copy', 'csv', 'excel', 'pdf', 'print'
            //     ]
            // });
            // $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        });

    </script>
</body>

</html>

