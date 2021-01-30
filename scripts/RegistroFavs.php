<!DOCTYPE html>
<html lang=es>
  <head>
    <!-- Required meta tags -->
    <meta charset=utf-8 />
    <meta name=viewport content='width=device-width, initial-scale=1, shrink-to-fit=no'/>
     
    <!-- Bootstrap CSS -->
    <link rel=stylesheet href=../css/bootstrap.min.css />

    <title> Registro Favoritos </title>
  </head>
  <body class=bg-dark>
    <div class='container text-white'>
      <?php
         session_start();
         error_reporting(0);
         $sesion = $_SESSION["usuario"];
         $sessionID = $_SESSION["usuario2"];
        include 'database.php';
        $db= new Database();
        $db->conectarBD();

        extract($_POST);

          $SQL = "Call ToursFavoritos ($sessionID,$btnFav)";
          $db->ejecutarSQL($SQL);

          echo "<div class='alert alert-success'> Tour Agregado tus Favoritos </div>";

          header('Location: ../tours.php');
          // if(location('admin/tours.php'))
          // {
          //   header('location: ../admin/tours.php');
          // }
          // else if(location('admin/buscador.php'))
          // {
          //   header('location: ../admin/tours.php');
          // }
          // else if(location('tours.php'))
          // {
          //   header('location: ../tours.php');
          // }
          // else if(location('tours.php'))
          // {
          //   header('location:../ buscador.php');
          // }
      ?>
    </div>
 
 
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=../js/jquery-3.5.1.min.js></script>
    <script src=../js/popper.min.js></script>
    <script src=../js/bootstrap.min.js></script>
  </body>
</html>