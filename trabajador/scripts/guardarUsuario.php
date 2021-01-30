<!DOCTYPE html>
<html lang=es>
  <head>
    <!-- Required meta tags -->
    <meta charset=utf-8 />
    <meta name=viewport content='width=device-width, initial-scale=1, shrink-to-fit=no'/>
     
    <!-- Bootstrap CSS -->
    <link rel=stylesheet href=../../css/bootstrap.min.css />

    <title> Guardando trabajador </title>
  </head>
  <body class=bg-dark>
    <div class='container text-white'>
      <?php
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

        #metodo de encriptación, mejor conocido como Hashear
        $hash = password_hash($password,PASSWORD_DEFAULT);

        // $SQL = "INSERT INTO USUARIOS(NOMBRE, APELLIDO_PATERNO, CORREO, USUARIO, CONTRASENA, SEXO, ROL, FOTO, PAIS) VALUES('$nombre','$aPaterno','$correo','$user','$hash', '$sexo', $rol,'$destinoFoto', $pais)";

        $SQL = "Call AltaUsuario('$correo', '$user', '$hash', $rol, '$nombre', '$aPaterno', '$sexo', '$pais','$destinoFoto')";

          $db->ejecutarSQL($SQL);

          

          echo"
              <div class='alert alert-success alert-dismissible fade show display-2 font-weight-bold text-center' rol='alert'> USUARIO REGISTRADO
                <div class='progress'>
                  <div class='progress-bar progress-bar-striped progress-bar-animated bg-success' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%''>
                  </div>
                </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>"
          ;
          
          header("Location: ../Formularios/FormAltaTrabajador.php");
      ?>
    </div>
 
 
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=../../js/jquery-3.5.1.min.js></script>
    <script src=../../js/popper.min.js></script>
    <script src=../../js/bootstrap.min.js></script>
  </body>
</html>