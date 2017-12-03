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
    <link rel="stylesheet" type="text/css" href="css/menuproduct.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>

</head>

<body>
<?php
		include 'Codephp/connectdb.php';
	?>
    <div id="wrapper">
        <?php include "header.php";?>
        <section class="Story">
            <div class="container">
                <h3>ประเภทของสินค้า</h3>
                <div class="col-xs-6 col-sm-4 col-md-2 madisplay">
                    <a href="#">
                        <img src="images/shi.png" class="img-responsive center-block">
                    </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-2 madisplay">
                    <a href="#">
                            <img src="images/hat.png" class="img-responsive center-block">
                        </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-2 madisplay">
                    <a href="#">
                                <img src="images/subhat.png" class="img-responsive center-block">
                    </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-2 madisplay">
                    <a href="#">
                            <img src="images/gift.png" class="img-responsive center-block">
                        </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-2 madisplay">
                    <a href="#">
                                <img src="images/bag.png" class="img-responsive center-block">
                    </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-2 madisplay">
                    <a href="#">
                                    <img src="images/more.png" class="img-responsive center-block">
                                </a>
                </div>
            </div>
        </section>

        <section class="Story">
            <div class="container">
                <!-- <div class="row"> -->
                <div class="col-sm-3 col-md-3 center-block fa-border">
                    <div class="searchHeading">
                        <h4>เรียงลำดับ</h4>
                    </div>
                    <div class="searchlist">
                        <form method="POST">
                            <ul>
                                <li class="SearchItem">
                                    <p><input name="radioSearch" type="radio" checked> สินค้าทั้งหมด</p>
                                </li>
                                <li class="SearchItem">
                                    <p><input name="radioSearch" type="radio"> สินค้ามาใหม่</p>
                                </li>
                                <li class="SearchItem">
                                    <p><input name="radioSearch" type="radio"> สินค้ายอดนิยม</p>
                                </li>
                                <li class="SearchItem">
                                    <p><input name="radioSearch" type="radio"> ราคาสูง-ต่ำ</p>
                                </li>
                                <li class="SearchItem">
                                    <p><input name="radioSearch" type="radio"> ราคาต่ำ-สูง</p>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="searchHeading">
                        <h4>ประเภทสินค้า</h4>
                    </div>
                    <div class="searchlist">
                        <form method="POST">
                            <ul>
                                <li class="SearchItem">
                                    <p><input name="typeitem" type="checkbox"> เสื้อผ้า</p>
                                </li>
                                <li class="SearchItem">
                                    <p><input name="typeitem" type="checkbox"> หมวก</p>
                                </li>
                                <li class="SearchItem">
                                    <p><input name="typeitem" type="checkbox"> ผ้าพันคอ</p>
                                </li>
                                <li class="SearchItem">
                                    <p><input name="typeitem" type="checkbox"> ของฝาก</p>
                                </li>
                                <li class="SearchItem">
                                    <p><input name="typeitem" type="checkbox"> กระเป๋า</p>
                                </li>
                                <li class="SearchItem">
                                    <p><input name="typeitem" type="checkbox"> อื่นๆ</p>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="searchHeading">
                        <h4>ความนิยมสินค้า</h4>
                    </div>
                    <div class="searchlist">
                        <div class="stars starrr" data-rating="0"></div>
                        <script type="text/javascript" src="js/star.js"></script>
                    </div>
                    <div class="searchHeading">
                        <h4>ช่วงราคา</h4>
                    </div>
                    <div class="searchlist">
                        <p><input id="sliderprice" type="text" class="span2" value="" data-slider-min="0" data-slider-max="10000"
                                data-slider-step="100" data-slider-value="[0,3000]" /></p>
                    </div>
                </div>
                <div class="col-sm-9 col-md-9 fa-border">
                    <div class="ListviewProduct">
                        <h1>ทั้งหมด</h1>
                        <!-- <div class="col-md-3">
                            <div class="product-box hover-circle text-center">
                                <div class="product-item">
                                    <figure><img src="images/product1.png" alt="product"></figure>
                                    <h3 class="product-title">TestProduct1</h3>
                                    <h4 class="product-price">Pricce : $200</h4>
                                </div>
                                <div class="hoverly-item">
                                    <a href="Detailproduct.php" class="btn btn-default view-details-btn">สินค้าตัวอย่าง</a>
                                </div>
                            </div>
                        </div> -->
                        <?php include "Codephp/CodeFront/selectproduct.php"; ?>
                    </div>
                </div>
                <!-- </div> -->
            </div>

            <script>
                $("#sliderprice").slider({});
            </script>

        </section>

        <?php include "footer.php"; ?>

    </div>
    <!-- wrapper -->

</body>

</html>