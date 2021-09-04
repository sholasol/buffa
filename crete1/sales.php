<?php include 'header.php'; 

if (isset($_POST['submit'])) {
	$name = $_POST['fname']." ".$_POST['lname'];
	$phone = $_POST['pnum'];
	$address =$_POST['address'];

	$items = $_POST['item-name'];
	$qty = $_POST['qty'];
	$unit = $_POST['unit'];
    $total = $_POST['total'];
    $status = 1;
    $year = date('Y');
    $month = date('m');
    $day = date('d');
	$date = strtotime(date("d-M-Y H:i:s"));
    $dis = $_POST['discount'];
    $net_amount = $_POST['net_amount'];
	$sales_id = 'BUF-CRE-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));

	$insert = dbConnect()->prepare("INSERT INTO sales_activity (sales_id,cust_name,address,phone,staffid,date,sales_status,year,month,day,discount,net_amount) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
	if ($insert->execute([$sales_id,$name,$address,$phone,$uid,$date,$status,$year,$month,$day,$dis,$net_amount])) {
		$tot = 0;
                
		foreach ($items as $i => $item) {
                    $tot = $tot + $total[$i];
                    
			$salesItem = dbConnect()->prepare("INSERT INTO sold_items (product,quantity,sales_id,unitPrice) VALUES (?,?,?,?)");
			$salesItem->execute([$item,$qty[$i],$sales_id,$unit[$i]]);

			$getAvailable = dbConnect()->prepare("SELECT available_prd FROM production WHERE id = ?");
			$getAvailable->execute([$item]);
			$aval =$getAvailable->fetch()['available_prd'];

			$bal = $aval - $qty[$i];

			$update = dbConnect()->prepare("UPDATE production SET available_prd = ? WHERE id = ?");
			$update->execute([$bal, $item]);

			
		}
                
                
	}if ($update) {
            $updateHis = dbConnect()->prepare("UPDATE sales_activity SET total = ? WHERE sales_id = ?");
            $updateHis->execute([$tot, $sales_id]);
                    $msg = "Sales Successfully Made";
                   // echo "<script>alert();window.location='';</script>";
            
                    echo  " <script>alert('$msg'); window.location='invoice?id=$sales_id'</script>";
        }else{
                    //$msg ="";
                    echo "<script>alert(Error Creating Sales. Try Again...)</script>";
            }
		
}
	function getProduct(){
		 include 'connect/connect.php';

		$output = '';
	$sel = dbConnect()->prepare("SELECT p.product,pc.name,p.unitPrice FROM production AS p JOIN product_category AS pc ON p.product = pc.id GROUP BY p.product");
		$sel->execute();
		if ($sel->rowcount()<1) {?>
			<option selected="" disabled="">No Available Product</option>
		<?php }else{
			while ($row = $sel->fetch()) {
			 $output .='<option value="'. $row['product'] .'" data-amt="'.$row['unitPrice'].'">  '.$row['name'].' </option>';
			
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
                                <h4 class="card-title">Make Sales</h4>
                                
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">First name</label>
                                            <input type="text" class="form-control" name="fname" required>
                                            
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Last Name</label>
                                            <input type="text" name="lname" class="form-control" required>
                                            
                                        </div>

                                       
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Phone Number</label>
                                            <input type="text" class="form-control" name="pnum"  required>
                                           
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Address</label>
                                            <textarea class="form-control" name="address"></textarea>
                                            
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
                                  
                                   	<div class="form-group col-md-4 ">
                                    	<select class="single-select form-control" required data-row-id="row_1" id="product_1" name="item-name[]" onchange="getProduct(1)">
                                    		<option selected disabled>Select Product</option>
                                    		<?php echo getProduct();?>
                                    	</select>
                                    </div>

                                    <div class="form-group col-md-2">
                                    	<input type="text" id="qty_1" name="qty[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" onkeyup="getTotal(1)">
                                    </div>

                                    <div class="form-group col-md-2">
                                    	<input type="text" id="unit_1" name="unit[]" readonly="" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3 ">
                                    	<input type="text" id="total_1" name="total[]" readonly="" class="form-control total">
                                    </div>

                                   </div>

                                   

                                  
                            </div>
                            

                            <div class="align-right">
                                <div class="form-group col-md-3 ">
                                    <label>Gross Amount</label>
                                    <input type="text" id="gross_total" name="gross_total" readonly="" class="form-control ">
                                </div>

                                 <div class="form-group col-md-3 ">
                                    <label>Discount</label>
                                    <input type="text" id="discount"  name="discount" class="form-control">
                                </div>

                                 <div class="form-group col-md-3 ">
                                    <label>Net Amount</label>
                                    <input type="text" id="net_amount" name="net_amount" readonly="" class="form-control ">
                                </div>
                           </div>
                                <div class="m-l-10">
                                    <button class="btn btn-primary" name="submit" type="submit">
                            	Submit form
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

        $(function () {
            $('#demo-foo-addrow').footable();
        });
    

	$(document).ready(function(){

	let count = "";
	let row_id = "";


	$('#add').click(function(){

		let count = $('select').length;
		let row_id = count+1;
			// console.log(count);
			// console.log(row_id)


		let html = "<span>";

		html += ' <div class="form-group row"><div class="col-md-4 form-group"><select name="item-name[]" onchange="getProduct('+row_id+')" class="custom-input  single-select form-control" data-row-id=row_'+row_id+' id=product_'+row_id+' ><option selected="" disabled="">Select Product</option><?php echo getProduct(); ?></select></div>';

		html += " <div class='col-md-2 form-group'><input type='text' id=qty_"+row_id+" name='qty[]' required='true' class=form-control custom-input onkeyup='getTotal("+row_id+")' > </div>";

		html +="<div class='col-md-2 form-group'><input type='text' id=unit_"+row_id+" required='true' name='unit[]' class='form-control custom-input'  readonly='readonly' >	</div>";

		html +="<div class='col-md-3 form-group'><input type='text' id=total_"+row_id+" required='true' name='total[]' class='form-control custom-input total'  readonly='readonly' '>	</div>";


		html += '<div class="col-md-1 form-group"><button class="btn btn-danger" id="remove">X</button></div></div></span>';

		$('.items').append(html);

		$('.single-select').select2();

		
	});

	$(document).on('click', '#remove', function(){
  $(this).closest('span').remove();
 });	
	 

		$('.single-select').select2();
        $('#discount').keyup(function(){
            getDiscount();
        });

	});

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
                getDiscount();
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
            // let net = $('#net_amount');
            // let grs = $('#gross_total');
            // let dis = $('#discount');
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
    getDiscount();
}
	
</script>


</body>

</html>





