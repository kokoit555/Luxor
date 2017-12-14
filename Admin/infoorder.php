<?php 

        $idorder = $_GET['idorder'];

        $sqlinfoOrder =  "SELECT op.id_order,um.Name, op.Date_order , p.NameProduct, opd.qty , opd.Price , op.Totalprice  , sps.Status 
                            FROM `Order_product` op 
                            INNER JOIN User_member um ON um.id_user = op.id_user 
                            INNER JOIN Store_product_shipment sps ON sps.id_order = op.id_order 
                            INNER JOIN OrderProductDetail opd ON opd.id_order = op.id_order 
                            INNER JOIN Product p ON p.id_product = opd.id_product
                            WHERE op.id_order = '$idorder'";

        $queryOrder = mysqli_query($connect,$sqlinfoOrder);

        while($dataOrder = mysqli_fetch_array($queryOrder)){
            $nameuser[] = $dataOrder['Name'];
            $nameproduct[] = $dataOrder['NameProduct'];
            $date[] = $dataOrder['Date_order'];
            $qtyorder[] = $dataOrder['qty'];
            $price[] = $dataOrder['Price'];
            $totalprice[] = $dataOrder['Totalprice'];
            $status[] = $dataOrder['Status'];
        }

        mysqli_close($connect);
 ?>

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
                <div class="x_title">
                    <h2 class="text-center">ข้อมูลออเดอร์</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>

                    &nbsp
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">รหัสออเดอร์ : </label>
                            <label class="col-md-9 col-sm-9 col-xs-12"><?php echo $idorder; ?></label>
                        </div>
                        &nbsp
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อผู้สั่ง : </label>
                            <label class="col-md-9 col-sm-9 col-xs-12"><?php echo $nameuser[0]; ?></label>
                        </div>
                        &nbsp
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">วันที่สั่งของ : </label>
                            <label class="col-md-9 col-sm-9 col-xs-12"><?php echo $date[0]; ?></label>
                        </div>
                        &nbsp
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">ราคาทั้งหมด : </label>
                            <label class="col-md-9 col-sm-9 col-xs-12"><?php echo number_format($totalprice[0])." บาท"; ?></label>
                        </div>
                        &nbsp
                        <div class="ln_solid"></div>
                    <?php 
                        for ($i=0; $i < count($nameproduct) ; $i++){ 
                    ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">สินค้าที่สั่ง : </label>
                            <label class="col-md-9 col-sm-9 col-xs-12"><?php echo $nameproduct[$i]; ?></label>
                        </div>
                        &nbsp
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">จำนวน : </label>
                            <label class="col-md-9 col-sm-9 col-xs-12"><?php echo $qtyorder[$i]; ?></label>
                        </div> 
                        &nbsp
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">ราคา : </label>
                            <label class="col-md-9 col-sm-9 col-xs-12"><?php echo $price[$i]." บาท"; ?></label>
                        </div>
                        &nbsp
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">สถานะจัดส่ง : </label>
                            <label class="col-md-9 col-sm-9 col-xs-12"><?php if($status[0] == '1'){echo "Success";}else if($status[0] == '0'){echo "Pedding";} ?></label>
                        </div>
                        &nbsp
                        <div class="ln_solid"></div>
                    <?php } ?>
                        &nbsp
                        &nbsp
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <a href="?link=listproduct&&idstore=<?php echo $_GET['idstore']; ?>" type="submit" class="btn btn-primary btn-lg"> ย้อนกลับ </a>
                            </div>
                        </div>
            </div>
        </div>
    </div> <!--col-md-12 col-sm-12 col-xs-12-->
</div><!--row-->
<div class="clearfix"></div>


           