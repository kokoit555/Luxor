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
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->

	<script type="text/javascript" src="js/slider.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
</head>

<body>

	<?php
		include 'Codephp/connectdb.php';
	?>

	<div id="wrapper">
		<?php include "header.php"; ?>
		<!-- Start Slider -->
		<div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/banner.png" alt="Slide 1">
                </div>
                <div class="item">
				<img src="images/banner.png" alt="Slide 2">
                </div>
                <div class="item">
				<img src="images/banner.png" alt="Slide 3">
                </div>
            </div>
            <a href="#carousel" class="left carousel-control" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a href="#carousel" class="right carousel-control" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
		</div>
		<!-- end -->
		<!-- myCarousel -->
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
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="carousel carousel-showmanymoveone slide setheiproduct" id="itemslider">
								<div class="carousel-inner">
									<?php include "Codephp/CodeFront/showproductslider.php"; ?>
								</div>
							</div>
						</div>
					</div>
					<!-- Item slider end-->
				</div>
				<!-- container -->
		</section>
		<!-- work -->

		<section class="Story">
			<div class="container">
				<div class="slider">
					<div class="slider--el slider--el-1 anim-4parts active">
						<div class="slider--el-bg">
							<div class="part top left"></div>
							<div class="part top right"></div>
							<div class="part bot left"></div>
							<div class="part bot right"></div>
						</div>
						<div class="slider--el-content">
							<div class="DataStory">
								<div class="headStory">
									<p>1/4</p>
								</div>
								<div class="infostory">
									<h2>“ภูคราม” ผ้าฝ้ายปักลวดลายธรรมชาติ</h2>
									<p>
										เสื้อนิ่มๆ น่ารักๆ แฝงด้วยลวดลายธรรมชาติปักอย่างประณีต คือผ้าฝ้ายย้อมคราม ฝีมือชาวบ้านชุมชนบ้านนางเติ่ง ต.โคกภู อ.ภูพาน จ.สกลนคร มีทั้งเสื้อ กางเกง ผ้าพันคอ ผ้าคลุมไหล่น่ารักๆ ให้เลือก เมื่อรวมกับดีไซน์เรียบง่ายแต่แฝงไว้ด้วยความเก๋ไก๋ รับรองว่าใส่แล้วต้องยืดอกอย่างภูมิใจเพราะสวยไม่ซ้ำใครและได้ช่วยสังคมไปในตัว
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="slider--el slider--el-2 anim-9parts">
						<div class="slider--el-bg">
							<div class="part left-top"></div>
							<div class="part mid-top"></div>
							<div class="part right-top"></div>
							<div class="part left-mid"></div>
							<div class="part mid-mid"></div>
							<div class="part right-mid"></div>
							<div class="part left-bot"></div>
							<div class="part mid-bot"></div>
							<div class="part right-bot"></div>
						</div>
						<div class="slider--el-content">
							<div class="DataStory">
								<div class="headStory">
									<p>2/4</p>
								</div>
								<div class="infostory">
									<h2>“การทอผ้าของไทย”</h2>
									<p>
										ตั้งแต่สมัยโบราณ จากอดีตถึงปัจจุบันมนุษย์ได้พัฒนาการทอผ้าทั้งรูปแบบ 
										เทคนิคการย้อมสี และการออกแบบลวดลาย ดังปรากฏในจดหมายเหตุและพงศาวดารครั้งสมัยสุโขทัย 
										อยุธยา และกรุงรัตนโกสินทร์ ซึ่งมีการทอผ้าตามกลุ่มชนต่างๆของไทย 
										เช่น ข่า กระโส้ กระเลิง ส่วย ฯลฯ ผ้าทอในประเทศไทยแสดงถึง ศิลปะภูมิปัญญาของชุมชน	
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="slider--el slider--el-3 anim-5parts">
						<div class="slider--el-bg">
							<div class="part part-1"></div>
							<div class="part part-2"></div>
							<div class="part part-3"></div>
							<div class="part part-4"></div>
							<div class="part part-5"></div>
						</div>
						<div class="slider--el-content">
							<div class="DataStory">
								<div class="headStory">
									<p>3/4</p>
								</div>
								<div class="infostory">
									<h2>“ผ้าฝ้าย”</h2>
									<p>
									เป็นพืชเศรษฐกิจที่ปลูกทั่วไปในทุกภาคของประเทศไทย เป็นพืชเขตร้อน ชอบดินปนทราย และอากาศโปร่ง ไม่ชอบที่ร่ม เส้นใยของฝ้ายจะดูดความชื้นได้ง่าย และเมื่อดูดความชื้นแล้วจะระเหยเป็นไอ ดังนั้นเมื่อสวมใส่เสื้อผ้าที่ทำด้วยผ้าฝ้ายจะมีความรู้สึกเย็นสบาย
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="slider--el slider--el-4 anim-3parts">
						<div class="slider--el-bg">
							<div class="part left"></div>
							<div class="part mid"></div>
							<div class="part right"></div>
						</div>
						<div class="slider--el-content">
							<div class="DataStory">
								<div class="headStory">
									<p>4/4</p>
								</div>
								<div class="infostory">
									<h2>“ผ้าไหม”</h2>
									<p>
									เส้นใยไหมที่ได้จากตัวไหม ซึ่งส่วนใหญ่นิยมเลี้ยงไหมกันในพื้นที่ ภาคเหนือ ภาคตะวันออกเฉียงเหนือ และภาคกลาง ตัวไหมมีลักษณะคล้ายหนอน เมื่อแก่ตัวจะชักใยหุ้มตัวของมันเอง เรียกว่า รังไหม รังไหมนี้จะนำมาสาวเป็น เส้นไหม แล้วจึงนำไปฟอกด้วยการต้มด้วยด่างและนำมากวักเพื่อให้ได้ เส้นใยไหม หลังจากนั้นจึงนำมาย้อมสีและนำไปทอเป็นผืนผ้าตามที่ต้องการ เส้นไหมมีคุณสมบัติ ลื่น มัน และยืดหยุ่น
									</p>
								</div>
							</div>
						</div>
					</div>

					<a class="left carousel-control slider--control" href="#Story" data-slide="prev">
					</a>
					<a class="right carousel-control slider--control" href="#Story" data-slide="next">	
					</a>
				</div>
			</div>
		</section>

		<?php include "footer.php"; ?>

	</div>
	<!-- wrapper -->

</body>

</html>