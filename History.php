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
</head>

<body>

	<?php
		include 'Codephp/connectdb.php';
	?>

	<div id="wrapper">
		<?php include "header.php"; ?>
		<div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <table id="datatable-responsive2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>รหัสออเดอร์</th>
                                <th>ชื่อผู้สั่ง</th>
                                <th>วันที่สั่ง</th>
                                <th>ราคาทั้งหมด</th>
                                <th>สถานะการจ่ายเงิน</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            
                            $iduser = $_SESSION['idnumLoginWebsite'];

                            $select = "SELECT * FROM `Order_product` op
                                        LEFT JOIN Store_product_shipment sps ON sps.id_order = op.id_order
                                        WHERE op.id_user = '$iduser'
                                        ORDER BY op.id_order;";
                                        
                            $query = mysqli_query($connect,$select);

                            if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $row['id_order']; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Date_order']; ?></td>
                                    <td><?php echo number_format($row['Totalprice']); ?></td>
                                    <td><?php 
                                            if(!empty($row['id_shipment'])){
                                                if($row['Status'] == '1'){echo "Success";}
                                                else if($row['Status'] == '0'){echo "Pedding";}
                                            } 
                                            else{ echo "ยังไม่ได้ชำระเงิน";}
                                        ?></td>
                                    <td></td>
                                </tr>
                                <?php
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
	<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type='text/javascript' src="js/jquery.mycart.min.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> -->
	<script type='text/javascript' src="js/app.js"></script>
	
	<script type="text/javascript">
	
	// $('#setfocus').click(function() {
	// 	window.location.hash = '#sec-b';
	// });

	</script>
	
</body>

</html>