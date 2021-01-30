<?php
    include "../scripts/database.php";
    $turi=new Database();
    $turi->conectarBD();

    // DATOS OBTENIDOS DEL FORMULARIO HOTELES
    if(isset($_POST['insertarHotel'])){
        $TOUR=$_POST['tour'];
        $HOTEL=$_POST['hotel'];
    
        $SQL_HOTEL="INSERT INTO HOTEL_TOUR(HOTEL, TOUR) VALUES('$HOTEL', '$TOUR')";
    
        $turi->ejecutarSQL($SQL_HOTEL);

        header("location: FormTours.php");
    }

    $turi->desconectarBD();
?>