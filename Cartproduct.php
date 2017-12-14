<!-- <!DOCTYPE html> -->
<html>

<head>
	<title>LuxorFabric</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/logo.png" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/slider.css">
	<link rel="stylesheet" type="text/css" href="css/style-mobi.css">
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<link rel="stylesheet" type="text/css" href="css/Cart.css">
	<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/slider.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
</head>

<body>

	<?php
		include 'Codephp/connectdb.php';
	?>

		<div id="wrapper">
			<?php include "header.php";?>
			<section id="viewcart">
				<div class="container" style="margin-bottom:3%;">
					<ul class="nav nav-wizard">
						<li class="active">
							<a href="#step1" data-toggle="tab">รายการสั่งซื้อ</a>
						</li>
						<li class="disabled">
							<a href="#step2" data-toggle="tab">สรุปรายการสั่งซื้อ</a>
						</li>
						<li class="disabled">
							<a href="#step3" data-toggle="tab">ชำระเงิน</a>
						</li>
						<li class="disabled">
							<a href="#step4" data-toggle="tab">ยินยันการสั่งซื้อ</a>
						</li>
					</ul>
				</div>
				<?php 
					if(!empty($_GET['Cart_Status']) && $_GET['Cart_Status'] == "checkout"){
						include "./Codephp/CodeFront/checkout.php";
					}
					else if(!empty($_GET['Cart_Status']) && $_GET['Cart_Status'] == "shipping"){
						include "./Codephp/CodeFront/shippingCart.php";
					}
					else if(!empty($_GET['Cart_Status']) && $_GET['Cart_Status'] == "payment" && !empty($_GET['id_order'])){
						include "./Codephp/CodeFront/payment.php";
					}
					else if(empty($_GET['Cart_Status'])){
				?>
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="panel-title">
										<div class="row">
											<div class="col-xs-6">
												<h5><span class="fa fa-cart-arrow-down" aria-hidden="true"></span> ตะกร้าสินค้า</h5>
											</div>
											<div class="col-xs-6">
												<a type="button" class="btn btn-primary btn-sm btn-block btn-more" href="index.php">
													<span class="fa fa-arrow-left" aria-hidden="true"></span> ดูสินค้าเพิ่มเติม
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="panel-body">
									<form action="./Codephp/CodeFront/UpdateCart.php" method="post">
										<h4>รายการสินค้า</h4><br/>
										<div class="table-responsive">
										<table class="table">
											<?php include "./Codephp/CodeFront/showcart.php"; ?>
										</table>
									</div>
										
									<br>
										<div class="table-responsive">
											<table class="table">
												<tr>
													<td><input type="submit" class="btn btn-danger" value="Update"></td>
													<td align="right">รวมทั้งหมด <?php echo number_format($totalprice);?> บาท</td>
												</tr>
											</table>
										</div>
									</form>
									<br><a href="index.php">กลับหน้าสินค้า</a>
									<?php
										if($totalprice > 0)
										{
									?>
										| <a class="btn btn-success col-xs-offset-9 col-xs-3" href="?Cart_Status=checkout">ยืนยันการสั่งซื้อ</a>
									<?php
										}
									?>
							</div><!--panel panel-info-->
						</div><!--col-xs-12-->
					</div><!--row-->
				</div><!--container-->
					<?php }else{
						header("Location: ./index.php");
					} ?>
			</section>
			<?php include "footer.php"; ?>
		</div>
		<!-- wrapper -->

</body>

</html>