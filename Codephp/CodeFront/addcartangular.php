<?php
        
        session_start();

        $data = json_decode(file_get_contents("php://input"));

        if(count($data) > 0){
            $idproduct = $data->idproduct;
            $nameproduct = $data->NameProduct;
            $priceproduct = $data->PriceProduct;
            $thumb = $data->thumb;
            $qtyproduct = $data->qtyproduct;
        }
        else{
            echo "ไม่มีค่า";
        }
        
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
        }
?>

