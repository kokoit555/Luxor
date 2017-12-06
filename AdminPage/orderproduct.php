<!-- <!DOCTYPE html> -->
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
                <div class="col-sm-9 col-md-9" ng-app="Listorder" ng-controller="UserListorder">
                    <table id="order" class="table table-hover table-condensed" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id order</th>
                                <th>User</th>
                                <th>Shipping</th>
                                <th>Date_order</th>
                                <th>Totalprice</th>
                                <th>Status</th>
                                <th>แก้ไขสถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include "../Codephp/connectdb.php";
            
                            $select = "SELECT * FROM `order_product` op  order by `id_order`";
                            $query = mysqli_query($connect,$select);
                            
                            if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $row['id_order']; ?></td>
                                    <td><?php echo $row['id_user']; ?></td>
                                    <td><?php echo $row['id_shipping']; ?></td>
                                    <td><?php echo $row['Date_order']; ?></td>
                                    <td><?php echo $row['Totalprice']; ?></td>
                                    <td><?php echo $row['id_shipment']; ?></td>
                                    <td><button class="btn btn-danger">ดูข้อมูลเชิงลึก</button></td>
                                </tr>
                                <?php
                                }
                            }
            
                            mysqli_close($connect);
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id order</th>
                                <th>User</th>
                                <th>Shipping</th>
                                <th>Date_order</th>
                                <th>Totalprice</th>
                                <th>Status</th>
                                <th>แก้ไขสถานะ</th>
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