<?php
    session_start();
    session_destroy();
    $_SESSION["login_status"] = 0;
    header('location: login.php');
?>