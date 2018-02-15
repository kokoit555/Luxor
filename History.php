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

	<?php
		include 'Codephp/connectdb.php';
	?>

	<div id="wrapper">
		<?php include "header.php"; ?>
		<div class="container" style="margin-top:5%;margin-bottom:5%;">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4 class="text-center">ประวัติการสั่งซื้อ</h4>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>รหัสออเดอร์</th>
                                <th>ชื่อผู้สั่ง</th>
                                <th>วันที่สั่ง</th>
                                <th>ราคาทั้งหมด</th>
                                <th>สถานะการจ่ายเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            
                            $iduser = $_SESSION['idnumLoginWebsite'];

                            $select = "SELECT op.id_order ,op.Name, op.Date_order , op.Totalprice , sps.id_shipment
                                        FROM `order_product` op
                                        LEFT JOIN store_product_shipment sps ON sps.id_order = op.id_order
                                        WHERE op.id_user = '$iduser'
                                        ORDER BY op.id_order;";
                            // $select = "SELECT * FROM `order_product` op";
                                        
                            $query = mysqli_query($connect,$select);
                            $check = true;
                            $setnum2 = "0";
                            if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_array($query)){
                                    $setnum1 = $row['id_order'];
                                    if($setnum1 == $setnum2){$check = false;}
                                    else{$setnum2 = $row['id_order'];$check = true;}
                                    if($check){
                                ?>
                                <tr>
                                    <td><?php echo $row['id_order']; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Date_order']; ?></td>
                                    <td><?php echo number_format($row['Totalprice']); ?> บาท</td>
                                    <td>
                                        <?php 
                                            if(!empty($row['id_shipment'])){
                                                echo "<a href='DetailOrder.php?id_order=".$row['id_order']."' class='btn btn-info btn-block'>ดูรายละเอียด</a>";
                                            } 
                                            else{ echo "<a href='Cartproduct.php?Cart_Status=payment&&id_order=".$row['id_order']."' class='btn btn-warning btn-block'>ชำระเงิน</a>";}
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                    }
                                   
                                }
                            }
                            mysqli_close($connect);
                        ?>
                        </tbody>
                    </table>

                    

                </div>
            </div>
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