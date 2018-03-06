<?php 
        session_start();
        unset($_SESSION['id_store_user_name']);
        unset($_SESSION['Store_user_name']);
        header("Location: ./index.php");

?>