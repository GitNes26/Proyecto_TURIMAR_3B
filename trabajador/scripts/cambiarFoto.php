<!DOCTYPE html>
<html lang=es>
  <head>
    <!-- Required meta tags -->
    <meta charset=utf-8 />
    <meta name=viewport content='width=device-width, initial-scale=1, shrink-to-fit=no'/>
     
    <!-- Bootstrap CSS -->
    <link rel=stylesheet href=../css/bootstrap.min.css />

    <title> Actualizando Foto de perfil </title>
  </head>
  <body class=bg-dark>
    <div class='container mt-5 p-5'>
      <?php
      session_start();
      error_reporting(0);
      $sesion = $_SESSION["usuario"];
        include '../../scripts/database.php';
        $db= new Database();
        $db->conectarBD();

        extract($_POST);

        $foto='';
        $guardado='';
        if (isset($_FILES['foto'])) {
          $foto=$_FILES["foto"]["name"];
          $guardado=$_FILES["foto"]["tmp_name"];
          }
          $destinoFoto ="";

          if ( isset( $_FILES['foto'] ) ) {

            if ( !file_exists( '../../images/fotosPerfil' ) ) {
                mkdir( '../../images/fotosPerfil', 0777, true );
                if ( file_exists( '../../images/fotosPerfil' ) ) {
                    if ( move_uploaded_file( $guardado, '../../images/fotosPerfil/'.$foto ) ) {
        
                    } else {
                    }
                }
            } else {
                if ( move_uploaded_file( $guardado, '../../images/fotosPerfil/'.$foto ) ) {
                } else {
                }
                $destinoFoto = 'images/fotosPerfil/'.$foto;
        
            }
        }

        
        // $SQL2="CALL EditarUsuario('$correo', $rol, '$nombre', '$aPaterno', '$aMaterno', '$tel', '$fecha', '$calle', $no_ext, '$colonia', '$ciudad', '$pais', '$sesion')";
        
        $SQL2="UPDATE USUARIOS
        SET FOTO='$destinoFoto'
        WHERE USUARIO='$sesion'";

        $db->ejecutarSQL($SQL2);

        echo "
            <div class='alert alert-success alert-lg display-2 font-weight-bold text-center'> FOTO CAMBIADA
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
    <script src=../../js/jquery-3.5.1.min.js></script>
    <script src=../../js/popper.min.js></script>
    <script src=../../js/bootstrap.min.js></script>
  </body>
</html>