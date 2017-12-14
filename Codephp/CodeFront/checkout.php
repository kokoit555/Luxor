<div class="container ">
    <div class="table-responsive panel-contant">
        <h4>รายการสั่งซื้อ</h4>
        <table class="table">
           <?php   
                $totalprice = 0;
                if(!empty($_SESSION['cartproductID'])){
                    for ($i=0; $i < count($_SESSION['cartproductID']); $i++) 
                    { 
                        $id = $_SESSION['cartproductID'][$i];
                        $name = $_SESSION['cartproductNAME'][$i];
                        $qty = $_SESSION['cartproductQTY'][$i];
                        $price = str_replace("," ,"",$_SESSION['PriceProduct'][$i]);

                        $price *= $qty;
                        $totalprice += $price;
                        if($_SESSION['cartproductID'] != ""){
            ?>
                        <tbody>
                            <tr>
                                <td style="border:0;">id</td>
                                <td style="border:0;">ชื่อสินค้า</td>
                                <td style="border:0;">ราคา</td>
                                <td style="border:0;">จำนวน</td>
                                <td class="text-right" style="border:0;">รวม</td>
                                
                            </tr>
                            <tr>
                                <td><?=$id;?></td>
                                <td><?=$name;?></td>
                                <td><?=number_format($price,2);?></td>
                                <td><?=$qty;?></td>
                                <td class="text-right"><?=number_format($totalprice,2);?></td>
                            </tr>
                        </tbody>
            <?php
                        }
                    }
                    $_SESSION['carttotalprice'] = $totalprice;
                }
            ?>
        </table>
    </div>
    <div class="center-block">
        <h4 class="text-right ">
            ราคารวมทั้งหมด <span class="CRed"><?php echo number_format($totalprice,2);?> </span> บาทถ้วน
        </h4>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-12">
            <a class=" btn btn-default col-xs-6 center-block noborder btn-next" href="./Cartproduct.php">กลับหน้าตะกร้าสินค้า</a>
            <a class="btn btn-default col-xs-6 center-block noborder btn-next" <?php if(empty($_SESSION['idnumLoginWebsite'])) {echo "disabled href='#' >กรุณาเข้าสู่ระบบ";}else{echo "href='?Cart_Status=shipping' >ดำเนินการต่อ";} ?></a>
            
        </div>
    </div>
</div>