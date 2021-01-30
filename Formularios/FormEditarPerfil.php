<!--Instancia turi-->
<?php
  session_start();
  error_reporting(0);
  $sesion = $_SESSION["usuario"];
  $sessionID =$_SESSION["usuario2"];

  include '../scripts/database.php';
      $turi=new Database();
      $turi->conectarBD();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <!--MisEstilos-->
    <link rel="stylesheet" href="../css/EstilosTurimar.css" />

    <!--Iconos-->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/208a113de3.js" crossorigin="anonymous"></script>

    <link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <!------ Include the above in your HEAD tag ---------->

    <style>
        body{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }
        .eFONDO{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 1rem;
            background: #fff;
        }
        .eFOTOperfil{
            text-align: center;
            margin-bottom: 10%;
            margin-top: -5%;
        }
        .eFOTOperfil img{
            width: 28vh;
            height: 28vh;
            border-radius: 50%;
            filter: brightness(1);
            transition: 0.2s linear;
        }
        .eFOTOperfil img:hover{
            cursor: pointer;
            filter: brightness(.7);
        }
        .profile-tab{margin-top: 2%}
        @media (max-width: 767px){ 
            .profile-WORK{margin-top: 30%}
        }

        .ebtn-EDITprofile{
            border: none;
            border-radius: 1.5rem;
            width: 60%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
            bottom: 70%;
            position: center;
        }
        .eFOTOperfil .file {
            border: none;
        }
                
        .profile-WORK h5{
            color: #333;
        }
        .profile-WORK h6{
            color: #0062cc;
        }        
        .profile-work .nav-tabs{
            margin-bottom:5%;
        }
        .profile-WORK .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-WORK .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
            
        label{
            font-weight: 600;
        }
        p{
            font-weight: 600;
            color: #0062cc;
        }

                
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
    </style>

    <title>Editar Perfil</title>
</head>

