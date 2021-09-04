<?php include 'header.php'; 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $getDetails = dbConnect()->prepare("SELECT * FROM sales_activity WHERE sales_id = ?");
        $getDetails->execute([$id]);
        if ($getDetails->rowcount() > 0) {
            $fetch = $getDetails->fetch();
            $cust_name = $fetch['cust_name'];
            $phone = $fetch['phone'];
            $address = $fetch['address'];
            $dis = $fetch['discount'];
            $net = $fetch['net_amount'];
        }
    }

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $sales = 1;
    $cust_name = $_POST['cname'];
    $pnum = $_POST['pnum'];
    $address = $_POST['address'];
    $discount = $_POST['discount'];
    $total = $_POST['gross_total'];
    $net_amount = $_POST['net_amount'];

    $items = $_POST['item-name'];
    $qty = $_POST['qty'];
    $unit = $_POST['unit'];

	$updateSales = dbConnect()->prepare("UPDATE sales_activity SET total = ?, cust_name = ?, phone = ?, address = ?, discount = ?, net_amount = ?, sales_status = ? WHERE sales_id = ?");
    $updateSales->execute([$total, $cust_name, $pnum, $address, $discount, $net_amount, $sales, $id]);


    foreach ($items as $i => $item) {
        $getItems = dbConnect()->prepare("SELECT * FROM sold_items WHERE product = ? AND sales_id = ?");
        $getItems->execute([$item, $id]);
        if ($getItems->rowcount()>0) {
            $updateItems = dbConnect()->prepare("UPDATE sold_items SET quantity = ? WHERE product = ? AND sales_id = ?");
            $updateItems->execute([$qty[$i], $item, $id]);

            $getAvailable = dbConnect()->prepare("SELECT available_prd FROM production WHERE id = ?");
            $getAvailable->execute([$item]);
            $aval =$getAvailable->fetch()['available_prd'];

            $bal = $aval - $qty[$i];

            $update = dbConnect()->prepare("UPDATE production SET available_prd = ? WHERE id = ?");
            $update->execute([$bal, $item]);

        }else{
                    
            $salesItem = dbConnect()->prepare("INSERT INTO sold_items (product,quantity,sales_id,unitPrice) VALUES (?,?,?,?)");
            $salesItem->execute([$item,$qty[$i],$id,$unit[$i]]);

            $getAvailable = dbConnect()->prepare("SELECT available_prd FROM production WHERE id = ?");
            $getAvailable->execute([$item]);
            $aval =$getAvailable->fetch()['available_prd'];

            $bal = $aval - $qty[$i];

            $update = dbConnect()->prepare("UPDATE production SET available_prd = ? WHERE id = ?");
            $update->execute([$bal, $item]);
        }
            
    }

    if ($update) {
        $msg = "Sales Successfully Made";
        echo  " <script>alert('$msg'); window.location='invoice?id=$id'</script>";
    }else{
        echo "<script>alert(Error Creating Sales. Try Again...)</script>";
        }
    
		
}
	function getProduct($prd){
		$output = '';
	    $sel = dbConnect()->prepare("SELECT * FROM production ");
		$sel->execute();
		if ($sel->rowcount()<1) {?>
		<?php }else{
			while ($row = $sel->fetch()) {
                // $selected = "";
                // if ($prd == $row['id']) {
                //     $selected = "selected";
                // }
                 $selected = ($prd==$row['id']) ? ($selected = "selected") : ($selected = "");
			 $output .='<option '.$selected.' value="'. $row['id'] .'" data-amt="'.$row['unitPrice'].'">  '.$row['product'].' </option>';
			
			}
		}
		return $output;
}

