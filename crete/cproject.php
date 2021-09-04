<?php include 'header.php'; 
//Process project member
if(isset($_POST['save'])){
                                           
                                            
    $tm= check_input($_POST['team']);
    $pj= check_input($_POST['proj']);

    if(empty($tm)){
        $msg= "Please select a team member ";

     echo  " <script>alert('$msg'); window.location='project'</script>";

    }else{
        $dbs= dbConnect()->prepare("INSERT INTO project_members SET p_id=:id,  staff=:tm");
        $dbs->bindParam(':id', $pj);
        $dbs->bindParam(':tm', $tm);
        if($dbs->execute()){
          $msg= "Member added successfully!";

           echo  " <script>alert('$msg'); window.location='project'</script>";
        }else{
            $msg= "Oops! cannot add project member!";

        echo  " <script>alert('$msg'); window.location='project'</script>";
        }
    }
}

if(isset($_POST['saved'])){
                                           
                                            
    $tsk= check_input($_POST['task']);
    $pj= check_input($_POST['proj']);
    $st= check_input($_POST['start']);
    $end= check_input($_POST['end']);
    $dsc= check_input($_POST['desc']);
    $pri= check_input($_POST['priority']);
    $ass=  implode(",", $_POST['ass']);
    $dt = date('Y-m-d');

    if(empty($tsk)){
        $msg= "Please enter task name ";

     echo  " <script>alert('$msg'); window.location='project'</script>";

    }elseif(empty($st)){
        $msg= "Please select task start date ";

     echo  " <script>alert('$msg'); window.location='project'</script>";

    }
    else{
        $dbs= dbConnect()->prepare("INSERT INTO tasks SET p_id=:id, name=:nm, assign=:ass, description=:dsc,
                 priority=:pri, created=:dt, start=:stt, end=:end");
        $dbs->bindParam(':id', $pj);
        $dbs->bindParam(':nm', $tsk);
        $dbs->bindParam(':ass', $ass);
        $dbs->bindParam(':dsc', $dsc);
        $dbs->bindParam(':pri', $pri);
        $dbs->bindParam(':dt', $dt);
        $dbs->bindParam(':stt', $st);
        $dbs->bindParam(':end', $end);
        if($dbs->execute()){
          $msg= "Task has been added successfully!";

           echo  " <script>alert('$msg'); window.location='project'</script>";
        }else{
            $msg= "Oops! cannot add project member!";

        echo  " <script>alert('$msg'); window.location='project'</script>";
        }
    }
}

if(isset($_POST['project'])){
    //Production Code
    //Student Code
    $length = 7;    
    $code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);



     if(empty($_POST['title'])){

            $msg= "Project title is required!";

            echo  " <script>alert('$msg');</script>";
        }
        if(empty($_POST['start'])){

            $msg= "Start date is required!";

            echo  " <script>alert('$msg');</script>";
        }
        if(empty($_POST['end'])){

            $msg= "End date is required!";

            echo  " <script>alert('$msg');</script>";
        }else{
            $dt =date('Y-m-d');
            $cs = check_input($_POST['customer']);
            $tit = check_input($_POST['title']);
            $dsc = check_input($_POST['desc']);
            $stt = check_input($_POST['start']);
            $end = check_input($_POST['end']);
            $sta = check_input($_POST['status']);


            //Insert project details
            $ins= dbConnect()->prepare("INSERT INTO projects SET customer=:cs, createdby=:by, project_title=:tit, status=:stt, start=:st, end=:end, created=:dt, descr=:dsc");
            $ins->bindParam(':cs', $cs);
            $ins->bindParam(':by', $uid);
            $ins->bindParam(':tit', $tit);
            $ins->bindParam(':stt', $sta);
            $ins->bindParam(':st', $stt);
            $ins->bindParam(':end', $end);
            $ins->bindParam(':dt', $dt);
            $ins->bindParam(':dsc', $dsc);
            if($ins->execute()){
                $msg= "The project has been successfully created!";

                  echo  " <script>alert('$msg'); window.location='project'</script>"; 
            }else{
                $msg= "Oops!";

                  echo  " <script>alert('$msg'); window.location='project'</script>"; 
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
    $getcount = dbConnect()->prepare("SELECT count(p_id) as total FROM projects WHERE status = ? ");
    $getcount->execute([$value]);
    $gc = $getcount->fetch();
    return $gc['total'];
}

?>
<style type="text/css">
    .assignedto li {
        list-style: none;
        display: inline;
    }
    .assignedto img{
        border-radius: 50%;
    }
</style>
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
                        <h4 class="text-themecolor">Projects</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Projects</li>
                            </ol>
                            <button type="button" data-toggle="modal" data-target="#add-contact" class="btn btn-info d-none d-lg-block m-l-15"><i
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
                                <h4 class="card-title">Project List</h4>
                                <h6 class="card-subtitle">Projects</h6>
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
                                                <th></th>
                                                <th>Title</th>
                                                <th>Budget</th>
                                                <th>Status</th>
                                                <th>Team</th>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Task</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $user = dbConnect()->prepare("SELECT * FROM projects WHERE status=2");
                                            $user ->execute();
                                                $i = 0;
                                             while($rw= $user->fetch()){
                                               $i++;
                                               $pid = $rw['p_id'];
                                               $cid = $rw['createdby'];
                                               $usr = $rw['customer'];

                                               $taskCount = dbConnect()->prepare("SELECT COUNT(id) AS task_c FROM tasks WHERE p_id = '$pid'");
                                               $taskCount->execute();
                                               $task = $taskCount->fetch()['task_c'];
                                               
                                               // Affliate
                                                $dbx = dbConnect()->prepare("SELECT fname, lname, phone FROM users WHERE id='$usr'");
                                                $dbx->execute();
                                                $ry = $dbx->fetch();
                                                $staff = $ry['fname'].' '.$ry['lname'];
                                                $aphone = $ry['phone'];
                                               ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i; ?>
                                                </td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#MyRaw<?php echo $i; ?>" title="Add Team Member" class="icon icon-user text-success"></a>&nbsp;&nbsp;
                                                    <a href="" data-toggle="modal" data-target="#MyTask<?php echo $i; ?>" title="Add Task" class="ti-layout-accordion-merged text-success"></a>
                                                    <a data-toggle="modal" data-target="#MyExp<?php echo $i; ?>" class="ti-wallet text-info" title="Add Project Expenses"></a>
                                                </td>
                                                <td>
                                                    <a  class="text-black">
                                                        <?php echo $rw['project_title']; ?>
                                                    </a><!--<br>
                                                    <small><?php echo $user->created; ?></small>-->
                                                </td>
                                                <td><?php echo $rw['budget']; ?></td>
                                                <td><?php if($rw['status']==0){
                                                        echo("Pending");
                                                } else if ($rw['status']==1){
                                                        echo("Ongoing");
                                                }else{
                                                    echo("Completed");
                                                }?></td>
                                                <td>
                                                    <ul class="assignedto">
                                                    <?php
                                                    /*
                                                    $dbd = dbConnect()->prepare("SELECT * FROM project_members  WHERE  project_id = ?");
                                                    $dbd->execute([$pid]);
                                                    $prdm = $dbd->fetch();
                                                    $sti = $prdm['staff_id'];
                                                    while($rd = $dbd->fetch()){
                                                        $usd = dbConnect()->prepare("SELECT image, lname, fname FROM users WHERE id=?");
                                                        $usd->execute([$sti]);
                                                        $umg = $usd->fetch();?>
                                                        <li><img src="upload/<?php echo $umg['image']?>" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $umg['fname']." ".$umg['lname']?>"></li>
                                                    
                                                     <?php } */ ?>
                                                </ul>
                                                </td>
                                                <td><span class="text-success"><?php echo $rw['start']; ?></span> </td>
                                                <td><span class="text-danger"><?php echo $rw['end']; ?></span> </td>
                                                <td>
                                                    <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#MyTask<?php echo $i; ?>">
                                                        Add <span class="badge badge-light"><i class="icon icon-plus"></i></span>
                                                    </a>
                                                    <a href="projTask?pid=<?php echo $pid;?>"  class="btn btn-primary btn-sm">
                                                       View Tasks <span class="badge badge-light"><?php echo $task?></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!--Modal for raw material-->
                                            <div id="MyExp<?php echo $i; ?>" class="modal fade in" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Project Expenses</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×</button>
                                                        </div>
                                                       <form class="form-horizontal" method="POST">
                                                           <input type="hidden" name="proj" value="<?php echo $user->p_id; ?>"/>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="col-md-12">Project</label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" name=""  class="form-control"
                                                                           value="<?php echo $user->project_title ?>" readonly> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-12">Expense Name</label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" name="exp"  class="form-control" required> 
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-md-12">Amount</label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" name="amt"  class="form-control" required/> 
                                                                    </div>
                                                                </div>
                                                                 
                                                                <div class="form-group">
                                                                    <select class="form-control" name="cat" required>
                                                                        <option value="">-- Expense Category --</option>
                                                                        <?php
                                                                           $dis = dbConnect()->prepare("SELECT * FROM expenses_categories ");
                                                                            while($ro= $dis->fetch()){
                                                                           ?>
                                                                           <option><?php echo $ro['name']; ?></option>
                                                                           <?php } ?> 
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="save" class="btn btn-info waves-effect">Add Member</button>
                                                                <button type="button" class="btn btn-default waves-effect"
                                                                    data-dismiss="modal">Cancel</button>
                                                            </div>
                                                    </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div><!--End Modal -->
                                            <!--Modal for raw material-->
                                            <div id="MyRaw<?php echo $i; ?>" class="modal fade in" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Project Team Member</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×</button>
                                                        </div>
                                                       <form class="form-horizontal" method="POST">
                                                           <input type="hidden" name="proj" value="<?php echo $user->p_id; ?>"/>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="col-md-12">Product</label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" name=""  class="form-control"
                                                                           value="<?php echo $user->project_title ?>" readonly> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select class="form-control" name="team" required>
                                                                        <option value="">-- Team Member --</option>
                                                                        <?php
                                                                           $dis = dbConnect()->prepare("SELECT * FROM users ");
                                                                           $dis ->execute();
                                                                           while($ro= $dis->fetch()){
                                                                           ?>
                                                                           <option value="<?php echo $ro['id']; ?>"><?php echo $ro['fname'].' '.$ro['lname'] ?></option>
                                                                           <?php } ?> 
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="save" class="btn btn-info waves-effect">Add Member</button>
                                                                <button type="button" class="btn btn-default waves-effect"
                                                                    data-dismiss="modal">Cancel</button>
                                                            </div>
                                                    </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div><!--End Modal -->
                                            
                                            
                                            <!--Modal for raw material-->
                                            <div id="MyTask<?php echo $i; ?>" class="modal fade in" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Add Task</h4>
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
                                                                <select class="select2 m-b-10 select2-multiple" name="ass" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                                                <?php
                                                                   $dis = dbConnect()->prepare("SELECT * FROM users ");
                                                                   $dis ->execute();
                                                                    while($ro = $dis->fetch()){
                                                                   ?>
                                                                <option><?php echo $ro['fname'].' '.$ro['lname'] ?></option>
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
                                            </div><!--End Modal -->
                                            <?php }  ?>
                                        </tbody> 
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                   <?php 
                                        /*
                                                    //Production Code
                                                    //Student Code
                                                    $length = 7;    
                                                    $code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);


                                                    if(Input::exists()) {
                                                    if(Token::check(Input::get('token'))){
                                                        $validate = new Validate();
                                                        $validation = $validate->check($_POST, array(
                                                          'title' => array(
                                                            'required'  => true
                                                        ),
                                                            'customer' => array(
                                                            'required'  => true
                                                        ),
                                                            'start' => array(
                                                            'required'  => true
                                                        )
                                                    ));

                                                    if($validation->passed()){
                                                        //if validation passes
                                                        $user = new User();
                                                        $dt =date('Y-m-d');
                                                        $cs = Input::get('customer');
                                                        $tit = Input::get('title');
                                                        $dsc = Input::get('desc');
                                                        $stt = Input::get('start');
                                                        $end= Input::get('end');
                                                        $sta= Input::get('status');
                                                        
                                                        //$ins= dbConnect()->prepare("INSERT INTO projects SET customer=:cs, createdby=:by,  project_title=:tit, project_desc=:dsc, start_time=:st, end_time=:end,  created=:dt");
                                                        $ins= dbConnect()->prepare("INSERT INTO projects SET customer=:cs, createdby=:by, project_title=:tit, status=:stt, start=:st, end=:end, created=:dt, descr=:dsc");
                                                        $ins->bindParam(':cs', $cs);
                                                        $ins->bindParam(':by', $uid);
                                                        $ins->bindParam(':tit', $tit);
                                                        $ins->bindParam(':stt', $sta);
                                                        $ins->bindParam(':st', $stt);
                                                        $ins->bindParam(':end', $end);
                                                        $ins->bindParam(':dt', $dt);
                                                        $ins->bindParam(':dsc', $dsc);
                                                        if($ins->execute()){
                                                            $msg= "The project has been successfully created!";

                                                              echo  " <script>alert('$msg'); window.location='project'</script>"; 
                                                        }else{
                                                            $msg= "Oops!";

                                                              echo  " <script>alert('$msg'); window.location='project'</script>"; 
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

                                                    */
                                                    ?> 
                                                </td>
                                                
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
    
    
    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">New
                        Project</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                <form method="POST">
                <div class="modal-body">
                    <from class="form-horizontal form-material">
                        <div class="form-group">
                           <div class="col-md-12 m-b-20">
                                <input type="text" name="title" class="form-control" placeholder="Project Title" required> 
                           </div>
                            <div class="col-md-12 m-b-20">
                                <select class="form-control" name="customer" required>
                                    <option value="">-- Customer --</option>
                                    <?php
                                       $dis = dbConnect()->prepare("SELECT * FROM users ");
                                       $dis->execute();
                                       while($ro = $dis->fetch()){
                                       ?>
                                    <option value="<?php echo $ro['id'] ?>"><?php echo $ro['fname'].' '.$ro['lname'] ?></option>
                                       <?php } ?> 
                                 </select>
                            </div>
                            <div class="col-md-12 m-b-20">
                                <select type="text" name="status"  class="form-control" required>
                                    <option value="">- Select -</option>
                                    <option>Started</option>
                                    <option>Ongoing</option>
                                    <option>Completed</option>
                                    <option>On hold</option>
                                    <option>Cancel</option>
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
                    </from>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="project" class="btn btn-info waves-effect"
                    >Save</button>
                    <button type="button"
                        class="btn btn-default waves-effect"
                        data-dismiss="modal">Cancel</button>
                </div>
            </div>
                </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
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
    
    
    <!-- Plugin JavaScript -->
    <script src="../assets/node_modules/moment/moment.js"></script>
    <script src="../assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="../assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="../assets/node_modules/jquery-asColor/dist/jquery-asColor.js"></script>
    <script src="../assets/node_modules/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="../assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="../assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
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
    // MAterial Date picker    
    $('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#ndate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
    $('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });

    $('#min-date').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', minDate: new Date() });
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // -------------------------------
    // Start Date Range Picker
    // -------------------------------

    // Basic Date Range Picker
    $('.daterange').daterangepicker();

    // Date & Time
    $('.datetime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });

    //Calendars are not linked
    $('.timeseconds').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        timePicker24Hour: true,
        timePickerSeconds: true,
        locale: {
            format: 'MM-DD-YYYY h:mm:ss'
        }
    });

    // Single Date Range Picker
    $('.singledate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    // Auto Apply Date Range
    $('.autoapply').daterangepicker({
        autoApply: true,
    });

    // Calendars are not linked
    $('.linkedCalendars').daterangepicker({
        linkedCalendars: false,
    });

    // Date Limit
    $('.dateLimit').daterangepicker({
        dateLimit: {
            days: 7
        },
    });

    // Show Dropdowns
    $('.showdropdowns').daterangepicker({
        showDropdowns: true,
    });

    // Show Week Numbers
    $('.showweeknumbers').daterangepicker({
        showWeekNumbers: true,
    });

     $('.dateranges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });

    // Always Show Calendar on Ranges
    $('.shawCalRanges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        alwaysShowCalendars: true,
    });

    // Top of the form-control open alignment
    $('.drops').daterangepicker({
        drops: "up" // up/down
    });

    // Custom button options
    $('.buttonClass').daterangepicker({
        drops: "up",
        buttonClasses: "btn",
        applyClass: "btn-info",
        cancelClass: "btn-danger"
    });

    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });

    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
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