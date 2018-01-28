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
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="css/p_detail.css">
</head>
<body>
<html>
    <body>
        <?php 
            include "./Codephp/connectdb.php";
            require './header.php';
        ?>
            <div class="container-fluid product-details">
                <div class="container">
                    <div class="row">
                        <?php 
                            if(!empty($_GET['idproduct'])){
                                $idproduct = $_GET['idproduct'];
                                $sqlproduct = "SELECT * FROM `product` p 
                                                INNER JOIN store s on s.id_store = p.id_store
                                                WHERE p.id_product = '$idproduct'";
                                $queryproduct = mysqli_query($connect,$sqlproduct);
                                $row = mysqli_fetch_array($queryproduct);

                                $sqlthumbproduct =  "SELECT * FROM `imgproductdetail` WHERE `id_product` = '$idproduct'";
                                $querythumbproduct = mysqli_query($connect,$sqlthumbproduct);
                            
                                while($data = mysqli_fetch_array($querythumbproduct)){
                                    $thumb[] = $data['urlthumbProduct'];
                                    $thumbname[] = $data['namethumbProduct'];
                                    $qtyproduct[] = $data['qty'];

                                    $sqlimg = "SELECT * FROM `imgproduct` WHERE `id_imgProduct` = '".$data['id_imgProduct']."'";
                                    $queryimg = mysqli_query($connect,$sqlimg);
                                    while($getimg = mysqli_fetch_array($queryimg)){
                                        $img[] = $getimg['url_img'].$getimg['Name_img'];
                                    }

                                }

                               

                        ?>
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6 item-photo">

                                <?php for ($i=0; $i < count($img); $i++) { ?>
                                    <div class="img-area" id="area-0<?php echo $i+1; ?>">
                                        <img style="max-width:100%;" src="<?php echo $img[$i]; ?>" />
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6" style="border:0px solid gray;padding: 1% 4%;">
                            <form method="POST">
                                <h3><?php echo $row['NameProduct']; ?></h3>
                                <div class="section">
                                    <br>
                                <div class="caption">
                                    <p><?php echo $row['productDetail']; ?></p>
                                </div>
                                <h4 class="title-attr" style="margin-top:5px; <?php if($row['checkCustomize'] == '0'){echo "display:none;";}?>"><small>สี / ลวดลาย</small></h4>
                                <div>
                                    <?php for ($i=0; $i < count($thumb); $i++) { ?>
                                        <a class="attr <?php if($i==0){echo "active";} ?>" id="option<?php echo $i+1; ?>" style="width:50px;height:auto;<?php if($row['checkCustomize'] == '0'){echo "display:none;";}?>">
                                            <img class="thumb-img img-responsive center-block" data-id="<?php echo $thumbname[$i]; ?>" src="<?php echo $thumb[$i]; ?>" alt="">
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="section" style="padding-bottom:20px;">
                                    <h4 class="title-attr"><small>จำนวน</small></h4>
                                <div>
                                    
                                    <div class="btn-minus noborder"><span class="glyphicon glyphicon-minus"></span></div>
                                            <?php 
                                                for ($i=0; $i < count($thumb); $i++) {
                                            ?>
                                                <input type="hidden" value="<?php echo $qtyproduct[$i]; ?>" class="limitqtyproduct<?php echo $i+1;?>"/>
                                            <?php
                                                }
                                            ?>
                                            
                                            <input type="text" value="1" name="qtyproduct" class="qtyproduct" OnKeyPress="return chkNumber(this)"/>
                                    <div class="btn-plus noborder"><span class="glyphicon glyphicon-plus"></span></div>
                                        
                                </div>
                            </div>
                                <h4 class="title-price"><small>ราคา</small></h4>
                                <h3 style="margin-top:0px;"><?php echo number_format($row['PriceProduct']); ?> บาท</h3>
                                <div class="section" style="padding-bottom:20px;">
                                    <input type="hidden" name="idproduct" value="<?php echo  $row['id_product']; ?>">
                                    <input type="hidden" name="NameProduct" value="<?php echo  $row['NameProduct']; ?>">
                                    <input type="hidden" name="PriceProduct" value="<?php echo  $row['PriceProduct']; ?>">

                                    <!-- ส่วนดึงมาจาก div ลายผ้า-->
                                    <input type="hidden" name="thumb" value="">
                                    <!-- ส่วนดึงมาจาก div ลายผ้า-->
                                    <?php 
                                        for ($i=0; $i < count($thumb); $i++) { 
                                            if($qtyproduct[$i] == 0){
                                            ?>
                                                <button class="btn GRed btn-addtocart" id="addproducttocart<?php echo $i+1; ?>" disabled >Sold Out</button>
                                            <?php 
                                            }
                                            else{
                                            ?>
                                                <input class="btn GRed btn-addtocart" name="addproducttocart" id="addproducttocart<?php echo $i+1; ?>" type="submit" value="เลือกใส่ตะกร้า">
                                            <?php
                                            }
                                        } 
                                    ?>
                                    <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> เพิ่มในรายการโปรด </a></h6>
                                </div>
                            </form>
                            <?php include "./Codephp/CodeFront/addcart.php"; ?>
                            </div>
                            <div class="col-xs-12">
                                <ul class="menu-items nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#menu1">รายละเอียดสินค้า</a></li>
                                    <li><a data-toggle="tab" href="#menu2">ข้อมูลร้านค้า</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="menu1" class="tab-pane fade in active" style="width:100%;border-top:1px solid silver">
                                        <p style="padding:15px;">
                                            <small>
                                            <?php echo $row['textProductDetail']; ?>
                                            </small>
                                        </p>
                                    </div>
                                    <div id="menu2" class="tab-pane fade" class="shopdetail" style="width:100%;border-top:1px solid silver">
                                        <p style="padding:15px;">
                                        <small>
                                            <?php echo $row['textStory']; ?>
                                        </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 

                            }  
                            mysqli_close($connect);
                        
                        ?>
                    </div>
                </div>
            </div>
        <?php require 'footer.php' ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
   $(document).ready(function(){
            $(".attr,.attr2").on("click",function(){
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            var x = document.getElementsByClassName("attr");
            for (var i = 1; i <= x.length; i++) {
                if($("#option"+i).hasClass("active")){
                    var now = $(".section > div > .qtyproduct").val();
                    var limitqty = $(".limitqtyproduct"+(i)).val();
                    if(now > limitqty){
                        $(".section > div > .qtyproduct").val("1");
                    }
                }
            }

            var check1 = true;
            for (var i = 1; i <= x.length; i++) {
                if(check1 == true && i == 1){
                    $("#area-01").show();
                    $("#area-02").hide();
                    $("#area-03").hide();
                    $("#area-04").hide();
                    $("#area-05").hide();
                    $("#area-06").hide();
                    $("#area-07").hide();
                    $("#area-08").hide();
                    $("#area-09").hide();

                    $("#addproducttocart1").show();
                    $("#addproducttocart2").hide();
                    $("#addproducttocart3").hide();
                    $("#addproducttocart4").hide();
                    $("#addproducttocart5").hide();
                    $("#addproducttocart6").hide();
                    $("#addproducttocart7").hide();
                    $("#addproducttocart8").hide();
                    $("#addproducttocart9").hide();
                    
                    check1 = false;
                }
            }


            //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".section > div > .qtyproduct").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ 
                        now--;
                    }
                    $(".section > div > .qtyproduct").val(now);
                }else{
                    $(".section > div > .qtyproduct").val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > .qtyproduct").val();
                var x = document.getElementsByClassName("attr");
                for (var i = 1; i <= x.length; i++) {
                    if($("#option"+i).hasClass("active")){
                        var limitqty = $(".limitqtyproduct"+(i)).val();
                    }
                }
                if ($.isNumeric(now)){
                    if(parseInt(now) < limitqty){
                        now++;
                    }
                    $(".section > div > .qtyproduct").val(now);
                }else{
                    $(".section > div > .qtyproduct").val("1");
                }
            })                        


        $("img.thumb-img").click(function () {
            var myj = $(this).attr("data-id");
            // console.log(myj);
            var checkj = $('input[name="thumb"]').val(myj);

            console.log(checkj);
        });

        $("#option1").click(function () {
            $("#area-01").show();
            $("#area-02").hide();
            $("#area-03").hide();
            $("#area-04").hide();
            $("#area-05").hide();
            $("#area-06").hide();
            $("#area-07").hide();
            $("#area-08").hide();
            $("#area-09").hide();

            $("#addproducttocart1").show();
            $("#addproducttocart2").hide();
            $("#addproducttocart3").hide();
            $("#addproducttocart4").hide();
            $("#addproducttocart5").hide();
            $("#addproducttocart6").hide();
            $("#addproducttocart7").hide();
            $("#addproducttocart8").hide();
            $("#addproducttocart9").hide();

            $(".section > div > .qtyproduct").val("1");
        });

        $("#option2").click(function () {
            $("#area-01").hide();
            $("#area-02").show();
            $("#area-03").hide();
            $("#area-04").hide();
            $("#area-05").hide();
            $("#area-06").hide();
            $("#area-07").hide();
            $("#area-08").hide();
            $("#area-09").hide();

            $("#addproducttocart1").hide();
            $("#addproducttocart2").show();
            $("#addproducttocart3").hide();
            $("#addproducttocart4").hide();
            $("#addproducttocart5").hide();
            $("#addproducttocart6").hide();
            $("#addproducttocart7").hide();
            $("#addproducttocart8").hide();
            $("#addproducttocart9").hide();

            $(".section > div > .qtyproduct").val("1");
        });

        $("#option3").click(function () {
            $("#area-01").hide();
            $("#area-02").hide();
            $("#area-03").show();
            $("#area-04").hide();
            $("#area-05").hide();
            $("#area-06").hide();
            $("#area-07").hide();
            $("#area-08").hide();
            $("#area-09").hide();

            $("#addproducttocart1").hide();
            $("#addproducttocart2").hide();
            $("#addproducttocart3").show();
            $("#addproducttocart4").hide();
            $("#addproducttocart5").hide();
            $("#addproducttocart6").hide();
            $("#addproducttocart7").hide();
            $("#addproducttocart8").hide();
            $("#addproducttocart9").hide();

            $(".section > div > .qtyproduct").val("1");
        });
        $("#option4").click(function () {
            $("#area-01").hide();
            $("#area-02").hide();
            $("#area-03").hide();
            $("#area-04").show();
            $("#area-05").hide();
            $("#area-06").hide();
            $("#area-07").hide();
            $("#area-08").hide();
            $("#area-09").hide();

            $("#addproducttocart1").hide();
            $("#addproducttocart2").hide();
            $("#addproducttocart3").hide();
            $("#addproducttocart4").show();
            $("#addproducttocart5").hide();
            $("#addproducttocart6").hide();
            $("#addproducttocart7").hide();
            $("#addproducttocart8").hide();
            $("#addproducttocart9").hide();
            
            $(".section > div > .qtyproduct").val("1");
        });
        $("#option5").click(function () {
            $("#area-01").hide();
            $("#area-02").hide();
            $("#area-03").hide();
            $("#area-04").hide();
            $("#area-05").show();
            $("#area-06").hide();
            $("#area-07").hide();
            $("#area-08").hide();
            $("#area-09").hide();

            $("#addproducttocart1").hide();
            $("#addproducttocart2").hide();
            $("#addproducttocart3").hide();
            $("#addproducttocart4").hide();
            $("#addproducttocart5").show();
            $("#addproducttocart6").hide();
            $("#addproducttocart7").hide();
            $("#addproducttocart8").hide();
            $("#addproducttocart9").hide();
            
            $(".section > div > .qtyproduct").val("1");
        });
        $("#option6").click(function () {
            $("#area-01").hide();
            $("#area-02").hide();
            $("#area-03").hide();
            $("#area-04").hide();
            $("#area-05").hide();
            $("#area-06").show();
            $("#area-07").hide();
            $("#area-08").hide();
            $("#area-09").hide();

            $("#addproducttocart1").hide();
            $("#addproducttocart2").hide();
            $("#addproducttocart3").hide();
            $("#addproducttocart4").hide();
            $("#addproducttocart5").hide();
            $("#addproducttocart6").show();
            $("#addproducttocart7").hide();
            $("#addproducttocart8").hide();
            $("#addproducttocart9").hide();
            
            $(".section > div > .qtyproduct").val("1");
        });
        $("#option7").click(function () {
            $("#area-01").hide();
            $("#area-02").hide();
            $("#area-03").hide();
            $("#area-04").hide();
            $("#area-05").hide();
            $("#area-06").hide();
            $("#area-07").show();
            $("#area-08").hide();
            $("#area-09").hide();

            $("#addproducttocart1").hide();
            $("#addproducttocart2").hide();
            $("#addproducttocart3").hide();
            $("#addproducttocart4").hide();
            $("#addproducttocart5").hide();
            $("#addproducttocart6").hide();
            $("#addproducttocart7").show();
            $("#addproducttocart8").hide();
            $("#addproducttocart9").hide();
            
            $(".section > div > .qtyproduct").val("1");
        });
        $("#option8").click(function () {
            $("#area-01").hide();
            $("#area-02").hide();
            $("#area-03").hide();
            $("#area-04").hide();
            $("#area-05").hide();
            $("#area-06").hide();
            $("#area-07").hide();
            $("#area-08").show();
            $("#area-09").hide();

            $("#addproducttocart1").hide();
            $("#addproducttocart2").hide();
            $("#addproducttocart3").hide();
            $("#addproducttocart4").hide();
            $("#addproducttocart5").hide();
            $("#addproducttocart6").hide();
            $("#addproducttocart7").hide();
            $("#addproducttocart8").show();
            $("#addproducttocart9").hide();
            
            $(".section > div > .qtyproduct").val("1");
        });
        $("#option9").click(function () {
            $("#area-01").hide();
            $("#area-02").hide();
            $("#area-03").hide();
            $("#area-04").hide();
            $("#area-05").hide();
            $("#area-06").hide();
            $("#area-07").hide();
            $("#area-08").hide();
            $("#area-09").show();

            $("#addproducttocart1").hide();
            $("#addproducttocart2").hide();
            $("#addproducttocart3").hide();
            $("#addproducttocart4").hide();
            $("#addproducttocart5").hide();
            $("#addproducttocart6").hide();
            $("#addproducttocart7").hide();
            $("#addproducttocart8").hide();
            $("#addproducttocart9").show();
            
            $(".section > div > .qtyproduct").val("1");
        });

    });

    function chkNumber(ele){
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar<'0' || vchar>'9') && (vchar != '.')){return false;}
        ele.onKeyPress=vchar;
    }
        </script>
    </body>
</html>