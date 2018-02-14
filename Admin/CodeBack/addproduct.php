<?php

    if(!empty($_POST['submitinsertproduct'])){
        $nameproduct = $_POST['product_name'];
        $status = "Stock";
        $priceproduct = $_POST['priceproduct'];
        $discount = "0%";
        $tax = "7%";
        $date = date("Y-m-d");
        $productDetail = $_POST['productDetail'];
        $textproductdetail = $_POST['message'];
        $idtype = $_POST['SettypeProduct'];
        $Customize = $_POST['checkCustomize'];
        $idstore = $_GET['idstore'];


        echo $sqlinsertProduct = "INSERT INTO  `product` (`id_product`, `NameProduct`, `Status`, `PriceProduct`, 
        `discount`, `tax`, `date_input`, `productDetail`, `textProductDetail`, `checkCustomize`, `id_type`, `id_store`) VALUES
         ('0', '$nameproduct', '$status', '$priceproduct', '$discount', '$tax', '$date', '$productDetail','$textproductdetail','$Customize' ,'$idtype', '$idstore');";
    
        if(mysqli_query($connect,$sqlinsertProduct)){ echo "Complete insert product";}

        $idproduct = mysqli_insert_id($connect);

        for ($i=0; $i < count($_POST['quant']); $i++) { 
            $qty[] = $_POST['quant'][$i];
            $sqlinsertimg = "";
            
            $target_dir = "images/product/";
            // $Str_file = explode(".",$_FILES["input-file-img-product"]["name"][$i]);
            // $new_name="ทดสอบ_upload.".$Str_file[1];
            $basenameproduct = basename($idproduct.$i);
            $target_file = $target_dir . $basenameproduct;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($_FILES["input-file-img-product"]["tmp_name"][$i]);
    
            $target_dir_thumb = "images/thumbproduct/";
            $basenameproduct_thumb = basename($idproduct.$i);
            $target_file_thumb = $target_dir_thumb . $basenameproduct_thumb;
            $imageFileType_thumb = pathinfo($target_file_thumb,PATHINFO_EXTENSION);
            $check_thumb = getimagesize($_FILES["input-file-img-product-thumb"]["tmp_name"][$i]);
    
            if($check !== false && $check_thumb !== false) {$uploadOk = 1;}  else {$uploadOk = 0;}
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "PNG" 
                && $imageFileType_thumb != "jpg" && $imageFileType_thumb != "png" && $imageFileType_thumb != "JPG" && $imageFileType_thumb != "PNG") 
            { $uploadOk = 0;}

            if ($uploadOk == 0) {echo "Sorry, your file was not uploaded.";} 
            else if($uploadOk == 1){
                if (move_uploaded_file($_FILES["input-file-img-product"]["tmp_name"][$i], "../".$target_file) &&
                    move_uploaded_file($_FILES["input-file-img-product-thumb"]["tmp_name"][$i], "../".$target_file_thumb))
                {
                    echo "The file has been uploaded.";
                }    
            }
            else{
                echo "Error";
            }

            $sqlinsertimg = "INSERT INTO `imgproduct` (`id_imgProduct`, `Name_img`, `url_img`) VALUES 
            ('0', '$basenameproduct', '$target_dir');";

            if(mysqli_query($connect,$sqlinsertimg)){echo "insert img complete ".($i);}

            $selectidproduct = "SELECT `id_product` FROM `product` order by `id_product` DESC LIMIT 1";
            $selectidimg = "SELECT `id_imgProduct` FROM `imgproduct` order by `id_imgProduct` DESC LIMIT 1";
    
            $idproduct = mysqli_fetch_array(mysqli_query($connect,$selectidproduct));
            $idimgproduct = mysqli_fetch_array(mysqli_query($connect,$selectidimg));
    
            $namethumb = $i+1;
            echo $sqlinsertimgdetail = "INSERT INTO `imgproductdetail` (`id_imgProductDetail`, `id_product`, `id_imgProduct`, `namethumbProduct`, `urlthumbProduct`, `qty`) VALUES
             ('0', '".$idproduct['id_product']."', '".$idimgproduct['id_imgProduct']."', '$namethumb', '$target_file_thumb', '".$qty[$i]."');";
            
            if(mysqli_query($connect,$sqlinsertimgdetail))
            { 
                echo "complete insert detailproduct".$i;
                $idstore = $_GET['idstore'];
                echo "<script type='text/javascript'>window.location='./index.php?link=listproduct&&idstore=$idstore'</script>";
            } 

        }
        mysqli_close($connect);
    }

    
?>
