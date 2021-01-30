<!DOCTYPE html>
<html lang=es>
  <head>
    <!-- Required meta tags -->
    <meta charset=utf-8 />
    <meta name=viewport content='width=device-width, initial-scale=1, shrink-to-fit=no'/>
     
    <!-- Bootstrap CSS -->
    <link rel=stylesheet href=../css/bootstrap.min.css />
    <title> Login </title>
  </head>
  <body class=bg-dark>
    <div class='container text-white'>
      <?php
        include 'database.php';
        $db=new Database();
        $db->conectarBD();
        extract($_POST);

        $db->VerificarLogin("$user","$password");
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