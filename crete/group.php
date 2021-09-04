<?php include 'header.php'; 
if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$delete_role = dbConnect()->prepare("DELETE FROM role WHERE id = ?");
	if ($delete_role->execute([$id])) {
        echo  " <script>alert('DELETED!!!');window.location='group';</script>";
    }
}

if (isset($_GET['id'])) {
    $getRoleName = dbConnect()->prepare("SELECT role FROM role WHERE id = ?");
    $getRoleName->execute([$_GET['id']]);
    $getName = $getRoleName->fetch();
    $roleName = $getName['role'];

    if (isset($_POST['update_role'])) {
        $roleid = $_GET['id'];
        $role_name = $_POST['role'];
        $update_role_name = dbConnect()->prepare("UPDATE role SET role = ? WHERE id = ? ");
        $update_role_name->execute([$role_name, $roleid]);
        if($update_role_name){
            $delete_previous_menu = dbConnect()->prepare("DELETE FROM menu_permission WHERE role_id = ?");
            if ($delete_previous_menu->execute([$roleid])) {
                    if (!empty($_POST['menu_permission']) && is_array($_POST['menu_permission'])  ) {
                        foreach ($_POST['menu_permission'] as $menu => $value) {
                          $menu_permission = $_POST['menu_permission'][$menu];
                          (!isset($menu_permission))?$menu_permission=false:$menu_permission=true;
                          $menu_id = $_POST['menu_id'][$menu];

                          $addMenuSql = "INSERT INTO menu_permission (menu_id,status,role_id)VALUES(?,?,?)";
                          $addMenu = dbConnect()->prepare($addMenuSql);
                          $addMenu->execute([$menu_id,$menu_permission,$roleid]);
                          echo  " <script>window.location='group';</script>";
                        }
                    
                  }
            }
        }
    }
}



    if (isset($_POST['role_submit'])) {
        $role = $_POST['role'];
        $check = dbConnect()->prepare("SELECT * FROM role WHERE role = ?");
        $check->execute([$role]);
        if ($check->rowcount() > 0) {
            $msg= "Role Already Exists";
            echo  " <script>alert('$msg');</script>";
        }else{
        // in_array(needle, haystack);
            $insertRole = dbConnect()->prepare("INSERT INTO role (role)VALUES(?) ");
            if ($insertRole->execute([$role])) {
                $role_id = dbConnect()->lastinsertid();
                if (!empty($_POST['menu_permission']) && is_array($_POST['menu_permission'])  ) {
                    foreach ($_POST['menu_permission'] as $menu => $value) {
                      $menu_permission = $_POST['menu_permission'][$menu];
                      (!isset($menu_permission))?$menu_permission=false:$menu_permission=true;
                      $menu_id = $_POST['menu_id'][$menu];

                      $addMenuSql = "INSERT INTO menu_permission (menu_id,status,role_id)VALUES(?,?,?)";
                      $addMenu = dbConnect()->prepare($addMenuSql);
                      $addMenu->execute([$menu_id,$menu_permission,$role_id]);
                    }
                
              }
          }
                
    }
            
        }
?>


<style type="text/css">
    ul{
        list-style: none;
    }
