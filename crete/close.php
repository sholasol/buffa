<?php include 'header.php'; ?>
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
                        <h4 class="text-themecolor">Closed Tickets</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Tickets</li>
                            </ol>
                            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#add-ticket"><i
                                    class="fa fa-plus-circle" ></i> Create New</button> -->
                                    <a href="aticket" class="btn btn-info d-none d-lg-block m-l-15"> <i class="fa fa-plus-circle" ></i>Create New</a>
                        </div>
<!-- Modal to create new ticket here -->
 <!-- Add Contact Popup Model -->
                        <div id="add-ticket" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <?php
                                if (isset($_POST['submit'])) {
                                   


                            $firstnm = check_input($_POST['fname']);
                            $lname= check_input($_POST['lname']);
                            $pnum = check_input($_POST['phone']);
                            $email = check_input($_POST['email']);
                            $desg = check_input($_POST['desg']);
                            $sex = check_input($_POST['sex']);
                            $role = 'marketer';
                            $status = 0;
                            $dob = check_input($_POST['dob']);
                            $qual = check_input($_POST['qual']);
                            $salary = check_input($_POST['salary']);
                            $branch = check_input($_POST['branch']);
                            $joined = date('Y-m-d H-m-s');
                            $salt = '??????!H????H???$???=????????.J??S&??r?? ???';
                            $password = 'password';
                            $password = hash('sha256', $password.$salt);
                            //$dt = date('Y-m-d');

                            //Profile Image
                            if (is_uploaded_file($_FILES ['upload'] ['tmp_name'])) {

                        //Student Passport
                                $imgFile = $_FILES['upload']['name'];
                                $tmp_dir = $_FILES['upload']['tmp_name'];
                                $imgSize = $_FILES['upload']['size'];

                                //Processing the image
                                
                                $upload_dir = 'upload/'; // upload directory

                                $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

                                // valid image extensions
                                $valid_extensions = array('jpeg', 'jpg', 'png', 'pdf', 'doc', 'docx', 'gif'); // valid extensions

                                // rename uploading image
                                $proImage = rand(1000,1000000).".".$imgExt;

                                // allow valid image file formats
                                if(in_array($imgExt, $valid_extensions)){           
                                        // Check file size '500MB'
                                        if($imgSize < 500000000){
                                                move_uploaded_file($tmp_dir,$upload_dir.$proImage);
                                        }

                                }

                                }

                            


                                $dbs= dbConnect()->prepare("INSERT INTO users SET fname=:fn, lname=:ln, phone=:pn, dob=:db, branch=:br, qualification=:ql, salary=:sl, email=:em, role=:rl, status=:st, joined=:jn,gender=:gn, department=:dep, image=:img, salt=:salt, password=:pwd");
                                $dbs->bindParam(':fn', $firstnm);
                                $dbs->bindParam(':ln', $lname);
                                $dbs->bindParam(':pn', $pnum);
                                $dbs->bindParam(':db', $dob);
                                $dbs->bindParam(':br', $branch);
                                $dbs->bindParam(':ql', $qual);
                                $dbs->bindParam(':sl', $salary);
                                $dbs->bindParam(':em', $email);
                                $dbs->bindParam(':rl', $role);
                                $dbs->bindParam(':st', $status);
                                $dbs->bindParam(':jn', $joined);
                                $dbs->bindParam(':gn', $sex);
                                $dbs->bindParam(':dep', $desg);
                                $dbs->bindParam(':img', $proImage);
                                $dbs->bindParam(':salt', $salt);
                                $dbs->bindParam(':pwd', $password);

                                if($dbs->execute()){
                                  $msg= "marketer added successfully!";

                                   echo  " <script>alert('$msg'); window.location='marketer'</script>";
                                }else{
                                    $msg= "Oops! cannot add marketer!";

                                echo  " <script>alert('$msg'); window.location='marketer'</script>";
                                }
                                
                                
                            }

