<?php
        
        session_start();

        $data = json_decode(file_get_contents("php://input"));

        if(count($data) > 0){
            echo $idproduct = $data->idproduct;
            echo $nameproduct = $data->NameProduct;
            echo $priceproduct = $data->PriceProduct;
            echo $thumb = $data->thumb;
            echo $qtyproduct = $data->qtyproduct;
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

