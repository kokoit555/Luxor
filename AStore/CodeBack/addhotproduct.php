<?php

    include "./connectdb.php";

    if(!empty($_GET['id_product'])){
        
        $idproduct = $_GET['id_product']; 

        $selecturlimg = "";

        // $urlimg = mysqli_escape_string($connect,$_POST['urlimg']); 

    
        // $sqlinserthot = "INSERT INTO `hotproduct`(`id_hotproduct`, `id_product`, `urlimg`) 
        //                         VALUES ('0','$idproduct','$urlimg')";

        // $query = mysqli_query($connect,$sqlinserthot);
        
        mysqli_close($connect);

        if($query){
            echo "<script type='text/javascript'>window.location='./index.php??link=hotproduct'</script>";
            // header("Location: ./Admin.php");
        }
    }
    else{
        echo "<script type='text/javascript'>window.location='./index.php??link=hotproduct'</script>";
    }


    
?>
