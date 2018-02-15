<?php
    if(!empty($_POST['submitinsertstore'])){
        

        $namestore = mysqli_escape_string($connect,$_POST['namestore']); 
        $telephone = mysqli_escape_string($connect,$_POST['telephone']); 
        $address = mysqli_escape_string($connect,$_POST['address']); 
        $city = mysqli_escape_string($connect,$_POST['city']); 
        $state = mysqli_escape_string($connect,$_POST['state']); 
        $country = mysqli_escape_string($connect,$_POST['country']); 
        $zip = mysqli_escape_string($connect,$_POST['zip']); 
        $nameAccountStore = mysqli_escape_string($connect,$_POST['nameAccountStore']); 
        $numberStorebank = mysqli_escape_string($connect,$_POST['numberStorebank']); 
        $namebank = mysqli_escape_string($connect,$_POST['namebank']); 
        $storytextstore = mysqli_escape_string($connect,$_POST['storytextstore']);
        $email = mysqli_escape_string($connect,$_POST['email']); 
        $password = MD5(mysqli_escape_string($connect,$_POST['password'])); 

        
        $target_dir = "images/avatar/";
        $basenameproduct1 = $namestore.substr(basename($_FILES["input-file-preview"]["name"]),-4);
        $target_file = $target_dir.$basenameproduct1;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["input-file-preview"]["tmp_name"]);

        ///////////////////////////////////////////
        echo $sqlinsertstore = "INSERT INTO `store` (`id_store`, `NameStore`, `AvatarStore`, `AddressStore`, `TelStore`, `CityStore`, `StateStore`, `ZipStore`, `CountryStore`, `EmailStore`, `Password`, `textStory`, `nameAccountStore`, `numberStorebank`, `namebank`) VALUES
                                (0, '$namestore', '$target_file', '$address','$telephone', '$city', '$state', '$zip', '$country','$email', '$password', '$storytextstore','$nameAccountStore','$numberStorebank','$namebank');";
        ///////////////////////////////////////////
        
        
        if($check !== false) {$uploadOk = 1;} 
        else {$uploadOk = 0;}
        if($imageFileType != "jpg" && $imageFileType != "png") { echo "Sorry, only JPG,PNG files are allowed."; $uploadOk = 0;}
        if ($uploadOk == 0) {echo "Sorry, your file was not uploaded.";} 
        else {
            if (move_uploaded_file($_FILES["input-file-preview"]["tmp_name"], "../".$target_file) && ($query = mysqli_query($connect,$sqlinsertstore))) { 
                echo "complete input Database";
            }    
            else {echo "Sorry, there was an error uploading your file.";}
        }
        
        mysqli_close($connect);

        if($query){
            echo "<script type='text/javascript'>window.location='./index.php?link=liststore'</script>";
            // header("Location: ./Admin.php");
        }
    }


    
?>
