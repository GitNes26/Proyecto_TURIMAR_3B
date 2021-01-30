<?php
  include "../scripts/database.php";
  $turi=new Database();
  $turi->conectarBD();

  if(isset($_POST['insertarExtras'])){
    $INCLUYE=$_POST['incluye'];
    $NO_INCLUYE=$_POST['no_incluye'];
    $SERVICIOS_OPC=$_POST['servicios_opcionales'];
    $NOTAS=$_POST['notas'];
    $TOUR=$_POST['tour'];

    $SQL_INCLUYE="INSERT INTO TOUR_INCLUYE(TOUR, INCLUYE, SERVICIOS_OPCIONALES) VALUES('$TOUR', '$INCLUYE', '$SERVICIOS_OPC')";
    $SQL_NO_INCLUYE="INSERT INTO TOUR_NO_INCLUYE(TOUR, NO_INCLUYE) VALUES('$TOUR', '$NO_INCLUYE')";
    $SQL_NOTAS="INSERT INTO NOTAS(TOUR, NOTAS) VALUES('$TOUR', '$NOTAS')";

    $turi->ejecutarSQL($SQL_INCLUYE);
    $turi->ejecutarSQL($SQL_NO_INCLUYE);
    $turi->ejecutarSQL($SQL_NOTAS);

    header("location: FormTours.php");
  }

  $turi->desconectarBD();
?>