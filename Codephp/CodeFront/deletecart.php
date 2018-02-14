<?php 
    session_start();
    

    $slotdelete = $_GET['slotdelete'];
    array_splice($_SESSION['cartProduct'], $slotdelete , 1);
    // array_splice($_SESSION['cartproductID'], $slotdelete , 1);
    // array_splice($_SESSION['cartproductNAME'], $slotdelete , 1);
    // array_splice($_SESSION['PriceProduct'], $slotdelete , 1);
    // array_splice($_SESSION['thumb'], $slotdelete , 1);
    // array_splice($_SESSION['cartproductQTY'], $slotdelete , 1);
    // unset($_SESSION['cartproductID'][$slotdelete]);
    // print_r($_SESSION['cartproductID']);

    header("Location: ../../Cartproduct.php");
?>