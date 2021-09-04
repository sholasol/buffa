
<div id="view-staff<?php echo $t['id'];?>" class="modal fade in" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><?php echo $t['name'] ?></h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
                
            </div>
            <div class="modal-body">
                    <div class="form-group">

                        <div class="form-row">
                            <div class="col-md-12 m-b-20">
                             <label>Full Name</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['name']?>">
                                <input type="hidden" name="update_id" value="<?php echo $t['id']?>"/>
                          </div>

                            <div class="col-md-12 m-b-20">
                              <label>Email Address</label>
                              <input type="text" readonly class="form-control" value="<?php echo $t['email']?>">
                           </div>
                          <div class="col-md-6 m-b-20">
                            <label>Phone Number</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['phonenumber']?>"> 
                          </div>
                          <div class="col-md-6 m-b-20">
                            <label>Status</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['ranks']?>">
                          </div>

                          <div class="col-md-6 m-b-20"> 
                                <label>Gender</label>
                             <input type="text" readonly class="form-control" value="<?php echo $t['gender']?>">
                          </div>
                          
                          
                          <div class="col-md-6 m-b-20">
                             <label>Branch</label>
                            <input type="text" readonly class="form-control" value="<?php echo $t['branches']?>">
                          </div>

                          <div class="col-md-12 mb-3">
                            <label for="validationCustom03">Note</label>
                            <textarea rows="5" readonly class="textarea_editor form-control" name="desc"><?php echo $t['description']?></textarea>
                            
                        </div>
                          
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