if(isset($_GET['dmarketer'])){                          
    $dmarketer = $_GET['dcustomer'];
    $dsupp = dbConnect()->query("DELETE FROM users WHERE id='$dmarketer' ");
    if($dcust){
    echo "<script> alert('Deleted');window.location='dmarketer' </script>";
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
    gender='$_POST[sex]'
    where id=?");  
    $sql_update->execute([$updID]);
    if($sql_update){
    echo "<script> alert('Updated');window.location='dmarketer' </script>";
    }
    }
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
            echo "Error Updating";
            exit();
        }

        
    }
                        function check_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                            }
                            ?>
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">??</button>
                                                    <!-- <h4 class="modal-title" id="myModalLabel">Add Contact</h4> -->
                                                </div>
                                                <form method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <from class="form-horizontal form-material">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="subject" class="form-control" placeholder="ticker subject">
                                                                        </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="user" class="form-control" placeholder="Assign ticket (default is current user)">
                                                                         
                                                                </div> 
                                                             </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="text"  name="contact" class="form-control"
                                                                    placeholder="Contact"> </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="text" name="phone" class="form-control"
                                                                    placeholder="Phone"> </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="date" name="dob" class="form-control"
                                                                    placeholder="Date of Birth"> </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <select name="desg" class="form-control">
                                                                    <option selected disabled value="">-- Designation -- </option>
                                                                    <option>Account</option>
                                                                    <option>Logistics</option>
                                                                    <option>Production</option>
                                                                    <option>Driver</option>
                                                                    <option>Customer</option>
                                                                    <option>Supplier</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <select name="sex" class="form-control">
                                                                    <option selected disabled value="">-- Gender --</option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <select name="qual" class="form-control">
                                                                    <option selected disabled value="">-- Qualification --</option>
                                                                    <option>SSCE</option>
                                                                    <option>NCE</option>
                                                                    <option>OND</option>
                                                                    <option>HND</option>
                                                                    <option>B.Sc</option>
                                                                    <option>B.Tech</option>
                                                                    <option>M.Sc</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <label>Branch</label>
                                                                <select name="branch" class="form-control">
                                                                    <option selected value="" disabled>  -- -- </option>
                                                <?php
                                                $br= dbConnect()->prepare("SELECT * FROM branch");
                                                $br->execute();
                                                while($b=$br->fetch()){
                                                ?>  

                                                    <option><?php echo $b['name']?></option>
                                                <?php }?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="number" name="salary" class="form-control"
                                                                    placeholder="Salary"> </div>
                                                        </div>
                                                    </from>
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
                                    </div>


<!-- Modal to create new ticket ends here -->



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
                                <h4 class="card-title">Support Ticket List</h4>
                                <h6 class="card-subtitle">List of ticket opend by customers</h6>
                                <div class="row m-t-40">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $atk; ?></h1>
                                                <h6 class="text-white">Total Tickets</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?php echo $rtk; ?></h1>
                                                <h6 class="text-white">Responded</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><?php echo $ritk; ?></h1>
                                                <h6 class="text-white">Resolve</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?php echo $ptk; ?></h1>
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
                                                <th>ID #</th>
                                                <th>Opened By</th>
                                                <th>Cust. Email</th>
                                                <th>Sbuject</th>
                                                <th>Status</th>
                                                <th>Assign to</th>
                                                <th>Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ct= dbConnect()->prepare("SELECT t.user_id,t.subject,t.customer,t.department,t.email,t.branch,t.note,t.file,t.status,t.created,u.id,u.fname,u.lname,u.image FROM ticket AS t INNER JOIN users AS u ON t.user_id=u.id WHERE t.status=2");
                                                $ct->execute();
                                                $i=0;
                                                while($t=$ct->fetch()){
                                                    $i++;
                                                    if($t['status'] ==0){$status='Pending';}
                                                    elseif($t['status']==1){$status='Responded';}
                                                    else{$status='Resolved';}
                                                    $nim = $t['fname'].' '.$t['lname'];
                                                ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td>
                                                    <a href=""><img src="<?php if($t['image']==''){echo'../assets/images/users/1.jpg';}else{echo 'upload/'.$t['image'];}?>"
                                                            alt="user" class="img-circle" /> <?php echo $t['customer']; ?></a>
                                                </td>
                                                <td><?php echo $t['email'];?></td>
                                                <td><?php echo $t['subject'];?></td>
                                                <td><span class="label <?php if($t['status']==0){echo 'label-danger';}elseif($t['status']==1){echo'label-warning';}else{echo 'label-success';}?>"><?php echo $status;?></span> </td>
                                                <td><?php echo $nim;?></td>
                                                <td><?php echo $t['created'];?></td>
                                                <td>
                                                    <a href="">delete</a>
                                                    <a href="">respond</a>
                                                    <a href="" data-toggle="modal" data-target="#add-contact">view</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                  <!--   <button type="button" class="btn btn-info btn-rounded"
                                                        data-toggle="modal" data-target="#add-contact">Add New
                                                        Contact</button> -->
                                                </td>
                                                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Add New
                                                                    Contact</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">??</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <from class="form-horizontal form-material">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Type name"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Email"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Phone"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Designation"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Age"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Date of joining"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Salary"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <div
                                                                                class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
                                                                                <span><i
                                                                                        class="ion-upload m-r-5"></i>Upload
                                                                                    Contact Image</span>
                                                                                <input type="file" class="upload">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </from>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info waves-effect"
                                                                    data-dismiss="modal">Save</button>
                                                                <button type="button"
                                                                    class="btn btn-default waves-effect"
                                                                    data-dismiss="modal">Cancel</button>
                                                            </div>
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
            ?? <?php echo date('Y'); ?> Hybridsoft
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