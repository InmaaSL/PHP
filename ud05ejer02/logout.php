<?php
    session_start(); // Permite continuar la sesión.
    if (isset ($_SESSION['nombre']))
    {
    $_SESSION = array();
    session_destroy();
    }
    header("Location:login.php");
?>