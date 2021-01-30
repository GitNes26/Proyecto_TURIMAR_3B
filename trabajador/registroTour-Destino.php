<?php
  include "../scripts/database.php";
  $turi=new Database();
  $turi->conectarBD();

  if(isset($_POST['insertarDestino'])){
    $DESTINO=$_POST['ciudad'];
    $TOUR=$_POST['tour'];

    $SQL_DESTINO="INSERT INTO DESTINO_TOUR(TOUR, DESTINO) VALUES('$TOUR', '$DESTINO')";

    $turi->ejecutarSQL($SQL_DESTINO);

    header("location: FormTours.php");
  }

  $turi->desconectarBD();
?>