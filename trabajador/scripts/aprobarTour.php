<!DOCTYPE html>
<html lang=es>
  <head>
    <!-- Required meta tags -->
    <meta charset=utf-8 />
    <meta name=viewport content='width=device-width, initial-scale=1, shrink-to-fit=no'/>
     
    <!-- Bootstrap CSS -->
    <link rel=stylesheet href=../../css/bootstrap.min.css />

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
        
        $SQL2="UPDATE COTIZACION_TOUR
        SET ESTATUS='APROBADO'
        WHERE ID=$BtnAprobar";
        $db->ejecutarSQL($SQL2);

        echo "
            <div class='alert alert-success alert-lg display-2 font-weight-bold text-center'> TOUR APROBADO
              <div class='progress'>
                <div class='progress-bar progress-bar-striped progress-bar-animated bg-success' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%''>
                </div>
              </div>
            </div>";

        header("location: ../Formularios/VerUsuarios.php");
        
      
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