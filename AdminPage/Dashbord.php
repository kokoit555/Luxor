<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
	</div>
</div><!--/.row-->

<div class="col-md-12">
	<div class="panel panel-teal panel-widget border-right">
		<div class="row">
			<table class="table table-hover table-condensed" width="100%">
				<thead>
					<tr>
						<th>order</th>
						<th>User</th>
						<th>Shipping</th>
						<th>Date_order</th>
						<th>Product</th>
						<th>Totalprice</th>
						<th>Status</th>
					</tr>
				</thead>

				<tbody>
					<?php
						include "../Codephp/connectdb.php";
						$idstore = $_GET['idstore'];
						$select = "SELECT * , sps.Status statusshipment FROM `Order_product` op
									INNER JOIN User_member um ON um.id_user = op.id_user
									INNER JOIN Store_product_shipment sps ON sps.id_order = op.id_order
									INNER JOIN Shipping s ON s.id_Shipping = sps.Id_shipping
									INNER JOIN orderproductdetail opd ON opd.id_order = op.id_order
									INNER JOIN product p ON p.id_product = opd.id_product
									WHERE p.id_store = '$idstore'
									ORDER BY opd.id_orderDetail DESC LIMIT 5";
											
								$query = mysqli_query($connect,$select);
								
								if(mysqli_num_rows($query)>0){
									while($row = mysqli_fetch_array($query)){
									?>
									<tr>
										<td><?php echo $row['id_order']; ?></td>
										<td><?php echo $row['Name']; ?></td>
										<td><?php echo $row['NameShipping']; ?></td>
										<td><?php echo $row['Date_order']; ?></td>
										<td><?php echo number_format($row['Totalprice']); ?></td>
										<td><?php if($row['statusshipment'] == '1'){echo "Success";}
												else if($row['statusshipment'] == '0'){echo "Pedding";} ?></td>
										<td><button class="btn btn-info">ดูข้อมูลเชิงลึก</button></td>
									</tr>
									<?php
									}
								}
				
								mysqli_close($connect);
							?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1default" data-toggle="tab">Default 1</a></li>
					<li><a href="#tab2default" data-toggle="tab">Default 2</a></li>
					<li><a href="#tab3default" data-toggle="tab">Default 3</a></li>
				</ul>
		</div>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="tab1default">Default 1</div>
				<div class="tab-pane fade" id="tab2default">Default 2</div>
				<div class="tab-pane fade" id="tab3default">Default 3</div>
				<div class="tab-pane fade" id="tab4default">Default 4</div>
				<div class="tab-pane fade" id="tab5default">Default 5</div>
			</div>
		</div>
	</div>
</div>



