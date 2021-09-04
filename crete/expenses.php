<?php include 'header.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $delete = dbConnect()->prepare("DELETE FROM expenses WHERE id = ?");
        if ($delete->execute([$id])) {
            $msg = "Expenses Deleted";
            echo "<script>alert('$msg');window.location='expenses'</script>";
        }else{
            echo "<script>alert(Error Deleting Expenses. Try Again!!!);window.location=expenses</script>";
        }
    }

    if (isset($_POST['submit'])) {
        $ename = check_input($_POST['exp_name']);
        $date = check_input($_POST['date']);
        $amount = check_input($_POST['amount']);
        $note = check_input($_POST['note']);
        $pmod = check_input($_POST['paymentmode']);
        $employee = check_input($_POST['employee']);
        $category = check_input($_POST['exp_cat']);
        $added = date("Y-m-d");
        $mn = date('m');
        $yr = date('Y');

        $create = dbConnect()->prepare("INSERT INTO expenses (expense_name,date,amount,note, paymentmode,clientid,category,dateadded, month, year)VALUES(?,?,?,?,?,?,?,?,?,?)");
        if($create->execute([$ename,$date,$amount,$note,$pmod,$employee,$category,$added, $mn, $yr])) {
            $msg = "Expenses successfully Created";
            echo "<script>alert('$msg');</script>";
        } else{
            $msg = "Oops! Error Creating Expenses. Try Again";
            echo "<script>alert('$msg');</script>";
        }
    }

     function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST['update-expenses'])) {
        $ename = check_input($_POST['exp_name']);
        $date = check_input($_POST['date']);
        $amount = check_input($_POST['amount']);
        $note = check_input($_POST['note']);
        $pmod = check_input($_POST['paymentmode']);
        $employee = check_input($_POST['employee']);
        $category = check_input($_POST['exp_cat']);
        $id = check_input($_POST['id']);
        // $added = date("Y-m-d");

        $updExp = dbConnect()->prepare("UPDATE expenses SET 
            expense_name =?,
            date = ?,
            amount = ?,
            note = ?,
            paymentmode = ?,
            clientid = ?,
            category = ?
            WHERE id = ?");
        if ($updExp->execute([$ename,$date,$amount,$note,$pmod,$employee,$category,$id])) {
            echo "<script> alert('Expense has been successfully updated');window.location='expenses' </script>";
        } else{
            echo "<script> alert('Try Again!!!');window.location='expenses' </script>";
        }
    }
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
                        <h4 class="text-themecolor">Products</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Expenses</li>
                            </ol>
                            <button type="button" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-info d-none d-lg-block m-l-15"><i
                                    class="icon icon-plus"></i> Create New</button>
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
                                <h4 class="card-title">Expenses</h4>
                                <h6 class="card-subtitle"><small>Edit/Delete</small></h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Category</th>
                                                    <th>Amount</th>
                                                    <th>Name</th>
                                                    <th>Note</th>
                                                    <th>Customer</th>
                                                    <th>Date</th>
                                                    <th>Payment</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i=0;
                                            $users = dbConnect()->prepare("SELECT * FROM expenses ");
                                            $users->execute();
                                               while($user =$users->fetch()){
                                                   $i++;
                                               ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php $catid = $user['category'];
                                                    $getVal = dbConnect()->prepare("SELECT name from expenses_categories WHERE id = ?");
                                                    $getVal->execute([$catid]);
                                                    echo($getVal->fetch()['name']);
                                                 ?> </td>
                                            <td><?php echo number_format($user['amount']) ?></td>
                                            <td><?php echo $user['expense_name'] ?></td>
                                            <td><?php echo $user['note'] ?></td>
                                            <td><?php  $client =$user['clientid'];
                                                $getdata = dbConnect()->prepare("SELECT fname,lname FROM users WHERE id = ? ");
                                                $getdata->execute([$client]);
                                                $row =$getdata->fetch();
                                                $fname = $row['fname'];
                                                $lname = $row['lname'];
                                                echo($fname." ".$lname) ?> </td><!-- 
                                            <td> <?php echo $user->reference_no ?> </td> -->
                                            <td><span class="label label-info"><?php echo $user['dateadded'] ?></span> </td>
                                            <td><?php echo $user['paymentmode'] ?></td>
                                            <td>
                                                <a href="" class="icon icon-pencil text-success" data-toggle="modal" data-target="#editCat<?php echo $i ?>"> </a>
                                                

<!--                                                <a href="addexpenses?id=<?php // echo $user->id;?>"class="icon icon-eye text-info" data-toggle="modal" data-target="#view-staff<?php echo $user['id'] ;?>"> </a>-->

                                                <a href="?id=<?php echo $user['id'];?>"class="icon icon-trash text-danger"  onclick="return confirm('Are you sure to delete?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to delete data"></a>

                                                </a>
                                            </td>
                                            
                                            <div id="editCat<?php echo $i ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title text-center" id="myModalLabel">Update Expenses</h4> 
                           <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>

                        </div>
                       <form class="form-horizontal form-material" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?php echo $user['id']?>">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                               name="exp_name"  placeholder="Expenses Name" required value="<?php echo $user['expense_name']?>"> 
                                                    </div>

                                                   <div class="form-group">
                                                        <input type="date" class="form-control"
                                                               name="date" value="<?php echo $user['dateadded']?>" placeholder="Date" required> 
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                               name="amount" value="<?php echo $user['amount']?>" placeholder="Expenses Amount" required> 
                                                    </div>

                                                    <div class="form-group">
                                                        <select name="paymentmode" class="form-control">
                                                            <?php 
                                                                $val= $user['paymentmode'];
                                                            ?>

                                                            <option <?php ($val=='Bank Deposit') ? print 'selected' : print "";?> >Bank Deposit</option>
                                                            <option <?php ($val=='Cash') ? print 'selected' : print "";?>>Cash</option>
                                                        </select> 
                                                    </div>

                                                     <div class="form-group">
                                                        <label>Note</label>
                                                        <textarea class="form-control" required name="note" style="border:1px solid;padding:10px;" rows="4"><?php echo $user['note']?></textarea>
                                                    </div>

                                                    <div class="col-md-12 m-b-20">
                                                       <select class="form-control single-select" name="employee">

                                                           <?php
                                                           $user = $user['clientid'];
                                                                $getCat = dbConnect()->prepare("SELECT id,fname,lname FROM users WHERE department != ? OR department != ?");
                                                                $getCat->execute(['supplier', 'customer']);
                                                                while ($row=$getCat->fetch()) {
                                                                    ?>
                                                                    <option <?php ($user == $row['id']) ? print 'selected' : print "";?> value="<?php echo $row['id']?>"><?php echo $row['fname']." ".$row['lname']?></option>
                                                               <?php
                                                                }
                                                           ?>
                                                       </select>
                                                    </div>

                                                    <div class="col-md-12 m-b-20">
                                                       <select class="single-select" required name="exp_cat">

                                                           <?php
                                                           $cat = $user->category;
                                                                $getCat = dbConnect()->prepare("SELECT id,name FROM expenses_categories");
                                                                $getCat->execute();
                                                                while ($row=$getCat->fetch()) {?>
                                                                    <option <?php ($cat == $row['id']) ? print 'selected' : print "";?> value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                                               <?php
                                                                }
                                                           ?>
                                                       </select>
                                                    </div>

                                                </div>

                        <div class="modal-footer">

                            <button type="submit" name="update-expenses" class="btn btn-info waves-effect"
                                >Update</button>
                            <button type="button" class="btn btn-default waves-effect"
                                data-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
                                            </div>
                                                
                                            
                                        </tr>
                                            <?php
                                               // include 'modal/update-expenses.php';
                                             }
                                            ?>
                                            </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


           <div id="add-contact" class="modal bs-example-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Expenses</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                                <form class="form-horizontal form-material" method="POST">
                                <div class="modal-body">
                                    
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                   name="exp_name"  placeholder="Expenses Name" required> 
                                        </div>

                                       <div class="form-group">
                                            <input type="date" class="form-control"
                                                   name="date"  placeholder="Date" required> 
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                   name="amount"  placeholder="Expenses Amount" required> 
                                        </div>

                                        <div class="form-group">
                                            <select name="paymentmode" class="form-control">
                                                <option selected="" disabled="">Select Payment Mode</option>

                                                <option>Bank Deposit</option>
                                                <option>Cash</option>
                                            </select> 
                                        </div>

                                         <div class="form-group">
                                            <label>Note</label>
                                            <textarea class="form-control" required name="note" style="border:1px solid;padding:10px;" rows="4"></textarea>
                                        </div>

                                        <div class="col-md-12 m-b-20">
                                           <select class="form-control single-select" name="employee">
                                               <option selected="" disabled="">Select Employee</option>
                                               <?php
                                                    $getCat = dbConnect()->prepare("SELECT id,fname,lname FROM users WHERE department != ? OR department != ?");
                                                    $getCat->execute(['supplier', 'customer']);
                                                    while ($row=$getCat->fetch()) {?>
                                                        <option value="<?php echo $row['id']?>"><?php echo $row['fname']." ".$row['lname']?></option>
                                                   <?php
                                                    }
                                               ?>
                                           </select>
                                        </div>

                                        <div class="col-md-12 m-b-20">
                                           <select class="single-select" required name="exp_cat">
                                               <option selected="" disabled="">Select Expenses Category</option>
                                               <?php
                                                    $getCat = dbConnect()->prepare("SELECT id,name FROM expenses_categories");
                                                    $getCat->execute();
                                                    while ($row=$getCat->fetch()) {?>
                                                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                                   <?php
                                                    }
                                               ?>
                                           </select>
                                        </div>
                                        
                                    </div>
                                    
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
                                        
            </div>


    </div>
</div>       <!-- Add Contact Popup Model -->
        <!--======================================================= -->
        <!-- End Page wrapper  -->
<!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            &copy; <?php echo date('Y');?> Buffalo Crete
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    <!-- </div> -->
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
    <script type="text/javascript" src="dist/select2/js/select2.min.js"></script>
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
</body>

</html>

