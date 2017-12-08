<?php
    if(!empty($_POST['submitRegister'])){

        $firstname = mysqli_escape_string($connect,$_POST['firstname']);
        $lastname = mysqli_escape_string($connect,$_POST['lastname']);
        $tel = mysqli_escape_string($connect,$_POST['tel']);
        $address = mysqli_escape_string($connect,$_POST['address']);
        $city = mysqli_escape_string($connect,$_POST['city']);
        $state = mysqli_escape_string($connect,$_POST['state']);
        $country = mysqli_escape_string($connect,$_POST['country']);
        $zip = mysqli_escape_string($connect,$_POST['zip']);

        $email = mysqli_escape_string($connect,$_POST['email']);
        $passwordcheck = mysqli_escape_string($connect,$_POST['password']);
        $password = md5($passwordcheck);
        
        echo $sqluser = "INSERT INTO `User_member`(`id_user`, `Name`, `LastName`, `Email`,
         `Tel`, `Address`, `City`, `State`, `Country`, `Zip`, `Password`)
         VALUES (0,'$firstname','$lastname','$email',
         '$tel','$address','$city','$state','$country','$zip','$password');";
        

        if(mysqli_query($connect,$sqluser)){
            header("Location:index.php");
        }

        mysqli_close($connect);
    }
?>