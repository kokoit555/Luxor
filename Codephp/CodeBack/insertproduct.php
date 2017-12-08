<?php
    include "../Codephp/connectdb.php";
    if(!empty($_POST['submitinsertproduct'])){
        
        
        $nameproduct = $_POST['product_name'];
        $status = "wait";
        $priceproduct = $_POST['priceproduct'];
        $discount = "---";
        $tax = "7%";
        $date = date("Y-m-d h:i:sa");
        $textproductdetail = $_POST['message'];
        $idtype = $_POST['SettypeProduct'];
        $idstore = $_GET['idstore'];


        echo $sqlinsertProduct = "INSERT INTO  `Product` (`id_product`, `NameProduct`, `Status`, `PriceProduct`, `discount`, `tax`, `date_input`,
         `textProductDetail`, `id_type`, `id_store`) VALUES
         ('0', '$nameproduct', 'Stock', '$priceproduct', '$discount', '$tax', '$date', 
         '$textproductdetail', '$idtype', '$idstore');";
    
        if(mysqli_query($connect,$sqlinsertProduct)){ echo "Complete insert product";}



        

        for ($i=0; $i < count($_POST['quant']); $i++) { 
            $qty[] = $_POST['quant'][$i];
            $sqlinsertimg = "";

            $target_dir = "images/";
            $basenameproduct = basename($_FILES["input-file-img-product"]["name"][$i]);
            $target_file = $target_dir . $basenameproduct;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($_FILES["input-file-img-product"]["tmp_name"][$i]);
    
            $target_dir_thumb = "images/thumbproduct/";
            $basenameproduct_thumb = basename($_FILES["input-file-img-product-thumb"]["name"][$i]);
            $target_file_thumb = $target_dir_thumb . $basenameproduct_thumb;
            $imageFileType_thumb = pathinfo($target_file_thumb,PATHINFO_EXTENSION);
            $check_thumb = getimagesize($_FILES["input-file-img-product-thumb"]["tmp_name"][$i]);
    
            if($check !== false && $check_thumb !== false) {$uploadOk = 1;}  else {$uploadOk = 0;}
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType_thumb != "jpg" && $imageFileType_thumb != "png") { $uploadOk = 0;}
            if ($uploadOk == 0) {echo "Sorry, your file was not uploaded.";} 
            else {
                if (move_uploaded_file($_FILES["input-file-img-product"]["tmp_name"][$i], "../".$target_file) &&
                    move_uploaded_file($_FILES["input-file-img-product-thumb"]["tmp_name"][$i], "../".$target_file_thumb)){echo "The file has been uploaded.";}    
                else {echo "Sorry, there was an error uploading your file.";}
            }

            $sqlinsertimg = "INSERT INTO `IMGProduct` (`id_imgProduct`, `Name_img`, `url_img`) VALUES 
            ('0', '$basenameproduct', '$target_dir');";

            if(mysqli_query($connect,$sqlinsertimg)){echo "insert img complete ".($i);}

            $selectidproduct = "SELECT `id_product` FROM `Product` order by `id_product` DESC LIMIT 1";
            $selectidimg = "SELECT `id_imgProduct` FROM `IMGProduct` order by `id_imgProduct` DESC LIMIT 1";
    
            $idproduct = mysqli_fetch_array(mysqli_query($connect,$selectidproduct));
            $idimgproduct = mysqli_fetch_array(mysqli_query($connect,$selectidimg));
    
            $namethumb = $idproduct['id_product'] . $idimgproduct['id_imgProduct'] .($i+1);
            $sqlinsertimgdetail = "INSERT INTO `imgproductdetail` (`id_imgProductDetail`, `id_product`, `id_imgProduct`, `namethumbProduct`, `urlthumbProduct`, `qty`) VALUES
             ('0', '".$idproduct['id_product']."', '".$idimgproduct['id_imgProduct']."', '$namethumb', '$target_file_thumb', '".$qty[$i]."');";
            
            if(mysqli_query($connect,$sqlinsertimgdetail))
            { 
                echo "complete insert detailproduct".$i;
                // echo "<script type='text/javascript'>window.location='./PageStore.php?idstore=$idstore'</script>";
            } 

        }
        mysqli_close($connect);
    }


    
?>
