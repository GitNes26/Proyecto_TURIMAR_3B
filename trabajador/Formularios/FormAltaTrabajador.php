<!--Instancia turi-->
<?php
  session_start();
  error_reporting(0);
  $sesion = $_SESSION["usuario"];
  $sesionROL = $_SESSION["roluser"];

  include '../../scripts/database.php';
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
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />

    <!--MisEstilos-->
    <link rel="stylesheet" href="../../css/EstilosTurimar.css" />

    <!--Iconos-->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/208a113de3.js" crossorigin="anonymous"></script>

    <style> </style>
    <title>TuriViajes - Admin/Alta Trabajador</title>
</head>

<body class="bg-dark">

    <div class="container-fluid text-white">
        <input type="checkbox" id="check-sidebar" checked>

        <!--MENU-->
        <nav class="row navbar sticky-top navbar-expand-lg navbar-light menu">
            <button class="navbar-toggler text-dark d-block-inline" type="button" data-toggle="collapse"
                data-target="#navbarTogglerMenu" aria-controls="navbarTogglerMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span><img src="../../images/Logo_Turimar_rectangular.png"
                    alt="logo TURIMAR" width="75">
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerMenu">
                <a class="navbar-brand d-none d-sm-block" href="#">
                    <img src="../../images/Logo_Turimar_rectangular.png" alt="logo TURIMAR" title="Inicio" width="75"
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
                        <a class="nav-link mx-2" href="../formasDePago.php">FORMAS DE PAGO</a>
                    </li>

                    <li class="nav-item border-dark link" type="button" data-toggle="modal" data-target="#BtnConstruccion">
                        <a class="nav-link mx-2 disabled">CRUCEROS</a>
                    </li>

                    <li class="nav-item border-dark link text-capitalize" type="button" data-toggle="modal" data-target="#BtnConstruccion">
                        <a class="nav-link mx-2 disabled">MiVIAJE</a>
                    </li>

                    <li class="nav-item border-dark link" type="button" data-toggle="modal" data-target="#BtnConstruccion">
                        <a class="nav-link mx-2 disabled">RENTA</a>
                    </li>

                    <li class="nav-item border-dark link" type="button" data-toggle="modal" data-target="#BtnConstruccion">
                        <a class="nav-link mx-2 disabled">VISA</a>
                    </li>

                    <li class='nav-item dropdown border-dark link pl-3 border-left'>
                        <a class='nav-link dropdown-toggle active font-weight-bold' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>TRABAJADORES</a>
                        <div class='dropdown-menu text-capitalize' aria-labelledby='navbarDropdown'>
                            <?php switch($sesionROL){
                                case 1: echo"
                                    <a class='dropdown-item' href='VerUsuarios.php'>Usuarios</a>
                                    <a class='dropdown-item' href='../ToursRegistrados.php'>Tours</a>";
                                break;
                                case 2: echo"
                                    <a class='dropdown-item' href='../FormTours.php'>Tours</a>
                                    <a class='dropdown-item' href='../FormDestinos.php'>Destinos</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='../FormAerolineas.php'>Aerolineas</a>
                                    <a class='dropdown-item' href='../FormAeropuertos.php'>Aeropuertos</a>
                                    <a class='dropdown-item' href='../FormTarifaVuelo.php'>Tarifas Vuelo</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='../FormHospedaje.php'>Hoteles</a>
                                    <a class='dropdown-item' href='../FormTarifaHoteles.php'>Tarifa Hotel</a>
                                    <div class='dropdown-divider'></div>";
                                break;
                                case 3: echo"
                                    <a class='dropdown-item font-weight-bold' href='VerUsuarios.php'>Usuarios</a>
                                    <a class='dropdown-item' href='../FormTours.php'>Tours</a>
                                    <a class='dropdown-item' href='../FormDestinos.php'>Destinos</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='../FormAerolineas.php'>Aerolineas</a>
                                    <a class='dropdown-item' href='../FormAeropuertos.php'>Aeropuertos</a>
                                    <a class='dropdown-item' href='../FormTarifaVuelo.php'>Tarifas Vuelo</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='../FormHospedaje.php'>Hoteles</a>
                                    <a class='dropdown-item' href='../FormTarifaHoteles.php'>Tarifa Hotel</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='FormAltaTrabajador.php'>Registrar Trabajador</a>";
                                break;
                            } ?>
                        </div>
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
                    echo "<a class='btn fas fa-sign-out-alt ml-md-5 close' href='../../scripts/cerrarSesion.php' title='Cerrar sesión'></a>";
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
                        <img src="../../images/diseño.png" alt="proximamente" height="350px">
                    </div>
                </div>
            </div>
        </div>



        <!-- ------------------------------------------------------------------------------- -->

        <!--CONTENIDO-->
        <div class="container bg-light text-dark rounded-lg p-2">
            <h2>Alta Trabajador <i class="fas fa-id-card"></i></h2>
            <hr>
            <form action='../scripts/guardarUsuario.php' method='post' enctype='multipart/form-data'>

                <div class="form-row">
                    <div class='form-group col-12 col-md-6'>
                        <label class='control-label' for='nombre'>Nombre</label>
                        <input class='form-control' type='text' name='nombre' id='nombre' placeholder='como te llamas?' required>
                    </div>
                    <div class='form-group col-12 col-md-6'>
                        <label class='control-label' for='aPaterno'>Apellido Paterno</label>
                        <input class='form-control' type='text' name='aPaterno' id='aPaterno' required>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label' for='correo'>Corre:</label>
                    <input class='form-control' type='text' name='correo' id='correo' placeholder='trabajador@turimar.com' required>
                </div>
                <div class="form-row">
                    <div class='form-group col-12 col-md-6'>
                        <label class='control-label' for='user'>Usuario:</label>
                        <input class='form-control' type='text' name='user' id='user' placeholder='ntrabajador' required>
                    </div>
                    <div class='form-group col-12 col-md-6'>
                        <label class='control-label' for='password'>Contraseña:</label>
                        <input class='form-control' type='password' name='password' id='password' placeholder='recuerdala siempre' required>
                    </div>
                </div>

                <?php

                    $SQL="SELECT * FROM ROLES";
                    $roles = $turi->seleccionar($SQL);

                    echo "<div class='row'>
                        <div class='col-6'>
                            <label class='control-label'>Rol</label>
                            <select name='rol' class='form-control'>";

                            foreach ($roles as $value)
                            {
                                echo "<option value='".$value->ID."'>".$value->ROL."   →   ".$value->DESCRIPCION."</option>";
                            }
                            echo "</select>
                        </div>"; ?>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="BtnFotoPerfil" class="form-label">Foto de pefil
                                </label>
                                <input  type="file" class='form-control' id="BtnFotoPerfil" name="foto">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label class='control-label'>SEXO:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="masculino" value="MASCULINO" checked>
                                <label class="form-check-label" for="masculino">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="femenino" value="FEMENINO">
                                <label class="form-check-label" for="femenino">Femenino</label>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <div class='form-group'><?php echo"
                                <label class='control-label h6' for='pais'>Pais</label>
                                <select class='form-control' name='pais' id='pais'
                                value='".$u->ID."'>";
                                        $SQL1="SELECT ID,PAIS FROM paises WHERE PAIS='México'";
                                        $resultado1=$turi->seleccionar($SQL1);
                                        foreach ($resultado1 as $paises)
                                        {
                                            echo "<option value='".$paises->ID."'>".$paises->PAIS."</option>";
                                        }echo" 
                                </select>
                            </div>";?>
                        </div>
                    </div>
                    <div class='from-group'>
                        <button type='submit' class='btn btn-lg btn-success btn-block'>Registrar</button>
                    </div>                    
            </form>
        </div>
        <!-- ------------------------------------------------------------------------------- -->

    </div>

    <!-- ------------------------------------------------------------------------------- -->

    <!--AREA DE SCRIPTS-->
    <?php $turi->desconectarBD(); ?>
    <!--AREA DE SCRIPTS-->

    <!-- ------------------------------------------------------------------------------- -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
</body>

</html>