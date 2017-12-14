<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/logo.png" />
	<title>Luxor Fabric</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style-mobi.css">
  <link rel="stylesheet" type="text/css" href="css/media.css">
  <link href="css/p_list.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
</head>
<body>
  <?php 
    include 'Codephp/connectdb.php';
    require './header.php' 
  ?>
	<div class="navbar navbar-default visible-xs">
        <div class="container-fluid">
            <button class="btn btn-default navbar-btn" data-toggle="collapse" data-target="#filter-sidebar">
                <i class="fa fa-tasks"></i> Toggle Sidebar
            </button>
        </div>
    </div>

<div class="container">
<style>a#list {display: none;}</style>
  <div class="row">
    <!-- filter sidebar -->
    <div id="filter-sidebar" class="col-xs-6 col-sm-3 visible-sm visible-md visible-lg collapse sliding-sidebar">
		<h3>หมวดหมู่สินค้า</h3>
      <div>
        <h4 data-toggle="collapse" data-target="#group-1">
          <!-- <i class="fa fa-fw fa-caret-down parent-expanded"></i> -->
          <!-- <i class="fa fa-fw fa-caret-right parent-collapsed"></i> -->
          หัวข้อ
        </h4>
        <div id="group-1" class="list-group collapse in">
          <a class="list-group-item" href="#">
            <span class="badge">3</span> ตัวเลือก
          </a>
          <a class="list-group-item" href="#">
            <span class="badge">3</span> ตัวเลือก
          </a>
          <a class="list-group-item" href="#">
            <span class="badge">3</span> ตัวเลือก
          </a>
          <a class="list-group-item" href="#">
            <span class="badge">3</span> ตัวเลือก
          </a>
        </div>
      </div>
    </div>

    <!-- table container -->
    <div class="col-sm-9 product-grid-box">

    <div class="well well-sm">
        <strong>Category Title</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    </div>
    <div id="products" class="row list-group">

    <?php 
      
      $selectListproduct = "SELECT * FROM `Product` p
                            INNER JOIN IMGProductDetail ipd ON ipd.id_product = p.id_product AND ipd.namethumbProduct = '1'
                            INNER JOIN IMGProduct ip ON ip.id_imgProduct = ipd.id_imgProduct";


    ?>
    <!-- เริ่มสินค้า -->
        <div class="item col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="thumbnail">
              <figure class="snip1268">
              <div class="image">
                <img class="img-responsive center-block" src="./images/product/Jai/jai-01.png" alt="sq-sample4"/>
                <div class="icons">
                  <a href="#"><i class="ion-star"></i></a>
                  <a href="./Detailproduct.php"> <i class="ion-search "></i><span class="detail">ดูเพิ่มเติม</span></a>
                  <a href="#"> <i class="ion-share"></i></a>
                </div>
                <a href="#" class="add-to-cart">Add to Cart</a>
              </div>
              <figcaption>
               <div class="caption"><p class="title">ภูคราม เสื้อปักลายธรรมชาติ<br>สีมัดย้อม</p><p class="price CRed">1,150 บาท</p></div>
              </figcaption>
            </figure>
            </div>
        </div>
    <!-- จบสินค้า -->
        
    </div>
</div>

  </div>
</div>


    <?php require 'footer.php' ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type='text/javascript' src="js/jquery.mycart.min.js"></script>
        <script type="text/javascript" src="slick/slick.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> -->
        <script type='text/javascript' src="js/app.js"></script>
        <script>
            $(document).ready(function() {
                $('#list').click(function(event){
                    event.preventDefault();
                    $('#products .item').addClass('list-group-item');
                });

                $('#grid').click(function(event){
                    event.preventDefault();
                    ('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');
                });
            });
        </script>

    </body>
</html>