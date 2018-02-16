<div class="container">
    <div id="pay" class="">

    <!--SHIPPING METHOD-->
        <div class="panel-body">
            <div class="col-sm-8 col-xs-12" id="pay-form">
                <form class="form-horizontal" method="POST" name="paymentform" onsubmit="return validationPayment()"  autocomplete="off">
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
                        <input type="text" class="form-control" OnKeyPress="return chkNumber(this)" onKeyUp="if(this.value*1!=this.value) this.value='';" maxlength="16" name="cardnumber" placeholder="Debit/Credit Card Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" >วันหมดอายุ (ดด/ปป)</label>
                        <div class="col-sm-9">
                        <div class="row">
                            <div class="col-xs-3">
                            <select class="form-control col-sm-2" name="expirymonth" >
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
                            <?php
                            for ($i=0; $i <= 10; $i++) { 
                            ?>
                                <option value="<?=substr((date("Y")+$i),2)?>"><?=date("Y")+$i?></option>
                            <?php
                                }
                            ?>
                            </select>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">เลข CVV</label>
                        <div class="col-sm-3">
                            <input type="password" maxlength="3" OnKeyPress="return chkNumber(this)" onKeyUp="if(this.value*1!=this.value) this.value='';" class="form-control" name="cvv"  placeholder="Security Code"> 
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

            <script type="text/javascript">
                function chkNumber(ele)
                {
                var vchar = String.fromCharCode(event.keyCode);
                if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
                ele.onKeyPress=vchar;
                }
            </script>

            <?php
            if(!empty($_GET["id_order"])){

                if(!empty($_POST['Submitpayment'])){
                    
                    $idorder = mysqli_escape_string($connect,$_GET["id_order"]); ;
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
                                            INNER JOIN product ON product.id_product = orderproductdetail.id_product 
                                            WHERE `orderproductdetail`.`id_order` = '$idorder'";

                    $queryidstore = mysqli_query($connect,$sqlselectidstore);
                    


                    while($row = mysqli_fetch_array($queryidstore)){

                        

                        echo $strSQL = "INSERT INTO `store_product_shipment` (`id_shipment`, `id_order`, `id_payment`, `Status`, `id_store`, `id_orderDetail`, `id_shipping`, `ShipCode`) VALUES 
                        ('0', '$idorder', '$last_paymentid', '0', '".$row['id_store']."', '".$row['id_orderDetail']."', NULL, NULL);";
    
                        mysqli_query($connect,$strSQL);

                        

                    }
                    mysqli_close($connect);
                    
                    header("Location: ?Cart_Status=confirm&&id_order=".$idorder);
                }
            }
            else{
                header("Location: index.php");
            }
            ?>
        </div><!--SHIPPING METHOD END-->

        <script>
       
        function validationPayment()
        {
          var cardholdername =  document.forms['paymentform']['cardholdername'].value;
          var cardnumber =  document.forms['paymentform']['cardnumber'].value;
          var expirymonth =  document.forms['paymentform']['expirymonth'].value;
          var expiryyear =  document.forms['paymentform']['expiryyear'].value;
          var cvv =  document.forms['paymentform']['cvv'].value;
              
              
          var message ="Missing Content \n";
          var valid =true;
            
              
          if(cardholdername ==  null || cardholdername == ''){ valid = false; message = message + " - กรุณากรอกชื่อหน้าบัตร !! \n";}
         
          if(cardnumber ==  null || cardnumber == ''){ valid = false; message = message + " - กรุณากรอกเลขหน้าบัตร !! \n";}
          
          if(expirymonth ==  null || expirymonth == ''){ valid = false; message = message + " - กรุณาเลือกเดือนหมดอายุบัตร!! \n";}
          
          if(expiryyear ==  null || expiryyear == '') { valid = false; message = message + " - กรุณาเลือกปีหมดอายุบัตร !! \n"; }

          if(cvv ==  null || cvv == '') { valid = false; message = message + " - กรุณากรอกเลข CVV !! \n"; }
          
          
          if(valid == false)
                alert(message);
                return valid;
          }
       
   </script>
        <!-- end confirm -->
    </div> <!--id pay-->
</div>