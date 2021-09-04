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
                        <h4 class="text-themecolor">Production</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Production</li>
                            </ol>
                            <button type="button" data-toggle="modal" data-target="#add-contact" class="btn btn-info d-none d-lg-block m-l-15"><i
                                    class="fa fa-plus-circle"></i> Create New</button>
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
                                <!-- .left-aside-column--
                                <div class="left-aside bg-light-part">
                                    <ul class="list-style-none">
                                        <li class="box-label"><a href="javascript:void(0)">All Categories
                                                <span>123</span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="staff">Block <span>103</span></a></li>
                                        <li><a href="driver">Paving  Stone <span>19</span></a></li>
                                        <li><a href="suplier">Wheel Barrow <span>623</span></a></li>
                                        <li><a href="customer">Others <span>53</span></a></li>
                                        <!-- <li class="box-label"><a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#myModal" class="btn btn-info text-white">+ Create Production
                                                Category</a></li>  -->
                                    </ul>
                                </div>
                                <!-- /.left-aside-column-->
                                <div >
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">&nbsp; &nbsp; Production List </h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
        <?php
        if (isset($_POST['submit'])) {
            $dt = date('Y-m-d');
            $prd = $_POST['product'];
            $qty = $_POST['qty'];
            $code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,7);
            $operator = $_POST['operator'];
            $bag = ($_POST['bags']=="") ? $bag = $qty : $_POST['bags'] ;

           

           $ins= dbConnect()->prepare("INSERT INTO production 
            (code,product,user,created,operator,produced,outputqty) VALUES (?,?,?,?,?,?,?)");
           if($ins->execute([$code,$prd,$uid,$dt,$operator,$bag,$qty])){
            
             $msg= "The production has been successfully created for $prd!";

                echo  " <script>alert('$msg'); window.location='production'</script>";
            }
            else{
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            <strong>Oops!</strong> There was an error processing the production.

                        </div>";
            }
        }


        if(isset($_POST['save'])){
                $prdc = check_input($_POST['product']);
                $inp = check_input($_POST['input']);
                $qt = check_input($_POST['qty']);
                
                if(empty($inp)){
                    $msg= "Please select an input ";
                    echo  " <script>alert('$msg'); window.location='production'</script>";
                
                }elseif(empty ($qt)){
                    $msg= "Enter input quantity";
                    echo  " <script>alert('$msg'); window.location='production'</script>";
                
                }else{
                    // echo 'Its well';
                //get the production code
                $dbc = dbConnect()->prepare("SELECT code, inputcost, outputprice  FROM production WHERE product='$prdc'");
                $dbc->execute();
                $rc = $dbc->fetch();
                $cd = $rc['code'];
                $incost = $rc['inputcost'];
                $outprice=$rc['outputprice']; 

                //get input price
                $dbd = dbConnect()->prepare("SELECT cost, qty FROM rawmaterial WHERE id='$inp'");
                $dbd->execute();
                $rd = $dbd->fetch();
                $matPrc = $rd['cost'];
                $inCost = $rd['cost'];
                $mqty = $rd['qty'];
                
                    //Total price of the Input
                    $cs = $matPrc * $qt; //total input price
                    // total input cost
                    $tCost = $cs + $incost;//adding previous price to new price
                    if ($qt > $mqty) {
                        $msg = 'Required Quantity is More than Available Quantity ';
                        echo  " <script>alert('$msg'); window.location='production'</script>";
                    }else{
                        $mqty = ($mqty - $qt);
                        // $dbs= dbConnect()->prepare("INSERT INTO input SET code='$cd', product='$prdc', input='$inp', qty='$qt', price='$matPrc', cost='$cs'");
                        // $dbs->execute();
                        $ins = dbConnect()->prepare("INSERT INTO input(code,product,input,qty,price,cost) VALUE(?,?,?,?,?,?)");
                        $ins->execute([$cd,$prdc,$inp,$qt,$matPrc,$cs]);
                        if($ins){
                            //updating production record
                            $upd= dbConnect()->prepare("UPDATE production SET inputcost=:inp WHERE code=:cod");
                            $upd->bindParam(':inp', $tCost);
                            $upd->bindParam(':cod', $cd);
                            if($upd->execute()){
                                $updMat = dbConnect()->prepare("UPDATE rawmaterial SET qty=:mqt WHERE id =:inp");
                                $updMat->bindParam(':inp', $inp);
                                $updMat->bindParam(':mqt', $mqty);
                                if ($updMat->execute()) {
                                    $msg= "Raw Material has been added!";
                                    echo  " <script>alert('$msg'); window.location='production'</script>";
                                } else{
                                    $msg= "Oops!  Error Updating Material";
                                echo  " <script>alert('$msg'); window.location='production'</script>";
                                }
                            }else{
                                $msg= "Oops! cannot update production record!";
                                echo  " <script>alert('$msg'); window.location='production'</script>";
                                }
                        }else{
                            $msg= "There was problem processing the raw material ";
                            echo  " <script>alert('$msg'); window.location='production'</script>";
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
                        <table id="example23"
                            class="table no-wrap table-bordered m-t-30 table-hover contact-list"
                            data-paging="true" data-paging-size="7">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Input Cost</th>
                                    <th>Output Price</th>
                                    <th>Staff</th>
                                    <th>Raw Material</th>
                                    <th>Team Head</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $utp = dbConnect()->prepare("SELECT * FROM production JOIN product_category AS pc ON product=pc.id JOIN users ON operator = users.id");
                            $utp->execute();
                            $i = 0;
                            while($upt = $utp->fetch()){
                                $i++;
                                $cd = $upt['code'];
                                $uis =$upt['user'] ;
                               ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                               <?php echo $upt['name']; ?>
                            </td>
                            <td><?php echo number_format($upt['inputcost']) ?> </td>
                            <td><?php echo number_format($upt['outputprice']) ?></td>
                            <td><span class="label label-info"><?php 
//                                $ui = dbConnect()->prepare("SELECT fname,lname FROM users WHERE id=?");
//                                $ui->execute([$uis]);
//                                echo $ui->fetch()['fname'].' '. $ui->fetch()['lname'];
                            ?></span> </td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#MyRaw<?php echo $upt['id']; ?>" class="icon icon-plus text-success"></a>
                                <a href="input?code=<?php echo $cd;?>" class="icon icon-eye text-primary"> </a>
                            </td>
                            <td><?php echo $upt['fname']." ".$upt['lname'];?></td>
                            <td><span class="label label-info"><?php echo $upt['created'] ?></span> </td>
                        </tr>
                            <?php
                            include 'modalViewRawMaterial.php';
                        }?>
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


                
                
 <!-- Add Contact Popup Model -->
<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"
            aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Add New Production</h4>
    </div>
    <form class="form-horizontal form-material" method="POST">
    <div class="modal-body">
            <div class="col-md-12 m-b-20">
                <!-- <label>Select Product</label> -->
                <select name="product" id="product" class="form-control">
                    <option selected disabled>Select Product</option>
                    <?php
                        $getPrd = dbConnect()->prepare("SELECT * FROM product_category");
                        $getPrd->execute();
                        while ($prd = $getPrd->fetch()) {?>
                            <option value="<?php echo $prd['id']?>" data-mode="<?php echo $prd['payment_mode']?>" data-amt="<?php echo $prd['amount']?>">
                                <?php echo $prd['name']?>
                            </option>
                     <?php
                        }
                    ?>
                </select>
                 
            </div>

            <div class="col-md-12 m-b-20" style="display:none;">
                <label lblpay></label>
                <input type="number" class="form-control" id="payment" readonly> 
            </div>
            
            <div class="col-md-12 m-b-20">
                <label>Quantity To Produced</label>
                <input type="number" class="form-control" name="qty"> 
            </div>

            <div class="col-md-12 m-b-20" id="bag" style="display:none;">
                <label>Number of Bags</label>
                <input type="number" class="form-control" name="bags">
            </div>

            <div class="col-md-12 m-b-20">
                <select name="operator" class="form-control">
                    <?php
                        $getoprt = dbConnect()->prepare("SELECT * FROM users");
                        $getoprt->execute();
                        while ($prds = $getoprt->fetch()) {?>
                            <option value="<?php echo $prds['id']?>">
                                <?php echo $prds['fname']." ".$prds['lname']?>
                            </option>
                     <?php
                        }
                    ?>
                </select>
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
                                        
    <div id="myModal" class="modal fade in" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <from class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-12">Production Category</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    placeholder="type name"> </div>
                        </div>
                        
                    </from>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect"
                        data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-default waves-effect"
                        data-dismiss="modal">Cancel</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
        <?php include 'footer.php'; ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#product').on('change',function(){
            var mode = $('#product').find(':selected').attr('data-mode');
            if (mode =="Per Bag") {
                $('#bag').show();
            }else{
                $('#bag').hide();
            }
        })
    })
</script>