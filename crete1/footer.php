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
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <!-- <script src="dist/js/sidebarmenu.js"></script> -->
    <!--stickey kit -->
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <!-- <script src="dist/js/custom.min.js"></script> -->
    <!-- Popup message jquery -->
    <script src="../assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Calendar JavaScript -->
    <script src="../assets/node_modules/calendar/jquery-ui.min.js"></script>
    <script src="../assets/node_modules/moment/moment.js"></script>
    <script src='../assets/node_modules/calendar/dist/fullcalendar.min.js'></script>
    <script src="../assets/node_modules/calendar/dist/cal-init.js"></script>
    <!-- Footable -->
    <script src="../assets/node_modules/moment/moment.js"></script>
    <script src="../assets/node_modules/footable/js/footable.min.js"></script>
     <!-- Chart JS -->
    <!-- <script src="../assets/node_modules/Chart.js/chartjs.init.js"></script> -->
    <script src="../assets/node_modules/Chart.js/Chart.min.js"></script>
    <!-- Chart JS -->
    <!-- <script src="dist/js/dashboard1.js"></script> -->
    <script src="../assets/node_modules/toast-master/js/jquery.toast.js"></script>
     <!-- Form Wizard -->
    <script src="../assets/node_modules/wizard/jquery.steps.min.js"></script>
    <script src="../assets/node_modules/wizard/jquery.validate.min.js"></script>
    <script src="../assets/node_modules/sweetalert/sweetalert.min.js"></script>
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="dist/js/pages/jasny-bootstrap.js"></script>
    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="../assets/node_modules/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="../assets/node_modules/html5-editor/bootstrap-wysihtml5.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <script src="dist/js/pages/validation.js"></script>
    <script src="../assets/node_modules/switchery/dist/switchery.min.js"></script>
    <script src="../assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="../assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="../assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="../assets/node_modules/dff/dff.js" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
    
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="../assets/node_modules/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="../assets/node_modules/bootstrap-table/dist/bootstrap-table-locale-all.min.js"></script>
    <script src="../assets/node_modules/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js"></script>
    <script src="dist/js/pages/bootstrap-table.init.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    
    <!-- Plugin JavaScript -->
    <script src="../assets/node_modules/moment/moment.js"></script>
    <script src="../assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
     <!-- Date Picker Plugin JavaScript -->
    <script src="../assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <!-- <script src="../assets/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script> -->
    <!-- This is data table -->
    <script src="../assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
     
    <script type="text/javascript">
        $(function () {
    "use strict";

    new Chart(document.getElementById("chart1"),
        {
            "type":"line",
            "data":{"labels":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
            "datasets":[{
                            "label":"Monthly Sales",
                            "data":[
                                <?php echo subTotal(1, date('Y'));?>,
                                <?php echo subTotal(2, date('Y'));?>,
                                <?php echo subTotal(3, date('Y'));?>,
                                <?php echo subTotal(4, date('Y'));?>,
                                <?php echo subTotal(5, date('Y'));?>,
                                <?php echo subTotal(6, date('Y'));?>,
                                <?php echo subTotal(7, date('Y'));?>,
                                <?php echo subTotal(8, date('Y'));?>,
                                <?php echo subTotal(9, date('Y'));?>,
                                <?php echo subTotal(10, date('Y'));?>,
                                <?php echo subTotal(11, date('Y'));?>,
                                <?php echo subTotal(12, date('Y'));?>
                            ],
                            "fill":false,
                            "borderColor":"rgb(75, 192, 192)",
                            "lineTension":0.1
                        }]
        },"options":{}});



     new Chart(document.getElementById("chart2"),
        {
            "type":"bar",
            "data":{"labels":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
            "datasets":[{
                            "label":"Monthly Expenses",
                            "data":[
                                <?php echo monthlyExpenses(1, date('Y'));?>,
                                <?php echo monthlyExpenses(2, date('Y'));?>,
                                <?php echo monthlyExpenses(3, date('Y'));?>,
                                <?php echo monthlyExpenses(4, date('Y'));?>,
                                <?php echo monthlyExpenses(5, date('Y'));?>,
                                <?php echo monthlyExpenses(6, date('Y'));?>,
                                <?php echo monthlyExpenses(7, date('Y'));?>,
                                <?php echo monthlyExpenses(8, date('Y'));?>,
                                <?php echo monthlyExpenses(9, date('Y'));?>,
                                <?php echo monthlyExpenses(10, date('Y'));?>,
                                <?php echo monthlyExpenses(11, date('Y'));?>,
                                <?php echo monthlyExpenses(12, date('Y'));?>
                            ],
                            "fill":false,
                            "backgroundColor":[
                                "rgba(255, 99, 132, 0.2)",
                                "rgba(255, 159, 64, 0.2)",
                                "rgba(255, 205, 86, 0.2)",
                                "rgba(75, 192, 192, 0.2)",
                                "rgba(54, 162, 235, 0.2)",
                                "rgba(153, 102, 255, 0.2)",
                                "rgba(201, 203, 207, 0.2)",
                                "rgba(255, 205, 86, 0.2)",
                                "rgba(75, 192, 192, 0.2)",
                                "rgba(54, 162, 235, 0.2)",
                                "rgba(153, 102, 255, 0.2)",
                                "rgba(201, 203, 207, 0.2)"
                            ],
                            "borderColor":[
                                "rgb(255, 99, 132)",
                                "rgb(255, 159, 64)",
                                "rgb(255, 205, 86)",
                                "rgb(75, 192, 192)",
                                "rgb(54, 162, 235)",
                                "rgb(153, 102, 255)",
                                "rgb(201, 203, 207)",
                                "rgb(255, 99, 132)",
                                "rgb(255, 159, 64)",
                                "rgb(255, 205, 86)",
                                "rgb(75, 192, 192)",
                                "rgb(54, 162, 235)",
                                ],
                            "borderWidth":1}
                        ]},
            "options":{
                "scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}
            }
        });
    
    
    // LINE CHART
   
            Morris.Donut({
            element: 'morris-donut-chart',
            data: [{
                label: "Total Projects",
                value: <?php echo $totPrj?>,

            }, {
                label: "Completed Project",
                value: <?php echo $comp?>
            }, {
                label: "Ongoing Project",
                value: <?php echo $ongo?>
            }],
            resize: false,
            colors:['#009efb', '#55ce63', '#2f3d4a']
        });

           Morris.Area({
        element: 'morris-area-chart',
        data: [
        <?Php 
        
            $b=dbConnect()->prepare("SELECT SUM(total) AS amt, month, year FROM sales_activity GROUP BY year");
            $b->execute(); 
            while($rr = $b->fetch()){
                $amt =$rr['amt'];
                if($amt < 1){$amt = 0;}
                
                $yr =$rr['year'];
                
            ?>
        {
            period: '<?php echo $yr; ?>',
            Sales: <?php echo $amt ?>
        },
            <?php }?>    ],
        xkey: 'period',
        ykeys: ['Sales'],
        labels: ['Sales'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#55ce63'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#009efb'],
        resize: true
        
    });
    
    
    
    Morris.Area({
        element: 'morris-area-chart2',
        data: [
            <?Php 
            $b=  dbConnect()->prepare("SELECT SUM(amount) AS amt, month, year FROM expenses GROUP BY month");
            $b->execute();
            while($rr=$b->fetch()){
                $amt =$rr['amt'];
                if($amt < 1){$amt = 0;}
                
                
                $yr =$rr['year'];
                // $month =$rr['month'];
                // if($month ==1){$month ="Jan";}
                // elseif($month ==2){$month ="Feb";}
                // elseif($month ==3){$month ="Mar";}
                // elseif($month ==4){$month ="Apr";}
                // elseif($month ==5){$month ="May";}
                // elseif($month ==6){$month ="Jun";}
                // elseif($month ==7){$month ="Jul";}
                // elseif($month ==8){$month ="Aug";}
                // elseif($month ==9){$month ="Sep";}
                // elseif($month ==10){$month ="Oct";}
                // elseif($month ==11){$month ="Nov";}
                // elseif($month ==12){$month ="Dec";}
                
            ?>
        {
            period: '<?php echo $yr; ?>',
            Expenses: <?php echo $amt ?>
        },
            <?php }?>    ],
        xkey: 'period',
        ykeys: ['Expenses'],
        labels: ['Expenses'],
        pointSize: 1,
        fillOpacity: 0,
        pointStrokeColors:['#55ce63'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#fba074'],
        resize: true
        
    });


        });


        // function getSales(){
        //     let month = $('#sales').find(':selected');
        //     console.log(month)
        // }
    </script>


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

