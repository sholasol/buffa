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
                        <h4 class="text-themecolor">Leads</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>

                                <li class="breadcrumb-item active"><a class="breadcrumb-item active" href="allcontact">Lead</a></li>

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
                        <li class="box-label"><a href="lead">All Leads
                                <span><?php //echo $ast; ?></span></a></li>
                        <li class="divider"></li>
                        <li><a href="?status=1">Prospects <span><?php //echo $acStf; ?></span></a></li>
                        <li><a href="?status=2">Leads<span><?php// echo $instf; ?></span></a></li>
                    

                    </ul>
                </div>
                                <!-- /.left-aside-column-->
<div class="right-aside ">
<div class="right-page-header">
    <div class="d-flex">
        <div class="align-self-center">
            <h4 class="card-title m-t-10">Lead </h4>
        </div>
        <div class="ml-auto">
            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right"
    data-toggle="modal" data-target="#add-customer">New Lead</button>
        </div>
    </div>
</div>
<!-- Add Contact Popup Model -->
<div id="add-customer" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


<?php

if(isset($_POST['submit'])){
   if(empty($_POST['fname'])){
    $msg= "Full name is required!";
    echo  " <script>alert('$msg'); </script>";
   }
   if(empty($_POST['rank'])){
    $msg= "Status is required!";
    echo  " <script>alert('$msg'); </script>";
   }
   if(empty($_POST['email'])){
    $msg= "Email is required!";
    echo  " <script>alert('$msg'); </script>";
   }
   if(empty($_POST['phone'])){
    $msg= "Telephone is required!";
    echo  " <script>alert('$msg'); </script>";
   }
   
   if(empty($_POST['sex'])){
    $msg= "Gender is required!";
    echo  " <script>alert('$msg'); </script>";
   }
   else{
        $name = check_input($_POST['fname']);
        $email = check_input($_POST['email']);
        $pnum = check_input($_POST['phone']);
        $sex = check_input($_POST['sex']);
        $rank = check_input($_POST['rank']);
        $branch = check_input($_POST['branch']);
        $desc = $_POST['desc'];
        $date = date('Y-m-d');

        $sql = "INSERT INTO leads (name,email,phonenumber,gender,ranks,branches, description,dateadded,addedby)VALUES(?,?,?,?,?,?,?,?,?)";
        $exe = dbConnect()->prepare($sql);
        $exe->execute([$name,$email,$pnum,$sex,$rank,$branch,$desc,$date,$uid]);

        if($exe){
          $msg= "The Lead has been added successfully!";
           echo  " <script>alert('$msg');</script>";
        }else{
            $msg= "Oops! cannot add marketer!";
            echo  " <script>alert('$msg');</script>";
        }
   }
}

