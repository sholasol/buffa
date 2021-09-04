<?php include 'header.php';
    // if(isset($_POST['value'])) {
    //     ob_end_clean();
    //     echo "okey";
    // }
?>
   <?php 
        $sql1 = "";
        $sql2 = "";
        $sql3 = "";
        $sql4 = "";
        if (!isset($_POST['filter'])) {
            $sql1 = "SELECT SUM(net_amount) as sale_cr FROM sales_activity";
            $sql2 = "SELECT SUM(amount) as expense_db FROM expenses";
            $sql3 = "SELECT SUM(costprice) as purchase_db FROM rawmaterial";
            $sql4 = "SELECT SUM(amount) as wages_db FROM wages";
        }
        if (isset($_POST['filter'])) {
            $day = check_input($_POST['day']);
            $month = check_input($_POST['months']);
            $year = check_input($_POST['year']);

            
            if (empty($day) && empty($year) && empty($month)) {
                $sql1 = "SELECT SUM(net_amount) as sale_cr FROM sales_activity";
                $sql2 = "SELECT SUM(amount) as expense_db FROM expenses";
                $sql3 = "SELECT SUM(costprice) as purchase_db FROM rawmaterial";
                $sql4 = "SELECT SUM(amount) as wages_db FROM wages";

            }elseif(!empty($day) && empty($year) && empty($month)) {
                $sql1 = "SELECT SUM(net_amount) as sale_cr FROM sales_activity WHERE day = '$day' ";
                $sql2 = "SELECT SUM(amount) as expense_db FROM expenses WHERE DAY(date) = '$day' ";
                $sql3 = "SELECT SUM(costprice) as purchase_db FROM rawmaterial WHERE DAY(created) = '$day' ";
                $sql4 = "SELECT SUM(amount) as wages_db FROM wages WHERE DAY(date) = '$day' ";
            }else if(!empty($month) && empty($year) && empty($day)){
                 $sql1 = "SELECT SUM(net_amount) as sale_cr FROM sales_activity WHERE month = '$month' ";
                 $sql2 = "SELECT SUM(amount) as expense_db FROM expenses WHERE MONTH(date) = '$month' ";
                 $sql3 = "SELECT SUM(costprice) as purchase_db FROM rawmaterial WHERE MONTH(created) = '$month' ";
                 $sql4 = "SELECT SUM(amount) as wages_db FROM wages WHERE MONTH(date) = '$month' ";
            }else if(empty($month) && !empty($year) && empty($day)){
                 $sql1 = "SELECT SUM(net_amount) as sale_cr FROM sales_activity WHERE year = '$year'";
                 $sql2 = "SELECT SUM(amount) as expense_db FROM expenses WHERE YEAR(date) = '$year' ";
                 $sql3 = "SELECT SUM(costprice) as purchase_db FROM rawmaterial WHERE YEAR(created) = '$year' ";
                 $sql4 = "SELECT SUM(amount) as wages_db FROM wages WHERE YEAR(date) = '$year' ";

            }else if(!empty($month) && empty($year) && !empty($day)){
                 $sql1 = "SELECT SUM(net_amount) as sale_cr FROM sales_activity WHERE month = '$month' AND day = '$day' ";
                 $sql2 = "SELECT SUM(amount) as expense_db FROM expenses WHERE MONTH(date) = '$month' AND DAY(date) = '$day' ";
                 $sql3 = "SELECT SUM(costprice) as purchase_db FROM rawmaterial WHERE MONTH(created) = '$month' AND DAY(created) = '$day' ";
                 $sql4 = "SELECT SUM(amount) as wages_db FROM wages WHERE MONTH(date) = '$month' AND DAY(date) = '$day' ";

            }else if(!empty($month) && !empty($year) && empty($day)){
                 $sql1 = "SELECT SUM(net_amount) as sale_cr FROM sales_activity WHERE month = '$month' AND year = '$year' ";
                 $sql2 = "SELECT SUM(amount) as expense_db FROM expenses WHERE MONTH(date) = '$month' AND YEAR(date) = '$year' ";
                 $sql3 = "SELECT SUM(costprice) as purchase_db FROM rawmaterial WHERE MONTH(created) = '$month' AND YEAR(created) = '$year' ";
                 $sql4 = "SELECT SUM(amount) as wages_db FROM wages WHERE MONTH(date) = '$month' AND YEAR(date) = '$year' ";

            }else if(empty($month) && !empty($year) && !empty($day)){
                 $sql1 = "SELECT SUM(net_amount) as sale_cr FROM sales_activity WHERE year = '$year' AND day = '$day' ";
                 $sql2 = "SELECT SUM(amount) as expense_db FROM expenses WHERE YEAR(date) = '$year' AND DAY(date) = '$day' ";
                 $sql3 = "SELECT SUM(costprice) as purchase_db FROM rawmaterial WHERE YEAR(created) = '$year' AND DAY(created) = '$day' ";
                 $sql4 = "SELECT SUM(amount) as wages_db FROM wages WHERE YEAR(date) = '$year' AND DAY(date) = '$day' ";

            }else{
                $sql1 = "SELECT SUM(net_amount) as sale_cr FROM sales_activity WHERE year = '$year' AND day = '$day' AND month = '$month' ";
                $sql2 = "SELECT SUM(amount) as expense_db FROM expenses WHERE YEAR(date) = '$year' AND DAY(date) = '$day' AND MONTH(date) = '$month' ";
                $sql3 = "SELECT SUM(costprice) as purchase_db FROM rawmaterial WHERE YEAR(created) = '$year' AND DAY(created) = '$day' AND MONTH(created) = '$month' ";
                $sql4 = "SELECT SUM(amount) as wages_db FROM wages WHERE YEAR(date) = '$year' AND DAY(date) = '$day' AND MONTH(date) = '$month' ";
            }
        }?>
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
                                                    <th>SN</th>
                                                    <th>Category</th>
                                                    <th>Credit</th>
                                                    <th>Debit </th>
                                                    <th>Action</th>
                                                    <!-- <th></th> -->
                                                    <!-- <th style="width:40px;">Action</th>
                                                    <th>Delivery</th> -->
                                                    
                                                </tr>
                                            </thead>

 
          <tbody>
            <tr>
                <td> 1</td>
                <th> Sale</th>
                <td>
                <?php 
                // // $sql1 = "sid";
                // echo $sql1;
                    $salescr = dbConnect()->prepare($sql1);
                    $salescr->execute();
                    $saleCredit = $salescr->fetch()['sale_cr'];
                    echo number_format($saleCredit, 2);
                ?>
                </td>
                <td></td>
                <td><a href="#"> view</a></td>
            </tr><tr>
                <td> 2</td>
                <th> Expenses</th>
                <td>
                    
                </td>
                <td>
                    <?php  
                    $expCR = dbConnect()->prepare($sql2);
                    $expCR->execute();
                    $expenseCredit = $expCR->fetch()['expense_db'];
                    echo number_format($expenseCredit, 2);
                ?>
                </td>
                <td><a href="#"> view</a></td>
            </tr>
            <tr>
                <td> 3</td>
                <th> Purchase</th>
                <td></td>
                <td>
                    <?php  
                    $purDR = dbConnect()->prepare($sql3);
                    $purDR->execute();
                    $purchaseDebit = $purDR->fetch()['purchase_db'];
                    echo number_format($purchaseDebit, 2);
                ?>
                </td>
                <td><a href="#"> view</a></td>
            </tr>
            <tr>
                <td> 4</td>
                <th> Wages</th>
                <td></td>
                <td>
                    <?php  
                    $wagDR = dbConnect()->prepare($sql4);
                    $wagDR->execute();
                    $wagesDebit = $wagDR->fetch()['wages_db'];
                    echo number_format($wagesDebit, 2);
                ?>
                </td>
                <td><a href="#"> view</a></td>
            </tr>
            </tbody>
            <tfoot>  
               <th>SN</th>
                <th>Category</th>
                <th>Credit</th>
                <th>Debit </th>
                <th>Action</th>                      
            </tfoot>

      <?php

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
            $totalSql = $saleCredit;
            $totalDebit = $expenseCredit + $purchaseDebit + $wagesDebit;
            $net = $totalSql - $totalDebit;
        }
        if (isset($_POST['filter'])) {
            $day = check_input($_POST['day']);
            $month = check_input($_POST['months']);
            $year = check_input($_POST['year']);

            
              if (empty($day) && empty($year) && empty($month)) {
                 $totalSql = $saleCredit;
                 $totalDebit = $expenseCredit + $purchaseDebit + $wagesDebit;
                 $net = $totalSql - $totalDebit;
             }else if (!empty($day) && empty($year) && empty($month)) {
                 $totalSql = $saleCredit;
                 $totalDebit = $expenseCredit + $purchaseDebit + $wagesDebit;
                 $net = $totalSql - $totalDebit;
             }
             else if(empty($month) && !empty($year) && empty($day)){
                 $totalSql = $saleCredit;
                 $totalDebit = $expenseCredit + $purchaseDebit + $wagesDebit;
                 $net = $totalSql - $totalDebit;
            }else if(!empty($month) && empty($year) && !empty($day)){
                 $totalSql = $saleCredit;
                 $totalDebit = $expenseCredit + $purchaseDebit + $wagesDebit;
                 $net = $totalSql - $totalDebit;
            }else if(!empty($month) && !empty($year) && empty($day)){
                 $totalSql = $saleCredit;
                 $totalDebit = $expenseCredit + $purchaseDebit + $wagesDebit;
                 $net = $totalSql - $totalDebit;
            }else if(empty($month) && !empty($year) && !empty($day)){
                 $totalSql = $saleCredit;
                 $totalDebit = $expenseCredit + $purchaseDebit + $wagesDebit;
                 $net = $totalSql - $totalDebit;
            }else{
                $totalSql = $saleCredit;
                 $totalDebit = $expenseCredit + $purchaseDebit + $wagesDebit;
                 $net = $totalSql - $totalDebit;
            }
        }

        // $getTotals = dbConnect()->prepare($totalSql);
        // $getTotals->execute();
        // $gt = $getTotals->fetch();
        // $total = $gt['total'];
        // $discount = $gt['discount'];
        // $net = $totalSql - $discount;
    ?>
    <h4>Total Credit Amount: 
        <strong><?php echo number_format($totalSql, 2);?></strong>
    </h4>
    <h4>Total Debit Amount: 
        <strong><?php echo number_format($totalDebit, 2);?></strong>
    </h4>

    <h4>Total Net Profit <small>(Total Credit - Total Debit)</small>:
        <strong><?php echo number_format($net, 2);?></strong>    
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

