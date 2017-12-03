<?php 
    session_start();
    // $_SESSION['cartproductID'][$i];
    // $_SESSION['cartproductNAME'][$i];
    // $_SESSION['cartproductIMG'][$i];
    // $_SESSION['cartproductQTY'][$i];

    $slotdelete = $_GET['slotdelete'];

    array_splice($_SESSION['cartproductID'], $slotdelete , 1);
    array_splice($_SESSION['cartproductNAME'], $slotdelete , 1);
    array_splice($_SESSION['cartproductIMG'], $slotdelete , 1);
    array_splice($_SESSION['cartproductQTY'], $slotdelete , 1);
    // unset($_SESSION['cartproductID'][$slotdelete]);
    // print_r($_SESSION['cartproductID']);

    header("Location: ../Cartproduct.php");
?>