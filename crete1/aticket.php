
<?php include 'header.php'; 


// $query = dbConnect()->prepare("SELECT id, fname, lname FROM users WHERE department=?");
//         if($query->execute(['Logistics'])){
//             while($as = $query->fetch()){
//             $fna = $as['fname']. ' '. $as['lname'];
//             $IDfn = $as['id'];
//                 echo "<option value=$IDfn>".$fna."</option>";
//             }
//         }
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
                        <h4 class="text-themecolor">New Tickets</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active"><a href="ticket" class="breadcrumb-item active">Tickets</a></li>
                                <li class="breadcrumb-item active">Create Ticket</li>
                            </ol>
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
<?php
if(isset($_POST['submit'])){
 
    if(empty($_POST['subject'])){
        $e='Please fill in the subject space';
        echo "<div class='form control alert alert-danger alert-dismissible fade show' role='alert'>
            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Oops!</strong> $e.
        </div>";
    }if(empty($_POST['department'])){
        $e='Please fill in the department space';
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Oops!</strong> $e.
        </div>";
    }if(empty($_POST['c_name'])){
        $e='Please fill in the customer';
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Oops!</strong> $e.
        </div>";
    }if(empty($_POST['contact'])){
        $e='Please assign ticket to a user';
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Oops!</strong> $e.
        </div>";
    }if(empty($_POST['tkemail'])){
        $e='Please fill in the email space';
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Oops!</strong> $e.
        </div>";
    }if(empty($_POST['branch'])){
        $e='Please fill in the department space';
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Oops!</strong> $e.
        </div>";
    }if(empty($_POST['editordata'])){
        $e='Please fill in the ticket note';
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Oops!</strong> $e.
        </div>";
    }else{

        $subj = check_input($_POST['subject']);
        $dept = check_input($_POST['department']);
        $cnt = check_input($_POST['contact']);
        $eml = check_input($_POST['tkemail']);
        $brc = check_input($_POST['branch']);
        $edtd = check_input($_POST['editordata']);
        $cust = check_input($_POST['c_name']);
        $status = 0;
        $date = date('Y-m-d H-m-s');

        if(empty($_FILES['upload']['name'])){

        $ins = dbConnect()->prepare("INSERT INTO 
            ticket(user_id,subject,customer,department,email,note,status,created,branch) 
            VALUES
            (?,?,?,?,?,?,?,?,?)");
                $ins->execute([$uid,$subj,$cust,$dept,$eml,$edtd,$status,$date,$brc]);
                if($ins){
                    echo "<script> alert('Successfully submitted') </script>";
                }else{
                    echo "<script> alert('Error! processing your request.   ') </script>";
                }
            echo "<script> alert('empty') </script>";
        }else{
        // directory
        $upload_dir = 'upload/';
        $file_name = $_FILES['upload']['name'];
        $tmp_name   = $_FILES['upload']['tmp_name'];
        $upSize       = $_FILES['upload']['size'];
        
        // File upload path
        $fileName = basename($_FILES['upload']['name']);
        $targetFilePath = $upload_dir . $fileName;

            $imgExt = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
            $valid_extensions = array('jpeg', 'jpg', 'png', 'pdf', 'doc', 'docx', 'gif');

            $proImage = rand(1000,1000000).".".$imgExt;
            // echo $proImage;
            // echo $upSize;
            if(in_array($imgExt, $valid_extensions)){ 
                if($upSize < 500000000){ 
                    $ins = dbConnect()->prepare("INSERT INTO ticket(user_id,subject,customer,department,email,branch,note,file,status,created) VALUES(?,?,?,?,?,?,?,?,?,?)");
                    $ins->execute([$uid,$subj,$cust,$dept,$eml,$brc,$edtd,$proImage,$status,$date]);
                    if($ins){
                        echo "<script> alert('Successfully submitted') </script>";
                    }else{
                        echo "<script> alert('Error! processing your request.   ') </script>";
                    }
                }else{
                    echo "<script> alert('File too large, reduce and try again.') </script>";
                }
            }
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
<!-- if(empty($_POST['department'])){
        $e='Please fill in the department space';
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Oops!</strong> $e.
        </div>";
    } -->
                <div class="col-12"><!-- ticket form goes from here -->
                    <form method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create New Ticket</h4>
                                <h6 class="card-subtitle">Assign ticket to contact</h6>
                                <div class="m-t-40 bg-muted">
                                    <div class="form-row">
                                        <div class="col-md-7 m-b-20">
                                            <div class="form-group">
                                                <label for="subject" class="control-label">Subject</label>
                                                <input type="text" class="form-control" name="subject" id="subject">
                                            </div>
                                        </div>
                                        <div class="col-md-5 m-b-20">
                                            <div class="form-group">
                                             <label class="control-label" for="department">Department</label>
                                             <select name="department" id="department" class="form-control single-select" style="border:0px">
                                              <option selected value="" disabled></option>
                                                <?php
                                                $br= dbConnect()->prepare("SELECT role FROM role ");
                                                $br->execute();
                                                while($b=$br->fetch()){
                                                ?>  
                                                <option value="<?php echo $b['role']?>"><?php echo $b['role']?></option>
                                                    <?php }?>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="customer_name">Customer Name</label>
                                                <input type="text" name="c_name" id="customer_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="customer_email">Email Address</label>
                                                <input type="text" id="tkemail" name="tkemail" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subject" class="control-label">Assign ticket user </label>
                                                <select name="contact" class="form-control single-select">
                                                <option selected value="" disabled></option>
                                                <?php
                                                $br= dbConnect()->prepare("SELECT id,fname,lname FROM users WHERE role!=?");
                                                $br->execute(['Admin']);
                                                while($b=$br->fetch()){
                                                ?>  
                                                <option value="<?php echo $b['id']?>"><?php echo $b['fname'].' '.$b['lname'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subject" class="control-label">Branch </label>
                                                <select name="branch" id="assignContact" class="form-control single-select">
                                                <option selected value="" disabled></option>
                                                <?php
                                                $br= dbConnect()->prepare("SELECT * FROM branch WHERE status=?");
                                                $br->execute([1]);
                                                while($b=$br->fetch()){
                                                ?>  
                                                <option value="<?php echo $b['code']?>"><?php echo $b['name'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                            </div>
                        </div> 
                        <!-- ticker body -->
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6> Ticket Body</h6>
                                <textarea id="summernote" name="editordata"></textarea>
                            </div>
                        </div>
                        <!-- ticket attachment -->
                         <div class="card">
                            <div class="card-header">
                                <h6> Attachment</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 m-b-20">
                                        <div class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
                                        <span><i class="ion-upload m-r-5"></i>
                                        Upload file for ticket</span>
                                        <input type="file" name="upload" class="upload" accept="'pdf', 'jpeg', 'jpg', 'png', 'pdf', 'doc', 'docx', 'gif'"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-20">
                            <button type="submit" name="submit" class="btn btn-info waves-effect"
                                                        >Create Ticket</button>
                        </div>
                    <!--  <div class="card">
                            <div class="card-header">
                                <h4>This display ...</h4>
                            </div>
                            <div class="card-body"> 
                                <?php 
                                    // $i=1;
                                    // for($i=0;$i<=10;$i++){
                                    //     echo 'My Love for Ashake is incomparable'. $i. '<br>';
                                    // }
                                ?>
                            </div>
                        </div> -->
                        
                    </form> <!-- ticket form ends here -->
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
    <script type="text/javascript" src="dist/select2/js/select2.min.js"></script>
    <script type="text/javascript" src="dist/js/summernote-bs4.min.js"></script>
    <!-- end - This is for export functionality only -->
    <!-- Summernote script -->
    
    <script>
        $(function () {
            $('.single-select').select2();

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
    $(document).ready(function() {
        $('#summernote').summernote({
        placeholder: 'Type in ticket description',
        tabsize: 2,
        height: 250
      });
    });
  </script>
    <script>
        $(function () {
            $('#demo-foo-addrow').footable();

            // $('#contact').on('change', function(){
            //     let value = $(this).val();
            //     alert('hello' + value);
            //     $.ajax({
            //         type:'POST',
            //         data:{contact_id:value},
            //         dataType:'text',
            //         success:function(data){
            //             console.log(data);
            //         }

            //     })
            // });
        });
    </script>

</body>

</html>