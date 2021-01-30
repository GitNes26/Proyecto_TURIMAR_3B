<?php
  include "../scripts/database.php";
  $turi=new Database();
  $turi->conectarBD();
  extract($_POST);
        
  $AEROPUERTO=$_POST['aeropuertoRegistro']; //aeropuertoRegistro es extraido input del formulario
  $AEROLINEA=$_POST['aerolineaRegistro'];
  $HORARIO=$_POST['horarioRegistro'];

  $SQL_INSERT="INSERT INTO AEROPUERTO_AEROLINEA(AEROPUERTO, AEROLINEA, HORARIO) VALUES('$AEROPUERTO','$AEROLINEA','$HORARIO')";
  $turi->ejecutarSQL($SQL_INSERT);
  
  header("location: FormRelacionAeropuerto-Aerolinea.php");

  $turi->desconectarBD();
?>