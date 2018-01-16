<?php
    if(!empty($_POST['addproducttocart'])){

         $idproduct = $_POST['idproduct'];
         $nameproduct = $_POST['NameProduct'];
         $priceproduct = $_POST['PriceProduct'];
         $thumb = $_POST['thumb'];
         $qtyproduct = $_POST['qtyproduct'];
         $pkey = $idproduct. "_". $thumb;     
         
         if(empty($_SESSION["$pkey"])){
           
           $_SESSION['p_key'][] = ["id"=>$idproduct, "name"=>$nameproduct];
          
        }
        else{

            $key = array_search($idproduct, $_SESSION["cartproductID"]);

            if((string)$key != "")
            {
                $keythumb = array_search($thumb, $_SESSION["thumb"]);

                $_SESSION["cartproductQTY"][$key] = $_SESSION["cartproductQTY"][$key] + $qtyproduct;
            }
            
        }
    }
   
?>