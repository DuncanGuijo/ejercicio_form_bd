<?php 
    include("recursos/conexion.php");
    include("recursos/session.php");
    $_SESSION['login_user_sys']= "";
    session_destroy();
    header("location:02-form.php");
    exit;
?>