<?php
  include '../scripts/database.php';
  $turi=new Database();
  $turi->conectarBD();

  //Variables extraidas con POST de los inputs del modal Editar
  $ID=$_POST['idAerolinea'];
  $AEROLINEA=$_POST['nombreAerolinea']; 

  $CONSULTA="UPDATE AEROLINEAS SET AEROLINEA = '$AEROLINEA' WHERE ID = $ID";
  $turi->ejecutarSQL($CONSULTA);
  header("location: FormAerolineas.php");

  $turi->desconectarBD();
?>