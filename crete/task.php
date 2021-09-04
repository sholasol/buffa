<?php 
include 'header.php'; 

if(isset($_POST['saved'])){
                                           
                                            
    $tsk= check_input($_POST['task']);
    $pj= check_input($_POST['proj']);
    $st= check_input($_POST['start']);
    $end= check_input($_POST['end']);
    $dsc= check_input($_POST['desc']);
    $pri= check_input($_POST['priority']);
    $ass=  $_POST['ass'];
    $dt = date('Y-m-d');
    $p_id = 'BUF-TSK-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    // print_r($ass);

    // echo  " <script>alert('$ass'); window.location='task'</script>";

    if(empty($tsk)){
        $msg= "Please enter task name ";

     echo  " <script>alert('$msg'); window.location='project'</script>";

    }elseif(empty($st)){
        $msg= "Please select task start date ";

     echo  " <script>alert('$msg'); window.location='project'</script>";

    }
    else{
        $dbs= dbConnect()->prepare("INSERT INTO tasks SET p_id=:pid, name=:nm, description=:dsc,
                 priority=:pri, created=:dt, start=:stt, end=:end");
        
        $dbs->bindParam(':nm', $tsk);
        $dbs->bindParam(':pid', $p_id);
        $dbs->bindParam(':dsc', $dsc);
        $dbs->bindParam(':pri', $pri);
        $dbs->bindParam(':dt', $dt);
        $dbs->bindParam(':stt', $st);
        $dbs->bindParam(':end', $end);
        if($dbs->execute()){
            foreach ($ass as $i ) {
                $addUser = dbConnect()->prepare("INSERT INTO task_assigned (taskid, staffid) VALUES(?,?) ");
                $addUser->execute([ $p_id, $ass[$i]]);
            }

          $msg= "Task has been added successfully!";

           echo  " <script>alert('$msg'); window.location='task'</script>";
        }else{
            $msg= "Oops! cannot add project member!";

        echo  " <script>alert('$msg'); window.location='task'</script>";
        }
    }
}

function check_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

function task($value){
    $getcount = dbConnect()->prepare("SELECT count(id) as total FROM tasks WHERE status = ? ");
    $getcount->execute([$value]);
    $gc = $getcount->fetch();
    return $gc['total'];
}

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
                        <h4 class="text-themecolor">Tasks</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home">Home</a></li>
                            </ol>
                            <a href="" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#add-contact"><i
                                    class="fa fa-plus-circle"></i> Create New</a>
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
                                <h4 class="card-title">All Tasks</h4>
                                <div class="row m-t-40">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white">
                                                    <?php echo task(0) + task(1) + task(2) ?>
                                                </h1>
                                                <h6 class="text-white">Total Tasks</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?php echo task(2)?></h1>
                                                <h6 class="text-white">Completed</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><?php echo task(1)?></h1>
                                                <h6 class="text-white">Ongoing</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?php echo task(0)?></h1>
                                                <h6 class="text-white">Pending</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
                                <div class="table-responsive">
                                    <table id="example23" class="table m-t-30 table-hover no-wrap contact-list"
                                        data-paging="true" data-paging-size="7">
                                        <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Task</th>
                                                    <th>Assign to</th>
                                                    <th>Priority</th>
                                                    <th>Start</th>
                                                    <th>End</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $mt= dbConnect()->prepare("SELECT * FROM tasks");
                                                $mt->execute();
                                                $i=0;
                                                while($t=$mt->fetch()){
                                                    $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $t['name'] ?></td>
                                                    <td><?php echo $t['assign'] ?></td>
                                                    <td><?php echo $t['priority'] ?></td>
                                                    <td><?php echo $t['start'] ?></td>
                                                    <td><?php echo $t['end'] ?></td>
                                                    <td><?php echo $t['description'] ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                </td>
                                                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel"> New
                                                                    Task</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <form class="form-horizontal" method="POST">
                                                           <input type="hidden" name="proj" value="<?php echo $user->p_id; ?>"/>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="col-md-12">Task Name</label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" name="task"  class="form-control" required> 
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 m-b-20">
                                                                <label>Assign To</label>
                                                                <select class="select2 m-b-10 select2-multiple" name="ass[]" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                                                <?php
                                                                   $dis = dbConnect()->prepare("SELECT * FROM users ");
                                                                   $dis ->execute();
                                                                   while($rw = $dis->fetch()){
                                                                   ?>
                                                                <option value="<?php echo $rw['id'] ?>"><?php echo $rw['fname'].' '.$rw['lname'] ?></option>
                                                                   <?php } ?> 
                                                                </select>
                                                            </div>
                                                                <div class="col-md-12 m-b-20">
                                                                <label>Priority</label>
                                                                <select class="form-control" name="priority">
                                                                    <option value="">-Select-</option>
                                                                    <option>High</option>
                                                                    <option>Medium</option>
                                                                    <option>Low</option>
                                                                </select>
                                                                </div>
                                                               <div class="col-md-12 m-b-20">
                                                                <label>Start</label>
                                                                <div class='input-group mb-3'>
                                                                    <!-- <input type='text' name="start" class="form-control singledate" />-->
                                                                    <input type='date' name="start" class="form-control" />
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <span class="ti-calendar"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                               <!--<input type="text" name="start" class="form-control" placeholder="2017-06-04" id="mdate">-->
                                                            </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <label>Deadline</label>
                                                                <div class='input-group mb-3'> 
                                                                    <!--<input type='text' name="end" class="form-control singledate" />-->
                                                                    <input type='date' name="end" class="form-control " />
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <span class="ti-calendar"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                               <!-- <input type="text" name="end" class="form-control" placeholder="2017-06-04" id="ndate">-->
                                                            </div>
                                                            <div class="col-md-12 m-b-20">
                                                            <textarea type="text" name="desc" rows="3" class="form-control"
                                                                      placeholder="Description"></textarea> 
                                                            </div>
                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="saved" class="btn btn-info waves-effect">Create Task</button>
                                                                <button type="button" class="btn btn-default waves-effect"
                                                                    data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <td colspan="6">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
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
            © <?php echo date('Y'); ?> Hybridsoft
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
    <!-- Date range Plugin JavaScript -->
    <script src="../assets/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/switchery/dist/switchery.min.js"></script>
    <script src="../assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="../assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="../assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="../assets/node_modules/dff/dff.js" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
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
    <script>
        $(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
    </script>
</body>

</html>