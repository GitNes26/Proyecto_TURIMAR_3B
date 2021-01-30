<?php
    include "../scripts/database.php";
    $turi=new Database();
    $turi->conectarBD();

    // DATOS OBTENIDOS DEL FORMULARIO AEROLINEAS
    if(isset($_POST['insertarAerolinea'])){
        $TOUR=$_POST['tour'];
        $AEROLINEA=$_POST['aerolinea'];

        $SQL_AEROLINEA="INSERT INTO AEROLINEA_TOUR(AEROLINEA, TOUR) VALUES('$AEROLINEA', '$TOUR')";

        $turi->ejecutarSQL($SQL_AEROLINEA);

        header("location: FormTours.php");
    }

    $turi->desconectarBD();
?>