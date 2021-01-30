<?php

class Database
{
    private $PDOLocal;
    private $user="admin";
    private $password="administrador";
    private $server="mysql:host=localhost; dbname=TURIVIAJES_TOURSFINAL";

    function conectarBD()
    {
        try
        {
            $this->PDOLocal=new PDO($this->server, $this->user, $this->password);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function desconectarBD()
    {
        try
        {
            $this->PDOLocal=null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function seleccionar($cadenaSQL)
    {
        try
        {
            $resultado = $this->PDOLocal->query($cadenaSQL);
            $renglon = $resultado->fetchAll(PDO::FETCH_OBJ); 
            #Permite acceder a las filas de la tabla usando PHP
            
            return $renglon;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function ejecutarSQL($cadenaSQL)
    {
        try
        {
            $this->PDOLocal->query($cadenaSQL);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function Ciudades($id_estado)
    {
        $CIUDADES="SELECT * FROM CIUDADES WHERE ESTADO=$id_estado";
        $RESULTADOc=$turi->seleccionar($CIUDADES);

        return $RESULTADOe->fetchall();
    }

    function verificarLogin($usuario,$contrasena)
    {
        try
        {
            $pase=0;
            $id=''; $rol='';
            $query="SELECT * FROM USUARIOS WHERE USUARIO='$usuario'";

            $consulta = $this->PDOLocal->query($query);

            while($registro=$consulta->fetch(PDO::FETCH_ASSOC))
            {
                if(password_verify($contrasena,$registro['CONTRASENA']))
                {
                    $pase=1;
                }
                $id=$registro['ID'];
                $rol=$registro['ROL'];
                
            }

            if($pase>0)
            {
                session_start();
                $_SESSION["usuario"]=$usuario;
                $_SESSION["usuario2"]=$id;
                $_SESSION["roluser"]=$rol;
                  echo "ROL:$rol -- ID:$id -- USUARIO:$usuario -- USUARIO con sesion: ".$_SESSION["usuario"]."-- IDconSESSION: ".$_SESSION["usuario2"]."Rol con session: ".$_SESSION["roluser"]."";
                echo "<div class='alert-success'>
                <h2 align='center'>BIENVENIDO ".$_SESSION["usuario"]."</h2>
                </div>";
                if($rol==0)
                {
                   header('Location: ../index.php');
                }
                else if($rol>0)
                {
                    header('Location: ../trabajador');
                }
                // header("refresh:3; ../index.php");
                // if($rol==0)
                // {
                //    header('Location: ../index.php');
                // }
                // else if($rol==1)
                // {
                //     header('Location: ../admin');
                // }
                // else if($rol==2)
                // {
                //     header('Location: ../admin');
                // }
                // else if($rol==3)
                // {
                //     header('Location: ../admin');
                // }
            }
            else
            {
                echo "<div class='alert-danger'>
                <h2 align='center'><b>USUARIO</b> o <b>CONTRASEÑA</b> incorrecta...</h2>
                </div>";
                header("refresh:3; ../index.php");
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    function cerrarSesion()
    {
        session_start();
        session_destroy();
        header("location:../index.php");
    }

}

?>