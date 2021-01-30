<?php
  include '../scripts/database.php';
  $turi=new Database();
  $turi->conectarBD();

    $ID=$_POST['idHE'];
    $CONSULTA="DELETE FROM HOTELES WHERE ID=$ID";
    $turi->ejecutarSQL($CONSULTA);
    header("location: FormHospedaje.php");

  $turi->desconectarBD();


?>