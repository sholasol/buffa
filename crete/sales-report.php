<?php include 'header.php';
    // if(isset($_POST['value'])) {
    //     ob_end_clean();
    //     echo "okey";
    // }
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
                                <h4 class="card-title">Sales Report</h4>
                                <!-- <h6 class="card-subtitle"><small>Edit/Delete</small></h6> -->

                           <!--  <select name="sales-filter" id="filter">
                                <option selected disabled>Filter Sales Report</option>
                                <option value="today">Filter By Today</option>
                                <option value="week">Filter By This Week</option>
                                <option value="month">Filter By This Month</option>
                                <option value="Year">Filter By This Year</option>
                            </select> -->
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
                                        <option value="">Select Year</option>
                                        <?php 
                                            $getYear = dbConnect()->prepare("SELECT DISTINCT(year) AS year FROM sales_activity ");
                                            $getYear->execute();
                                            while ($y = $getYear->fetch()) {?>
                                                <option><?php echo $y['year']?></option>
                                          <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <input type="submit" class="btn btn-danger btn" name="filter" value="Filter Sales">
                                </div>
                            </div>
</form>
                                <div class="table-responsive m-t-40 ">
                                    <table id="example23" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                    <!-- <th>#</th> -->
                                                    <th>Sales ID</th>
                                                    <th>Customers</th>
                                                    <th>Staff</th>
                                                    <th>Total </th>
                                                    <th>Item Boughts</th>
                                                    <th>Date & Time</th>
                                                    <!-- <th style="width:40px;">Action</th>
                                                    <th>Delivery</th> -->
                                                    
                                                </tr>
                                            </thead>

    <?php 
        $sql = "";
        if (!isset($_POST['filter'])) {
            $sql = "SELECT * FROM sales_activity ORDER BY id desc";
        }
        if (isset($_POST['filter'])) {
            $day = check_input($_POST['day']);
            $month = check_input($_POST['months']);
            $year = check_input($_POST['year']);

            
            if (empty($day) && empty($year) && empty($month)) {
                $sql = "SELECT * FROM sales_activity ORDER BY id desc ";
            }else if (!empty($day) && empty($year) && empty($month)) {
                $sql = "SELECT * FROM sales_activity WHERE day = '$day' ORDER BY id desc  ";
            }else if(!empty($month) && empty($year) && empty($day)){
                 $sql = "SELECT * FROM sales_activity WHERE month = '$month' ORDER BY id desc ";
            }
            else if(empty($month) && !empty($year) && empty($day)){
                 $sql = "SELECT * FROM sales_activity WHERE year = '$year' ";
            }else if(!empty($month) && empty($year) && !empty($day)){
                 $sql = "SELECT * FROM sales_activity WHERE month = '$month' AND day = '$day' ORDER BY id desc ";
            }else if(!empty($month) && !empty($year) && empty($day)){
                 $sql = "SELECT * FROM sales_activity WHERE month = '$month' AND year = '$year' ORDER BY id desc  ";
            }else if(empty($month) && !empty($year) && !empty($day)){
                 $sql = "SELECT * FROM sales_activity WHERE year = '$year' AND day = '$day' ORDER BY id desc  ";
            }else{
                $sql = "SELECT * FROM sales_activity WHERE year = '$year' AND day = '$day' AND month = '$month' ORDER BY id desc ";
            }
        }

        $salesRecord = dbConnect()->prepare($sql);
        $salesRecord->execute();
        while($user = $salesRecord->fetch()){
            $staffid = $user['staffid'];
            $getName = dbConnect()->prepare("SELECT fname, lname FROM users WHERE id = ?");
           $getName->execute([$staffid]);
           $get = $getName->fetch();
           $name = $get['fname']." ".$get['lname'];
            ?>
            <tr>
                <td><?php echo $user['sales_id']; ?></td>
                <td><?php echo $user['cust_name'] ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo number_format($user['total'],2) ?></td>
                <td>
                    <?php 
                    $sales_id2 = $user['sales_id'];
                        $getprd2 = dbConnect()->prepare("SELECT sold_items.product,product_category.name FROM sold_items JOIN product_category ON sold_items.product = product_category.id WHERE sales_id = ? ");
                                $getprd2->execute([$sales_id2]);
                                while ($row = $getprd2->fetch()) {?>
                                  <span class="label label-info"> <?php echo $row['name'];?></span>
                           <?php }
                ?>
                </td>
                <td><span class="label label-primary"><?php echo date("d-m-y h:i:s a", $user['date']) ?></span> </td>
            </tr>
      <?php  }

      function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
                                            

</table>

<div class="card">
    <?php 
        $totalSql = "";
        if (!isset($_POST['filter'])) {
            $totalSql = "SELECT sum(total) AS total, sum(discount)AS discount, sum(net_amount) AS net FROM sales_activity";
        }
        if (isset($_POST['filter'])) {
            $day = check_input($_POST['day']);
            $month = check_input($_POST['months']);
            $year = check_input($_POST['year']);

            
            if (empty($day) && empty($year) && empty($month)) {
                $totalSql = "SELECT sum(total) AS total, sum(discount)AS discount, sum(net_amount) AS net FROM sales_activity";
            }else if (!empty($day) && empty($year) && empty($month)) {
                $totalSql = "SELECT sum(total) AS total, sum(discount)AS discount, sum(net_amount) AS net FROM sales_activity WHERE day = '$day' ";
            }else if(!empty($month) && empty($year) && empty($day)){
                 $totalSql = "SELECT sum(total) AS total, sum(discount)AS discount, sum(net_amount) AS net FROM sales_activity WHERE month = '$month' ";
            }
            else if(empty($month) && !empty($year) && empty($day)){
                 $totalSql = "SELECT sum(total) AS total, sum(discount)AS discount, sum(net_amount) AS net FROM sales_activity WHERE year = '$year' ";
            }else if(!empty($month) && empty($year) && !empty($day)){
                 $totalSql = "SELECT sum(total) AS total, sum(discount)AS discount, sum(net_amount) AS net FROM sales_activity WHERE month = '$month' AND day = '$day' ";
            }else if(!empty($month) && !empty($year) && empty($day)){
                 $totalSql = "SELECT sum(total) AS total, sum(discount)AS discount, sum(net_amount) AS net FROM sales_activity WHERE month = '$month' AND year = '$year'  ";
            }else if(empty($month) && !empty($year) && !empty($day)){
                 $totalSql = "SELECT sum(total) AS total, sum(discount)AS discount, sum(net_amount) AS net FROM sales_activity WHERE year = '$year' AND day = '$day'  ";
            }else{
                $totalSql = "SELECT sum(total) AS total, sum(discount)AS discount, sum(net_amount) AS net FROM sales_activity WHERE year = '$year' AND day = '$day' AND month = '$month'";
            }
        }

        $getTotals = dbConnect()->prepare($totalSql);
        $getTotals->execute();
        $gt = $getTotals->fetch();
        $total = $gt['total'];
        $discount = $gt['discount'];
        $net = $total - $discount;
    ?>
    <h4>Total Gross Amount: 
        <strong><?php echo $total;?></strong>
    </h4>
    <h4>Total Discount: 
        <strong><?php echo $discount;?></strong>
    </h4>

    <h4>Total Net Amount <small>(Gross Amount - Discount)</small>:
        <strong><?php echo $net;?></strong>    
    </h4>
</div>
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

        $('#filter').on('change', function(){
            let value = $(this).val();
            // console.log(value);
            let resultDiv = $('.result-table');
            $.ajax({
                type: 'POST',
                data: {value:value},
                dataType: 'text',
                url: 'sales-filter.php',
                success : function(response){
                    // let answer = $.parseJSON(response);
                    // console.log(response);
                    resultDiv.html("");
                    resultDiv.html(response);

                    // alert(response)
                },
            });
            
        });

    </script>
</body>

</html>

