
<div id="update-staff<?php echo  $t['id'];?>" class="modal fade in" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title text-center" id="myModalLabel">Update Staff Record</h4> 
               <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
                
            </div>
            <form method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <from class="form-horizontal form-material">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-md-12">First Name</label>
                            <div class="col-md-12">
                                <input type="text" name="fname" class="form-control" value="<?php echo $t['fname']?>">
                                <input type="hidden" name="update_id" value="<?php echo $t['id']?>"/>
                                    </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-12">Last Name</label>
                            <div class="col-md-12">
                                <input type="text" name="lname" class="form-control" value="<?php echo $t['lname']?>">
                                     
                            </div> 
                         </div>
                        <div class="col-md-12 m-b-20">
                            <input type="email"  name="email" class="form-control"
                                placeholder="Email" value="<?php echo $t['email']?>"> </div>
                        <div class="col-md-12 m-b-20">
                            <input type="<?php if(!empty($t['dob'])){echo 'text';}else{echo 'date';}?>"  name="dob" class="form-control"
                                placeholder="Date of Birth" value="<?php echo $t['dob']?>"> 
                        </div>
                        <div class="col-md-12 m-b-20">
                            <input type="text" name="phone" class="form-control"
                                placeholder="Phone" value="<?php echo $t['phone']?>"> </div>
                        <div class="col-md-12 m-b-20">
                                <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option <?php if($t['gender'] == 'Male'){echo 'selected';}?>>Male</option>
                                <option <?php if($t['gender'] == 'Female'){echo 'selected';}?>>Female</option>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <label>Qualification</label>
                            <select name="qual" class="form-control">
                                <option selected disabled value=""> </option>
                                <option <?php if($t['qualification'] == 'SSCE'){echo 'selected';}?>>SSCE</option>
                                <option <?php if($t['qualification'] == 'NCE'){echo 'selected';}?>>NCE</option>
                                <option <?php if($t['qualification'] == 'OND'){echo 'selected';}?>>OND</option>
                                <option <?php if($t['qualification'] == 'HND'){echo 'selected';}?>>HND</option>
                                <option <?php if($t['qualification'] == 'B.Sc'){echo 'selected';}?>>B.Sc</option>
                                <option <?php if($t['qualification'] == 'B.Tech'){echo 'selected';}?>>B.Tech</option>
                                <option <?php if($t['qualification'] == 'M.Sc'){echo 'selected';}?>>M.Sc</option>
                            </select>
                        </div>
                        <?php if($grp ==2){?>
                        <div class="col-md-12 m-b-20">
                            <label>Designation</label>
                            <input type="text" name="department" class="form-control" value="<?php echo $t['department']?>">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <label>Branch</label>
                            <select name="branch" class="form-control">
                            <?php
                            $br= dbConnect()->prepare("SELECT * FROM branch");
                            $br->execute();
                            while($b=$br->fetch()){
                            ?> <option <?php if($t['branch'] ==$b['name']){echo 'selected';}?>><?php echo $b['name']?></option>
                            <?php }?>
                        </select>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <input type="number"  name="salary" class="form-control"
                                placeholder="Salary" value="<?php echo $t['salary']?>"> 
                        </div>
                        
                        <div class="col-md-12 m-b-20">
                            <div
                                class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
                                <span><i class="ion-upload m-r-5"></i>Upload Contact
                                    Image</span>
                                <input type="file" name="upload" class="upload" value="<?php echo $t['image'];?>"> </div>
                        </div>
                    <?php }?>
                    </div>
                </from>
            </div>
            <div class="modal-footer">

                <button type="submit" name="updateStaffBtn" class="btn btn-info waves-effect"
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
