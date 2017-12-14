<div class="container">
    <div id="Address" class="">
        <form name="form1" method="post">
            <!--SHIPPING METHOD-->
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-12 col-xs-12">
                        <h4>ที่อยู่จัดส่ง</h4>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-xs-12">
                        <p>ชื่อ</p>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $_SESSION['NameUser']; ?>" />
                    </div>
                    <div class="span1"></div>
                    <div class="col-md-6 col-xs-12">
                            <p>นามสกุล</p>
                            <input type="text" name="last_name" class="form-control" value="<?php echo$_SESSION['LastNameUser']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12"><p>ที่อยู่</p></div>
                    <div class="col-md-12">
                        <input type="text" name="address" class="form-control" value="<?php echo$_SESSION['AddressUser']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-xs-12">
                        <p>อำเภอ / เขค:</p>
                        <input type="text" name="city" class="form-control" value="<?php echo$_SESSION['CityUser']; ?>" />
                    </div>
                    <div class="span1"></div>
                    <div class="col-md-6 col-xs-12">
                        <p>จังหวัด</p>
                        <input type="text" name="state" class="form-control" value="<?php echo$_SESSION['StateUser']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-xs-12">
                        <p>ประเทศ</p>
                        <input type="text" name="country" class="form-control" value="<?php echo$_SESSION['CountryUser']; ?> " />
                    </div>
                    <div class="span1"></div>
                    <div class="col-md-6 col-xs-12">
                        <p>รหัสไปรษณีย์</p>
                        <input type="text" name="zip_code" class="form-control" value="<?php echo$_SESSION['ZipUser']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12"><p>เบอร์โทรศัพท์</p></div>
                    <div class="col-md-12"><input type="text" name="txtTel" class="form-control" value="<?php echo$_SESSION['TelUser']; ?>" /></div>
                </div>
                <div class="form-group">
                    <div class="col-md-12"><p>อีเมล</p></div>
                    <div class="col-md-12"><input type="text" name="txtEmail" class="form-control" value="<?php echo$_SESSION['EmailUser']; ?>" /></div>
                </div>
            </div>
                <!--SHIPPING METHOD END-->
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-default col-xs-6 center-block noborder btn-next" href="?Cart_Status=checkout">ย้อนกลับ</a>
                    <input  class="btn btn-success center-block col-xs-6 center-block noborder btn-next" 
                            type="submit" name="SubmitShipping" value="ยืนยันการชำระเงิน" <?php if(empty($_SESSION['idnumLoginWebsite'])){echo "disabled";} ?>>
                <!--   <a class=" col-xs-6 center-block" href="./shipping.php">ดำเนินการต่อ</a> -->
                </div>
            </div>
        </form>
        <?php 
        if(!empty($_POST['SubmitShipping'])){
                $totalprice = $_SESSION['carttotalprice'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $address = $_POST['address'];
                $country = $_POST['country'];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $zip_code = $_POST['zip_code'];
                $txtTel = $_POST['txtTel'];
                $txtEmail = $_POST['txtEmail'];
                $iduser = $_SESSION['idnumLoginWebsite'];
                $dateinput = date("Y-m-d H:i:s");

                $strSQL = "INSERT INTO `Order_product` (`id_order`, `id_user`, `Date_order`, `Tax`, `Name`, `LastName`, `Tel`, `Address`, `Zip`, `Send_email_order`, `Totalprice`) 
                            VALUES('0', '$iduser', '$dateinput', '7%', '$first_name','$last_name', '$txtTel'
                                    , '$address"." อำเภอ"."$state"." จังหวัด"."$city"." ประเทศ"."$country', '$zip_code', '$txtEmail', '$totalprice');";

                $queryinsertOrder = mysqli_query($connect,$strSQL);
                if(!$queryinsertOrder)
                {
                    echo $queryinsertOrder->error;
                    exit();
                }

                $last_orderid = mysqli_insert_id($connect);

                for($i=0;$i< count($_SESSION['cartproductID']);$i++)
                {
                    if($_SESSION["cartproductID"][$i] != "")
                    {
                            echo $strSQL = "INSERT INTO `OrderProductDetail` (`id_orderDetail`, `id_order`, `id_product`, `qty`, `Price`) VALUES 
                                        ('0', '$last_orderid', '".$_SESSION['cartproductID'][$i]."', '".$_SESSION['cartproductQTY'][$i]."', '".$_SESSION['PriceProduct'][$i]."');";
                            mysqli_query($connect,$strSQL);
                    }
                }


                unset($_SESSION['cartproductID']);
                unset($_SESSION['cartproductNAME']);
                unset($_SESSION['PriceProduct']);
                unset($_SESSION['cartproductQTY']);
                mysqli_close($connect);

                header("location: ?Cart_Status=payment&&id_order=".$last_orderid);
        }
        ?>
    </div>
</div>