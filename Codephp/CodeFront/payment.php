<div class="container">
    <div id="pay" class="">

    <!--SHIPPING METHOD-->
        <div class="panel-body">
            <div class="col-sm-8 col-xs-12" id="pay-form">
                <form class="form-horizontal">
                    <fieldset>
                    <legend>ชำระเงิน</legend>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ชื่อบนบัตร</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="cardholdername" placeholder="Card Holder's Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">เลขบนบัตร</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="cardnumber" placeholder="Debit/Credit Card Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" >วันหมดอายุ (ดด/ปป)</label>
                        <div class="col-sm-9">
                        <div class="row">
                            <div class="col-xs-3">
                            <select class="form-control col-sm-2" name="expirymonth" >
                                <option>เดือน</option>
                                <option value="01">Jan (01)</option>
                                <option value="02">Feb (02)</option>
                                <option value="03">Mar (03)</option>
                                <option value="04">Apr (04)</option>
                                <option value="05">May (05)</option>
                                <option value="06">June (06)</option>
                                <option value="07">July (07)</option>
                                <option value="08">Aug (08)</option>
                                <option value="09">Sep (09)</option>
                                <option value="10">Oct (10)</option>
                                <option value="11">Nov (11)</option>
                                <option value="12">Dec (12)</option>
                            </select>
                            </div>
                            <div class="col-xs-3">
                            <select class="form-control" name="expiryyear">
                                <option value="13">2013</option>
                                <option value="14">2014</option>
                                <option value="15">2015</option>
                                <option value="16">2016</option>
                                <option value="17">2017</option>
                                <option value="18">2018</option>
                                <option value="19">2019</option>
                                <option value="20">2020</option>
                                <option value="21">2021</option>
                                <option value="22">2022</option>
                                <option value="23">2023</option>
                            </select>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">เลข CVV</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="cvv"  placeholder="Security Code"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                        <input type="submit" name="Submitpayment" class="btn btn-success" value="ชำระเงิน">
                        <!-- id="btn-pay" -->
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
            <?php
                if(!empty($_POST['Submitpayment']) && !empty($_POST['cardholdername']) 
                    &&!empty($_POST['cardnumber']) &&!empty($_POST['expirymonth'])
                    &&!empty($_POST['cvv']) &&!empty($_POST['expiryyear'])){
                    
                    $idorder = $_GET["OrderID"];
                    $datepaymenmt = date("Y-m-d H:i:s");
                    $cardholdername = $_POST['cardholdername'];
                    $cardnumber = $_POST['cardnumber'];
                    $expirymonth = $_POST['expirymonth'];
                    $cvv = $_POST['cvv'];
                    $expiryyear = $_POST['expiryyear'];
    
                    $strSQL = "INSERT INTO `payment` (`id_payment`, `Type_payment`, `Payment_Status`, `DatePayment`, `id_code`) VALUES
                                ('0', 'VISA', 'pay', '$datepaymenmt', NULL);";
                
                    $queryinsertOrder = mysqli_query($connect,$strSQL);
                    if(!$queryinsertOrder)
                    {
                        echo $queryinsertOrder->error;
                        exit();
                    }
    
                    $last_paymentid = mysqli_insert_id($connect);
                    

                    $sqlselectidstore = "SELECT * FROM `orderproductdetail` 
                                            INNER JOIN product ON product.id_product = orderproductdetail.id_order 
                                            WHERE orderproductdetail.id_order = '$idorder'";

                    $queryidstore = mysqli_query($connect,$sqlselectidstore);
                    while($row = mysqli_fetch_array($queryidstore)){

                        $strSQL = "INSERT INTO `store_product_shipment` (`id_shipment`, `id_order`, `id_payment`, `Status`, `id_store`, `id_shipping`, `ShipCode`) VALUES 
                        ('0', '$idorder', '$last_paymentid', '0', '".$row['id_store']."' , NULL, NULL);";
    
                        mysqli_query($connect,$strSQL);

                    }
                    mysqli_close($connect);
                    
                    // echo "<script> function(){ $('.confirm').show(); $('#pay-form').hide();} </script>";
                }
            ?>
        </div><!--SHIPPING METHOD END-->

        <div class="row">
            <div class="confirm" style="display:none;">
                <p class="text-center">ระบบได้ทำการรับคำสั่งซื้อเรียบร้อยแล้ว.ตรวจสอบเลขที่การสั่งซื้อได้ที่นี่</p>
                <div class="col-xs-offset-5 col-xs-4">
                    <!-- <a id="hideconfirm" class="btn btn-default col-xs-offset-4 col-xs-5 center-block noborder btn-next" href="view_order.php?OrderID="></a> -->
                    <a class="btn btn-default col-xs-offset-4 col-xs-5 center-block noborder btn-next" href="DetailHistory.php?OrderID=<?php echo "#ใบสั่งซื้อ"+$_GET["OrderID"];?>">ยืนยัน</a>
                </div>
            </div>
        </div>
        <!-- end confirm -->
    </div> <!--id pay-->
</div>