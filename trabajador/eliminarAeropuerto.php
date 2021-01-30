<?php
  include '../scripts/database.php';
  $turi=new Database();
  $turi->conectarBD();

  $ID=$_POST['id_aeropuerto']; //id_aerolinea es extraido del name del input hidden en el modal Eliminar

  $CONSULTA="DELETE FROM AEROPUERTOS WHERE ID = $ID";
  $turi->ejecutarSQL($CONSULTA);
  header("location: FormAeropuertos.php");

  $turi->desconectarBD();
?>