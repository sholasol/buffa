
<div id="view-staff<?php echo $t['id'];?>" class="modal fade in" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><?php echo $t['fname'] .' '. $t['lname']; ?></h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
                
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12 text-center">
                                <img src="<?php if(!empty($imgUser)){echo 'upload/'.$imgUser;}else{echo '../assets/images/users/4.jpg';}?>" alt="<?php echo $imgUser;?>" width="70" class="img-circle" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 m-b-20">
                             <label>First Name</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['fname']?>">
                                <input type="hidden" name="update_id" value="<?php echo $t['id']?>"/>
                          </div>
                            <div class="col-md-6 m-b-20">
                             <label>Last Name</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['lname']?>">
                           </div>
                            <div class="col-md-6 m-b-20">
                              <label>Email Address</label>
                              <input type="text" readonly class="form-control" value="<?php echo $t['email']?>">
                           </div>
                          <div class="col-md-6 m-b-20">
                            <label>Phone Number</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['phone']?>"> 
                          </div>
                          <div class="col-md-6 m-b-20">
                            <label>Designation</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['department']?>">
                          </div>
                          <div class="col-md-6 m-b-20">
                            <!-- <input type="date" name="dob" class="form-control"
                                placeholder="Date of Birth"> --> 
                                <label>Gender</label>
                             <input type="text" readonly class="form-control" value="<?php echo $t['gender']?>">
                          </div>
                          <div class="col-md-6 m-b-20">
                            <label>Qualifilation</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['qualification']?>">
                          </div>
                          <div class="col-md-6 m-b-20">
                             <label>Date of Birth</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['dob']?>">
                          </div>
                          <div class="col-md-6 m-b-20">
                             <label>Branch</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['branch']?>">
                          </div>
                          <div class="col-md-6 m-b-20">
                             <label>Salery</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['salary']?>">
                          </div>
                          <div class="col-md-6 m-b-20">
                             <label>Status</label>
                            <input type="text" readonly class="form-control" value="<?php if($t['status'] ==1){echo 'Active';}else{echo 'Offline';}?>">
                          </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
