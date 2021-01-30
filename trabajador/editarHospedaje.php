<?php
  include '../scripts/database.php';
  $turi=new Database();
  $turi->conectarBD();

  $ID=$_POST['idH'];
  $Nombre=$_POST['nombreH'];
  $Categoria=$_POST['categoriaH'];

    $CONSULTA="UPDATE HOTELES SET HOTEL = '$Nombre', SETL CATEGORIA = $Categoria WHERE ID = $ID";
    $turi->ejecutarSQL($CONSULTA);
    header("location: FormHospedaje.php");

  $turi->desconectarBD();


?>