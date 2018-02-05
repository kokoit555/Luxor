
<?php 
    $totalprice = 0;
    if(!empty($_SESSION['cartProduct'])){

        // $Total = 0;
        // $SumTotal = 0;
        //print_r($_SESSION['cartproductNAME']);
        // echo str_replace("," ,"",$_SESSION['PriceProduct'][0]);
        for ($i=0; $i < count($_SESSION['cartProduct']); $i++) { 
            
            $imgProduct = $_SESSION['cartProduct'][$i]['imgProduct'];
            $id = $_SESSION['cartProduct'][$i]['idProduct'];
            $name = $_SESSION['cartProduct'][$i]['nameProduct'];
            $qty = $_SESSION['cartProduct'][$i]['qtyproduct'];
            $thumb = $_SESSION['cartProduct'][$i]['thumb'];
            $price = str_replace("," ,"",$_SESSION['cartProduct'][$i]['priceProduct']);
            $pkey = $_SESSION['cartProduct'][$i]['NumberListProduct'];
            $price *= $qty;
            $totalprice += $price;
            if($_SESSION['cartProduct'][$i]['idProduct'] != ""){
?>
            <tbody>
            <tr>
                <td data-th="pkey"><img style="width:120px;height:100px;" src="<?php echo $imgProduct; ?>" alt="รูปสินค้า"></td>
                <td data-th="Product"><?php echo $name; ?> </td>
                <td data-th="Price"><?php echo number_format($price); ?> บาท</td>
                <td data-th="Quantity">
                    <input type="number" name="updateqty[]" class="form-control text-center" value="<?php echo $qty; ?>" min="1" max="999">
                </td>
                <td class="actions" data-th="" style="text-align:center;">
                    <a href="./Codephp/CodeFront/deletecart.php?slotdelete=<?php echo $i; ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash-o" aria-hidden="true"></span></a>								
                </td>
            </tr>
        </tbody>
<?php
            }
        }
    }
?>
<script type="text/javascript">

        const numInputs = document.querySelectorAll('input[type=number]')
            numInputs.forEach(
                function (input) {
                        input.addEventListener('change', function (e) {
                            if (e.target.value == '') {
                                e.target.value = 1
                            }
                            else if(e.target.value == '0'){
                                e.target.value = 1
                            }
                        })
                    }
                )
</script>
    
