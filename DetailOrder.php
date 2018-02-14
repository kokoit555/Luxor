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
        .ItemDetailOrder {
            width: 100%;
            display: flex;
            margin: 1em 0;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.25);
        }
        .ItemDetailOrder .img-container {
            flex: 2;
        }
        .ItemDetailOrder .img-container img {
            margin : auto;
            display: block;
            width: 300px;
            height: 250px;
        }
        .ItemDetailOrder .ItemDetailOrder-info {
            background: #fff;
            flex: 3;
        }
        .ItemDetailOrder .ItemDetailOrder-info .ItemDetailOrder-content {
            padding: .2em 0 .2em 1em;
        }
        .ItemDetailOrder .ItemDetailOrder-info .ItemDetailOrder-content h1 {
            font-size: 1.5em;
        }
        .ItemDetailOrder .ItemDetailOrder-info .ItemDetailOrder-content p {
            color: #636363;
            font-size: .9em;
            font-weight: bold;
            width: 100%;
        }
        .ItemDetailOrder .ItemDetailOrder-info .ItemDetailOrder-content ul li {
            color: #636363;
            font-size: .9em;
            margin-left: 0;
        }
        .ItemDetailOrder .ItemDetailOrder-info .ItemDetailOrder-content .buttons {
            padding-top: .4em;
        }
        .ItemDetailOrder .ItemDetailOrder-info .ItemDetailOrder-content .buttons .button {
            text-decoration: none;
            color: #5e5e5e;
            font-weight: bold;
            padding: .3em .65em;
            border-radius: 2.3px;
            transition: all .1s ease-in-out;
        }
        .ItemDetailOrder .ItemDetailOrder-info .ItemDetailOrder-content .buttons .add {
            border: 1px #5e5e5e solid;
        }
        .ItemDetailOrder .ItemDetailOrder-info .ItemDetailOrder-content .buttons .add:hover {
            border-color: #6997b6;
            color: #6997b6;
        }
        .ItemDetailOrder .ItemDetailOrder-info .ItemDetailOrder-content .buttons .buy {
            border: 1px #5e5e5e solid;
        }
        .ItemDetailOrder .ItemDetailOrder-info .ItemDetailOrder-content .buttons .buy:hover {
            border-color: #6997b6;
            color: #6997b6;
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
            <div class="row">
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
                     echo $selectproduct = "SELECT * FROM order_product op
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
                <?php while($row = mysqli_fetch_array($queryselectproduct)){ ?>
                <div class="row">
                    <div class="ItemDetailOrder">
                        <div class="img-container">
                            <img src="<?=$row['']?>" alt="รูปสินค้า">
                        </div>
                        <div class="ItemDetailOrder-info">
                        <div class="ItemDetailOrder-content">
                            <h1><?=$row['NameProduct']?></h1>
                            <p><?=$row['productDetail'];?></p>
                            <ul>
                                <li>Lorem ipsum dolor sit ametconsectetu.</li>
                                <li>adipisicing elit dlanditiis quis ip.</li>
                                <li>lorem sde glanditiis dars fao.</li>
                            </ul>
                            <div class="buttons">
                                <a class="button buy" href="#">Buy</a>
                                <a class="button add" href="#">Add to Cart</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                </div>
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