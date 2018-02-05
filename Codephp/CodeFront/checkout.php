<div class="container ">
    <div class="table-responsive panel-contant">
        <h4>รายการสั่งซื้อ</h4>
        <table class="table">
                        <tbody>
                            <tr>
                                <td style="border:0;">รูปสินค้า</td>
                                <td style="border:0;">ชื่อสินค้า</td>
                                <td style="border:0;">ราคา</td>
                                <td style="border:0;">จำนวน</td>
                                <td class="text-right" style="border:0;">รวม</td>
                            </tr>
           <?php   
                $totalprice = 0;
                if(!empty($_SESSION['cartProduct'])){
                    for ($i=0; $i < count($_SESSION['cartProduct']); $i++) 
                    { 
                        $imgProduct = $_SESSION['cartProduct'][$i]['imgProduct'];
                        $id = $_SESSION['cartProduct'][$i]['idProduct'];
                        $name = $_SESSION['cartProduct'][$i]['nameProduct'];
                        $qty = $_SESSION['cartProduct'][$i]['qtyproduct'];
                        $price = str_replace("," ,"",$_SESSION['cartProduct'][$i]['priceProduct']);
                        $thumb = $_SESSION['cartProduct'][$i]['thumb'];
                        $price *= $qty;
                        $totalprice += $price;
                        
            ?>
                        
                            <tr>
                                <td><img style="width:120px;height:100px;" src="<?php echo $imgProduct; ?>" alt="รูปสินค้า"></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo number_format($price,2);?></td>
                                <td><?php echo $qty;?></td>
                                <td class="text-right"><?php echo number_format($totalprice,2);?></td>
                            </tr>
                        </tbody>
            <?php
                        
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
            <a class=" btn btn-default col-xs-6 center-block noborder btn-next" href="./New_Cartproduct.php">กลับหน้าตะกร้าสินค้า</a>
            <a class="btn btn-default col-xs-6 center-block noborder btn-next" <?php if(empty($_SESSION['idnumLoginWebsite'])) {echo "disabled href='#' >กรุณาเข้าสู่ระบบ";}else{echo "href='?Cart_Status=shipping' >ดำเนินการต่อ";} ?></a>
            
        </div>
    </div>
</div>