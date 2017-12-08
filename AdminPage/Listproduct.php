
		<div ng-app="ListProduct" ng-controller="UserListProduct">
		<h1>ข้อมูลสินค้า</h1>
		<table id="product" class="table table-hover table-condensed" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>id</th>
					<th>name product</th>
					<th>Status</th>
					<th>price</th>
					<th>edit</th>
					<th>delete</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><a href="PageinsertProduct.php" class="btn btn-success btn-block">Insert Product <i class="fa fa-angle-right"></i></a></td>
				</tr>
			</tfoot>
			<tbody>
			<?php
				include "../Codephp/connectdb.php";

				$select = "SELECT * FROM `Product` p order by `id_product`";
				$query = mysqli_query($connect,$select);
				
				if(mysqli_num_rows($query)>0){
					while($row = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $row['id_product']; ?></td>
						<td><?php echo $row['NameProduct']; ?></td>
						<td><?php echo $row['Status']; ?></td>
						<td><?php echo $row['PriceProduct']; ?></td>
						<td><a href="EditPageProduct.php?idproduct=<?php echo $row['id_product']; ?>" class="btn btn-info">แก้ไข</a></td>
						<td><button ng-click="deleteData(<?php echo $row['id_product']; ?>)" class="btn btn-danger">ลบข้อมูล</button></td>
					</tr>
					<?php
					}
				}

				mysqli_close($connect);
			?>
			</tbody>
			
			
		</table>
</div>