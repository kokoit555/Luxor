<?php

    if(!empty($_POST['addproducttocart'])){

        $idproduct = $_POST['id_product'];
        $nameproduct = $_POST['NameProduct'];
        $priceproduct = $_POST['PriceProduct'];
        $thumb = $_POST['thumb'];
        $qtyproduct = $_POST['qtyproduct'];
        
        if(empty($_SESSION['cartproductID'])){
            $_SESSION['cartproductID'][] = $idproduct;
            $_SESSION['cartproductNAME'][] = $nameproduct;
            $_SESSION['PriceProduct'][]= $priceproduct;
            $_SESSION['cartproductQTY'][] = $qtyproduct;
            $_SESSION['thumb'][] = $thumb;
        }
        else{

            $key = array_search($idproduct, $_SESSION["cartproductID"]);

            if((string)$key != "")
            {
                 $_SESSION["cartproductQTY"][$key] = $_SESSION["cartproductQTY"][$key] + $qtyproduct;
            }
            else
            {
                $_SESSION['cartproductID'][] = $idproduct;
                $_SESSION['cartproductNAME'][] = $nameproduct;
                $_SESSION['PriceProduct'][]= $priceproduct;
                $_SESSION['cartproductQTY'][] = $qtyproduct;
                $_SESSION['thumb'][] = $thumb;
            }
        }
    }
?>