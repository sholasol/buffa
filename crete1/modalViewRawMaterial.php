<!--Modal for raw material-->
<div id="MyRaw<?php echo $upt['id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Input</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
           <form class="form-horizontal" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-12">Product</label>
                        <div class="col-md-12">
                            <input type="hidden" name="product"  class="form-control"
                               value="<?php echo $upt['product'] ?>" readonly> 
                            <input type="text"  class="form-control"
                               value="<?php echo $upt['name'] ?>" readonly> 
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="input" required>
                            <option value="">-- Input material --</option>
                            <?php
                               $dis = dbConnect()->query("SELECT * FROM rawMaterial ");
                               if(empty($dis)){
                                   echo 'No state in the database';
                               }else{
                                  while($di = $dis->fetch()){
                               ?>
                               <option value="<?php echo $di['id'] ?>"><?php echo $di['material'] ?></option>
                               <?php } }?> 
                         </select>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Quantity</label>
                        <div class="col-md-12">
                            <input type="number" name="qty" class="form-control" placeholder="Input Quantity" required> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn-info waves-effect">Save</button>
                    <button type="button" class="btn btn-default waves-effect"
                        data-dismiss="modal">Cancel</button>
                </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>                                      













      