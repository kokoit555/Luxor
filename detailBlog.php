
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

.welcome-grid {
    text-align: left;
}
.welcome-grid p {
    font-size: 1.2em;
    color: #545151;
    /* margin: 1em 0 1.5em; */
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

#welcome img{
    width: 100%;
    margin-bottom: 2em;
}

.section{
    margin-top: 5%;
    margin-bottom: 5%;
}
</style>

	<?php include 'Codephp/connectdb.php';?>

	<div id="wrapper">
		<?php include "header.php"; ?>

        <?php 
			$sqlBlog = "SELECT * FROM `blog` WHERE id_blog = '".$_GET['idblog']."'";
			$queryBlog = mysqli_query($connect,$sqlBlog);
			$blog = mysqli_fetch_array($queryBlog);
        ?>

        <div id="blog">
            <section id="blog-section">
                <div class="container">
                        <div class="welcome section" id="welcome">
                            <div class="container">
                                <h3 class="site-title"><?php echo $blog['titleBlog']; ?></h3>
                                <div class="about-top w3ls-agile">
                                    <div class="col-md-12 red">
                                        <img class="img-responsive" src="./<?php echo $blog['img_blog']; ?>" alt="">
                                    </div>
                                    <div class="col-md-12 come">
                                        <div class=" welcome-grid">
                                            <p><?php echo $blog['textBlog']; ?></p>
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