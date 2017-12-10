<?php 
        session_start();
        unset($_SESSION['Admin_user_name']);
        unset($_SESSION['id_Admin_user_name']);
        header("Location: ./index.php");

?>