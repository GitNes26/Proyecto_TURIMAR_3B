<?php
  include "../scripts/database.php";
    $turi=new Database();
        $turi->conectarBD();
        extract($_POST);
        
        $CIUDAD=$_POST['ciudadRegistro'];
        $HOTEL=$_POST['hotelRegistro'];
        $CATEGORIA=$_POST['categoriaRegistro'];

        $SQL_INSERT="INSERT INTO HOTELES(CIUDAD, HOTEL, CATEGORIA) VALUES('$CIUDAD','$HOTEL','$CATEGORIA')";
        $turi->ejecutarSQL($SQL_INSERT);
        header("location: FormHospedaje.php");

        $turi->desconectarBD();
?>