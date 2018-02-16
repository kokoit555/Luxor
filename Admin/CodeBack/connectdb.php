<?php

    $host = "localhost";
    // $user = "root";
    // $pass = "";
    $user = "h514771_birdfire";
    $pass = "BirdFire45";
    $db = "h514771_birdfire";

    $connect = mysqli_connect($host,$user,$pass,$db);
    $connect ->query("set names utf8");
    if(!$connect){
        echo "<script> alert('เชื่อมต่อDatabaseไม่ได้');</script>";
    }

?>