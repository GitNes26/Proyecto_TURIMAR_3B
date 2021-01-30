<!--REGISTRO EN TABLA TOURS-->
<?php
    include "../scripts/database.php";
    $turi=new Database();
    $turi->conectarBD();
    
    
    if(isset($_POST['insertarTour'])){
        $foto='';
        $guardado='';
        if (isset($_FILES['foto'])) {
        $foto=$_FILES["foto"]["name"];
        $guardado=$_FILES["foto"]["tmp_name"];
        }
        $destinoFoto ="";

        if ( isset( $_FILES['foto'] ) ) {

          if ( !file_exists( '../images/tours' ) ) {
              mkdir( '../images/tours', 0777, true );
              if ( file_exists( '../images/tours' ) ) {
                  if ( move_uploaded_file( $guardado, '../images/tours/'.$foto ) ) {
      
                  } else {
                  }
              }
          } else {
              if ( move_uploaded_file( $guardado, '../images/tours/'.$foto ) ) {
              } else {
              }
              $destinoFoto = 'images/tours/'.$foto;
      
          }
      }
        // DATOS OBTENIDOS DEL FORMULARIO TOUR
        $TOUR=$_POST['tour'];
        $DESCRIPCION=$_POST['descripcion'];
        $DURACION=$_POST['duracion'];
        $NOCHES=$_POST['noches'];
        $CAPACIDAD=$_POST['capacidad'];
        $FECHA_TOUR=$_POST['fechaTour'];
        $PRECIO=$_POST['precio'];

        $SQL_TOUR="INSERT INTO TOURS(TOUR, DESCRIPCION, DURACION, NOCHES, CAPACIDAD, FECHA_TOUR, PRECIO, FOTO) VALUES('$TOUR','$DESCRIPCION','$DURACION', '$NOCHES', '$CAPACIDAD', '$FECHA_TOUR', $PRECIO, '$destinoFoto')";

        $turi->ejecutarSQL($SQL_TOUR);
        
        header("location: FormTours.php");
        
    }

    $turi->desconectarBD();
?>