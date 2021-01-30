<!--Instancia turi-->
<?php
  session_start();
  error_reporting(0);
  $sesion = $_SESSION["usuario"];
  $sesionROL = $_SESSION["roluser"];

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

    <style>
        .fav{z-index: 10; top:-5px; right:-10px}
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
                <span class="navbar-toggler-icon"></span><img src="../images/Logo_Turimar_rectangular.png"
                    alt="logo TURIMAR" width="75">
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerMenu">
                <a class="navbar-brand d-none d-sm-block" href="index.php">
                    <img src="../images/Logo_Turimar_rectangular.png" alt="logo TURIMAR" title="Inicio" width="75"
                        class="d-none d-md-block">
                </a>
                <!--PESTAÑAS-->
                <ul class="nav nab-tabs navbar-nav mx-auto mt-lg-0 text-uppercase">

                    <li class="nav-item link">
                        <a class="nav-link mx-2" href="index.php">INICIO <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item border-dark link">
                        <a class="nav-link mx-2 active font-weight-bold" href="tours.php">TOURS</a>
                    </li>
                    <li class="nav-item border-dark link">
                        <a class="nav-link mx-2" href="formasDePago.php">FORMAS DE PAGO</a>
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
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>TRABAJADORES</a>
                        <div class='dropdown-menu text-capitalize' aria-labelledby='navbarDropdown'>
                        <?php switch($sesionROL){
                                case 1: echo"
                                    <a class='dropdown-item' href='Formularios/VerUsuarios.php'>Usuarios</a>
                                    <a class='dropdown-item' href='ToursRegistrados.php'>Tours</a>";
                                break;
                                case 2: echo"
                                    <a class='dropdown-item' href='FormTours.php'>Tours</a>
                                    <a class='dropdown-item' href='FormDestinos.php'>Destinos</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='FormAerolineas.php'>Aerolineas</a>
                                    <a class='dropdown-item' href='FormAeropuertos.php'>Aeropuertos</a>
                                    <a class='dropdown-item' href='FormTarifaVuelo.php'>Tarifas Vuelo</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='FormHospedaje.php'>Hoteles</a>
                                    <a class='dropdown-item' href='FormTarifaHoteles.php'>Tarifa Hotel</a>
                                    <div class='dropdown-divider'></div>";
                                break;
                                case 3: echo"
                                    <a class='dropdown-item' href='Formularios/VerUsuarios.php'>Usuarios</a>
                                    <a class='dropdown-item' href='FormTours.php'>Tours</a>
                                    <a class='dropdown-item' href='FormDestinos.php'>Destinos</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='FormAerolineas.php'>Aerolineas</a>
                                    <a class='dropdown-item' href='FormAeropuertos.php'>Aeropuertos</a>
                                    <a class='dropdown-item' href='FormTarifaVuelo.php'>Tarifas Vuelo</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='FormHospedaje.php'>Hoteles</a>
                                    <a class='dropdown-item' href='FormTarifaHoteles.php'>Tarifa Hotel</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='Formularios/FormAltaTrabajador.php'>Registrar Trabajador</a>";
                                break;
                            } ?>
                        </div>
                    </li>

                </ul>

                <!--Btn Busqueda-->
                <form class="form-inline my-2 my-lg-0">
                    <a type="button" class="btn btn-outline-dark" href="buscador.php"
                        title="Busqueda"><i class="fas fa-search fa-lg my-auto mr-2"></i>
                    </a>
                </form>

                <!--BTN cerrar sesion-->
                <?php            
                  if(isset($sesion))
                  {
                    echo "<a href='miPerfil.php' class='h5 text-muted font-weight-bold ml-2'>".$sesion."</a>";
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
                  <img src='../".$i->FOTO."' class='profile_image rounded-circle' alt=''>
                  <h4>".$i->USUARIO."</h4>
              </div>
              <a href='miPerfil.php'><i class='icon far fa-user fa-sm' class='tooltip-test' title='Perfil'>
                </i><span>Perfil</span>
              </a>
              <!-- <a href='miPerfil.php'><i class='icon far fa-bell' class='tooltip-test' title='Notificaciones'>
                </i><span>Notificaciones</span>
              </a> -->
              <a href='miPerfil.php'><i class='icon fas fa-file-invoice-dollar' class='tooltip-test' title='Cotizaciones'>
                </i><span>Cotizaciones</span>
              </a>
              <a href='miPerfil.php'><i class='icon fas fa-heart' class='tooltip-test' title='Favoritos'>
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
              <div class='btn btn-success position-fixed rounded-pill posicionWhats d-flex justify-content-start posicion'><img src='images/whatsapp.png' class='icoredes'>&nbsp; WhatsApp</div>
              <a href='https://www.facebook.com/turimar1.mx' target='_blank' class='btn btn-primary position-fixed rounded-pill posicionFb d-flex justify-content-start posicion'><img src='images/facebook.png' class='icoredes'> &nbsp; Facebook</a>
              <a href='https://www.instagram.com/turimartrave/' target='_blank' class='btn btn-light position-fixed rounded-pill posicionIns d-flex justify-content-start posicion'><img src='images/instagram.png' class='icoredes'> &nbsp; Instagram</a>
              <a href='https://www.youtube.com/channel/UC1ra5LppwV8ARMakNGyLxig/featured' target='_blank' class='btn btn-danger position-fixed rounded-pill posicionYt d-flex justify-content-start posicion'><img src='images/youtube.png' class='icoredes'> &nbsp; Youtube</a>
              <a href='https://twitter.com/turimaroficial' target='_blank' class='btn btn-info position-fixed rounded-pill posicionTwit d-flex justify-content-start posicion'><img src='images/twitter.png' class='icoredes'> &nbsp; Twitter</a>
            </div>
            <!-- CHAT PARA LO SQUE NO ESTAN REGISTRADOS
            <div class='btn btn-light position-fixed posicionChat d-flex justify-content-start posicion'><img src='images/chat-square-text.svg' class='icoredes'>&nbsp;Chat</div> -->
              
            <!--REDES SOCIALES-->";
          }
        ?>


        <!-- ------------------------------------------------------------------------------- -->

        <!--JUMBOTRON-->
        <div class="row jumbotron jumbotron-fluid d-flex justify-content-center"
            style="background-image: url(../images/BGtours.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div class=" w-75 text-dark">
                <h1 class="display-2">Gran viaje</h1>
                <p class="lead font-weight-bold">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero corporis modi perferendis
                    laudantium rem mollitia atque quae voluptatem voluptates repellat!</p>
                <hr class="my-4 bg-light">
            </div>

        </div>

        <!--CONTENIDO-->
        <div class="container text-light">
            <div class="row d-flex justify-content-center border-top border-bottom my-3">
                <h1 class="display-1 font-weight-bold ">PA'KETE VAYAS</h1><br>
                <small class="lead">a Disfruta a México</small>
            </div>

            <div class="row">
                <?php              
                    // $SQL="SELECT tours.ID, tours.TOUR, paises.PAIS, estados.ESTADO, ciudades.CIUDAD, aeropuerto_aerolinea.HORARIO, tours.DESCRIPCION, tours.DURACION, tours.CAPACIDAD, tours.PRECIO, tours.FOTO, tour_incluye.INCLUYE, tour_incluye.SERVICIOS_OPCIONALES, tour_no_incluye.NO_INCLUYE, notas.NOTAS, aerolineas.AEROLINEA, hoteles.HOTEL, hoteles.CATEGORIA FROM tours INNER JOIN tour_incluye on tour_incluye.TOUR=tours.ID INNER JOIN tour_no_incluye on tour_no_incluye.TOUR=tours.ID INNER JOIN notas on notas.TOUR=tours.ID INNER JOIN hotel_tour on hotel_tour.TOUR=tours.ID INNER JOIN hoteles on hotel_tour.HOTEL=hoteles.ID INNER JOIN aerolinea_tour on aerolinea_tour.TOUR=tours.ID INNER JOIN aerolineas on aerolinea_tour.AEROLINEA=aerolineas.ID INNER JOIN aeropuerto_aerolinea on aeropuerto_aerolinea.AEROLINEA=aerolineas.ID INNER JOIN ciudades on hoteles.CIUDAD=ciudades.ID INNER JOIN estados on ciudades.ESTADO=estados.ID INNER JOIN paises on estados.PAIS=paises.ID GROUP BY tours.TOUR";
                    
                    $SQL="SELECT tours.ID, tours.TOUR, tours.DESCRIPCION, tours.DURACION, tours.CAPACIDAD, tours.PRECIO, tours.FOTO, tour_incluye.INCLUYE, tour_incluye.SERVICIOS_OPCIONALES, tour_no_incluye.NO_INCLUYE, notas.NOTAS FROM tours INNER JOIN tour_incluye on tour_incluye.TOUR=tours.ID INNER JOIN tour_no_incluye on tour_no_incluye.TOUR=tours.ID INNER JOIN notas on notas.TOUR=tours.ID";

                    $PAIS="SELECT * FROM PAISES WHERE PAIS='Mexico' ORDER BY PAIS";
                    $RESULTADOp=$turi->seleccionar($PAIS);

                    $AEROLINEAS="SELECT aerolineas.AEROLINEA FROM TOURS INNER JOIN AEROLINEA_TOUR on aerolinea_tour.TOUR=tours.ID INNER JOIN AEROLINEAS on aerolineas.ID=aerolinea_tour.AEROLINEA GROUP BY aerolinea_tour.TOUR";
                    $RESULTADOa=$turi->seleccionar($AEROLINEAS);

                    $HOTELES="SELECT hoteles.HOTEL, hoteles.CATEGORIA FROM HOTELES INNER JOIN HOTEL_TOUR ON hotel_tour.HOTEL=hoteles.ID INNER JOIN tours ON hotel_tour.TOUR=tours.ID GROUP BY tours.TOUR ORDER BY hoteles.CATEGORIA";
                    $RESULTADOh=$turi->seleccionar($HOTELES);

                    //$SQL="SELECT * FROM (SELECT tours.ID as TourID, tours.TOUR, tours.DESCRIPCION, tours.DURACION, tours.CAPACIDAD, tours.PRECIO, tours.FOTO, tour_incluye.INCLUYE, tour_incluye.SERVICIOS_OPCIONALES, tour_no_incluye.NO_INCLUYE, notas.NOTAS, aerolineas.AEROLINEA,hoteles.HOTEL FROM tours INNER JOIN tour_incluye on tour_incluye.TOUR=tours.ID INNER JOIN tour_no_incluye on tour_no_incluye.TOUR=tours.ID INNER JOIN notas on notas.TOUR=tours.ID INNER JOIN aerolinea_tour on aerolinea_tour.TOUR=tours.ID INNER JOIN aerolineas on aerolineas.ID=aerolinea_tour.AEROLINEA INNER JOIN hotel_tour on hotel_tour.TOUR=tours.ID INNER JOIN hoteles on hoteles.ID=hotel_tour.HOTEL) as Info where Info.TourID=1";
                    $RESULTADO=$turi->seleccionar($SQL);
                    foreach ($RESULTADO as $i)
                    {echo "
                        <!--CardsViajes-->
                        <div class=' col-12 col-md-4 my-2'>
                            <div class='container2 position-relative d-flex'>
                                <div class='card-movile position-relative'>
                                    <div class='face face1 rounded-top position-relative d-flex justify-content-center align-items-center'>
                                    <form action='scripts/RegistroFavs.php' method='POST'><button class='btn btn-outline-danger position-absolute fav' data-toggle='tooltip' data-placement='top' title='Agregar a Favoritos' name='btnFav' value='".$i->ID."'><i class='fas fa-heart'></i></button></form>
                                        <div class='content text-center'>
                                            <a data-toggle='modal' data-target='#ModalTour".$i->ID."' style='cursor:pointer'><img src='../".$i->FOTO."' alt='Paisaje de' class='card-img'></a>
                                            <!-- <h5>".$i->TOUR."</h5> -->
                                        </div>
                                    </div>
                                    <div class='face face2 position-relative p-3'>
                                        <div class='content flex-column text-center'>
                                            <table class='table table-hover'>
                                                <thead>
                                                    <tr>
                                                        <th scope='col'>Duración</th>
                                                        <th scope='col'>Cupo</th>
                                                        <th scope='col'>Precio</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td scope='row'>".$i->DURACION."</td>
                                                        <td>".$i->CAPACIDAD."</td>
                                                        <td>$".$i->PRECIO."</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr class='w-75'>
                                            <div class='btn-group btn-block mt-2'>
                                                <button class='btn btn-info' data-toggle='modal' data-target='#ModalTour".$i->ID."'>&plus; Información</button>                  
                                                <!--<button type='button' class='btn btn-outline-success' data-toggle='modal' data-target='#BtnCotizar".$i->ID."'><i class='far fa-money-bill-alt fa-lg my-auto mr-1'></i><span class='font-weight-bold'>COTIZAR VIAJE</span>
                                                </button>-->";
                                                if(isset($sesion)){ echo"
                                                <form action='cotizador/index.php' method='POST'><button class='btn btn-outline-success' name='IDtour' value='".$i->ID."'><i class='far fa-money-bill-alt fa-lg my-auto mr-1'></i><span class='font-weight-bold'>COTIZAR VIAJE</span>
                                                </button></form>";}
                                                else{ echo"
                                                    <button class='btn btn-outline-success' data-toggle='modal' data-target='#BtnLogin'><i class='far fa-money-bill-alt fa-lg my-auto mr-1'></i><span class='font-weight-bold'>COTIZAR VIAJE</span>
                                                    </button>";
                                                } echo"
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal Detalles Cards -->
                        <div class='modal fade' id='ModalTour".$i->ID."' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='ModalTour".$i->ID."Label' aria-hidden='true'>
                            <div class='modal-dialog modal-xl modal-dialog-centered '>
                                <div class='modal-content text-dark'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title text-uppercase font-weight-bold' id='ModalTour".$i->ID."Label'>".$i->TOUR."</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>                                            
                                        <div class='container-fluid'>
                                            <div class='row'>
                                                <div class='col-6 row'>
                                                    <div class='col-4 text-right'>
                                                        <div class='nav flex-column nav-pills' id='v-pills-tab".$i->ID."' role='tablist' aria-orientation='vertical'>
                                                            <a class='nav-link active' id='v-pills-ruta-tab".$i->ID."' data-toggle='pill' href='#v-pills-ruta".$i->ID."' role='tab' aria-controls='v-pills-ruta".$i->ID."' aria-selected='true'>Ruta <i class='fas fa-route ml-2'></i></a>
                                                            <a class='nav-link' id='v-pills-duracion-tab".$i->ID."' data-toggle='pill' href='#v-pills-duracion".$i->ID."' role='tab' aria-controls='v-pills-duracion".$i->ID."' aria-selected='false'>Duracion <i class='fas fa-user-clock ml-2'></i></a>
                                                            <a class='nav-link' id='v-pills-capacidad-tab".$i->ID."' data-toggle='pill' href='#v-pills-capacidad".$i->ID."' role='tab' aria-controls='v-pills-capacidad".$i->ID."' aria-selected='false'>Capacidad <i class='fas fa-user-friends ml-2'></i></a>
                                                            <a class='nav-link' id='v-pills-precio-tab".$i->ID."' data-toggle='pill' href='#v-precio".$i->ID."' role='tab' aria-controls='v-precio".$i->ID."' aria-selected='false'>Precio <i class='fas fa-dollar-sign ml-2'></i></a>
                                                            <a class='nav-link' id='v-pills-incluye-tab".$i->ID."' data-toggle='pill' href='#v-incluye".$i->ID."' role='tab' aria-controls='v-incluye".$i->ID."' aria-selected='false'>Incluye <i class='fas fa-wine-glass-alt ml-2'></i></a>
                                                            <a class='nav-link' id='v-pills-noincluye-tab".$i->ID."' data-toggle='pill' href='#v-noincluye".$i->ID."' role='tab' aria-controls='v-noincluye".$i->ID."' aria-selected='false'>No incluye <i class='fas fa-ban ml-2'></i></a>
                                                            <a class='nav-link' id='v-pills-notas-tab".$i->ID."' data-toggle='pill' href='#v-notas".$i->ID."' role='tab' aria-controls='v-notas".$i->ID."' aria-selected='false'>Notas <i class='fas fa-book-reader ml-2'></i></a>
                                                            <!-- <a class='nav-link' id='v-pills-aereolinea-tab".$i->ID."' data-toggle='pill' href='#v-aereolinea".$i->ID."' role='tab' aria-controls='v-aereolinea".$i->ID."' aria-selected='false'>Areolinea <i class='fas fa-plane ml-2'></i></a>
                                                            <a class='nav-link' id='v-pills-hotel-tab".$i->ID."' data-toggle='pill' href='#v-hotel".$i->ID."' role='tab' aria-controls='v-hotel".$i->ID."' aria-selected='false'>Hotel <i class='fas fa-hotel ml-2'></i></a> -->
                                                        </div>
                                                    </div>
                                                    <div class='col-8'>
                                                        <div class='tab-content' id='v-pills-tabContent'>
                                                            <div class='tab-pane fade show active font-weight-bold' id='v-pills-ruta".$i->ID."' role='tabpanel' aria-labelledby='v-pills-ruta".$i->ID."-tab'>".$i->DESCRIPCION."</div>
                                                            <div class='tab-pane fade font-weight-bold' id='v-pills-duracion".$i->ID."' role='tabpanel' aria-labelledby='v-pills-duracion".$i->ID."-tab'>".$i->DURACION."</div>
                                                            <div class='tab-pane fade font-weight-bold' id='v-pills-capacidad".$i->ID."' role='tabpanel' aria-labelledby='v-pills-capacidad".$i->ID."-tab'>".$i->CAPACIDAD." Personas</div>
                                                            <div class='tab-pane fade font-weight-bold' id='v-precio".$i->ID."' role='tabpanel' aria-labelledby='v-precio".$i->ID."-tab'>Desde $".$i->PRECIO."</div>
                                                            <div class='tab-pane fade font-weight-bold' id='v-incluye".$i->ID."' role='tabpanel' aria-labelledby='v-incluye".$i->ID."-tab'>".$i->INCLUYE."</div>
                                                            <div class='tab-pane fade font-weight-bold' id='v-noincluye".$i->ID."' role='tabpanel' aria-labelledby='v-noincluye".$i->ID."-tab'>".$i->NO_INCLUYE."</div>
                                                            <div class='tab-pane fade font-weight-bold' id='v-notas".$i->ID."' role='tabpanel' aria-labelledby='v-notas".$i->ID."-tab'>".$i->NOTAS."</div>
                                                            <!-- <div class='tab-pane fade font-weight-bold' id='v-aereolinea".$i->ID."' role='tabpanel' aria-labelledby='v-aereolinea".$i->ID."-tab'>";
                                                                foreach ($RESULTADOa as $a) 
                                                                    {echo "- ".$a->AEROLINEA."<br>";}
                                                                echo"
                                                            </div>
                                                            <div class='tab-pane fade font-weight-bold' id='v-hotel".$i->ID."' role='tabpanel' aria-labelledby='v-hotel".$i->ID."-tab'>";
                                                                foreach ($RESULTADOh as $h) 
                                                                    {echo "- ".$h->CATEGORIA." → ".$h->HOTEL."<br>";}
                                                                echo"
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-6 row'>
                                                    <img src='../".$i->FOTO."' class='img-fluid' alt='Foto del tour'>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>    
                                    <div class='modal-footer'>
                                        <form action='cotizador/index.php' method='POST'><button class='btn btn-outline-success' name='IDtour' value='".$i->ID."'><i class='far fa-money-bill-alt fa-lg my-auto mr-1'></i><span class='font-weight-bold'>COTIZAR VIAJE</span>
                                        </button></form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--MODAL 'BtnCotizarID' BTN 'Cotizar Viaje'-->
                        <div class='modal fade' id='BtnCotizar".$i->ID."' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='BtnCotizar".$i->ID."Label' aria-hidden='true'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content bg-light'>
                                    <div class='modal-header bg-success text-light'>
                                        <h5 class='modal-title display-4' id='BtnCotizar".$i->ID."Label'>COTIZAR VIAJE <i class='fas fa-calculator fa-sm my-auto ml-4'></i></h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'><i class='fas fa-times-circle fa-lg'></i></span>
                                        </button>
                                    </div>

                                    <div class='modal-body text-dark'>
                                        <!--Mostrar destino-->
                                        <h5>DESTINO: ".$i->TOUR."</h5>
                                        <!--Mostrar nombre de usuario-->";
                                        if(isset($sesion))
                                        {
                                            echo "
                                                <h4 class='text-muted font-weight-bold' align='right'>Usuario: ".$sesion."</h4>";
                                        } echo "
                                        <form action='' method=''>
                                            <!--Origen-->
                                            <div class='form-group mt-3'>
                                                <div class='row'>       
                                                    <!--Pais-->              
                                                    <div class='col-4'>                      
                                                        <label for='origen' class='col-form-label lead font-weight-bold'>Origen</label>
                                                        <select name='cotizarPais' class='form-control' id=''>
                                                            <option>Pais</option>";
                                                            foreach ($RESULTADO as $p)
                                                            {
                                                                echo "<option value='".$p->ID."'>".$p->PAIS."</option>";
                                                            } echo"
                                                        </select>
                                                    </div>
                                                    <!--Estado-->
                                                    <div class='col-4'>
                                                        <label for='origen' class='col-form-label lead font-weight-bold'>-</label>
                                                        <select name='cotizarEstado' class='form-control' id=''>
                                                            <option >Estado</option>";
                                                            foreach ($RESULTADO as $e)
                                                            {
                                                                echo "<option value='".$e->ID."'>".$e->ESTADO."</option>";
                                                            } echo"
                                                        </select>
                                                    </div>
                                                    <!--Ciudad-->
                                                    <div class='col-4'>
                                                        <label for='origen' class='col-form-label lead font-weight-bold'>-</label>
                                                        <select name='cotizarCiudad' class='form-control' id=''>
                                                            <option>Ciudad</option>";
                                                            foreach ($RESULTADO as $c)
                                                            {
                                                                echo "<option value='".$c->ID."'>".$c->CIUDAD."</option>";
                                                            } echo"
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Fecha y duración-->
                                            <div class='form-group'>
                                                <div class='row'>
                                                    <!--Fecha de salida-->
                                                    <div class='col-6'>
                                                        <label for='fecha' class='col-form-label lead font-weight-bold'>Fecha de salida</label>
                                                        <select name='cotizarFechaSalida' class='form-control' id=''>
                                                            <option>-- / -- / --</option>";
                                                            foreach ($RESULTADO as $i)
                                                            {
                                                                echo "<option value='".$i->HORAIO."'>".$i->HORARIO."</option>";
                                                            } echo"
                                                        </select>
                                                    </div>
                                                    <!--Duración-->
                                                    <div class='col-6'>
                                                        <label for='duración' class='col-form-label lead font-weight-bold'>Duracion del tour:</label>
                                                        <input type='text' name='cotizarDuracion' class='form-control' id='duaración' value='".$i->DURACION."' disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Personas-->
                                            <div class='form-group border rounded p-2'>
                                                <div class='row'>
                                                    <!--Cantidad Adultos-->
                                                    <div class='col-3'>
                                                        <label for='adultos' class='col-form-label lead font-weight-bold'>Adultos</label>
                                                        <input type='number' name='cotizarAdultos' min='0' max='20' class='form-control' id='adultos'>
                                                    </div>
                                                    <!--Cantidad Menores-->
                                                    <div class='col-3'>
                                                        <label for='duración' class='col-form-label lead font-weight-bold'>Menores</label>
                                                        <input type='number' name='cotizarMenores' min='0' max='20' class='form-control' id='duaración'>
                                                    </div>
                                                    <div class='col'>
                                                        <h6 class='text-muted pt-3'>Los menores de edad, son desde los 0 años hasta los 12 años.</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Vuelo-->
                                            <div class='form-group border rounded p-2'>
                                                <!--CHECK para solicitar vuelo en cotizacion--> <!-- CONDICIONAR SI LO CHECKEA -->
                                                <div class='form-check'>
                                                    <input class='form-check-input' type='checkbox' id='checkAerolinea'>
                                                    <label for='checkAerolinea' class='form-check-label'>
                                                    ¿Desea agregar vuelo a la cotizacion?
                                                    </label>
                                                </div>
                                                <div class='row'>
                                                    <!--Aerolineas-->
                                                    <div class='col-6'>
                                                        <label for='aerolinea' class='col-form-label lead font-weight-bold'>Aerolinea</label>
                                                        <select name='cotizarAerolinea' class='form-control' id='aerolinea'>
                                                            <option>Aerolineas disponibles</option>";
                                                            foreach ($RESULTADO as $a)
                                                            {
                                                                echo "<option value='".$a->ID."'>".$a->AEROLINEA."</option>";
                                                            }echo"
                                                        </select>
                                                    </div>
                                                    <!--Tipo de Boleto-->
                                                    <div class='col text-center'>
                                                        <div  class='col-form-label lead font-weight-bold'>Tipo de boleto:</div>
                                                        <div class='form-check form-check-inline pt-2'>
                                                            <input class='form-check-input' type='radio' name='cotizarTipoVuelo' id='tipoRedondo' value='REDONDO'>
                                                            <label class='form-check-label lead' for='tipoRedondo'>Redondo</label>
                                                        </div>
                                                        <div class='form-check form-check-inline pt-2'>
                                                            <input class='form-check-input ml-2' type='radio' name='cotizarTipoVuelo' id='tipoAbierto' value='ABIERTO'>
                                                            <label class='form-check-label lead' for='tipoAbierto'>Abiero</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Hospedaje y Foto-->
                                            <div class='row'>
                                                <!--Hospedaje-->
                                                <div class='col-6'>
                                                    <div class='form-group border rounded p-2'>
                                                        <!--CHECK para solicitar hotel en cotizacion--> <!-- CONDICIONAR SI LO CHECKEA -->
                                                        <div class='form-check'>
                                                            <input class='form-check-input' type='checkbox' id='checkHotel'>
                                                            <label class='form-check-label' for='checkHotel'>
                                                            ¿Desea agregar hospedaje a la cotizacion?
                                                            </label>
                                                        </div>
                                                        <div class='row'>
                                                            <!--Hoteles-->
                                                            <div class='col'>
                                                                <label for='hotel' class='col-form-label lead font-weight-bold'>Hotel</label>
                                                                <select name='cotizarHotel' class='form-control' id='hotel'>
                                                                    <option>Hoteles disponibles</option>";
                                                                    foreach ($RESULTADO as $h)
                                                                    {
                                                                        echo "<option value='".$h->ID."'>".$h->CATEGORIA." → ".$a->HOTEL." </option>";
                                                                    }echo"
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Foto-->
                                                <div class='col-6'>
                                                    <h2 class='display-3'>Buen Viaje!</h2>
                                                </div>                                                        
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='submit' class='btn btn-success btn-lg btn-block font-weight-bold'>COTIZAR</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                ?>
            </div>

        </div>

        <!-- ------------------------------------------------------------------------------- -->

        <!--FOOTER-->
        <div class="row bg-dark footer">

            <div class="container">
                <h1 class="display-1 mb-2">VISITANOS</h1>
            </div>

            <!--REDES SOCIALES-->
            <div class="container-fluid row d-flex justify-content-between mb-5">

                <div class="col-2 p-0 text-center areaIconFooter">
                    <a href=""><i class="fab fa-whatsapp icofooter"></i></a>
                </div>
                <div class="col-2 p-0 text-center areaIconFooter">
                    <a href="https://www.facebook.com/turimar1.mx" target="_blank"><i
                            class="fab fa-facebook icofooter"></i></a>
                </div>
                <div class="col-2 p-0 text-center areaIconFooter">
                    <a href="https://www.instagram.com/turimartrave/" target="_blank"><i
                            class="fab fa-instagram icofooter"></i></a>
                </div>
                <div class="col-2 p-0 text-center areaIconFooter">
                    <a href="https://www.youtube.com/channel/UC1ra5LppwV8ARMakNGyLxig/featured" target="_blank"><i
                            class="fab fa-youtube icofooter"></i></a>
                </div>
                <div class="col-2 p-0 text-center areaIconFooter">
                    <a href="https://twitter.com/turimaroficial" target="_blank"><i
                            class="fab fa-twitter icofooter"></i></a>
                </div>

            </div>

            <hr class="bg-dark w-75 my-5">

            <!--DATOS DE LA EMPRESA-->
            <div class="container-fluid row d-flex justify-content-between mt-5 mx-1">
                <div class="">
                    <h4>AGENCIA DE VIAJES <b>TURIMAR</b>
                        <p class="lead">página de prueba con derechos reservados &copy; 2020</p>
                        <div class="embed-responsive border ubicacion">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224.99849536008526!2d-103.45274157130103!3d25.53917881906412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fd961ed158559%3A0x608571e17a23e6cf!2sAgencia%20de%20Viajes%20Turimar!5e0!3m2!1ses-419!2smx!4v1594178564278!5m2!1ses-419!2smx"
                                width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0">
                            </iframe>
                        </div>
                </div>
                <div class="">
                    <h4 class="font-weight-bold">Contactos:</h4>
                    <p class="font-weight-light"><b>TEL:</b> 871-716-8280</p>
                    <p class="font-weight-light"><b>EMAIL:</b> <a
                            href="mailto:turimar-castro@hotmail.com">turimar-castro@hotmail.com</a></p>
                    <p class="font-weight-light"><b>FAX:</b> 871-111-0234</p>
                </div>
                <div class="">
                    <h4 class="font-weight-bold">Dirección:</h4>
                    <address class="font-weight-light">Galeana #211 sur (primer piso)<br>
                        Col. Centro<br>
                        C.P. 27000<br>
                        Torreón Coahuila, México</address>
                    </p>
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