<?php

    include "connectdb.php";

    $data = json_decode(file_get_contents("php://input"));
    if(count($data) > 0){
        $nameproduct = mysqli_real_escape_string($data->productname);
        $qty = mysqli_real_escape_string($data->qty);
        $priceproduct = mysqli_real_escape_string($data->price);
        $sqlinsertProduct = "INSERT INTO `Product` (`id_product`, `NameProduct`, `qty`,`PriceProduct`) VALUES 
        (0, '$nameproduct', '$qty', '$priceproduct');";
    }


    $sqlinsertProduct .= "INSERT INTO `IMGProduct` (`id_imgProduct`, `Name_img`, `url_img`) VALUES 
    ('0', '$basenameproduct1', '$target_dir');";
    
    $queryinsertproduct = mysqli_query($connect,$sqlinsertProduct);

    $selectidproduct = "SELECT `id_product` FROM `Product` order by `id_product` DESC LIMIT 1";
    $selectidimg = "SELECT * FROM `IMGProduct` order by `id_imgProduct` DESC LIMIT 1";

    $queryselectidproduct = mysqli_query($connect,$selectidproduct);
    $idproduct = mysqli_fetch_array($queryselectidproduct);

    $queryselectimg = mysqli_query($connect,$selectidimg);
    while($row = mysqli_fetch_array($queryselectimg)){
        $idimgproduct[] = $row['id_imgProduct'];
    }

    $sqlinsertimgdetail = "INSERT INTO `IMGProductDetail` (`id_imgProductDetail`
    ,`NumberIMGProduct`, `id_product`, `id_imgProduct`) VALUES 
    ('0', '1', '".$idproduct['id_product']."', '$idimgproduct[0]');";
    
    $queryinsertimgdetail = mysqli_query($connect,$sqlinsertimgdetail);
    
    mysqli_close($connect);

?>