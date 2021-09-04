   <?php
	include('core/init.php');
	// echo($_POST['filter']);
	if(isset($_POST['value'])){
		$value = $_POST['value'];
		$allSales = dbConnect()->prepare("SELECT * FROM sales_activity");
		$allSales->execute();
		$response = '';
		while ($getdate = $allSales->fetch()) {
			if ($value == 'week') {
				$ddate = date('Y-m-d');
				$date = new DateTime($ddate);
				$curr_week = $date->format("W");


				$salesDate = date('d-m-y h:i:s a', $getdate['date']);
				$getWeek = new DateTime($salesDate);
				$salesWeek = $getWeek->format('W');
				if ($curr_week+1 == $salesWeek) {?>
					<!-- <table id="example23" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                    <!- <th>#</th> --
                                                    <th>Sales ID</th>
                                                    <th>Customers</th>
                                                    <th>Staff</th>
                                                    <th>Total </th>
                                                    <th>Item Boughts</th>
                                                    <th>Date & Time</th>
                                                    <!-- <th style="width:40px;">Action</th>
                                                    <th>Delivery</th> --
                                                    
                                                </tr>
                                            </thead>
                                            <tbody> -->
					<!-- echo" -->
						<tr>
							<td><?php echo $getdate['sales_id'] ?></td>
							<td><?php echo $getdate['cust_name'] ?></td>
							<td>
                                <?php 
                                    $staffid = $getdate['staffid'];
                                    $getName = dbConnect()->prepare("SELECT fname, lname FROM users WHERE id = ?");
                                   $getName->execute([$staffid]);
                                   $get = $getName->fetch();
                                   $name = $get['fname']." ".$get['lname'];
                                   echo $name;
                                ?>
                            </td>
							<td><?php echo $getdate['total'] ?></td>
							<td>
								<?php 
                                    $sales_id2 = $getdate['sales_id'];
                                    $getprd2 = dbConnect()->prepare("SELECT sold_items.product,production.product FROM sold_items JOIN production ON sold_items.product = production.id WHERE sales_id = ? ");
                                    $getprd2->execute([$sales_id2]);
                                    while ($row = $getprd2->fetch()) {?>
                                      <span class="label label-info"> <?php echo $row['product'];?></span>
                                <?php 
                              		 }
                                 ?>
                            </td>
							<td><?php echo $salesDate ?></td>
						</tr>
					<!-- "; -->
				<?php
			}
				// echo $salesWeek." ".$curr_week."<br>";
			} else if ($value == 'today') {
				$today = date('d');
				$salesDay = date('d', $getdate['date']);

				if ($today == $salesDay) {?>
					<tr>
							<td><?php echo $getdate['sales_id'] ?></td>
							<td><?php echo $getdate['cust_name'] ?></td>
							<td>
                                <?php 
                                    $staffid = $getdate['staffid'];
                                    $getName = dbConnect()->prepare("SELECT fname, lname FROM users WHERE id = ?");
                                   $getName->execute([$staffid]);
                                   $get = $getName->fetch();
                                   $name = $get['fname']." ".$get['lname'];
                                   echo $name;
                                ?>
                            </td>
							<td><?php echo $getdate['total'] ?></td>
							<td>
								<?php 
                                    $sales_id2 = $getdate['sales_id'];
                                    $getprd2 = dbConnect()->prepare("SELECT sold_items.product,production.product FROM sold_items JOIN production ON sold_items.product = production.id WHERE sales_id = ? ");
                                    $getprd2->execute([$sales_id2]);
                                    while ($row = $getprd2->fetch()) {?>
                                      <span class="label label-info"> <?php echo $row['product'];?></span>
                                <?php 
                              		 }
                                 ?>
                            </td>
							<td><?php echo date("d-m-y h:i:s a", $getdate['date']) ?></td>
						</tr>
				<?php
				}
			}
		}
		
		
	}
	


// $ddate = date('Y-m-d');
// $date = new DateTime($ddate);
// $curr_week = $date->format("W");
// echo "Week Number: ".$week;
?>