<!--Instancia turi-->
<?php
    session_start();
    error_reporting(0);
    $sesion = $_SESSION["usuario"];
    $sesionROL = $_SESSION["roluser"];
    
  include '../../scripts/database.php';
      $turi=new Database();
      $turi->conectarBD();

      extract($_POST);
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
        body{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }
    </style>
    <title>TuriViajes - Tours</title>
</head>

<body class="bg-secondary">

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
                                    <a class='dropdown-item' href='../Formularios/VerUsuarios.php'>Usuarios</a>
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
                                    <a class='dropdown-item' href='../Formularios/VerUsuarios.php'>Usuarios</a>
                                    <a class='dropdown-item' href='../FormTours.php'>Tours</a>
                                    <a class='dropdown-item' href='../FormDestinos.php'>Destinos</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='../FormAerolineas.php'>Aerolineas</a>
                                    <a class='dropdown-item' href='../FormAeropuertos.php'>Aeropuertos</a>
                                    <a class='dropdown-item' href='../FormTarifaVuelo.php'>Tarifas Vuelo</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='../FormHospedaje.php'>Hoteles</a>
                                    <a class='dropdown-item' href='../.php'>Tarifa Hotel</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='../Formularios/FormAltaTrabajador.php'>Registrar Trabajador</a>";
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

        <!--SIDEBAR-->
        <?php                
          if(isset($sesion))
          {
            $SQL="SELECT * FROM USUARIOS WHERE USUARIO='$sesion'";
            $RESULTADO=$turi->seleccionar($SQL);

            foreach ($RESULTADO as $i)
            {
            echo"     
            <div class='sidebar d-flex'>
              <label for='check-sidebar'>
                <div id='wrapper'>
                  <div class='main-item menu-hamburger'>
                    <span class='line line01'></span>
                    <span class='line line02'></span>
                    <span class='line line03'></span>
                  </div>
                </div>
              </label>
              <div class='text-center'>
                  <img src='../../".$i->FOTO."' class='profile_image rounded-circle' alt=''>
                  <h4>".$i->USUARIO."</h4>
              </div>
              <a href='../miPerfil.php'><i class='icon far fa-user fa-sm' class='tooltip-test' title='Perfil'>
                    </i><span>Perfil</span>
                </a>
                <!-- <a href='../miPerfil.php'><i class='icon far fa-bell' class='tooltip-test' title='Notificaciones'>
                    </i><span>Notificaciones</span>
                </a> -->
                <a href='../miPerfil.php'><i class='icon fas fa-file-invoice-dollar' class='tooltip-test' title='Cotizaciones'>
                    </i><span>Cotizaciones</span>
                </a>
                <a href='../miPerfil.php'><i class='icon fas fa-heart' class='tooltip-test' title='Favoritos'>
                    </i><span>Favoritos</span>
                </a>
            </div>
            <label class='oscuro m-0 p-0 position-fixed' for='check-sidebar'></label>";
            }
          }
        ?>

        <!--REDES SOCIALES-->
        <?php                
          if(!isset($sesion))
          {
            echo"
            <div class='d-none d-md-block'>
              <div class='btn btn-success position-fixed rounded-pill posicionWhats d-flex justify-content-start posicion'><img src='../../images/whatsapp.png' class='icoredes'>&nbsp; WhatsApp</div>
              <a href='https://www.facebook.com/turimar1.mx' target='_blank' class='btn btn-primary position-fixed rounded-pill posicionFb d-flex justify-content-start posicion'><img src='../../images/facebook.png' class='icoredes'> &nbsp; Facebook</a>
              <a href='https://www.instagram.com/turimartrave/' target='_blank' class='btn btn-light position-fixed rounded-pill posicionIns d-flex justify-content-start posicion'><img src='../../images/instagram.png' class='icoredes'> &nbsp; Instagram</a>
              <a href='https://www.youtube.com/channel/UC1ra5LppwV8ARMakNGyLxig/featured' target='_blank' class='btn btn-danger position-fixed rounded-pill posicionYt d-flex justify-content-start posicion'><img src='../../images/youtube.png' class='icoredes'> &nbsp; Youtube</a>
              <a href='https://twitter.com/turimaroficial' target='_blank' class='btn btn-info position-fixed rounded-pill posicionTwit d-flex justify-content-start posicion'><img src='../../images/twitter.png' class='icoredes'> &nbsp; Twitter</a>
            </div>
            <!-- CHAT PARA LO SQUE NO ESTAN REGISTRADOS
            <div class='btn btn-light position-fixed posicionChat d-flex justify-content-start posicion'><img src='images/chat-square-text.svg' class='icoredes'>&nbsp;Chat</div> -->
              
            <!--REDES SOCIALES-->";
          }
        ?>


        <!-- ----------------------------------------------------------------------------------------------- -->


        <?php
            $SQL="Call CotizarTour($IDtour)";
            $RESULTADO=$turi->seleccionar($SQL); foreach($RESULTADO as $i)

            $PAIS="SELECT * FROM PAISES WHERE PAIS='Mexico'  ORDER BY PAIS";
            $RESULTADOp=$turi->seleccionar($PAIS);

            $ESTADOS="Call CotizacionEstados($cotizarEstado)";
            $RESULTADOe=$turi->seleccionar($ESTADOS);

            $CIUDADES="Call CotizacionCiudades($cotizarCiudad)";
            $RESULTADOc=$turi->seleccionar($CIUDADES);

            if($checkAerolinea){
            $AEROLINEAS="Call CotizarPrecioVuelo($cotizarAerolinea,'$cotizarTipoVuelo')";
            $RESULTADOa=$turi->seleccionar($AEROLINEAS); foreach($RESULTADOa as $a)

            $SALIDAS="Call CotizarHorario($cotizarAerolinea,$IDtour)";
            $RESULTADOs=$turi->seleccionar($SALIDAS);
        
            $AEROPUERTO="Call CotizacionAeropuerto($cotizarCiudad)";
            $RESULTADOap=$turi->seleccionar($AEROPUERTO); foreach($RESULTADOap AS $ap);}

            if($checkHotel){
            $HOTELES="Call CotizarPrecioHotel($IDtour,$cotizarHotel,'$cotizarTipoHabitacion')";
            $RESULTADOh=$turi->seleccionar($HOTELES); foreach($RESULTADOh as $h);}

            echo"
                <!--MODAL 'BtnCotizarID' BTN 'Cotizar Viaje'-->
                <div class='' id='BtnCotizar".$i->ID."' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='BtnCotizar".$i->ID."Label' aria-hidden='false'>
                    <div class='modal-dialog modal-lg'>
                        <div class='modal-content bg-light'>
                            <div class='modal-header bg-success text-light'>
                                <h5 class='modal-title display-4' id='BtnCotizar".$i->ID."Label'>COTIZAR VIAJE <i class='fas fa-calculator fa-sm my-auto ml-4'></i></h5>
                            </div>

                            <div class='modal-body text-dark'>
                                <form action='../scripts/calcularCotizacion.php' method='GET'>    
                                    <!--Mostrar destino-->
                                    <div class='row'>
                                    <!--Mostrar nombre de usuario-->";
                                    if(isset($sesion))
                                    {
                                        echo "<div class='col'>
                                            <h4 class='text-dark lead font-weight-bold' align='right'>Usuario: ".$sesion."</h4></div></div>";
                                    } echo "
                                    <input type='hidden' name='IDtour' value='".$IDtour."'>
                                    <input type='hidden' name='precioTour' value='".$i->PRECIO."'>
                                    
                                    <!--Origen-->
                                    <div class='form-group mt-3'>
                                        <div class='row'>       
                                            <!--Pais-->              
                                            <div class='col-md-4'>                      
                                                <label for='origen' class='col-form-label lead font-weight-bold'>Origen</label>
                                                <select name='cotizarPais' class='form-control' id='selectPais' readonly>";
                                                    foreach ($RESULTADOp as $p)
                                                    {
                                                        echo "<option value='".$p->ID."'>".$p->PAIS."</option>";
                                                    } echo"
                                                </select>
                                            </div>
                                            <!--Estado-->
                                            <div class='col-md-4'>
                                                <label for='origen' class='col-form-label lead font-weight-bold'>-</label>
                                                <select name='cotizarEstado' class='form-control' id='selectEstado' readonly>";
                                                    foreach ($RESULTADOe as $e)
                                                    {
                                                        echo "<option value='".$e->ID."'>".$e->ESTADO."</option>";
                                                    } echo"
                                                </select>
                                            </div>
                                            <!--Ciudad-->
                                            <div class='col-md-4'>
                                                <label for='origen' class='col-form-label lead font-weight-bold'>-</label>
                                                <select name='cotizarCiudad' class='form-control' id='selectCiudad' readonly>";
                                                    foreach ($RESULTADOc as $c)
                                                    {
                                                        echo "<option value='".$c->ID."'>".$c->CIUDAD."</option>";
                                                    } 
                                                    echo"
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Destino y duración-->
                                    <div class='form-group'>
                                        <div class='row'>
                                            <!--Destino-->
                                            <div class='col-md-4'>
                                                <label for='destino' class='col-form-label lead font-weight-bold'>Destino</label>
                                                <input type='text' name='destino' class='form-control' id='destino' value='".$i->TOUR."' readonly>
                                            </div>
                                            <!--Fecha del Tour -->
                                            <div class='col-md-4'>
                                                <label for='fechaTour' class='col-form-label lead font-weight-bold'>Fecha del tour:</label>
                                                <select name='cotizarFechaTour' id='fechaTour' class='form-control' readonly>";
                                                    foreach ($RESULTADO as $i)
                                                    {
                                                        echo "<option value='".$cotizarFechaTour."'>".$cotizarFechaTour."</option>";
                                                    }echo"
                                                </select>
                                            </div>
                                            <!--Duración-->
                                            <div class='col-md-4'>
                                                <label for='duración' class='col-form-label lead font-weight-bold'>Duracion del tour:</label>
                                                <input type='text' name='cotizarDuracion' class='form-control' id='duaración' value='".$i->DURACION."' disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Personas-->
                                    <div class='form-group border rounded p-2'>
                                        <div class='row'>
                                            <!--Cantidad Adultos-->
                                            <div class='col-md-3'>
                                                <label for='adultos' class='col-form-label lead font-weight-bold'>Adultos</label>
                                                <input type='number' value='".$cotizarAdultos."' name='cotizarAdultos' min='0' max='20' class='form-control' id='adultos' readonly>
                                            </div>
                                            <!--Cantidad Menores-->
                                            <div class='col-md-3'>
                                                <label for='duración' class='col-form-label lead font-weight-bold'>Menores</label>
                                                <input type='number' value='".$cotizarMenores."' name='cotizarMenores' min='0' max='20' class='form-control' id='duaración' readonly>
                                            </div>
                                            <div class='col'>
                                                <h6 class='text-muted pt-3'>Los menores de edad, son desde los 0 años hasta los 12 años.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Vuelo-->";
                                    if($checkAerolinea){echo"
                                        <div class='form-group border rounded p-2'>
                                            <input type='hidden' name='precioVuelo' value='".$a->TARIFA."'>
                                            <input type='hidden' name='IDaeropuerto' value='".$ap->ID."'>
                                            <input type='hidden' name='aeropuerto' value='".$ap->AEROPUERTO."'>

                                            <!--CHECK para solicitar vuelo en cotizacion--> <!-- CONDICIONAR SI LO CHECKEA -->
                                            <div class='form-check'>
                                                <input class='form-check-input' type='checkbox' name='checkAerolinea' id='checkAerolinea' checked>
                                                <label for='checkAerolinea' class='form-check-label'>
                                                ¿Desea agregar vuelo a la cotizacion?
                                                </label>
                                            </div>
                                            <div class='row'>
                                                <!--Aerolineas-->
                                                <div class='col-md-6'>
                                                    <label for='aerolinea' class='col-form-label lead font-weight-bold'>Aerolinea</label>
                                                    <select name='cotizarAerolinea' class='form-control' readonly>
                                                        <option value='".$cotizarAerolinea."'>".$a->AEROLINEA."</option>
                                                    </select>
                                                </div>
                                                <!--Tipo de Boleto-->
                                                <div class='col text-center'>
                                                    <div  class='col-form-label lead font-weight-bold'>Tipo de boleto:</div>
                                                    <div class='form-check form-check-inline pt-2'>
                                                        <input class='form-check-input' type='radio' name='cotizarTipoVuelo' id='tipoBoleto' value='".$cotizarTipoVuelo."' checked>
                                                        <label class='form-check-label lead' for='tipoBoleto'>".$cotizarTipoVuelo."</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Horario de Salida-->
                                            <div class='row'>
                                                <!--Fecha de Salida-->
                                                <div class='col-md-6'>
                                                    <label for='hora' class='col-form-label lead font-weight-bold'>Hora de salida</label>
                                                    <select name='cotizarHora' class='form-control' id='hora' readonly>
                                                        <option value='".$cotizarHora."'>".$cotizarHora."</option>
                                                    </select>
                                                </div>
                                                <!--Leyenda salida-->
                                                <div class='col'>
                                                    <h6 class='text-muted pt-3'>Recuerda estar en el aeropuerto entre 2 hrs y 1 hora y media antes de la hora de salida.</h6>
                                                </div>
                                            </div>
                                        </div>";
                                    }
                                    else { echo"
                                        <div class='form-group border rounded p-2 bg'>
                                            <!--CHECK para solicitar vuelo en cotizacion--> <!-- CONDICIONAR SI LO CHECKEA -->
                                            <div class='form-check'>
                                                <input class='form-check-input' type='checkbox' name='checkAerolinea' id='checkAerolinea' disabled>
                                                <label for='checkAerolinea' class='form-check-label'>
                                                ¿Desea agregar vuelo a la cotizacion?
                                                </label>
                                            </div>
                                            <div class='row'>
                                                <!--Aerolineas-->
                                                <div class='col-md-6'>
                                                    <label for='aerolinea' class='col-form-label lead font-weight-bold'>Aerolinea</label>
                                                    <select name='cotizarAerolinea' class='form-control' readonly>
                                                        <option value='1'>Sin Aerolinea seleccionada</option>
                                                    </select>
                                                </div>
                                                <!--Tipo de Boleto-->
                                                <div class='col text-center'>
                                                    <div  class='col-form-label lead font-weight-bold'>Tipo de boleto:</div>
                                                    <div class='form-check form-check-inline pt-2'>
                                                        <label class='form-check-label lead' for='tipoBoleto'>Sin solicitud de Vuelo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Horario de Salida-->
                                            <div class='row'>
                                                <!--Fecha de Salida-->
                                                <div class='col-md-6'>
                                                    <label for='hora' class='col-form-label lead font-weight-bold'>Hora de salida</label>
                                                    <select name='cotizarHora' class='form-control' id='hora' readonly>
                                                        <option>Sin vuelo</option>
                                                    </select>
                                                </div>
                                                <!--Leyenda salida-->
                                                <div class='col'>
                                                    
                                                </div>
                                            </div>
                                        </div>";
                                    }
                                    
                                    echo"

                                    <!--Hospedaje y Foto-->";
                                    if($checkHotel){echo"
                                        <div class='row'>
                                            <!--Hospedaje-->
                                            <div class='col-md-6'>
                                                <div class='form-group border rounded p-2'>
                                                    <!--CHECK para solicitar hotel en cotizacion--> <!-- CONDICIONAR SI LO CHECKEA -->
                                                    <input type='hidden' name='precioHospedaje' value='".$h->PRECIO_NOCHE."'>

                                                    <div class='form-check'>
                                                        <input class='form-check-input' type='checkbox' name='checkHotel' id='checkHotel' checked>
                                                        <label class='form-check-label' for='checkHotel'>
                                                        ¿Desea agregar hospedaje a la cotizacion?
                                                        </label>
                                                    </div>
                                                    <div class='row'>
                                                        <!--Hoteles-->
                                                        <div class='col-12'>
                                                            <label for='hotel' class='col-form-label lead font-weight-bold'>Hotel</label>
                                                            <select name='cotizarHotel' class='form-control' id='hotel' readonly>
                                                                <option value='".$cotizarHotel."'>".$h->CATEGORIA." → ".$h->HOTEL." </option>
                                                            </select>
                                                        </div>
                                                        <!--Tipo de Habitacion-->
                                                        <input type='hidden' name='cotizarNoches' value='".$i->NOCHES."'>
                                                        <input type='hidden' name='cotizarCategoria' value='".$h->CATEGORIA."'>
                                                        <div class='col-12 text-center'>
                                                            <div  class='col-form-label lead font-weight-bold'>Tipo de habitacion:</div>
                                                            <div class='form-check form-check-inline pt-2'>
                                                                <input class='form-check-input' type='radio' name='cotizarTipoHabitacion' id='Sencilla' value='".$cotizarTipoHabitacion."' checked>
                                                                <label class='form-check-label lead' for='Sencilla'>".$cotizarTipoHabitacion."</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--Buen Viaje-->
                                            <div class='col-6'>
                                                <h2 class='display-3'>Buen Viaje!</h2>
                                            </div>                                                        
                                        </div>";
                                    }
                                    else {echo"
                                        <div class='row'>
                                            <!--Hospedaje-->
                                            <div class='col-md-6'>
                                                <div class='form-group border rounded p-2 bg'>
                                                    <!--CHECK para solicitar hotel en cotizacion--> <!-- CONDICIONAR SI LO CHECKEA -->
                                                    <div class='form-check'>
                                                        <input class='form-check-input' type='checkbox' name='checkHotel' id='checkHotel' disabled>
                                                        <label class='form-check-label' for='checkHotel'>
                                                        ¿Desea agregar hospedaje a la cotizacion?
                                                        </label>
                                                    </div>
                                                    <div class='row'>
                                                        <!--Hoteles-->
                                                        <div class='col-12'>
                                                            <label for='hotel' class='col-form-label lead font-weight-bold'>Hotel</label>
                                                            <select name='cotizarHotel' class='form-control' id='hotel' readonly>
                                                                <option>Sin Hotel Seleccionado</option>
                                                            </select>
                                                        </div>
                                                        <!--Tipo de Habitacion-->
                                                        <input type='hidden' name='noches' value='".$i->NOCHES."'>
                                                        <div class='col-12 text-center'>
                                                            <div  class='col-form-label lead font-weight-bold'>Tipo de habitacion:</div>
                                                            <div class='form-check form-check-inline pt-2'>
                                                                <label class='form-check-label lead' for='Sencilla'>Sin solicitud de Hospedaje</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Buen Viaje-->
                                            <div class='col-6'>
                                                <h2 class='display-3'>Buen Viaje!</h2>
                                            </div>                                                        
                                        </div>";
                                    }

                                    echo"

                                    <div class='row modal-footer d-flex justify-content-between text-light'>
                                        <div class='col-4'>
                                            <!-- <a rol='button' href='index.php' class='btn btn-secondary btn-lg btn-block font-weight-bold'><i class='fas fa-arrow-left'></i> Regresar</a> -->
                                        </div>
                                        <div class='col-4'>
                                            <button type='submit' class='btn btn-success btn-lg btn-block font-weight-bold rounded-pill'>COTIZAR <i class='fas fa-file-invoice-dollar ml-2'></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        ?>
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
