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
                                <!-- .left-aside-column-->
                                <div class="left-aside bg-light-part">
                                    <ul class="list-style-none">
                                        <li class="box-label"><a href="javascript:void(0)">All Categories
                                                <span>123</span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="staff">Block <span>103</span></a></li>
                                        <li><a href="driver">Paving  Stone <span>19</span></a></li>
                                        <li><a href="suplier">Wheel Barrow <span>623</span></a></li>
                                        <li><a href="customer">Others <span>53</span></a></li>
                                        <li class="box-label"><a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#myModal" class="btn btn-info text-white">+ Create Production
                                                Category</a></li> 
                                    </ul>
                                </div>
                                <!-- /.left-aside-column-->
                                <div class="right-aside ">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">Production List </h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <?php 
                                        
                                        //Referal Code
                                        // function random_num($size) {
                                        //     $length = $size;
                                        //     $key = '';
                                        //     $keys = range(0, 5);

                                        //         for ($i = 0; $i < $length; $i++) {
                                        //                 $key .= $keys[array_rand($keys)];
                                        //         }
                                        //         return  $key;
                                        // }
                                        // $code= random_num(5);

                                        //if(isset($_POST['submit'])) {
                                            // $uid;
                                            // $code;
                                            // $date = date('Y-m-d');
                                            // $product = check_input($_POST['']);
                                            // $outp = check_input($_POST['']);
                                            // $uprice = check_input($_POST['']);
                                            // if(empty($product)){
                                            //     $msg= "product field required!";
                                            //     echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>

                                            //                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            //                     <span aria-hidden='true'>&times;</span>
                                            //                 </button>
                                            //                 <strong>Oops!</strong> $error.

                                            //             </div>";
                                            // }
                                            // 'product'    
                                            // 'outputqty ' 
                                            // 'unitPrice '  
                                            // 'user'      
                                            // 'code'    
                                            // 'created' 	 
                                            

                                                // $msg= "The production has been successfully created!";
                                                // echo  " <script>alert('$msg'); window.location='production'</script>"; 
                                               
                                            
                                                
                                          
                                    //} 
                                    // function check_input($data) {
                                    //     $data = trim($data);
                                    //     $data = stripslashes($data);
                                    //     $data = htmlspecialchars($data);
                                    //     return $data;
                                    //     }
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
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $utp = dbConnect()->prepare("SELECT * FROM production");
                                            $utp->execute();
                                            $i = 0;
                                            while($upt = $utp->fetch()){
                                                $i++;
                                            // $user = dbConnect()->query("SELECT * FROM production");
                                            // if(empty($user)){
                                            //     //echo 'No record in the database';
                                            // }else{
                                            //     $i = 0;
                                            //    while($prdt = $user->fetch()){
                                            //    $i++;
                                               ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                               <?php echo $upt['product'] ?>
                                            </td>
                                            <td><?php echo number_format($upt['inputcost']) ?></td>
                                            <td><?php echo number_format($upt['outputprice']) ?></td>
                                            <td><span class="label label-info"><?php echo $upt['user'] ?></span> </td>
                                            <td>
                                            <?php 
                                            $rwm = dbConnect()->prepare("SELECT material FROM rawmaterial WHERE ");
                                            echo $upt['product'] ?>
                                            </td>
                                            <td><span class="label label-info"><?php echo $upt['created'] ?></span> </td>
                                        </tr>
                                            <?php }?>
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
                                                    
                                                        <div class="form-group">
                                                                <label class="col-md-12">Select Product</label>
                                                                <div class="col-md-12">
                                                                    <select class="form-control" name="product">
                                                                        <option value="">-- Select --</option>
                                                                        <?php
                                                                        //    $dis = dbConnect()->query("SELECT * FROM product ");
                                                                        //    if(empty($dis)){
                                                                        //        echo 'No state in the database';
                                                                        //    }else{
                                                                        //       while($dis = $dis->fetch()){
                                                                           ?>
                                                                           <option><?php //echo $dis['product'] ?></option>
                                                                           <?php //} }?> 
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 m-b-20">
                                                                        <input type="number" class="form-control"
                                                                               name="qty"  placeholder="Quantity to Produce"> </div>
                                                            <div class="col-md-12 m-b-20">
                                                                        <input type="number" class="form-control"
                                                                               name="price"  placeholder="Unit Price"> </div>
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