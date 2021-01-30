<!DOCTYPE html>
<html lang=es>
  <head>
    <!-- Required meta tags -->
    <meta charset=utf-8 />
    <meta name=viewport content='width=device-width, initial-scale=1, shrink-to-fit=no'/>
     
    <!-- Bootstrap CSS -->
    <link rel=stylesheet href=../css/bootstrap.min.css />

    <title> Guardando usuario </title>
  </head>
  <body class=bg-dark>
    <div class='container mt-5 p-5'>
      <?php
      session_start();
      error_reporting(0);
      $sesion = $_SESSION["usuario"];
        include '../scripts/database.php';
        $db= new Database();
        $db->conectarBD();

        extract($_POST);

        // $SQL2="CALL EditarUsuario('$correo', $rol, '$nombre', '$aPaterno', '$aMaterno', '$tel', '$fecha', '$calle', $no_ext, '$colonia', '$ciudad', $pais, '$sesion')";

        $SQL2="UPDATE USUARIOS
        SET CORREO='$correo', NOMBRE='$nombre', APELLIDO_PATERNO='$aPaterno', APELLIDO_MATERNO='$aMaterno', CELULAR='$tel', FECHA_NACIMIENTO='$fecha', CALLE='$calle', NO_EXT=$no_ext, COLONIA='$colonia', CIUDAD='$ciudad', PAIS=$pais, ROL=$rol
        WHERE USUARIO='$sesion'";

        $db->ejecutarSQL($SQL2);

        echo "
            <div class='alert alert-success alert-lg display-2 font-weight-bold text-center'> CAMBIOS REALIZADOS
              <div class='progress'>
                <div class='progress-bar progress-bar-striped progress-bar-animated bg-success' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%''>
                </div>
              </div>
            </div>";

        header("location: ../miPerfil.php");
        
      
        $db->desconectarBD();

      ?>
    </div>
 
 
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=../js/jquery-3.5.1.min.js></script>
    <script src=../js/popper.min.js></script>
    <script src=../js/bootstrap.min.js></script>
  </body>
</html>