</style>

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
                <div class="row mt-3">
                        <div class="card col-lg-6 col-md-12">
                            <!-- card start here -->
                            <div class="card-body">
                                <h4 class="card-title">Create new Role</h4>
                                    <!-- form-row start here -->
                                    <div class="form-row">
                                        <div class="col-sm-12 mb-3">
                                            <label for="validationCustom01">Role Name</label>
                                            <input type="text" class="form-control" name="role" required value="<?php isset($_GET['id']) ? print($roleName): print("");?>">
                                        </div>
                                        <!-- accordian starts here  -->
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                                  <ul>
                                        <?php 
                                        
                                        $getMenu = dbConnect()->prepare("SELECT * FROM menus WHERE parent_id = 0");
                                        $getMenu->execute();
                                        while ($menu = $getMenu->fetch()) {
                                            $class = "class".$menu['id'];
                                            $menuid = $menu['id'];
                                            if (isset($_GET['id'])) {
                                                $getPerm = dbConnect()->prepare("SELECT status FROM menu_permission WHERE menu_id = ? and role_id = ?");
                                                $getPerm->execute([$menuid, $_GET['id']]);
                                                $getStatus = $getPerm->fetch();
                                                $status = $getStatus['status'];
                                            }
                                            ?>
                                    <li>
                                        <div class="pb-3">
                                        <label class="custom-control custom-checkbox m-b-0">
                                            <input type="hidden" value="<?php echo($menuid)?>" name="menu_id[]">
                                            <input type="checkbox" value="<?php echo($menuid)?>"  class="custom-control-input " id="<?php echo $class; ?>" <?php if (isset($_GET['id'])) {
                                                $status==1 ?print("checked"):print("");
                                            }?> name="menu_permission[]">
                                            <span class="custom-control-label"><?php echo $menu['menu']?></span>
                                        </label>
                                        <ul>
                                            <?php
                                                $getSubMenu = dbConnect()->prepare("SELECT * FROM menus WHERE parent_id = ?");
                                                $getSubMenu->execute([$menuid]);
                                                while ($submenu = $getSubMenu->fetch()) {
                                                    $class = "class".$submenu['parent_id'];
                                                    if (isset($_GET['id'])) {
                                                    $getPerm->execute([$menuid, $_GET['id']]);
                                                    $getStatus = $getPerm->fetch();
                                                    $status = $getStatus['status'];
                                                }
                                                    ?>
                                            <li>
                                                <div class="pb-2">
                                                <label class="custom-control custom-checkbox m-b-0">
                                                    <input type="hidden" value="<?php echo($submenu['id'])?>" name="menu_id[]">
                                                    <input type="checkbox" value="<?php echo($submenu['id'])?>" name="menu_permission[]" <?php if (isset($_GET['id'])) {
                                                        $status==1 ?print("checked"):print("");
                                                    }?> class="<?php echo $class; ?> custom-control-input">
                                                    <span class="custom-control-label"><?php echo $submenu['menu']?></span>
                                                </label>
                                                </div>
                                            </li>
                                            <?php 
                                    }
                                    ?>
                                        </ul>
                                   <?php 
                                    }
                                    ?>
                                        </div>
                                    </li>

                                  </ul>
                              </div>
                          </div>
                        <?php if (!isset($_GET['id'])) { ?>
                              <div class="col-sm-12">
                                <input class="btn btn-success" type="submit" value="Submit Now" name="role_submit">
                              </div>
                           <?php 
                               }
                            ?>

                            <?php if (isset($_GET['id'])) { ?>
                                <div class="text-right col-sm-12">
                                <input class="btn btn-success" type="submit" value="Update Role" name="update_role">
                            </div>
                           <?php 
                               }
                            ?>
        
                          <!-- accordian ends here -->
                                     </div><!-- form row ends here -->
                             </div><!-- card ends here -->
                        </div>
                        <div class="card col-lg-6">
                            <div class="card mt-4 card-light">
                                <h4 class="card-title"> Role List </h4>
                                <div class="card">
                                    <div class="card-body" style="box-shadow:1px 2px 6px 3px #ccc;">
                                      <table class="table teable-stripped">
                                          <thead>
                                              <th>S/N</th>
                                              <th>Roles</th>
                                              <th>Actions</th>
                                          </thead>
                                          <tbody>
                                            <?php 
                                                $getrole = dbConnect()->prepare("SELECT * FROM role ");
                                                $getrole->execute();
                                                $i = 0;
                                                while ($row = $getrole->fetch()) {
                                                    $i++;
                                                ?>
                                                     <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['role']; ?></td>
                                                        <td>
                                                            <a class="text-success" href="?id=<?php echo $row['id'];?>">Edit</a> | 
                                                            <a href="?delete=<?php echo $row['id'];?>" onclick="confirm("Are you sure, you want to delete this role?")">Delete</a>
                                                        </td>
                                                     </tr>
                                            
                                            <?php 
                                               }
                                            ?>
                                             
                                          </tbody>
                                      </table>
                                    </div>
                                  </div>
                            </div>
                        </div>
                </div>



            </div>
        </div>
 </form>

                                        
         

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
    <script>
</script>


</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        $("input:checkbox").on('click', function(){
           var parent_id = $(this).attr('id');
           console.log(parent_id)
           if ($("#"+parent_id).prop("checked")) {
                $("."+parent_id).prop("checked", true)
           }else{
                $("."+parent_id).prop("checked", false)
           }
        })
    })
</script>





