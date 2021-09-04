
<div id="update-expenses<?php echo $user->id;?>" class="modal fade in" tabindex="-1" role="dialog"
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
                                    <input type="hidden" name="id" value="<?php echo $user->id?>">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                   name="exp_name"  placeholder="Expenses Name" required value="<?php echo $user->expense_name?>"> 
                                        </div>

                                       <div class="form-group">
                                            <input type="date" class="form-control"
                                                   name="date" value="<?php echo $user->dateadded?>" placeholder="Date" required> 
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                   name="amount" value="<?php echo $user->amount?>" placeholder="Expenses Amount" required> 
                                        </div>

                                        <div class="form-group">
                                            <select name="paymentmode" class="form-control">
                                                <?php 
                                                    $val= $user->paymentmode;
                                                ?>

                                                <option <?php ($val=='Bank Deposit') ? print 'selected' : print "";?> >Bank Deposit</option>
                                                <option <?php ($val=='Cash') ? print 'selected' : print "";?>>Cash</option>
                                            </select> 
                                        </div>

                                         <div class="form-group">
                                            <label>Note</label>
                                            <textarea class="form-control" required name="note" style="border:1px solid;padding:10px;" rows="4"><?php echo $user->note?></textarea>
                                        </div>

                                        <div class="col-md-12 m-b-20">
                                           <select class="form-control single-select" name="employee">
                                               
                                               <?php
                                               $user = $user->clientid;
                                                    $getCat = dbConnect()->prepare("SELECT id,fname,lname FROM users WHERE department != ? OR department != ?");
                                                    $getCat->execute(['supplier', 'customer']);
                                                    while ($row=$getCat->fetch()) {
                                                        ?>
                                                        <option <?php ($user == $row['id']) ? print 'selected' : print "";?> value="<?php echo $row['id']?>"><?php echo $row['fname']." ".$row['lname']?></option>
                                                   <?php
                                                    }
                                               ?>
                                           </select>
                                        </div>

                                        <div class="col-md-12 m-b-20">
                                           <select class="single-select" required name="exp_cat">
                                               
                                               <?php
                                               $cat = $user->category;
                                                    $getCat = dbConnect()->prepare("SELECT id,name FROM expenses_categories");
                                                    $getCat->execute();
                                                    while ($row=$getCat->fetch()) {?>
                                                        <option <?php ($cat == $row['id']) ? print 'selected' : print "";?> value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                                   <?php
                                                    }
                                               ?>
                                           </select>
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
