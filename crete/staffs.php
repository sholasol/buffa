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
                        <h4 class="text-themecolor">Contact</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>

                                <li class="breadcrumb-item active"><a class="breadcrumb-item active" href="allcontact">Contact</a></li>

                                <li class="breadcrumb-item active"><a class="breadcrumb-item active" href="driver">Marketer</a></li>
                            </ol>
                           <!--  <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
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
                                        <li class="box-label"><a href="<?php if($grp ==2){echo 'driver';}else{echo'javascript:void(0)';}?>">All Marketer
                                                <span><?php echo $alm; ?></span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="amarketer">Active <span><?php echo $amm; ?></span></a></li>
                                        <li><a href="omarketer">In-Active<span><?php echo $imm; ?></span></a></li>
                                    

                                    </ul>
                                </div>
                                <!-- /.left-aside-column-->
                                <div class="right-aside ">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">Contacts / marketer </h4>
                                            </div>
                                            <div class="ml-auto">
                                                <button type="button" class="btn btn-info btn-rounded m-t-10 float-right"
                                        data-toggle="modal" data-target="#add-customer">Add New Marketer</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Contact Popup Model -->
                                    <div id="add-customer" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

 <?php 

                                        if(isset($_POST['submit'])){
                                            if(!isset($_POST['fname']) || empty($_POST['fname'])){
                                                 $error = 'first name field required !!!';
                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> $error.

                                                        </div>";
                                            }elseif(!isset($_POST['lname']) || empty($_POST['lname'])){
                                                $error = 'last name field required !!!';
                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> $error.

                                                        </div>";
                                            }elseif(!isset($_POST['email']) || empty($_POST['email'])){
                                                $error = 'email field required !!!';
                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> $error.

                                                        </div>";
                                            }elseif(!isset($_POST['phone']) || empty($_POST['phone'])){
                                                $error = 'phone number field required !!!';
                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> $error.

                                                        </div>";
                                            }elseif(!isset($_POST['desg']) || empty($_POST['desg'])){
                                                $error = 'Designation field required !!!';
                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> $error.

                                                        </div>";
                                            }elseif(!isset($_POST['sex']) || empty($_POST['sex'])){
                                                $error = 'sex field required !!!';
                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> $error.

                                                        </div>";
                                            }elseif(!isset($_POST['dob']) || empty($_POST['dob'])){
                                                $error = 'Date of birth field required !!!';
                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> $error.

                                                        </div>";
                                            }elseif(!isset($_POST['qual']) || empty($_POST['qual'])){
                                                $error = 'Qualification field required !!!';
                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> $error.

                                                        </div>";
                                            }elseif(!isset($_POST['salary']) || empty($_POST['salary'])){
                                                $error = 'Salary field required !!!';
                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> $error.

                                                        </div>";
                                            }elseif(!isset($_POST['branch']) || empty($_POST['branch'])){
                                                $error = 'Branch field required !!!';
                                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                            <strong>Oops!</strong> $error.

                                                        </div>";
                                            }else{
                                    
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
                                                $salt = 'ªœÖ!Há¿H”$’=Í®¹ü.JÕS&ÍrÓ ‘';
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
                                                    {
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
                                            }else{
                                                //output
                                                //print_r($validation->errors());
                                                foreach($validation->errors() as $error){
                                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                        <strong>Oops!</strong> $error.

                                                    </div>";
                                                }
                                            }
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
                                                                    <option>Marketer</option>
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
                                                            <div class="col-md-12 m-b-20">
                                                                <div
                                                                    class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
                                                                    <span><i class="ion-upload m-r-5"></i>Upload marketer
                                                                        Image</span>
                                                                    <input type="file" name="upload" class="upload"> </div>
                                                            </div>
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
                                    <div class="table-responsive">
                                        <table id="example23"
                                            class="table no-wrap table-bordered m-t-30 table-hover contact-list"
                                            data-paging="true" data-paging-size="7">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Designation</th>
                                                    <th>Dob</th>
                                                    <th>Joining date</th>
                                                    <th>Salary</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $ct= dbConnect()->prepare("SELECT * FROM users WHERE role=?");
                                                $ct->execute(['marketer']);
                                                $i=0;
                                                while($t=$ct->fetch()){
                                                    $i++;
                                                    ($t['status'] ==1) ? $status='Active':$status='Offline';
                                                ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td>
                                                        <a type="button" data-toggle="modal" data-target="#view-staff<?php echo $t['id'];?>"><img
                                                                src="<?php if(!empty($imgUser)){echo 'upload/'.$imgUser;}else{echo '../assets/images/users/4.jpg';}?>" alt="<?php echo $imgUser;?>" width="40"
                                                                class="img-circle" />
                                                                <?php echo $t['fname'] .' '. $t['lname'] ?>
                                                            </a>
                                                    </td>
                                                    <td><?php echo $t['email']?></td>
                                                    <td><?php echo $t['phone']?></td>
                                                    <td><span class="label label-danger"><?php echo $t['department']?></span> </td>
                                                    <td><?php echo $t['dob']?></td>
                                                    <td><?php echo $t['joined']?></td>
                                                    <td><?php echo $t['salary']?></td>
                                                    <td>
                                                        <!-- <a href="" class="fas fa-edit text-success"></a> -->
                                                        <a type="button" class="fas fa-edit text-success" data-toggle="modal" data-target="#update-staff<?php echo $t['id'];?>"> </a>

                                                        <a href="?dmarketer=<?php echo ($t['id']);?>" class="fas fa-trash text-danger"  onclick="return confirm('Are you sure to delete?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to delete data"></a>

                                                        <a type="button" class="fas fa-eye text-success" data-toggle="modal" data-target="#view-staff<?php echo $t['id'];?>"> </a>

                                                       <input <?php if($t['status']==1){echo 'checked';}?>  type="checkbox" class="activateUser" id="<?php echo ($t['id']);?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Check to activate branch" value="<?php echo $ctt['status'];?>">
                                                    </td>
                                                </tr>
                                            <?php 
                                                //Update Modal goes here
                                                include 'modal/updateCustomer.php';
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