if (isset($_POST['update'])) {
    $rank = check_input($_POST['ranks']);
    $id = $_POST['id'];

    if ($rank === 'Customer') {
        $getData = dbConnect()->prepare("SELECT * FROM leads WHERE id = ?");
        $getData->execute([$id]);
        $data = $getData->fetch();
        $fname = explode(" ", $data['name'])[0];
        $lname = explode(" ", $data['name'])[1];
        $sex = $data['gender'];
        $branch = $data['branches'];
        $email = $data['email'];
        $phone = $data['phonenumber'];
        $role = 'Customer';
        $status = 0;
        $rank = 'Regular';
        $date = date('Y-m-d H:m:s');

        $updCus = dbConnect()->prepare("INSERT INTO users (fname,lname,email,phone, branch,gender,role,status,rank)
            VALUES(?,?,?,?,?,?,?,?,?)");
        $updCus->execute([$fname,$lname,$email,$phone,$branch,$sex,$role,$status,$rank]);
        if ($updCus) {
            $del = dbConnect()->prepare("DELETE FROM leads WHERE id=?");
            $del->execute([$id]);
            echo  " <script>alert('Successfully Converted to Customer');</script>";
        }else{
            echo  " <script>alert('Opps! An error Occured');</script>";
        }
        
    }else{
        $upd = dbConnect()->prepare("UPDATE leads SET ranks = ? WHERE id = ?");
    if ($upd->execute([$rank, $id])) {
        $msg= "Successfully Updated";
        echo  " <script>alert('$msg');</script>";
    }else{
         $msg= "Oops! An error occured!";
            echo  " <script>alert('$msg');</script>";
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
    gender='$_POST[sex]',
    rank='$_POST[rank]'
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
// function split_name($name) {
//     $name = trim($name);
//     $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
//     $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
//     return array($first_name, $last_name);
// }

?> 
<form method="POST" enctype="multipart/form-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
                <!-- <h4 class="modal-title" id="myModalLabel">Add Contact</h4> -->
            </div>
           
            <div class="modal-body">
                <from class="form-horizontal form-material">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <input type="text" name="fname" class="form-control">
                        </div>
                         
                        <div class="col-md-12 m-b-20">
                            <label>E-mail</label>
                            <input type="email"  name="email" class="form-control"> 
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control"> 
                        </div>

                        
                        <div class="col-md-12 m-b-20">
                            <select name="sex" class="form-control">
                                <option selected disabled value="">-- Gender --</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <select name="rank" class="form-control">
                                <option selected disabled value="">-- Staus --</option>
                                <option>Pospect</option>
                                <option>Lead</option>
                                <!-- <option>Customer</option> -->
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

                        <div class="col-md-12 mb-3">
                            <label for="validationCustom03">Note</label>
                            <textarea rows="5 " class="textarea_editor form-control" name="desc"></textarea>
                            
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
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </form>
</div>
                
<div class="table-responsive">
    <table id="example23"
        class="table no-wrap table-bordered m-t-30 table-hover contact-list"
        data-paging="true" data-paging-size="7">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Note</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Joining date</th>
                <th>Added By</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $leadSQL = "";
                if (!isset($_GET['status'])) {
                    $leadSQL ="SELECT * FROM leads ORDER BY id DESC";
                }elseif (isset($_GET['status']) && $_GET['status']==1) {
                    $leadSQL ="SELECT * FROM leads WHERE ranks='Prospect' ORDER BY id DESC";
                }else{
                    $leadSQL ="SELECT * FROM leads WHERE ranks ='Lead' ORDER BY id DESC";
                }
                $ct= dbConnect()->prepare($leadSQL);
                $ct->execute();
                $i=0;
                while($t=$ct->fetch()){
                    $i++;
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $t['name'];  ?></td>
                <td><?php echo htmlspecialchars_decode($t['description']) ; ?></td>
                <td><?php echo $t['email']; ?></td>
                <td><?php echo $t['phonenumber']; ?></td>
                <td><?php echo $t['ranks']; ?></td>
                <td><?php echo $t['dateadded']; ?></td>
                <td><?php 
                    $mid = $t['addedby'];
                    $getname = dbConnect()->prepare("SELECT fname,lname FROM users WHERE id = ?");
                    $getname->execute([$mid]);
                    $f = $getname->fetch();
                echo $f['fname']." ".$f['lname']; ?></td>
                <td>
                    <!-- <a href="" class="fas fa-edit text-success"></a> -->
                    <a type="button" class="icon icon-edit text-success" data-toggle="modal" data-target="#update-staff<?php echo $t['id'];?>"> </a>

                    <a href="?dmarketer=<?php echo ($t['id']);?>" class="icon icon-trash text-danger"  onclick="return confirm('Are you sure to delete?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to delete data"></a>

                    <a type="button" class="icon icon-eye text-success" data-toggle="modal" data-target="#view-staff<?php echo $t['id'];?>"> </a>

                    <a data-toggle="modal" data-target="#MyExp<?php echo $i; ?>" class="ti-wallet text-info" title="Add Project Expenses"></a>

                   
                </td>
            </tr>

<div id="MyExp<?php echo $i; ?>" class="modal fade in" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Update Lead Status</h4>
            <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">×</button>
        </div>
       <form class="form-horizontal" method="POST">
           <input type="hidden" name="id" value="<?php echo $t['id']; ?>"/>
            <div class="modal-body">
               
                <div class="form-group">
                    <label class="col-md-12">Status</label>
                    <div class="col-md-12">
                        <select name="ranks" class="form-control">
                            <option>Prospect</option>
                            <option>Lead</option>
                            <option>Customer</option>
                        </select>
                    </div>
                </div>
                 
                 

            </div>
            <div class="modal-footer">
                <button type="submit" name="update" class="btn btn-info waves-effect">Update</button>
                <button type="button" class="btn btn-default waves-effect"
                    data-dismiss="modal">Cancel</button>
            </div>
    </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
        <?php 
            // Update Modal goes here
            include 'modal/updateCustomer.php';
            include 'modal/viewLead.php';
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
    <script src="../assets/node_modules/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="../assets/node_modules/html5-editor/bootstrap-wysihtml5.js"></script>
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
            });
        });

        $('.textarea_editor').wysihtml5();
    });
</script>

</body>

</html>