<body>

    <div class="container-fluid">
        <input type="checkbox" id="check-sidebar" checked>

        <!--MENU-->
        <nav class="row navbar sticky-top navbar-expand-lg navbar-light menu">
            <button class="navbar-toggler text-dark d-block-inline" type="button" data-toggle="collapse"
                data-target="#navbarTogglerMenu" aria-controls="navbarTogglerMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span><img src="../images/Logo_Turimar_rectangular.png"
                    alt="logo TURIMAR" width="75">
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerMenu">
                <a class="navbar-brand d-none d-sm-block" href="#">
                    <img src="../images/Logo_Turimar_rectangular.png" alt="logo TURIMAR" title="Inicio" width="75"
                        class="d-none d-md-block">
                </a>
                <!--PESTAÑAS-->
                <ul class="nav nab-tabs navbar-nav mx-auto mt-lg-0 text-uppercase">

                    <li class="nav-item link">
                        <a class="nav-link mx-2" href="../index.php">INICIO <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item border-dark link">
                        <a class="nav-link mx-2" href="../tours.php">TOURS</a>
                    </li>
                    <li class="nav-item border-dark link">
                        <a class="nav-link mx-2" href="formasDePago.php">FORMAS DE PAGO</a>
                    </li>

                    <li class="nav-item border-dark link" type="button" data-toggle="modal" data-target="#BtnConstruccion">
                        <a class="nav-link mx-2 disabled">CRUCEROS</a>
                    </li>

                    <li class="nav-item border-dark link text-capitalize" type="button" data-toggle="modal" data-target="#BtnConstruccion">
                        <a class="nav-link mx-2 disabled">MiViaje</a>
                    </li>

                    <li class="nav-item border-dark link" type="button" data-toggle="modal" data-target="#BtnConstruccion">
                        <a class="nav-link mx-2 disabled">RENTA</a>
                    </li>

                    <li class="nav-item border-dark link" type="button" data-toggle="modal" data-target="#BtnConstruccion">
                        <a class="nav-link mx-2 disabled">VISA</a>
                    </li>

                </ul>

                <!--Btn Busqueda-->
                <form class="form-inline my-2 my-lg-0">
                    <a type="button" class="btn btn-outline-dark" href="../buscador.php"
                        title="Busqueda"><i class="fas fa-search fa-lg my-auto mr-2"></i>
                    </a>
                </form>


                <!--BTN cerrar sesion-->
                <?php            
                  if(isset($sesion))
                  {
                    echo "<a href='../miPerfil.php' class='h5 text-muted font-weight-bold ml-2'>".$sesion."</a>";
                    echo "<a class='btn fas fa-sign-out-alt ml-md-5 close' href='../scripts/cerrarSesion.php' title='Cerrar sesión'></a>";
                  }
                ?>

            </div>
        </nav>

        <!--MODAL "BtnConstruccion" BTN "Construccion"-->
        <div class="modal fade" id="BtnConstruccion" tabindex="-1" role="dialog" aria-labelledby="BtnConstruccionLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-danger text-white">
                    <div class="modal-header">
                        <h5 class="modal-title display-4" id="BtnConstruccionLabel">ESTA PÁGINA ESTARA DISPONIBLE PROXIMAMENTE!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                        </button>
                    </div>

                    <div class="modal-body text-dark text-center">
                        <img src="../images/diseño.png" alt="proximamente" height="350px">
                    </div>
                </div>
            </div>
        </div>



        <!-- ------------------------------------------------------------------------------- -->

        <!--CONTENIDO-->            
        <div class="container eFONDO">
            <!-- PARTE SUPERIOR -->
            <div class="row">
                <div class="col-md-3">
                    <!-- FOTO DE PERFIL -->
                    <div class="profile-img">
                        <div class="eFOTOperfil position-absolute">
                            <div class="col-md-3">
                                <?php
                                    $SQL="SELECT * FROM USUARIOS INNER JOIN PAISES ON USUARIOS.PAIS=PAISES.ID WHERE USUARIO='$sesion'";
                                    $resultado=$turi->seleccionar($SQL);
                                    
                                    foreach ($resultado as $u){echo"
                                        <label for='BtnFotoPerfil' class='form-label'><img class='fotoMiPerfil' src='../".$u->FOTO."' height='50px' width='50px' alt='foto usuario'/></label>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <!-- USUARIO -->
                    <div class="profile-WORK ">
                            <?php
                            echo "<h5>".$u->USUARIO."</h5>
                            <h6>".$u->CORREO." </h6>";
                            ?>


                        <!-- PESTAÑAS -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Perfil</a>
                            </li>
                        </ul>
                    </div>
                </div>                    
            </div>

            <!-- CONTENIDO -->
            <div class="row">
                <div class="col-md-8 offset-md-3">
                    <div class="tab-content profile-tab subir" id="myTabContent">
                        <form action='../scripts/editarUsuario.php' method='post' enctype='multipart/form-data'>              
                        <!-- USUARIO -->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class='row'><?php echo "
                                    <div class='col-md-6'> <label>Usuario</label> </div>
                                    <div class='col-md-6'> <p><input class='form-control form-control-sm rounded-pill' type='text' disabled name='usuario' id='usuario'
                                    value='".$u->USUARIO."'></p> </div>
                                </div> 
                                <div class='row'>
                                    <div class='col-md-6'> <label>Correo</label> </div>
                                    <div class='col-md-6'> <p><input class='form-control form-control-sm rounded-pill' type='text' name='correo' id='correo'
                                    value='".$u->CORREO."'></p> </div>
                                </div> 
                                <div class='row'>
                                    <div class='col-md-6'> <label>Contrasena</label> </div>
                                    <div class='col-md-6'> <p><input class='form-control form-control-sm rounded-pill' type='password' disabled name='contraseña' id='contraseña'
                                    value='".$u->CONTRASENA."'></p> </div>
                                </div> <br>
                
                                <div class='row'> 
                                    <div class='col-md-6'>
                                        <div class='row'>
                                            <div class='col-md-6'> <label>Nombre(s)</label> </div>
                                            <div class='col-md-6'> <p> <input class='form-control form-control-sm rounded-pill' type='text' name='nombre' id='nombre'
                                            value='".$u->NOMBRE."'> </p> </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'> <label>Apellido paterno</label> </div>
                                            <div class='col-md-6'> <p> <input class='form-control form-control-sm rounded-pill' type='text' name='aPaterno' id='aPaterno'
                                            value='".$u->APELLIDO_PATERNO."'> </p> </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'> <label>Apellido materno</label> </div>
                                            <div class='col-md-6'> <p> <input class='form-control form-control-sm rounded-pill' type='text' name='aMaterno' id='aMaterno'
                                            value='".$u->APELLIDO_MATERNO."'> </p> </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'> <label>Sexo</label> </div>
                                            <div class='col-md-6'> <p> ".$u->SEXO." </p> </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'> <label>Telefono</label> </div>
                                            <div class='col-md-6'> <p> <input class='form-control form-control-sm rounded-pill' type='text' name='tel' id='tel'
                                            value='".$u->CELULAR."'> </p> </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'> <label>Fecha_nacimiento</label> </div>
                                            <div class='col-md-6'> <p> <input class='form-control form-control-sm rounded-pill' type='date' name='fecha' id='fecha'
                                            value='".$u->FECHA_NACIMIENTO."'> </p> </div>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='row'>
                                            <div class='col-md-6'> <label>Calle</label> </div>
                                            <div class='col-md-6'> <p> <input class='form-control form-control-sm rounded-pill' type='text' name='calle' id='calle'
                                            value='".$u->CALLE."'> </p> </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'> <label> Num_Externo </label> </div>
                                            <div class='col-md-6'> <p> <input class='form-control form-control-sm rounded-pill' type='text' name='no_ext' id='no_ext'
                                            value='".$u->NO_EXT."'> </p> </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'> <label> Colonia </label> </div>
                                            <div class='col-md-6'> <p> <input class='form-control form-control-sm rounded-pill' type='text' name='colonia' id='colonia'
                                            value='".$u->COLONIA."'> </p> </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'> <label> Ciudad </label> </div>
                                            <div class='col-md-6'> <p> <input class='form-control form-control-sm rounded-pill' type='text' name='ciudad' id='ciudad'
                                            value='".$u->CIUDAD."'> </p> </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'> <label> Pais </label> </div>
                                            <div class='col-md-6'> <p> <select class='form-control form-control-sm rounded-pill' name='pais' id='pais'
                                            value='".$u->ID."'>";
                                                $SQL1="SELECT ID,PAIS FROM paises WHERE PAIS='México'";
                                                $resultado1=$turi->seleccionar($SQL1);
                                                foreach ($resultado1 as $paises)
                                                {
                                                    echo "<option value='".$paises->ID."'>".$paises->PAIS."</option>";
                                                }echo" 
                                            </select> </p> </div>
                                        </div>
                                        <input type='hidden' name='rol' value='0'>";}?>
                            
                                        <!-- BOTON EDITAR PERFIL -->
                                        <div class='row'>
                                            <div class='col-12 from-group'>
                                                <button type='submit' class='btn btn-lg btn-success btn-block'>Guardar <i class='fas fa-save ml-2'></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

    <!-- ------------------------------------------------------------------------------- -->

    <!--AREA DE SCRIPTS-->
        <?php $turi->desconectarBD(); ?>        
    <!--AREA DE SCRIPTS-->

    <!-- ------------------------------------------------------------------------------- -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>