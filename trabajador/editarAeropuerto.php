<?php
  include '../scripts/database.php';
  $turi=new Database();
  $turi->conectarBD();

  //Variables extraidas con POST de los inputs del modal Editar
  $ID=$_POST['idAeropuerto'];
  $AEROPUERTO=$_POST['nombreAeropuerto']; 

  $CONSULTA="UPDATE AEROPUERTOS SET AEROPUERTO = '$AEROPUERTO' WHERE ID = $ID";
  $turi->ejecutarSQL($CONSULTA);
  header("location: FormAeropuertos.php");

  $turi->desconectarBD();
?>