function addProduct(){
        $output = '';
    $sel = dbConnect()->prepare("SELECT * FROM production ");
        $sel->execute();
        if ($sel->rowcount()<1) {?>
            <option selected="" disabled="">No Available Product</option>
        <?php }else{
            while ($row = $sel->fetch()) {
             $output .='<option value="'. $row['id'] .'" data-amt="'.$row['unitPrice'].'">  '.$row['product'].' </option>';
            
            }
        }
        return $output;
}

	
?>



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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sales <?php echo $id;?></h4>
                                
                                    <div class="form-row">

                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">Customer</label>
                                            <input type="text" class="form-control" name="cname" readonly value="<?php echo $cust_name?>">
                                            
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Phone Number</label>
                                            <input type="text" class="form-control" name="pnum"  readonly value="<?php echo $phone?>">
                                           
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">Address</label>
                                            <textarea class="form-control" name="address" readonly><?php echo $address?></textarea>
                                            
                                        </div>
                                       
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-1">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body ">
                                <div class="text-right">
                                    <span id="add" class="btn btn-info" style="cursor:pointer;border:1px solid;padding:10px;">+</span>
                                </div>
                                <div class="card-body items">
                                	<div class="row ">
                                           
                                            <div class="col-md-4">Products</div>
                                            
                                            <div class="col-md-2">Quantity</div>
                                            
                                            <div class="col-md-2">Unit Price</div>
                                            
                                            <div class="col-md-3">Total</div>
                                            
                                            <div class="col-md-1"></div>
                                    </div>
                                  
                                   	<?php
                                        $getItems = dbConnect()->prepare("SELECT * FROM sold_items WHERE sales_id = ?");
                                        $getItems->execute([$id]);
                                        $i = 0;
                                        $gross_total = 0;
                                        while ($items = $getItems->fetch()) {
                                            $prd = $items['product'];
                                            $qty = $items['quantity'];
                                            $up = $items['unitPrice']; 
                                            $total = $up * $qty;
                                            // $total = number_format($total);
                                            $i++;
                                            $gross_total += $total;
                                        ?>
                                        <div class="row ">
                                            
                                            <div class="form-group col-md-4 ">
                                        <select class="single-select" required data-row-id="row_<?php echo $i?>" id="product_<?php echo $i?>" name="item-name[]" onchange="getProduct(<?php echo $i;?>)">
                                            <?php echo getProduct($prd);?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <input type="text" id="qty_<?php echo $i?>" name="qty[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" onkeyup="getTotal(<?php echo $i;?>)" value="<?php echo $qty?>">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <input type="text" id="unit_<?php echo $i?>" value="<?php echo $up?>" name="unit[]" readonly="" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3 ">
                                        <input type="text" id="total_<?php echo $i?>" value="<?php echo ($total)?>" name="total[]" readonly="" class="form-control total">
                                    </div>

                                   </div>
                                      <?php  }

                                    ?>

                                  
                            </div>


                           <div class="right-align">
                                <div class="form-group col-md-3 ">
                                    <label>Gross Amount</label>
                                    <input type="text" id="gross_total" value="<?php echo $gross_total?>" name="gross_total" readonly="" class="form-control ">
                                </div>

                                 <div class="form-group col-md-3 ">
                                    <label>Discount</label>
                                    <input type="text" id="discount"  name="discount" class="form-control" value="<?php echo $dis?>">
                                </div>

                                 <div class="form-group col-md-3 ">
                                    <label>Net Amount</label>
                                    <input type="text" id="net_amount" name="net_amount" readonly="" class="form-control" value="<?php echo $net?>">
                                </div>
                           </div>
                            
                                <div class="m-l-10">
                                    <button class="btn btn-primary" name="submit" type="submit">
                            	Update Sales
                            </button> 
                                </div>  
                        </div>

                        
                        </div>
                    </div>
                </div>

                




            </div>

         </div>
         </form>	

<?php //include 'footer.php'; ?>

<script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<script>
       
    $(document).ready(function(){
        // alert('hello');

        let count = "";
    let row_id = "";

$('#add').click(function(){

        let count = $('select').length;
        let row_id = count+1;
            // console.log(count);
            // console.log(row_id)


        let html = "<span>";

        html += ' <div class="form-group row"><div class="col-md-4 form-group"><select name="item-name[]" onchange="getProduct('+row_id+')" class="custom-input  single-select" data-row-id=row_'+row_id+' id=product_'+row_id+' ><option selected="" disabled="">Select Product</option><?php echo addProduct(); ?></select></div>';

        html += " <div class='col-md-2 form-group'><input type='text' id=qty_"+row_id+" name='qty[]' required='true' class=form-control custom-input onkeyup='getTotal("+row_id+")' > </div>";

        html +="<div class='col-md-2 form-group'><input type='text' id=unit_"+row_id+" required='true' name='unit[]' class='form-control custom-input'  readonly='readonly' >   </div>";

        html +="<div class='col-md-3 form-group'><input type='text' id=total_"+row_id+" required='true' name='total[]' class='form-control custom-input total'  readonly='readonly' '>    </div>";


        html += '<div class="col-md-1 form-group"><button class="btn btn-danger" id="remove">X</button></div></div></span>';

        $('.items').append(html);

        $('.single-select').select2();

        
    });
   

    $(document).on('click', '#remove', function(){
  $(this).closest('span').remove();
  total_amount();
 });    
     

        $('.single-select').select2();
        $('#discount').keyup(function(){
            getDiscount();
        });
        // let discount = document.getElementById('discount');
        // discount.addEventListener('keyup', ()=>{
        //     getDiscount()
        // })

    });
    // $('#discount').on('key')

        function getProduct (row_id){
            let price = $('#product_'+row_id).find(':selected').attr('data-amt');
            let product_id = $('#product_'+row_id).val();    
            let qty = $("#qty_"+row_id);
            let total = $("#total_"+row_id);
            let unit = $("#unit_"+row_id);
            if (product_id == "") {
                qty.val() = "";
                total.val() = "";
                unit.val() = "";
            }

            else{

                qty.val(1);
                let amount = Number(price);
                total.val(amount.toFixed(2));
                unit.val(amount.toFixed(2));
                total_amount();
                // console.log(unit.val()+" "+row_id);  
            }

        }
        function getDiscount(){
            let gross_total = $('#gross_total').val();
            let discount = $('#discount').val();
            let net_amount = $('#net_amount');

            net_amount.val(gross_total - discount);
        }

        function total_amount(){
            let sum = 0;
            $('.total').each(function(){
                var num = $(this).val();
                // console.log(this);
                if (num !== 0) {
                    sum += parseFloat(num);
                }
            });
            $('#gross_total').val(sum.toFixed(2));
            $('#net_amount').val("");
            $('#discount').val("");
        }

function getTotal(row_id){
    let price = Number($('#product_'+row_id).find(':selected').attr('data-amt'));
    let qty = Number($("#qty_"+row_id).val());
    let total = $("#total_"+row_id);
    let unit = $("#unit_"+row_id);

    totalAmount = (price*qty);
    unit.val(price.toFixed(2));
    total.val(totalAmount.toFixed(2));
    total_amount();
}


    </script>
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





