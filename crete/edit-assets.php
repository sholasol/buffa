<?php include 'header.php'; 

if(isset($_GET['id'])){
    $aid = $_GET['id'];
}

$user = dbConnect()->prepare("SELECT * FROM  assets WHERE id=?");
$user->execute([$aid]);
$r = $user->fetch();

if (isset($_POST['submit'])) {

    $name = check_input($_POST['aname']);
    $desc = check_input($_POST['description']);
    $regNum = check_input($_POST['reg-num']);
    //($_POST['reg-num'] == "") ? $regNum = 'BUF-CRE-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4)) : $regNum = $regNum = check_input($_POST['reg-num']);
    $value = check_input($_POST['value']);
    $added = date('Y-m-d');
    $date = check_input($_POST['date']);
    $type = $_POST['type'];

	$insert = dbConnect()->prepare("UPDATE assets SET name =?,serial_no=?,value=?,purchase_date=?,  notes=? WHERE id=?");
    if ($insert->execute([$name,$regNum,$value,$date,$desc, $aid])) {
        $msg ="Assests Successfully Updated";
        echo "<script>alert('$msg'); window.location='manageAssets'</script>";    
    }
	else{
                    $msg ="Error Creating Assets. Try Again...";
                    echo "<script>alert('$msg')</script>";
            }
		
}
	
	
    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>



 <!-- ============================================================== -->
 <form method="POST" action="">
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Assests</h4>
                                
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">Assets Name</label>
                                            <input type="text" class="form-control" name="aname" value="<?php echo $r['name'] ?>" required>
                                            
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom02">Registration Number</label>
                                            <input type="text" name="reg-num" class="form-control" value="<?php echo $r['serial_no'] ?>" required>
                                            
                                        </div>


                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom02">Purchase Date</label>
                                            <input type="date" name="date" class="form-control" value="<?php echo $r['purchase_date'] ?>" required>
                                            
                                        </div>

                                       
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Value</label>
                                            <input type="text" class="form-control" name="value" value="<?php echo $r['value'] ?>"  required>
                                           
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Asset Type</label>
                                            <select name="type" class="form-control">
                                                <option selected disabled>Select Asset</option>
                                                <?php
                                                    $getAssets = dbConnect()->prepare("SELECT name,id FROM assetcategories ");
                                                    $getAssets->execute();
                                                    if ($getAssets->rowcount() > 0) {
                                                        while ($row = $getAssets->fetch()) {
                                                            $value = $row['id'];
                                                            $name = $row['name']?>
                                                            <option value="<?php echo $value;?>"><?php echo $name;?></option>
                                                       <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">Description</label>
                                            <textarea class="form-control" name="description"  rows="4"><?php echo $note ?></textarea>
                                            
                                        </div>

                                       
                                    </div>

                                   
							         <div class="m-l-10">
                                            <button class="btn btn-primary" name="submit" type="submit"> Submit form </button> 
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>


                

                




            </div>

         </div>
         </form>	

<?php //include 'footer.php'; ?>

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
    <!-- end - This is for export functionality only -->
    
	

</body>

</html>





