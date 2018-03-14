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
        


        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>ข้อมูลการซื้อของลูกค้า</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="tab" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#tab_content1" role="tab" data-toggle="tab" aria-expanded="true">รายการสินค้า</a>
                                            </li>
                                            <li role="presentation" class="">
                                                <?php 
                                                    $SQLcountNumberReturnItem = "SELECT COUNT(id_returnitem) as countitem FROM `returnitem` WHERE status_ReturnItem = '1'";
                                                    $countNumberReturnItem = mysqli_fetch_array(mysqli_query($connect,$SQLcountNumberReturnItem));
                                                ?>
                                                <a href="#tab_content2" role="tab" data-toggle="tab" aria-expanded="false">สินค้าส่งคืน (<?=$countNumberReturnItem['countitem']?>)</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1">
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
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!--tab_content1-->
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h4 class="text-center">ประวัติการสั่งซื้อ</h4>
                                                    <table id="datatable-responsive2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>รหัสออเดอร์</th>
                                                                <th>ชื่อสินค้า</th>
                                                                <th>วันที่ร้องเรียน</th>
                                                                <th>สาเหตุการคืน</th>
                                                                <th>จำนวนเงินที่ได้รับคืน</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                                $selectShowReturnItem = "SELECT * FROM returnitem r
                                                                                            INNER JOIN store_product_shipment sps ON sps.id_shipment = r.id_shipment
                                                                                            INNER JOIN orderproductdetail opd ON opd.id_orderDetail = sps.id_orderDetail
                                                                                            INNER JOIN order_product op ON op.id_order = sps.id_order
                                                                                            INNER JOIN user_member um ON um.id_user = op.id_user
                                                                                            INNER JOIN product p ON p.id_product = opd.id_product
                                                                                            WHERE op.id_user = '$iduser'";

                                                                $queryShowReturnItem = mysqli_query($connect,$selectShowReturnItem);

                                                                while($showReturnItem = mysqli_fetch_array($queryShowReturnItem)){
                                                                ?>
                                                                    <tr>
                                                                        <td><?=$showReturnItem['id_order']?></td>
                                                                        <td><?=$showReturnItem['NameProduct']?></td>
                                                                        <td><?=$showReturnItem['date_returnitem']?></td>
                                                                        <td><?=$showReturnItem['remark']?></td>
                                                                        <td><?=number_format($showReturnItem['return_Price'])?> บาท</td>
                                                                        <td>
                                                                            <?php
                                                                                if($showReturnItem['status_ReturnItem'] == '0'){
                                                                                    echo "รอการตอบรับจากทางเว็บไซต์";
                                                                                }else if($showReturnItem['status_ReturnItem'] == '1'){
                                                                                    echo "<button class='btn btn-warning btn-block' data-toggle='modal' data-target='#myModal'>ยืนส่งคืนสินค้า</button>";
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php if($showReturnItem['status_ReturnItem'] == '1'){ ?>
                                                                    <div id="myModal" class="modal fade" role="dialog">
                                                                        <div class="modal-dialog">
                                                                            <!-- Modal content-->
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    <h4 class="modal-title">คืนสินค้า</h4>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                                                                        <div class="form-group col-lg-12 col-md-12 col-xs-12" style="margin-top:0.5em">
                                                                                            <label class="control-label col-md-12 col-sm-12 col-xs-12" style="margin-top:0.5em">
                                                                                                **ลูกค้าได้ทำการส่งสินค้าคืนทางไปรษณีย์แล้วกรุณานำเลข Tracking ใส่เพื่อแจ้งว่าส่งสินค้าคืนเรียบร้อยแล้ว**
                                                                                            </label>
                                                                                        </div>
                                                                                        <form method="POST" name="returnItem">
                                                                                            <div class="form-group col-lg-12 col-md-12 col-xs-12" style="margin-top:0.5em">
                                                                                                <label class="control-label col-md-3 col-sm-4 col-xs-3" style="margin-top:0.5em">Tracking</label>
                                                                                                <div class="col-md-9 col-sm-8 col-xs-9">
                                                                                                    <input type="text" placeholder="ใส่เลข Tracking"  name="trackingReturnItem" id="trackingReturnItem" class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                        <input type="submit" name="submitReturnItem" class="btn btn-info" value="ยืนยัน">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div><!--myModal-->
                                                                <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div><!--col-md-12 col-sm-12 col-xs-12-->
                                            </div><!--tabpanel-->
                                        </div><!--myTabContent-->
                                    </div><!--tab-->
                                </div><!--x_content-->
                            </div><!--x_panel-->
                </div><!--col-md-12 col-sm-12 col-xs-12-->
            </div><!--row-->
        </div><!--container-->
        <?php include "footer.php"; mysqli_close($connect);?>
        
        <script>
       
        function validation()
        {
            var tracking_Return =  document.forms['returnItem']['trackingReturnItem'].value;
    
            var message ="Missing Content \n";
            var valid =true;        
              
            if(tracking_Return ==  null || tracking_Return == ''){ 
              valid = false; message = message + " - Tracking !! \n";
            }
         
            if(valid == false)
                alert(message);
                return valid;
            }
       
   </script>

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