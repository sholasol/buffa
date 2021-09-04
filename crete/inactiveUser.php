<?php include 'header.php';    ?>
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
                        <h4 class="text-themecolor">Contact</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active"><a href="allcontact" class="breadcrumb-item active">Contact</a></li>
                                <li class="breadcrumb-item active"><a href="inactiveUser" class="breadcrumb-item active">In-Active Staff</a></li>
                            </ol>
                           <!--  <button type="button" data-toggle="modal" data-target="#add-contact" class="btn btn-info d-none d-lg-block m-l-15"><i
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
                                        <li class="box-label"><a href="<?php if($grp ==2){echo 'allcontact';}else{echo'javascript:void(0)';}?>">All Contacts
                                                <span><?php echo $ast; ?></span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="staff">Active Staff <span><?php echo $acStf; ?></span></a></li>
                                        <li><a href="inactiveUser">In-Active Staff<span><?php echo $instf; ?></span></a></li>
                                        <!-- <li><a href="suplier">Suppliers <span>623</span></a></li>
                                        <li><a href="customer">Customers <span>53</span></a></li> -->
                                        <div id="myModal" class="modal fade in">
                                            <?php

if(isset($_GET['dstaff'])){                          
    $dstaff = $_GET['dstaff'];
    $dstaff = dbConnect()->query("DELETE FROM users WHERE id='$dstaff' ");
    if($user){
    echo "<script> alert('Deleted');window.location='inactiveUser' </script>";
    }
}
if(isset($_POST['updateStaffBtn'])){
    if(isset($_POST['fname'])){
        $updID = $_POST['update_id'];
    $sql_update=dbConnect()->prepare("UPDATE `users` SET 
    fname='$_POST[fname]',
    lname='$_POST[lname]',
    email='$_POST[email]',
    phone='$_POST[phone]',
    department='$_POST[department]', 
    qualification='$_POST[qual]',
    salary='$_POST[salary]',
    branch='$_POST[branch]',
    dob='$_POST[dob]',
    gender='$_POST[gender]'
    where id=?");  
    $sql_update->execute([$updID]);
    if($sql_update){
    echo "<script> alert('Updated');window.location='inactiveUser' </script>";
    }
    }
}
                        function check_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                            }
    if (isset($_POST['value'])) {
        ob_end_clean();
        $value = $_POST['value'];
        $id = $_POST['id'];
        $query = dbConnect()->prepare("UPDATE users SET status=? WHERE id = ?");
        if ($query->execute([$value, $id])) {
            echo "Updated";
            exit();
        }else{
            echo "Error Updating branch";
            exit();
        }

        
    }

                            ?>
                                            
                           
                                    </ul>
                                </div>
                                <!-- /.left-aside-column-->
                                <div class="right-aside ">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">Staff (In-Active) </h4>
                                            </div>
                                            <div class="ml-auto">
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
                                                    <!-- <h4 class="modal-title" id="myModalLabel">Add Contact</h4> -->
                                                </div>
                                                <form method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <from class="form-horizontal form-material">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <label class="col-md-12">First Name</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="fname" class="form-control">
                                                                        </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="col-md-12">Last Name</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="lname" class="form-control">
                                                                         
                                                                </div> 
                                                             </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="email"  name="email" class="form-control"
                                                                    placeholder="Email"> </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="text" name="phone" class="form-control"
                                                                    placeholder="Phone"> </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <label>Designation</label>
                                                                <select name="desg" class="form-control">
                                                                    <option selected disabled value=""> </option>
                                                                    <option>Account</option>
                                                                    <option>Logistics</option>
                                                                    <option>Production</option>
                                                                    <option>Driver</option>
                                                                    <option>Customer</option>
                                                                    <option>Supplier</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <!-- <input type="date" name="dob" class="form-control"
                                                                    placeholder="Date of Birth"> --> 
                                                                    <label>Gender</label>
                                                                <select name="sex" class="form-control">
                                                                    <option selected disabled value=""> </option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                         <!--    <div class="col-md-12 m-b-20">
                                                                <input type="number" name="salary" class="form-control"
                                                                    placeholder="Salary"> </div> -->
                                                            <div class="col-md-12 m-b-20">
                                                                <div
                                                                    class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
                                                                    <span><i class="ion-upload m-r-5"></i>Upload Contact
                                                                        Image</span>
                                                                    <input type="file" name="upload" class="upload"> </div>
                                                            </div>
                                                        </div>
                                                    </from>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
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
                                    </div>
                                    <div class="table-responsive">
                                        <table id="example23"
                                            class="table no-wrap table-bordered m-t-30 table-hover contact-list"
                                            data-paging="true" data-paging-size="7">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>#</th>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Role</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $mt= dbConnect()->prepare("SELECT * FROM users WHERE role=? AND status=?");
                                                $mt->execute(['user', 0]);
                                                $i=0;
                                                while($t=$mt->fetch()){
                                                    $i++;
                                                    $imgUser = $t['image'];
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input <?php if($t['status']==1){echo 'checked';}?>  type="checkbox" class="activateUser" id="<?php echo ($t['id']);?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Check to activate branch" value="<?php echo $t['status'];?>">
                                                    </td>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <a type="button" data-toggle="modal" data-target="#view-staff<?php echo $t['id'];?>">
                                                            <img
                                                                src="<?php if(!empty($imgUser)){echo 'upload/'.$imgUser;}else{echo '../assets/images/users/4.jpg';}?>" alt="<?php echo $imgUser;?>" width="40"
                                                                class="img-circle" /></a>
                                                    </td>
                                                    <td>
                                                        <a type="button" data-toggle="modal" data-target="#view-staff<?php echo $t['id'];?>"><?php echo $t['fname'].' '.$t['lname'] ?></a>
                                                    </td>
                                                    <td><?php echo $t['email'];?></td>
                                                    <td><?php echo $t['phone'];?></td>
                                                    <td><span class="label label-danger"><?php echo $t['department'];?></span> </td>
                                                    <td>
                                                        <!-- <a href="" class="fas fa-edit text-success"></a> -->
                                                       <a type="button" class="fas fa-edit text-success" data-toggle="modal" data-target="#update-staff<?php echo $t['id'];?>"> </a>
                                                        <a href="?dstaff=<?php echo ($t['id']);?>" class="fas fa-trash text-danger" onclick="return confirm('Are you sure to delete?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to delete data"></a>

                                                        <a type="button" class="fas fa-eye text-success" data-toggle="modal" data-target="#view-staff<?php echo $t['id'];?>"> </a>
                                                    </td>
                                                </tr>
                                                <?php 
                                                //Update Modal goes here
                                                include 'modal/updateStaff.php';
                                                include 'modal/viewStaff.php';
                                            } ?>
                                                
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
<script type="text/javascript">
    $(document).ready(function(){
        $('.activateUser').on('change',function(){
            let id = this.id;
            let value = this.value;
            (value == 1) ? value=0 : value = 1;
            // alert(value);
            $.ajax({
                type:'POST',
                data:{id:id,value:value},
                dataType: 'text',
                success: function(data){
                    alert(data);
                }
            })
        })
    })
</script>
</body>

</html>