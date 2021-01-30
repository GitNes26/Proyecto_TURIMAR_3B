<?php
    // session_start();
    // error_reporting(0);
    // $sesion = $_SESSION["usuario"];
    
    if(isset($_POST['IDedo'])){
        include 'database.php';
        $turi=new Database();
        $turi->conectarBD();
        
        $CIUDADES="SELECT * FROM CIUDADES ORDER BY CIUDAD";
        $RESULTADOc=$turi->seleccionar($CIUDADES);
        $html="";
        foreach ($RESULTADOc as $c){
            $html.="<option value='".$c['ID']."'>".$c['CIUDAD']."</option>";
            echo $html;
        }
    }
    // else{ echo "No hay post";}
?>