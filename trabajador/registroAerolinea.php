<?php
  include "../scripts/database.php";
  $turi=new Database();
  $turi->conectarBD();
  extract($_POST);
        
  $DATO=$_POST['aerolineaRegistro']; //aerolineaRegistro es extraido input del formulario

  $SQL_INSERT="INSERT INTO AEROLINEAS(AEROLINEA) VALUES('$DATO')";
  $turi->ejecutarSQL($SQL_INSERT);
  
  header("location: FormAerolineas.php");

  $turi->desconectarBD();
?>