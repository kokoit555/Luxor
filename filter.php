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
      </div><!-- navbar navbar-default visible-xs -->
<style>a#list {display: none;}</style>
<div class="container">
  <div class="row" ng-app="ListProduct" ng-controller="UserListProduct" ng-init="displayListProduct()">
    <!-- filter sidebar -->
    <div id="filter-sidebar" class="col-xs-6 col-sm-3 visible-sm visible-md visible-lg collapse sliding-sidebar">
    <h3>หมวดหมู่สินค้า</h3>
      <div>
        <div class="form-group">
          <label>ค้นหาชื่อสินค้า</label>
          <input class="form-control" type="text" ng-model="searchname">
        </div>
        <div id="group-1" class="list-group collapse in">
          <div class="panel panel-default">
            <div class="panel-heading">ค้นหาตามประเภท</div>
            <div class="panel-body">
                <div class="checkbox">
                  <label><input type="checkbox" ng-model="filterType.idtype1">เสื้อผ้า</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" ng-model="filterType.idtype2">กางเกง</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" ng-model="filterType.idtype3">เครื่องประดับ</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" ng-model="filterType.idtype4">ของฝาก</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" ng-model="filterType.idtype5">ผ้าพันคอ</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" ng-model="filterType.idtype6">อื่น ๆ</label>
                </div>
            </div> <!--panel-body-->
          </div><!--panel panel-default-->
        </div><!--list-group collapse-->

        <div id="group-2" class="list-group collapse in" ng-model="orderList">
          <a class="list-group-item" href="#" ng-click="orderList = '-priceproduct'">
            <i class="fa fa-sort-amount-desc"></i> เรียงลำดับราคา มาก ไป น้อย
          </a>
          <a class="list-group-item" href="#" ng-click="orderList = 'priceproduct'">
            <i class="fa fa-sort-amount-asc"></i> เรียงลำดับราคา น้อย ไป มาก
          </a>
          <a class="list-group-item" href="#" ng-click="orderList = '-dateinput'" >
            <i class="fa fa-calendar"></i> เรียงลำดับวันที่ลง มาก ไป น้อย
          </a>
          <a class="list-group-item" href="#" ng-click="orderList = 'dateinput'">
            <i class="fa fa-calendar"></i> เรียงลำดับวันที่ลง น้อย ไป มาก
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

    <!-- เริ่มสินค้า -->
        <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-4" ng-repeat="x in listproduct | filter:{nameproduct: searchname}
                                                                          | orderBy: orderList | startFrom:currentPage*pageSize | limitTo:12">
            <div class="thumbnail">
              <figure class="snip1268">
              <div class="image">
                <img class="img-responsive center-block" src="./{{x.urlimg}}" alt="รูปสินค้า"/>
                <div class="icons">
                  <a href="#"><i class="ion-star"></i></a>
                  <a href="./Detailproduct.php?idproduct={{x.id}}"> <i class="ion-search "></i><span class="detail">ดูเพิ่มเติม</span></a>
                  <a href="#"> <i class="ion-share"></i></a>
                </div>
                <form method="POST">
                  <input name="id_product" type="hidden" value="{{x.id}}">
                  <input name="NameProduct" type="hidden" value="{{x.nameproduct}}">
                  <input name="PriceProduct" type="hidden" value="{{x.priceproduct}}">
                  <input name="thumb" type="hidden" value="1">
                  <input name="qtyproduct" type="hidden" value="1">
                  <input type="submit" name="addproducttocart" class="add-to-cart" value="Add to Cart">
                </form>
              </div>
              <figcaption>
               <div class="caption"><p class="title">{{x.nameproduct}}<br>{{x.productDetail}}</p><p class="price CRed">{{x.priceproduct | number:0}} บาท</p></div>
              </figcaption>
            </figure>
            </div>
        </div>
    <!-- จบสินค้า -->
    <!-- <button ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1">
        Previous
    </button>
        {{currentPage+1}}/{{numberOfPages()}}
    <button ng-disabled="currentPage >= listproduct.length/pageSize - 1" ng-click="currentPage=currentPage+1">
        Next
    </button> -->
    </div>
    <nav data-pagination>
        <a href="#" ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1"><i class="ion-chevron-left"></i></a>
        <ul>
            <li>{{currentPage+1}} / {{numberOfPages()}}</li>
        </ul>
        <a href="#" ng-disabled="currentPage >= listproduct.length/pageSize - 1" ng-click="currentPage=currentPage+1"><i class="ion-chevron-right"></i></a>
    </nav>

</div>

  </div>
</div>
<?php include "./Codephp/CodeFront/addcart.php"; ?>

    <?php require 'footer.php' ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type='text/javascript' src="js/angular.min.js"></script>
        <script type='text/javascript' src="js/dirPagination.js"></script>
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