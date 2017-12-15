<?php

        // $userid = $_POST['IDUsernameMember'];
        // $passid =  $_POST['PassUsernameMember'];
        $userid = mysqli_escape_string($connect,$_POST['IDUsernameMember']);
        $passid = mysqli_escape_string($connect,$_POST['PassUsernameMember']);

        $loginWebsite_sql = "SELECT * FROM `user_member`
                             WHERE `email` = '$userid' AND `Password` = MD5('$passid')";

        $resultLoginWebsite = mysqli_query($connect,$loginWebsite_sql) or die('Error : '.mysqli_error($connect));
        $num_row_login_website = mysqli_num_rows($resultLoginWebsite);

    if($num_row_login_website==1){
        while($row = mysqli_fetch_array($resultLoginWebsite)){

            $_SESSION['idnumLoginWebsite'] = $row['id_user'];
            $_SESSION['nameLoginWebsite'] = $row['Name']." ".$row['LastName'];
            $_SESSION['NameUser'] = $row['Name'];
            $_SESSION['LastNameUser'] = $row['LastName'];
            $_SESSION['EmailUser'] = $row['Email'];
            $_SESSION['TelUser'] = $row['Tel'];
            $_SESSION['AddressUser'] = $row['Address'];
            $_SESSION['CityUser'] = $row['City'];
            $_SESSION['StateUser'] = $row['State'];
            $_SESSION['CountryUser'] = $row['Country'];
            $_SESSION['ZipUser'] = $row['Zip'];
            // $_SESSION['idnumLoginWebsite'] = "admin";
            // $_SESSION['nameLoginWebsite'] = "admin";
        }
        // echo "<script> alert('".$_SESSION['idnumLoginWebsite'] ." ".$_SESSION['idnumLoginWebsite']."');</script>";
        // echo "<script> alert('".$_SESSION['idnumLoginWebsite']." (".$num_row_login_website.") ".$_SESSION['idnumLoginWebsite']."');</script>";
        header("Location: index.php"); 
    }
     else{
         echo "<script> alert('ไม่สำเร็จ');</script>";
     }

     mysqli_close($connect);

?>