<?php
  include "../scripts/database.php";
  $turi=new Database();
  $turi->conectarBD();
  
  if(isset($_POST['insertarTarifaVuelo'])){
    $AEROPUERTO=$_POST['aeropuerto'];
    $AEROLINEA=$_POST['aerolinea'];
    $VUELO=$_POST['tipoVuelo'];
    $DESTINO=$_POST['ciudad'];
    $TARIFA=$_POST['precio'];

    $SQL="INSERT INTO TARIFA_VUELO(AEROPUERTO, AEROLINEA, TIPO_VUELO, DESTINO, TARIFA) VALUES('$AEROPUERTO','$AEROLINEA','$VUELO','$DESTINO','$TARIFA')";
    $turi->ejecutarSQL($SQL);


    header("location: FormTarifaVuelo.php");
  }

  $turi->desconectarBD();
?>