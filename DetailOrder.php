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
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/> -->
    <!-- Datatables -->
    <link href="./Admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="./Admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="./Admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="./Admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="./Admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <style>
       .lib-panel {
    margin-bottom: 20Px;
}
.lib-panel img {
    width: 70%;
    background-color: transparent;
}

.lib-panel .row,
.lib-panel .col-md-6 {
    padding: 0;
    background-color: #FFFFFF;
}

.lib-row .lib-desc p{
    font-size: 1.2em;

}

.lib-panel .lib-row {
    padding: 0 20px 0 20px;
}

.lib-panel .lib-row.lib-header {
    background-color: #FFFFFF;
    font-size: 20px;
    padding: 10px 20px 0 20px;
}

.lib-panel .lib-row.lib-header .lib-header-seperator {
    height: 2px;
    width: 26px;
    background-color: #d9d9d9;
    margin: 7px 0 7px 0;
}

.lib-panel .lib-row.lib-desc {
    position: relative;
    height: 100%;
    display: block;
    font-size: 13px;
}
.row-margin-bottom {
    margin-bottom: 20px;
}

.box-shadow {
    -webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
    box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
    
}

.no-padding {
    padding: 0;
}
    </style>

	<?php
        include 'Codephp/connectdb.php';
        
        $idorder = mysqli_escape_string($connect,$_GET['id_order']);
        $iduser = mysqli_escape_string($connect,$_SESSION['idnumLoginWebsite']);

        $sqlinfoOrder =  "SELECT op.id_order,um.Name, op.Date_order , op.Totalprice  
                                , sps.Status ,sps.id_store, s.NameStore ,op.Address
                                , op.Send_email_order , op.Tel
                            FROM `order_product` op 
                            INNER JOIN user_member um ON um.id_user = op.id_user 
                            INNER JOIN store_product_shipment sps ON sps.id_order = op.id_order
                            INNER JOIN store s ON s.id_store = sps.id_store
                            WHERE op.id_order = '$idorder' AND um.id_user = '$iduser'";

        $queryOrder = mysqli_query($connect,$sqlinfoOrder);
        

        while($dataOrder = mysqli_fetch_array($queryOrder)){
            $nameuser[] = $dataOrder['Name'];
            $date[] = $dataOrder['Date_order'];
            $totalprice[] = $dataOrder['Totalprice'];
            $status[] = $dataOrder['Status'];
            $NameStore[] = $dataOrder['NameStore'];
            $addressOrder[] = $dataOrder['Address'];
            $emailOrder[] = $dataOrder['Send_email_order'];
            $Tel[] = $dataOrder['Tel'];
        }

	?>

	<div id="wrapper">
		<?php include "header.php"; ?>
		<div class="container" style="margin-bottom:5%;">
                <div class="page-header">
                    <h3><a href="History.php">< ข้อมูลออเดอร์</a></h3>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="col-padding">
                            <h4>เลขออเดอร์</h4>
                            <p><?php echo "#".$idorder; ?></p>
                        </div>
                        <div class="col-padding">
                            <h4>ที่อยู่จัดส่ง</h4>
                            <p><?php echo $addressOrder[0]; ?></p>
                            <p><?php echo $emailOrder[0]; ?></p>
                            <p><?php echo $Tel[0]; ?></p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-padding">
                            <h4>ชื่อผู้สั่ง</h4>
                            <p><?php echo $nameuser[0]; ?></p>
                        </div>
                        <div class="col-padding">
                            <h4>สั่งเมื่อวันที่</h4>
                            <p><?php echo $date[0]; ?></p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-padding">
                            <h4>สถานะการชำระเงิน</h4>
                            <p>ชำระเงินแล้ว</p>
                        </div>
                        <div class="col-padding">
                            <h4>จำนวนสินค้า</h4>
                            <?php $countproduct = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(id_order) citem FROM `orderproductdetail` WHERE id_order = '$idorder'"));?>
                            <p><?php echo $countproduct['citem']." ชิ้น"; ?></p>
                        </div>
                    </div>
                </div>
                <hr/>
                <?php 
                    $selectproduct = "SELECT * FROM order_product op
                                INNER JOIN orderproductdetail opd ON opd.id_order = op.id_order
                                INNER JOIN product p ON p.id_product = opd.id_product
                                INNER JOIN store s ON s.id_store = p.id_store
                                WHERE op.id_user = '$iduser' AND op.id_order = '$idorder'
                                ORDER BY op.id_order";

                    $queryselectproduct = mysqli_query($connect,$selectproduct);
                ?>
                <div class="page-header">
                    <h3>ข้อมูลสินค้า</h3>
                </div>
                <div class="container">
                <?php 
                    while($row = mysqli_fetch_array($queryselectproduct)){ 
                        $showimg = "SELECT * FROM product p 
                                    INNER JOIN imgproductdetail ipd ON ipd.id_product = p.id_product
                                    INNER JOIN imgproduct ip ON ip.id_imgProduct = ipd.id_imgProduct
                                    WHERE p.id_product = '".$row['id_product']."' AND ipd.namethumbProduct = '".$row['namethumbProduct']."'";
                        $imgproduct = mysqli_fetch_array(mysqli_query($connect,$showimg));

                        $checkshipping = "SELECT op.id_order ,op.Name, op.Date_order , op.Totalprice ,sps.Status , sps.id_shipment , sps.id_orderDetail , sps.id_shipping , sps.ShipCode
                                            FROM order_product op
                                            LEFT JOIN store_product_shipment sps ON sps.id_order = op.id_order
                                            INNER JOIN orderproductdetail opd ON opd.id_orderDetail = sps.id_orderDetail
                                            WHERE op.id_user = '$iduser' AND sps.id_orderDetail = '".$row['id_orderDetail']."'
                                            ORDER BY op.id_order";
                        $shipping = mysqli_fetch_array(mysqli_query($connect,$checkshipping));
                                
                ?>
                <div class="row">
                    <div class="col-md-12 no-padding lib-item" data-category="view">
                        <div class="lib-panel">
                            <div class="row box-shadow">
                                <div class="col-md-6" style="text-align:  center;">
                                    <img class="lib-img-show" src="<?=$imgproduct['url_img'].$imgproduct['Name_img']?>">
                                </div>
                                <div class="col-md-6">
                                    <div class="lib-row lib-header">
                                        <h3>ชื่อสินค้า : <?=$row['NameProduct']?></h3>
                                        <div class="lib-header-seperator"></div>
                                    </div>
                                    <div class="lib-row lib-desc">
                                        <h4>รูปแบบสินค้า : <?=$row['namethumbProduct']?></h4>
                                        <h4>ชื่อร้านค้า : <?=$row['NameStore']?></h4>
                                        <h4>จำนวนสินค้า : <?=$row['qty']?></h4>
                                        <?php if(!empty($shipping['id_shipping']) && $shipping['Status'] >= 1){?>
                                        <h4>Trcking Number : <?=$shipping['ShipCode']?></h4>
                                        <?php }?>
                                        <div class="col-xs-12" style="padding:0">
                                            <div class="col-xs-12 col-md-5" style="margin-bottom:5px;">
                                            <a href="detailHistory.php?id_order=<?=$idorder?>" class="btn btn-info btn-block">รายละเอียดใบเสร็จ</a>
                                            </div>
                                            <div class="col-xs-12 col-md-5" style="margin-bottom:5px;">
                                                <?php if(!empty($shipping['id_shipping']) && $shipping['Status'] == 1){ ?>
                                                    <a class="btn btn-warning btn-block" href="?id_order=<?=$idorder?>&&confirmitem=yes&&id_detail=<?=$row['id_orderDetail']?>&&shipment=<?=$shipping['id_shipment']?>">ยืนยันรับของ</a>
                                                <?php 
                                                }else if(!empty($shipping['id_shipping']) && $shipping['Status'] == 2){
                                                ?>
                                                    <a class="btn btn-success btn-block">สินค้าได้รับเรียบร้อย</a>
                                                <?php }
                                                    else{
                                                ?>
                                                    <button class="btn btn-danger btn-block" disabled>สินค้ายังไม่มีการจัดส่ง</button>
                                                <?php
                                                    } 
                                                ?>
                                            </div>
                                            <?php if(!empty($shipping['id_shipping']) && $shipping['Status'] == 2){ ?>
                                                <div class="col-xs-12 col-md-10" style="margin-bottom:5px;">
                                                        <a class="btn btn-danger btn-block"  data-toggle="modal" data-target="#myModal">คืนสินค้า</a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php if(!empty($shipping['id_shipping']) && $shipping['Status'] == 2){ ?>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">คืนสินค้า</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <img class="img-responsive" src="<?=$imgproduct['url_img'].$imgproduct['Name_img']?>">
                                </div>
                                <!-- Email -->
                                <div class="form-group col-lg-6 col-md-6 col-xs-12" style="margin-top:0.5em">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" style="margin-top:0.5em">Email</label>
                                    <div class="col-md-9 col-sm-6 col-xs-9">
                                        <input id="email" name="email" type="text" placeholder="Email@info.com" class="form-control">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <?php 
                }
                    } 
                    if(!empty($_GET['id_order'])&&!empty($_GET['id_detail'])&&!empty($_GET['shipment'])&&!empty($_GET['confirmitem'])){
                        $updatestatus = "UPDATE `h514771_birdfire`.`store_product_shipment` SET `Status` = '2' 
                                            WHERE `store_product_shipment`.`id_shipment` = '".$_GET['shipment']."'";
                        if(mysqli_query($connect,$updatestatus)){
                            header("Location: DetailOrder.php?id_order=$idorder");
                        }
                        
                    }
                ?>
                </div>
        </div>
		<?php include "footer.php"; mysqli_close($connect);?>

	</div>
	<!-- wrapper -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type='text/javascript' src="js/jquery.mycart.min.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> -->
    <script type='text/javascript' src="js/app.js"></script>
     <!-- Datatables -->
    <script src="./Admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./Admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="./Admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./Admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="./Admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="./Admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="./Admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="./Admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="./Admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="./Admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./Admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="./Admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="./Admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="./Admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="./Admin/vendors/pdfmake/build/vfs_fonts.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="./Admin/build/js/custom.js"></script>
	
</body>

</html>