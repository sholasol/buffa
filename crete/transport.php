<?php include 'header.php'; 
 if(isset($_GET['id'])){
        $sales_id = $_GET['id'];
        $getData = dbConnect()->prepare("SELECT * FROM sales_activity WHERE sales_id = ?");
        $getData->execute([$sales_id]);
        if($getData->rowCount() > 0){
            $row = $getData->fetch();
            $address = $row['address'];
            $cust_name = $row['cust_name'];
            $pnum = $row['phone'];
            $date = date("d-M-Y H:i:s", $row['date']);
            $total = $row['total'];
        } else{
            $address = '--------';
            $cust_name = '--------';
            $pnum = '--------';
            $date = '--------';
            $total = '---------';
        }
    }

if (isset($_POST['submit'])) {
	$driver  = check_input($_POST['driver']);
        
        $drv= dbConnect()->prepare("SELECT fname, lname FROM users WHERE id = ?");
        $drv->execute([$driver]);
        $r = $drv->fetch();
        
        $dname = $r['fname'].' '.$r['lname'];
        
	$cost    = check_input($_POST['cost']);
	$dest = check_input($_POST['address']);
        $dt = date('Y-m-d');
	$insert = dbConnect()->prepare("INSERT INTO transport (sales_id,cust_name,amount, driver_id, driver,destination,created) VALUES (?,?,?,?,?,?,?)");
	if ($insert->execute([$sales_id,$cust_name,$cost,$driver,$dname,$dest,$dt])) {
           $msg ="Transportation logistic is successfully created";
           echo "<script>alert('$msg'); window.location='transportLog'</script>"; 
        }else{
            $msg ="Oops! Operation failed pls try again";
          echo "<script>alert('$msg')</script>";
        }
	
        
        
		
}

function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>DELIVERY SERVICE </b></h3><hr>
                            <span class="text-left"><b>PHONE:</b></span>
                                
                            <span class="text-right"> <b><?php echo $pnum ?></b></span>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Description</th>
                                                    <th class="text-right">Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $getItems = dbConnect()->prepare("SELECT sold_items.product,sold_items.quantity,sold_items.unitPrice,production.product FROM sold_items JOIN production ON sold_items.product = production.id WHERE sales_id = ?");
                                                    $getItems->execute([$sales_id]);
                                                    $i = 0;
                                                    while ($items = $getItems->fetch()){
                                                        $i++;
                                                        //$total = 0;
                                                        $utotal = $items['quantity'] * $items['unitPrice'];
                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $i; ?></td>
                                                            <td><?php echo $items['product'];?></td>
                                                            <td class="text-right"><?php echo $items['quantity'];?></td>
                                                            
                                                        </tr>
                                                  <?php
                                                    
                                                 // $total = $total + $utotal;
                                                    }
                                                    //echo $total;
                                                ?>
                                                
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03">Customer</label>
                                            <input type="text" class="form-control" name="customer" value="<?php echo $cust_name ?>"  readonly>
                                           
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03">Cost</label>
                                            <input type="number" class="form-control" name="cost" placeholder="Cost of delivery"  required>
                                           
                                        </div>
                                        

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Driver/Vehicle</label>
                                            <select class="single-select form-control" required   name="driver">
                                    		<option selected disabled>Select Driver</option>
                                    		<?php 
                                                $css = dbConnect()->prepare("SELECT * FROM users WHERE role='driver' ");
                                                $css->execute();
                                                while($w = $css->fetch()){ ?>
                                                <option value="<?php echo $w['id']; ?>"> <?php echo $w['fname'].' '.$w['lname'] ?></option>
                                                <?php }?>
                                    	 </select>
                                            
                                        </div>

                                       
                                    </div>
                                    <div class="form-row">

                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">Destination</label>
                                            <textarea class="form-control" name="address"></textarea>
                                            
                                        </div>
                                       
                                    </div>
                                <div class="form-row">
                                   <button class="btn btn-info" type="submit" name="submit"> Save</button>
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

		html += ' <div class="form-group row"><div class="col-md-4 form-group"><select name="item-name[]" onchange="getProduct('+row_id+')" class="custom-input  single-select" data-row-id=row_'+row_id+' id=product_'+row_id+' ><option selected="" disabled="">Select Product</option><?php echo getProduct(); ?></select></div>';

		html += " <div class='col-md-2 form-group'><input type='text' id=qty_"+row_id+" name='qty[]' required='true' class=form-control custom-input onkeyup='getTotal("+row_id+")' > </div>";

		html +="<div class='col-md-2 form-group'><input type='text' id=unit_"+row_id+" required='true' name='unit[]' class='form-control custom-input'  readonly='readonly' >	</div>";

		html +="<div class='col-md-3 form-group'><input type='text' id=total_"+row_id+" required='true' name='total[]' class='form-control custom-input'  readonly='readonly' '>	</div>";


		html += '<div class="col-md-1 form-group"><button class="btn btn-danger" id="remove">X</button></div></div></span>';

		$('.items').append(html);

		$('.single-select').select2();

		
	});

	$(document).on('click', '#remove', function(){
  $(this).closest('span').remove();
 });	
	 

		$('.single-select').select2();

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
		    	// console.log(unit.val()+" "+row_id);	
		    }

		}

function getTotal(row_id){
	let price = Number($('#product_'+row_id).find(':selected').attr('data-amt'));
	let qty = Number($("#qty_"+row_id).val());
    let total = $("#total_"+row_id);
    let unit = $("#unit_"+row_id);

    totalAmount = (price*qty);
    unit.val(price.toFixed(2));
	total.val(totalAmount.toFixed(2))
}
	
</script>


</body>

</html>





