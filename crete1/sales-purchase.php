<?php include 'header.php';?>
<!-- Page wrapper  -->

<?php 
        $totalSql = "";
        if (!isset($_POST['filter'])) {
            $totalSql = "SELECT sum(rawmaterial.costprice) AS total, sum(production.inputcost) AS inp FROM rawmaterial JOIN production";
        }
        if (isset($_POST['filter'])) {
            $day = $_POST['day'];
            $month = $_POST['months'];
            $year = $_POST['year'];

            
            if (empty($day) && empty($year) && empty($month)) {
                $totalSql = "SELECT sum(rawmaterial.cost) AS total, sum(production.inputcost) AS inp FROM rawmaterial JOIN production";
            }else if (!empty($day) && empty($year) && empty($month)) {
                $totalSql = "SELECT sum(rawmaterial.cost) AS total, sum(production.inputcost) AS inp FROM rawmaterial JOIN production WHERE DAY(production.created) = '$day' ";
            }else if(!empty($month) && empty($year) && empty($day)){
                 $totalSql = "SELECT sum(rawmaterial.cost) AS total, sum(production.inputcost) AS inp FROM rawmaterial JOIN production WHERE MONTH(production.created) = '$month' ";
            }
            else if(empty($month) && !empty($year) && empty($day)){
                 $totalSql = "SELECT sum(rawmaterial.cost) AS total, sum(production.inputcost) AS inp FROM rawmaterial JOIN production WHERE YEAR(production.created) = '$year' ";
            }else if(!empty($month) && empty($year) && !empty($day)){
                 $totalSql = "SELECT sum(rawmaterial.cost) AS total, sum(production.inputcost) AS inp FROM rawmaterial JOIN production WHERE MONTH(production.created)= '$month' AND DAY(production.created) = '$day' ";
            }else if(!empty($month) && !empty($year) && empty($day)){
                 $totalSql = "SELECT sum(rawmaterial.cost) AS total, sum(production.inputcost) AS inp FROM rawmaterial JOIN production WHERE MONTH(production.created) ='$month' AND YEAR(production.created) ='$year' ";
            }else if(empty($month) && !empty($year) && !empty($day)){
                 $totalSql = "SELECT sum(rawmaterial.cost) AS total, sum(production.inputcost) AS inp FROM rawmaterial JOIN production WHERE YEAR(production.created) = '$year' AND DAY(production.created)='$day'";
            }else{
                $totalSql = "SELECT sum(rawmaterial.cost) AS total, sum(production.inputcost) AS inp FROM rawmaterial JOIN production WHERE YEAR(production.created)='$year' AND DAY(production.created)='$day' AND MONTH(production.created) = '$month' ";
            }
        }

        $getTotals = dbConnect()->prepare($totalSql);
        $getTotals->execute();
        $gt = $getTotals->fetch();
        $total = $gt['total'];
        if ($total==0) {
            $total = 0;
        }
        $matPrice = $gt['inp'];
        if ($matPrice==0) {
            $matPrice= 0;
        } 
        $net = $total - $discount;
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
                        <h4 class="text-themecolor">Purchased and Used Material Report</h4>
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
                <form method="POST" action="">
                            <div class="card-body form-row">
                                <div class="col-sm-3">
                                    <select name="day" class="form-control">
                                        <option value="">Select Date</option>
                                        <?php
                                            for ($i=1; $i <=31 ; $i++) { ?>
                                                <option><?php echo $i?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <select name="months" class="form-control">
                                        <option value="">Select Month</option>
                                        <option value="1">January</option>
                                        <option value='2'>February</option>
                                        <option value='3'>March</option>
                                        <option value='4'>April</option>
                                        <option value='5'>May</option>
                                        <option value='6'>June</option>
                                        <option value='7'>July</option>
                                        <option value='8'>August</option>
                                        <option value='9'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <select name="year" class="form-control">
                                        <option value="" disabled="">Select Year</option>
                                        <?php 
                                            $getYear = dbConnect()->prepare("SELECT DISTINCT(YEAR(created)) AS year FROM rawmaterial ");
                                            $getYear->execute();
                                            while ($y = $getYear->fetch()) {?>
                                                <option><?php echo $y['year']?></option>
                                          <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <input type="submit" class="btn btn-danger btn" name="filter" value="Filter Purchase">
                                </div>
                            </div>
</form>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row card-body">
                        <div class="col-md-9">
                             
               <h4>Total Raw Material Purchased: 
                    <strong>
                        <?php echo number_format($total, 2) ?>
                    </strong> 
                </h4>


               <h4>Total Cost Of Material Used For Production : <strong><?php echo number_format($matPrice, 2) ?></strong> </h4>
               <?php// echo($totalSql)?>
            </div>

            <!-- <div class="col-md-6">
                <h4>Total Raw Material Purchased: </h4>
                <h4>Total Cost Of Material Used For Production</h4>
            </div> -->
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

