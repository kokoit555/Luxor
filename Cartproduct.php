<!-- <!DOCTYPE html> -->
<html>

<head>
	<title>LuxorFabric</title>
	<link rel="icon" type="image/png" href="images/logo.png" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/Cart.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>

	<?php
		include 'Codephp/connectdb.php';
	?>

		<div id="wrapper">
			<?php include "header.php";?>
			<section class="Story">
			<div class="container">
			<table id="cart" class="table table-hover table-condensed">
							<thead>
								<tr>
									<th style="width:50%">Product</th>
									<th style="width:10%">Price</th>
									<th style="width:10%">Quantity</th>
									<!-- <th style="width:22%" class="text-center">Subtotal</th> -->
									<th style="width:10%"></th>
								</tr>
							</thead>
							
							<?php include "Codephp/CodeFront/showcart.php"; ?>
							
							<tfoot>
								<tr class="visible-xs">
								</tr>
								<tr>
									<td><a href="./Listproduct.php" style="width:25%;" class="btn btn-success btn-block">เลือกซื้อสินค้าต่อ</a></td>
									<td class="hidden-xs"></td>
									<td class="hidden-xs text-center"><strong>รวม <?php if(!empty($totalprice)){echo number_format($totalprice);}else{echo"0";} ?></strong></td>
									<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
								</tr>
							</tfoot>
						</table>
		</div>
			</section>

			<?php include "footer.php"; ?>
		</div>
		<!-- wrapper -->

</body>

</html>