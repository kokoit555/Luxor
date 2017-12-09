<?php

if(!empty($_GET['idproduct'])){

    $selectdataproduct = "SELECT * FROM `Product` WHERE `id_product` = '".$_GET['idproduct']."';";
    if($query = mysqli_query($connect,$selectdataproduct)){
        $rowitem = mysqli_fetch_array($query);
    }
    if($rowitem['id_product'] != null){
        $img = "SELECT * FROM `IMGProductDetail` WHERE `id_product` = '".$_GET['idproduct']."'; ";

        if($result = mysqli_query($connect,$img)){
            while($row = mysqli_fetch_array($result)){
                $idimg[] = $row['id_imgProduct'];
                $thumb[] = $row['urlthumbProduct'];
                $qty[] = $row['qty'];
 
                // $selecturlimg = "SELECT * FROM `IMGProduct` WHERE `id_imgProduct` = '".$row['id_imgProduct']."';";
                // $queryurlimg = mysqli_query($connect,$selecturlimg);
                // $urlimg[] = mysqli_fetch_array($queryurlimg); 
            }
        }
    }

}

if(!empty($_POST['submiteditproduct'])){


    // $nameproduct = $_POST['product_name'];
    // $qty = $_POST['quant'];
    // $priceproduct = $_POST['priceproduct'];
    // $textproductdetail = $_POST['message'];
    // $idtype = $_POST['SettypeProduct'];
    // $idstory = $_POST['SetstoryProduct'];

    // $sql = "UPDATE `Product` SET 
    // `NameProduct`='$nameproduct',
    // `qty`= '$qty',
    // `PriceProduct`= '$priceproduct',
    // `textProductDetail`= '$textproductdetail',
    // `id_type`= '$idtype',
    // `id_story`= '$idstory'
    // WHERE `id_product` = '".$_GET['idproduct']."'";

    mysqli_query($connect,$sql);
    header("Location: ./Listproduct.php");
}
?>


