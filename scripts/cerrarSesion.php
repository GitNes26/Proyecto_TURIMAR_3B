<?php
    include 'database.php';
    $obj=new Database();
    $obj->cerrarSesion();

    header('Location: ../index.php');
?>