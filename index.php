<!DOCTYPE html>
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
	<link rel="stylesheet" type="text/css" href="css/slider.css">
	<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/slider.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<script type="text/javascript">
        $(document).on('ready', function () {
            $(".bannerhome").slick({
				dots: true,
				infinite: true,
				speed: 500,
				fade: true,
				cssEase: 'linear'
            });
        });
  </script>
</head>

<body>

	<?php
		include 'Codephp/connectdb.php';
	?>

	<div id="wrapper">
		<?php include "header.php"; ?>
		<div class="container">
		<section class="bannerhome slider">
			<div><img src="images/banner1.png"></div>
			<div><img src="images/banner2.png"></div>
			<div><img src="images/banner3.png"></div>
		</section>
	</div>

		<section class="Story">
			<div class="container">
				<select class="filter-select">
					<option>สินค้าตามพื้นที่</option>
					<option>สินค้าแนะนำ</option>
					<option>ร้านค้าแนะนำ</option>
				</select>
				<ul class="filter-wrapper">
					<li class="filter-item activeFilter">
						<a href="#" class="filter-style">สินค้าตามพื้นที่</a>
					</li>
					<li class="filter-item">
						<a href="#" class="filter-style">สินค้าแนะนำ</a>
					</li>
					<li class="filter-item">
						<a href="#" class="filter-style">ร้านค้าแนะนำ</a>
					</li>
				</ul>
				<div class="controls center-block">
					<p style="font-size:1.5em;">
						<a class="left fa fa-chevron-left" href="#itemslider" data-slide="prev" alt="Left" style="text-decoration:none;"></a>&nbsp;&nbsp;
						<a class="right fa fa-chevron-right" href="#itemslider" data-slide="next" alt="Right" style="text-decoration:none;"></a>
					</p>
				</div>
				<div class="center-block">
					<a href="Listproduct.php" class="filter-style">ดูทั้งหมด>></a>
				</div>
				<hr class="line-style">
				<!-- Item slider-->
				


		</section>
		<!-- work -->


		<?php include "footer.php"; ?>

	</div>
	<!-- wrapper -->

</body>

</html>