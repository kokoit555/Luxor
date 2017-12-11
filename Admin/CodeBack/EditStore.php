<?php

if(!empty($_GET['idstore'])){

    $selectdataproduct = "SELECT * FROM `store` WHERE `id_store` = '".$_GET['idstore']."';";

    if($query = mysqli_query($connect,$selectdataproduct)){
        $rowitem = mysqli_fetch_array($query);
    }

}

if(!empty($_POST['submiteditstore'])){

}
?>


