<!DOCTYPE html>
<html>

<head>
	<title>LuxorFabric</title>
	<link rel="icon" type="image/png" href="../images/logo.png" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/angular.min.js"></script>
	<script type="text/javascript" src="../js/app.js"></script>
	<script type="text/javascript" src="../js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>

<body>
	<div id="wrapper">
		<section class="Story">
		<div class="container">
       
		<?php include "menustore.php" ?>
		<div class="col-sm-9 col-md-9" ng-app="ListStore" ng-controller="UserListStore"> <!-- ng-init="displayListStore()" -->
		<h1>ข้อมูลสินค้า</h1>

		<table id="store" class="table table-hover table-condensed" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>name Store</th>
					<th>Telephone</th>
					<th>email</th>
					<th>edit</th>
					<th>delete</th>
				</tr>
			</thead>

			<tbody>
			<?php
				include "../Codephp/connectdb.php";

				$select = "SELECT * FROM `Store` s order by `id_store`";
				$query = mysqli_query($connect,$select);
				
				if(mysqli_num_rows($query)>0){
					while($row = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $row['id_store']; ?></td>
						<td><?php echo $row['NameStore']; ?></td>
						<td><?php echo $row['TelStore']; ?></td>
						<td><?php echo $row['EmailStore']; ?></td>
						<td><a href="EditPageStore.php?idproduct=<?php echo $row['id_store']; ?>" class="btn btn-info">แก้ไข</a></td>
						<td><button ng-click="deleteData(<?php echo $row['id_store']; ?>)" class="btn btn-danger">ลบข้อมูล</button></td>
					</tr>
					<?php
					}
				}

				mysqli_close($connect);
			?>
            	<!-- <tr ng-repeat="x in liststore">
					<td>{{x.id_store}}</td>
               		<td>{{x.NameStore}}</td>
                	<td>{{x.TelStore}}</td>
					<td>{{x.EmailStore}}</td>
					<td><a href="EditPageStore.php?idproduct={{x.id_store}}" class="btn btn-info">แก้ไข</a></td>
					<td><button ng-click="deleteData(x.id_store)" class="btn btn-danger">ลบข้อมูล</button></td>
				</tr> -->
			</tbody>
			
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
		</table>
</div>
		</div>
</section>

	</div>
	<!-- wrapper -->

</body>

</html>