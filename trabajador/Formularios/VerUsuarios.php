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

    <style>
        .eFONDO{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 1rem;
            background: #e1e1e1;
        }
    </style>
    <title>TuriViajes - Admin/Ver Usuarios</title>
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
        <div class='container-fluid text-white mt-3 eFONDO'>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-fill lead font-weight-bold" id="myTab" role="tablist">
                <!--NavMenuUSUARIOS-->
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="areaUsuarios-tab" data-toggle="tab" href="#areaUsuarios" role="tab" aria-controls="areaUsuarios" aria-selected="true">USUARIOS <i class="fas fa-users ml-2"></i></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="areaAdmin-tab" data-toggle="tab" href="#areaAdmin" role="tab" aria-controls="areaAdmin" aria-selected="true">EMPLEADOS <i class="fas fa-user-tie ml-2"></i></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="areaToursCotizados-tab" data-toggle="tab" href="#areaToursCotizados" role="tab" aria-controls="areaToursCotizados" aria-selected="true">TOURS COTIZADOS <i class="fas fa-search-dollar ml-2"></i></a>
                </li>
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content">   
                <!--TabPanelUSUARIOS-->
                <div class="tab-pane active" id="areaUsuarios" role="tabpanel" aria-labelledby="areaUsuarios-tab">
                    <div class="row">                    
                        <!--ConteniUsuarios-->
                        <div class="col">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-Usuarios" role="tabpanel" aria-labelledby="v-pills-Usuarios-tab">
                                    <div class="my-2 p-2">
                                        <table class="table table-light table-hover border table-sm table-responsive">
                                            <thead class="table-thead thead-light">
                                                <tr>
                                                    <th scope="col">FOTO</th>
                                                    <th scope="col">USUARIO</th>
                                                    <th scope="col">NOMBRE</th>
                                                    <th scope="col">PATERNO</th>
                                                    <th scope="col">MATERNO</th>
                                                    <th scope="col">CORREO</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--TABLA USUARIOS-->
                                                <?php

                                                    $SQL="SELECT * FROM mostrarusuario";
                                                    $RESULTADOS=$turi->seleccionar($SQL);

                                                    foreach ($RESULTADOS as $u)
                                                    {
                                                        echo "<tr>
                                                            <td><img src='../../".$u->FOTO."' alt='Foto usuario' class='rounded-circle' width='100px' height='100px'>
                                                            <td>".$u->USUARIO."</td>
                                                            <td>".$u->NOMBRE."</td>
                                                            <td>".$u->APELLIDO_PATERNO."</td>
                                                            <td>".$u->APELLIDO_MATERNO."</td>
                                                            <td>".$u->CORREO."</td>".
                                                            #Btn Mandar Correo                                                 
                                                            "<td><div class='btn-block'>
                                                                    <button class='btn btn-primary' data-toggle='tooltip' title='Mandar Correo'>Enviar Correo <i class='fas fa-at'></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>";
                                                    }
                                                ?>                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--TabPanelEmpleados-->
                <div class="tab-pane" id="areaAdmin" role="tabpanel" aria-labelledby="areaAdmi-tab">
                    <div class="row">                    
                        <!--ConteniEmpleados-->
                        <div class="col">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-Usuarios" role="tabpanel" aria-labelledby="v-pills-Usuarios-tab">
                                    <div class="my-2 p-2">
                                        <table class="table table-light table-hover border table-sm table-responsive">
                                            <thead class="table-thead thead-light">
                                                <tr>
                                                    <th scope="col">FOTO</th>
                                                    <th scope="col">ROL</th>
                                                    <th scope="col">USUARIO</th>
                                                    <th scope="col">NOMBRE</th>
                                                    <th scope="col">PATERNO</th>
                                                    <th scope="col">MATERNO</th>
                                                    <th scope="col">CORREO</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--TABLA EMPLEADOS-->
                                                <?php


                                                    $SQL1="SELECT * FROM mostrarempleado";
                                                    $RESULTADOS1=$turi->seleccionar($SQL1);

                                                    foreach ($RESULTADOS1 as $e)
                                                    {
                                                        echo "<tr>
                                                            <td><img src='../../".$e->FOTO."' alt='Foto usuario' class='rounded-circle' width='100px' height='100px'>
                                                            <td>".$e->ROL."</td>
                                                            <td>".$e->USUARIO."</td>
                                                            <td>".$e->NOMBRE."</td>
                                                            <td>".$e->APELLIDO_PATERNO."</td>
                                                            <td>".$e->APELLIDO_MATERNO."</td>
                                                            <td>".$e->CORREO."</td>".
                                                            #Btn Mandar Correo                                             
                                                            "<td><div class='btn-block'>
                                                                    <button class='btn btn-primary' data-toggle='tooltip' title='Mandar Correo'>Enviar Correo <i class='fas fa-at'></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--TabPanelToursCotizados-->
                <div class="tab-pane" id="areaToursCotizados" role="tabpanel" aria-labelledby="areToursCotizados-tab">
                    <div class="row">                    
                        <!--ContenidoToursCotizados-->
                        <div class="col">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-Usuarios" role="tabpanel" aria-labelledby="v-pills-Usuarios-tab">
                                    <div class="my-2 p-2">
                                        <table class='table table-bordered table-light table-hover table-sm table-responsive'>
                                            <thead class="text-center thead-light">
                                                <tr>
                                                    <th scope='col' rowspan='2'>Folio</th>
                                                    <th scope='col' rowspan='2'>Usuario</th>
                                                    <th scope='col' rowspan='2'>Fecha_de___ Reserva</th>
                                                    <th scope='col' rowspan='2'>Tour</th>
                                                    <th scope='col' rowspan='2'>Fecha_de___ Salida</th>
                                                    <th scope='col' colspan='2'>Personas</th>
                                                    <th scope='col' rowspan='2'>Hotel</th>
                                                    <th scope='col' colspan='3'>Vuelo</th>
                                                    <th scope='col' rowspan='2'>___Precio___</th>
                                                    <th scope='col' rowspan='2'>___ESTATUS___</th>
                                                </tr>
                                                <tr>
                                                    <th scope='col'>Adultos</th>
                                                    <th scope='col'>Menores</th>
                                                    <th scope='col'>_____Aeropuerto_____</th>
                                                    <th scope='col'>Aerolinea</th>
                                                    <th scope='col'>Hora de Vuelo</th>
                                                </tr>
                                            </thead>
                                            <tbody> <?php
                                                $SQLct="SELECT * FROM MostrarToursCotizados";
                                                $RESULTADOta=$turi->seleccionar($SQLct);
                                                
                                                foreach ($RESULTADOta as $ta){
                                                    switch($ta->ESTATUS){
                                                        case 'EN PROCESO':
                                                            echo"
                                                            <tr>
                                                                <th scope='row'>".$ta->ID."</th>
                                                                <th>".$ta->USUARIO."</th>
                                                                <td>".$ta->FECHA_RESERVA."</td>
                                                                <td>".$ta->TOUR."</td>
                                                                <td>".$ta->FECHA_SALIDA."</td>
                                                                <td class='text-center'>".$ta->ADULTOS."</td>
                                                                <td class='text-center'>".$ta->MENORES."</td>
                                                                <td>".$ta->HOTEL."</td>
                                                                <td>".$ta->AEROPUERTO."</td>
                                                                <td>".$ta->AEROLINEA."</td>
                                                                <td>".$ta->HORA_VUELO."</td>
                                                                <th>$ ".$ta->PRECIO_TOTAL."</th>
                                                                <td class='text-center'>
                                                                    <div class='btn-group'>
                                                                        <form action='../scripts/aprobarTour.php' method='POST'>
                                                                        <button class='btn btn-success mr-2' name='BtnAprobar' value='".$ta->ID."' data-toggle='tooltip' title='Aprobar Cotizacion'><i class='fas fa-check fa-sm'></i></button></form>
                                                                        <form action='../scripts/cancelarTour.php' method='POST'>
                                                                        <input type='hidden' name='Pag' value='admin'>
                                                                        <button class='btn btn-danger' name='BtnCancelar' value='".$ta->ID."' data-toggle='tooltip' title='Cancelar Cotizacion'><i class='fas fa-ban fa-sm'></i></button></form>
                                                                    </div>
                                                                    <p class='font-weight-bold'>".$ta->ESTATUS."</p>
                                                                </td>
                                                            </tr>";
                                                        break;
                                                        case 'CANCELADO':
                                                            echo"
                                                            <tr>
                                                                <th scope='row' class='bg-danger text-light'>".$ta->ID."</th>
                                                                <th class='bg-danger text-light'>".$ta->USUARIO."</th>
                                                                <td class='bg-danger text-light'>".$ta->FECHA_RESERVA."</td>
                                                                <td class='bg-danger text-light'>".$ta->TOUR."</td>
                                                                <td class='bg-danger text-light'>".$ta->FECHA_SALIDA."</td>
                                                                <td class='bg-danger text-light text-center'>".$ta->ADULTOS."</td>
                                                                <td class='bg-danger text-light text-center'>".$ta->MENORES."</td>
                                                                <td class='bg-danger text-light'>".$ta->HOTEL."</td>
                                                                <td class='bg-danger text-light'>".$ta->AEROPUERTO."</td>
                                                                <td class='bg-danger text-light'>".$ta->AEROLINEA."</td>
                                                                <td class='bg-danger text-light'>".$ta->HORA_VUELO."</td>
                                                                <th class='bg-danger text-light'>$ ".$ta->PRECIO_TOTAL."</th>
                                                                <td class='text-center bg-danger text-light font-weight-bold'>
                                                                    <i class='fas fa-ban fa-lg my-2'></i>
                                                                    <div>".$ta->ESTATUS."</div>
                                                                </td>
                                                            </tr>";
                                                        break;
                                                        case 'APROBADO':
                                                            echo"
                                                            <tr>
                                                                <th scope='row' class='bg-success text-light'>".$ta->ID."</th>
                                                                <th class='bg-success text-light'>".$ta->USUARIO."</th>
                                                                <td class='bg-success text-light'>".$ta->FECHA_RESERVA."</td>
                                                                <td class='bg-success text-light'>".$ta->TOUR."</td>
                                                                <td class='bg-success text-light'>".$ta->FECHA_SALIDA."</td>
                                                                <td class='bg-success text-light text-center'>".$ta->ADULTOS."</td>
                                                                <td class='bg-success text-light text-center'>".$ta->MENORES."</td>
                                                                <td class='bg-success text-light'>".$ta->HOTEL."</td>
                                                                <td class='bg-success text-light'>".$ta->AEROPUERTO."</td>
                                                                <td class='bg-success text-light'>".$ta->AEROLINEA."</td>
                                                                <td class='bg-success text-light'>".$ta->HORA_VUELO."</td>
                                                                <th class='bg-success text-light'>$ ".$ta->PRECIO_TOTAL."</th>
                                                                <td class='text-center bg-success text-light font-weight-bold'>
                                                                    <i class='fas fa-check-circle fa-lg my-2'></i>
                                                                    <div>".$ta->ESTATUS."</div>
                                                                </td>
                                                            </tr>";
                                                        break;
                                                    }
                                                }?>  
                                            </tbody>
                                        </table> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ------------------------------------------------------------------------------- -->

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