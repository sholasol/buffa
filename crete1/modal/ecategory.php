
<div id="update-expenses<?php echo $rw['id'];?>" class="modal fade in" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title text-center" id="myModalLabel">Update Expenses</h4> 
               <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>
                
            </div>
           <form class="form-horizontal form-material" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $rw['id']?>">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                   name="exp_name"  placeholder="Expenses Name" required value="<?php echo $rw['name']?>"> 
                                        </div>

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
