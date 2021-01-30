<?php
  include '../scripts/database.php';
  $turi=new Database();
  $turi->conectarBD();

  $ID=$_POST['id_tour'];
  $TOUR=$_POST['tour'];
  $DESCRIPCION=$_POST['descripcion'];
  $DURACION=$_POST['duracion'];
  $CAPACIDAD=$_POST['capacidad'];
  $PRECIO=$_POST['precio'];

  $CONSULTA="UPDATE TOURS SET TOUR = '$AEROLINEA', DESCRIPCION = '$DESCRIPCION', DURACION = '$DURACION', CAPACIDAD = $CAPACIDAD, PRECIO = $PRECIO WHERE ID = $ID";
  $turi->ejecutarSQL($CONSULTA);
  header("location: FormTours.php");

  $turi->desconectarBD();
?>