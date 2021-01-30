<?php
  include '../scripts/database.php';
  $turi=new Database();
  $turi->conectarBD();

  $ID=$_POST['id_aerolinea']; //id_aerolinea es extraido del name del input hidden en el modal Eliminar

  $CONSULTA="DELETE FROM AEROLINEAS WHERE ID = $ID";
  $turi->ejecutarSQL($CONSULTA);
  header("location: FormAerolineas.php");

  $turi->desconectarBD();
?>