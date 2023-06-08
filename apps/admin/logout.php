<?php
    session_start();
    $_SESSION["admin"] = null;
    $_SESSION["admin_SESSION"] = null;
    header('Location: login.php');
    exit();
?>