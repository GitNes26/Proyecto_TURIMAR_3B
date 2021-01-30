<?php
  include '../scripts/database.php';
  $turi=new Database();
  $turi->conectarBD();

  $AEROPUERTO=$_POST['id_aeropuerto']; //id_aerolinea es extraido del name del input hidden en el modal Eliminar
  $AEROLINEA=$_POST['id_aerolinea'];
  $HORARIO=$_POST['horario'];

  $CONSULTA="DELETE FROM AEROPUERTO_AEROLINEA WHERE ID = $ID";
  $turi->ejecutarSQL($CONSULTA);
  header("location: FormRelacionAeropuerto-Aerolinea.php");

  $turi->desconectarBD();
?>