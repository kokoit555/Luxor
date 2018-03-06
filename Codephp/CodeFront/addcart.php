<?php
    

    if(!empty($_POST['addproducttocart'])){

        $idproduct = $_POST['idproduct'];
        $nameproduct = $_POST['NameProduct'];
        $priceproduct = $_POST['PriceProduct'];
        if(empty($_POST['thumb'])){$thumb = 1;}else{$thumb = $_POST['thumb'];}
        $qtyproduct = $_POST['qtyproduct'];
        $pkey = $idproduct.$thumb;     

        $sqlimg = "SELECT * FROM product 
                        INNER JOIN imgproductdetail ON product.id_product = imgproductdetail.id_product
                        INNER JOIN imgproduct ON imgproduct.id_imgProduct = imgproductdetail.id_imgProduct
                        WHERE product.id_product = '$idproduct' AND imgproductdetail.namethumbProduct = '$thumb'";

        $query = mysqli_query($connect,$sqlimg);
        $outputimg = mysqli_fetch_array($query);
        $cartImg = $outputimg['url_img'].$outputimg['Name_img'];
         
        if(empty($_SESSION['cartProduct'])){

            $_SESSION['cartProduct'][] = array("NumberListProduct"=>$pkey
                                        , "idProduct"=>$idproduct
                                        , "imgProduct" => $cartImg
                                        , "nameProduct"=>$nameproduct
                                        , "priceProduct"=>$priceproduct
                                        , "thumb"=>$thumb
                                        , "qtyproduct"=>$qtyproduct);
        }
        else{

            $new = array_combine(array_keys($_SESSION['cartProduct']) , array_column($_SESSION['cartProduct'], 'NumberListProduct'));
            
            $key = array_search($pkey, $new);

            if((string)$key != "")
            {
                $_SESSION['cartProduct'][$key]['qtyproduct'] = $_SESSION['cartProduct'][$key]['qtyproduct'] + $qtyproduct;
            }
            else{
                $_SESSION['cartProduct'][] = array("NumberListProduct"=>$pkey
                                        , "idProduct"=>$idproduct
                                        , "imgProduct" => $cartImg
                                        , "nameProduct"=>$nameproduct
                                        , "priceProduct"=>$priceproduct
                                        , "thumb"=>$thumb
                                        , "qtyproduct"=>$qtyproduct);
            }
            
        }
    }
   
?>