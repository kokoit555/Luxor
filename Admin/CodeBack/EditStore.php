<?php

if(!empty($_GET['idstore'])){

    $selectdataproduct = "SELECT * FROM `Store` WHERE `id_store` = '".$_GET['idstore']."';";

    if($query = mysqli_query($connect,$selectdataproduct)){
        $rowitem = mysqli_fetch_array($query);
    }

}

if(!empty($_POST['submiteditstore'])){
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
    // $password = MD5(mysqli_escape_string($connect,$_POST['password'])); 

    $sqlupdate = "UPDATE `Store` SET 
    `NameStore` = '$namestore',
    `AddressStore` = '$address',
    `TelStore` = '$telephone',
    `CityStore` = '$city',
    `StateStore` = '$state',
    `ZipStore` = '$zip',
    `CountryStore` = '$country',
    `EmailStore` = '$email',
    `textStory` = '$storytextstore',
    `nameAccountStore` = '$nameAccountStore',
    `numberStorebank` = '$numberStorebank',
    `namebank` = '$namebank' 
    WHERE `id_store` = '".$_GET['idstore']."'";

    if(mysqli_query($connect,$sqlupdate)){
        echo "สำเร็จ";
        $idstore = $_GET['idstore'];
        header("Location: index.php?link=listproduct&&idstore=$idstore");
    }

}
?>


