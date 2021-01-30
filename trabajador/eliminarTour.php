<?php
  include '../scripts/database.php';
  $turi=new Database();
  $turi->conectarBD();

  $ID=$_POST['id_tour_eliminar']; //id_aerolinea es extraido del name del input hidden en el modal Eliminar

  $CONSULTA="DELETE FROM TOURS WHERE ID = $ID";
  $turi->ejecutarSQL($CONSULTA);
  header("location: FormTours.php");

  $turi->desconectarBD();
?>