<?php
    include "../Codephp/connectdb.php";
    if(!empty($_POST['submitinsertproduct'])){
        
        
        $nameproduct = $_POST['product_name'];
        $qty = $_POST['quant'];
        $status = "wait";
        $priceproduct = $_POST['priceproduct'];
        $discount = "---";
        $tax = "---";
        $textproductdetail = $_POST['detailproduct1'].$_POST['detailproduct2'].$_POST['detailproduct3'].$_POST['message'];
        $idtype = $_POST['SettypeProduct'];
        $idstore = "1";
        $idstory = $_POST['SetstoryProduct'];

        echo $sqlinsertProduct = "INSERT INTO `Product` (`id_product`, `NameProduct`, `qty`, `Status`, `PriceProduct`, 
        `discount`, `tax`, `textProductDetail`, `id_type`, `id_store`, `id_story`) VALUES 
        (0, '$nameproduct', '$qty', '$status', '$priceproduct', '$discount', '$tax'
        , '$textproductdetail', '$idtype', '$idstore', '$idstory')";
    
        $target_dir = "images/";
        $basenameproduct1 = basename($_FILES["input-file-preview"]["name"]);
        $target_file = $target_dir . $basenameproduct1;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["input-file-preview"]["tmp_name"]);
        if($check !== false) {$uploadOk = 1;} 
        else {/* echo "File is not an image.";*/$uploadOk = 0;}
        
        if($imageFileType != "jpg" && $imageFileType != "png") {
            echo "Sorry, only JPG,PNG files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {echo "Sorry, your file was not uploaded.";} 
        else {
            if (move_uploaded_file($_FILES["input-file-preview"]["tmp_name"], "../".$target_file)) 
            {
                echo "The file has been uploaded.";
            }    
            else {echo "Sorry, there was an error uploading your file.";}
        }

        $sqlinsertimg = "INSERT INTO `IMGProduct` (`id_imgProduct`, `Name_img`, `url_img`) VALUES 
        ('0', '$basenameproduct1', '$target_dir');";
        
        $queryinsertproduct = mysqli_query($connect,$sqlinsertProduct);
        $queryinsertimg = mysqli_query($connect,$sqlinsertimg);

        $selectidproduct = "SELECT `id_product` FROM `Product` order by `id_product` DESC LIMIT 1";
        $selectidimg = "SELECT * FROM `IMGProduct` order by `id_imgProduct` DESC LIMIT 1";

        $queryselectidproduct = mysqli_query($connect,$selectidproduct);
        $idproduct = mysqli_fetch_array($queryselectidproduct);

        $queryselectimg = mysqli_query($connect,$selectidimg);
        $idimgproduct = mysqli_fetch_array($queryselectimg);

        echo $sqlinsertimgdetail = "INSERT INTO `IMGProductDetail` (`id_imgProductDetail`
        ,`NumberIMGProduct`, `id_product`, `id_imgProduct`) VALUES 
        ('0', '1', '".$idproduct['id_product']."', '".$idimgproduct['id_imgProduct']."');";
        
        $queryinsertimgdetail = mysqli_query($connect,$sqlinsertimgdetail);
        
        mysqli_close($connect);

        if($queryinsertimgdetail){
            echo "<script type='text/javascript'>window.location='./Admin.php'</script>";
            // header("Location: ./Admin.php");
        }
    }


    
?>
