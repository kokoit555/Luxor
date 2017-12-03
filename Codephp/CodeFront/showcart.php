<?php 

    if(!empty($_SESSION['cartproductID'])){

        $totalprice = 0;
        // print_r($_SESSION['PriceProduct']);
        // echo str_replace("," ,"",$_SESSION['PriceProduct'][0]);
        for ($i=0; $i < count($_SESSION['cartproductID']); $i++) { 
            
            
            $id = $_SESSION['cartproductID'][$i];
            $name = $_SESSION['cartproductNAME'][$i];
            $img = $_SESSION['cartproductIMG'][$i];
            $qty = $_SESSION['cartproductQTY'][$i];
            $price = str_replace("," ,"",$_SESSION['PriceProduct'][$i]);

            $price *= $qty;
            $totalprice += $price;
?>
            <tbody>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="<?php echo $img; ?>" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-10">
                            <h4 class="nomargin"><?php echo $name; ?></h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price"><?php echo number_format($_SESSION['PriceProduct'][$i]); ?> บาท</td>
                <td data-th="Quantity">
                    <input type="number" class="form-control text-center" value="<?php echo $qty; ?>" min="1" max="999">
                </td>
                <td class="actions" data-th="" style="text-align:center;">
                    <a href="Codephp/deletecart.php?slotdelete=<?php echo $i; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>								
                </td>
            </tr>
        </tbody>
<?php

        }
    }
?>
    

