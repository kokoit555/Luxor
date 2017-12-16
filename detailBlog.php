
<!DOCTYPE html>
<html>
<head>
	<title>LuxorFabric</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/logo.png" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style-mobi.css">
  	<link rel="stylesheet" type="text/css" href="css/media.css">
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
</head>

<body>

<style>
h3.site-title {
    color: #000;
    font-size: 3em;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-align: center;
    position: relative;
    margin-bottom: 1.5em;
}
h3.site-title:before {
    content: "";
    background: #03A9F4;
    width: 6%;
    height: 2px;
    position: absolute;
    right: 63%;
    top: 51%;
}
h3.site-title:after {
    content: "";
    background: #03A9F4;
    width: 6%;
    height: 2px;
    position: absolute;
    right: 32%;
    top: 51%;
}

.welcome-grid {
    text-align: left;
}
.welcome-grid h5 {
    font-size: 2.5em;
    color: #000;
    text-transform: capitalize;
    line-height: 1.3;
    letter-spacing: 1px;
}
.welcome-grid p {
    font-size: 1.2em;
    color: #545151;
    margin: 1em 0 1.5em;
}
.welcome-grid ul li {
    color: #777;
    font-size: 1em;
    line-height: 2;
    margin-top: .5em;
    display: inherit;
    letter-spacing: 1px;
}


.welcome-grid ul li {
    list-style: none;
}
.welcome-img {
    padding-top: 1em;
}
.welcome-img1 {
    padding: 0 0.5em 0 0;
}
.welcome-img2 {
    padding: 0 0 0 0.5em;
}

.section{
    margin-top: 5%;
    margin-bottom: 5%;
}
</style>

	<?php include 'Codephp/connectdb.php';?>

	<div id="wrapper">
		<?php include "header.php"; ?>

        <div id="blog">
            <section id="blog-section">
                <div class="container">
                        <div class="welcome section" id="welcome">
                            <div class="container">
                                <h3 class="site-title">Welcome</h3>
                                <div class="about-top w3ls-agile">
                                    <div class="col-md-6 red">
                                        <img class="img-responsive" src="./images/blog4.jpg" alt="">
                                        <div class="welcome-img">
                                            <div class="col-md-6 col-xs-6 welcome-img1">
                                                <img class="img-responsive" src="./images/blog5.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-xs-6 welcome-img2">
                                                <img class="img-responsive" src="./images/blog6.jpg" alt="">
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 come">
                                        <div class=" welcome-grid">
                                            <h5>ชุดผ้าไทยสไตล์ชาวดอย</h5>
                                            <p>ชุดชาวดอย ผลิตภัณฑ์ที่ทุนเดิมมีสีสันสุดน่ารักเนื้อผ้านิ่ม  มีลักษณะเป็นผ้าฝ้ายปักลวดลายด้วยด้ายสีสันต่างๆ ซึ่งตอนนี้ก็มีวัยรุ่นหลายคนที่หาชุดสไตล์นี้มาใส่ นอกจากจะมีสีสันที่น่ารักแล้ว เขายังทำออกมาหลากหลายสไตล์อีกด้วย ทั้งเสื้อแขนสั้น แขนกุด กระโปรง ชุดเดรส จะสั้นหรือจะยาวชุดชาวดอยก็มีหมด</p>
                                            <p>ความหลากหลายของผ้าชาวเขา ไม่ได้มีแค่รูปแบบของเสื้อนะคะ ขึ้นชื่อว่ามีสีสันจัดจ้าน แน่นอนว่าเขายังมีโทนสีให้เพื่อนๆได้เลือกอีกด้วย แถมยังมีไอเท็มอื่นๆมาเป็น  Accessories เติมเต็มความเป็นชาวพื้นบ้านแบบน่ารักๆไปอีก</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                </div>
            </section>
        </div>

        <?php include "footer.php"; ?>
	</div>
	<!-- wrapper -->





	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type='text/javascript' src="js/jquery.mycart.min.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> -->
	<script type='text/javascript' src="js/app.js"></script>
	
	
</body>

</html>