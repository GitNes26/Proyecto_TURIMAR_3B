<?php
  include "../scripts/database.php";
  $turi=new Database();
  $turi->conectarBD();
  extract($_POST);
        
  $AEROPUERTO=$_POST['aeropuertoRegistro']; //aeropuertoRegistro es extraido input del formulario
  $CIUDAD=$_POST['ciudadRegistro'];

  $SQL_INSERT="INSERT INTO AEROPUERTOS(CIUDAD, AEROPUERTO) VALUES('$CIUDAD','$AEROPUERTO')";
  $turi->ejecutarSQL($SQL_INSERT);
  
  header("location: FormAeropuertos.php");

  $turi->desconectarBD();
?>