<?php

    if(!empty($_POST['addproducttocart'])){

        $dirimg = $row['url_img']."".$row['Name_img'];
        $idproduct = $row['id_product'];
        $nameproduct = $row['NameProduct'];
        $priceproduct = $row['PriceProduct'];
        $qtyproduct = $_POST['qtyproduct'];
        
        if(empty($_SESSION['cartproductID'])){
            $_SESSION['cartproductIMG'][] = $dirimg;
            $_SESSION['cartproductID'][] = $idproduct;
            $_SESSION['cartproductNAME'][] = $nameproduct;
            $_SESSION['PriceProduct'][]= $priceproduct;
            $_SESSION['cartproductQTY'][] = $qtyproduct;
        }
        else{

            $key = array_search($idproduct, $_SESSION["cartproductID"]);

            if((string)$key != "")
            {
                 $_SESSION["cartproductQTY"][$key] = $_SESSION["cartproductQTY"][$key] + $qtyproduct;
            }
            else
            {
                $_SESSION['cartproductIMG'][] = $dirimg;
                $_SESSION['cartproductID'][] = $idproduct;
                $_SESSION['cartproductNAME'][] = $nameproduct;
                $_SESSION['PriceProduct'][]= $priceproduct;
                $_SESSION['cartproductQTY'][] = $qtyproduct;
            }
        }
    }
?>