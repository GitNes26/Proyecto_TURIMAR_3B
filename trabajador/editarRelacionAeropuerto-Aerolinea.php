<?php
  include '../scripts/database.php';
  $turi=new Database();
  $turi->conectarBD();

  //Variables extraidas con POST de los inputs del modal Editar
  $ID_AP=$_POST['idAeropuerto'];
  $ID_AL=$_POST['idAerolinea'];
  $HORARIO=$_POST['horario']; 

  $CONSULTA="UPDATE AEROPUERTO_AEROLINEA SET HORARIO = '$HORARIO' WHERE AEROPUERTO = $ID_AP AND AEROLINEA = $ID_AL";
  $turi->ejecutarSQL($CONSULTA);
  header("location: FormRelacionAeropuerto-Aerolinea.php");

  $turi->desconectarBD();
?>