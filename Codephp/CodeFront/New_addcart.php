<?php
    if(!empty($_POST['addproducttocart'])){

         $idproduct = $_POST['idproduct'];
         $nameproduct = $_POST['NameProduct'];
         $priceproduct = $_POST['PriceProduct'];
         $thumb = $_POST['thumb'];
         $qtyproduct = $_POST['qtyproduct'];
         $pkey = $idproduct. "_". $thumb;     
         
         if(empty($_SESSION['cartProduct'])){
           
           $_SESSION['cartProduct'][] = ["idProduct"=>$idproduct, "nameProduct"=>$nameproduct, "priceProduct"=>$priceproduct];
          
        }
        else{

            $new = array_combine(array_keys($gg), array_column($gg, 'id'));
            
            $key = array_search('$idproduct', $_SESSION['cartProduct']);

            if((string)$key != "")
            {
                $_SESSION['cartProduct'][$key]['qtyproduct'] = $_SESSION['cartProduct'][$key]['qtyproduct'] + $qtyproduct;
            }
            
        }
    }
   
?>