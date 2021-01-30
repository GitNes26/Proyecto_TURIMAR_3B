<!--Instancia turi-->
<?php
  session_start();
  error_reporting(0);
  $sesion = $_SESSION["usuario"];

  include 'scripts/database.php';
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
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!--MisEstilos-->
    <link rel="stylesheet" href="css/EstilosTurimar.css" />

    <!--Iconos-->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/208a113de3.js" crossorigin="anonymous"></script>

    <style></style>
    <title>TuriViajes - Inicio</title>
</head>

<body class="bg-secondary">

    <div class="container-fluid text-white">
        <input type="checkbox" id="check-sidebar" checked>

        <!--MENU-->
        <nav class="row navbar sticky-top navbar-expand-lg navbar-light menu">
            <button class="navbar-toggler text-dark d-block-inline" type="button" data-toggle="collapse"
                data-target="#navbarTogglerMenu" aria-controls="navbarTogglerMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span><img src="images/Logo_Turimar_rectangular.png"
                    alt="logo TURIMAR" width="75">
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerMenu">
                <a class="navbar-brand d-none d-sm-block" href="index.php">
                    <img src="images/Logo_Turimar_rectangular.png" alt="logo TURIMAR" title="Inicio" width="75"
                        class="d-none d-md-block">
                </a>
                <!--PESTAÑAS-->
                <ul class="nav nab-tabs navbar-nav mx-auto mt-lg-0 text-uppercase">

                    <li class="nav-item link">
                        <a class="nav-link mx-2 active font-weight-bold" href="index.php">INICIO <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item border-dark link">
                        <a class="nav-link mx-2" href="tours.php">TOURS</a>
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
                    echo "<a class='btn fas fa-sign-out-alt ml-md-5 close' href='scripts/cerrarSesion.php' title='Cerrar sesión'></a>";
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
                        <img src="images/diseño.png" alt="proximamente" height="350px">
                    </div>
                </div>
            </div>
        </div>

        
        <!--BTN INICIAR SESION-->
        <?php                
          if(!isset($sesion))
          { 
            echo"
            <div class='row mt-1 position-fixed posicion'>
              <div>
                <buttom class='d-flex justify-self-start btn btn-outline-light rounded-pill' data-toggle='modal' data-target='#BtnLogin'><i class='far fa-user fa-sm my-auto mr-2'></i> Iniciar Sesión</buttom>
              </div>
            </div>";
          }
        ?>

        <!--MODAL "BtnLogin" BTN "Iniciar Sesion"-->
        <div class="modal fade" id="BtnLogin" tabindex="-1" role="dialog" aria-labelledby="BtnLoginLabel"
            aria-hidden="true">
            <div class="modal-dialog ancho text-center">
                <div class="modal-content bg-login">
                    <div class="modal-header">
                        <h6 class="modal-title text-dark display-4 font-weight-bold titulo" id="BtnLoginLabel">Iniciar
                            Sesión</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body text-dark">
                        <form action="scripts/verificarLogin.php" method="post" class="lead font-weight-bold">
                            <img src="images/user-circle-solid.svg" alt="Usuario"
                                class="img-fluid mx-auto d-block img-login">
                            <div class="form-group">
                                <label for="user" class="col-form-label">Usuario:</label>
                                <input type="text" name="user" class="form-control" id="user"
                                    placeholder="usuario, correo o celular">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Contraseña:</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="***">
                            </div>
                            <div class="text-center">
                                <!-- <a href="" class="text-dark font-weight-bold lead olvide">olvide mi usuario y/o
                                    contraseña</a> <br> -->
                                <a href="Registro_User.php" class="text-dark font-weight-bold lead olvide">Crear una cuenta</a>
                            </div>

                            <div class="modal-footer mx-auto">
                                <button type="submit" class="btn btn-success">Entrar</button>
                            </div>
                        </form>
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
                  <img src='".$i->FOTO."' class='profile_image rounded-circle' alt=''>
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
            style="background-image: url(images/BGciudad.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">

            <div class=" w-75">
                <h1 class="display-2">Bienvenido!</h1>
                <p class="lead">Dile "Hola" al Mundo, ¡con TURIMAR es posible! busca el paquete que más te agrade y
                    empeiza esa aventura que has pospuesto durante un tiempo.</p>
                <hr class="my-4 bg-light">
                <?php                
                  if(!isset($sesion))
                  {
                    echo"
                    <a href='Registro_User.php' class='btn btn-light btn-lg d-flex justify-content-center'>Suscribirme</a>";
                  }
                ?>
            </div>
        </div>


        <!--CONTENIDO-->
        <div class="container text-light">
            <!--PROXIMAMENTE-->
            <div class="row d-flex justify-content-center">
                <h1 class="display-1 font-weight-bold">LO PROXIMO</h1>
            </div>

            <!--CARD #1-->
            <div class=" border-light border rounded-lg seccion my-4">
                <div class="row">
                    <div class="col-12 col-md-5 order-1 d-flex align-items-center">
                        <img src="images/Inicio-cruceros.jpg" alt="Imagen de un crucero" class="card-img">
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <div class="card-body">
                            <div class="card-title text-center text-uppercase">
                                <h2>CRUCEROS</h2>
                            </div>
                            <div class="card-text">
                                <p class="lead text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum
                                    tempore facilis distinctio vel quasi ducimus natus nisi eligendi consectetur
                                    laboriosam optio a, porro incidunt debitis doloribus beatae in excepturi, alias
                                    veritatis autem minima architecto expedita reiciendis! Repudiandae animi,
                                    voluptatum, necessitatibus corporis a alias magni quos dolorum perferendis saepe
                                    debitis placeat!</p>
                                <hr class="mx-5">
                                <!-- <div class="btn-group">
                                    <button class="btn btn-info">&plus; Información</button>
                                    <button class="btn btn-success">Reservar</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--CARD #2-->
            <div class=" border-light border rounded-lg seccion my-5">
                <div class="row">
                    <div class="col-12 offset-md-1 col-md-5 d-flex align-items-center">
                        <img src="images/Inicio-mazatlan.png" alt="Foto paisaje Mazatlán" class="card-img">
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <div class="card-body">
                            <div class="card-title text-center text-uppercase">
                                <h2>MAZATLÁN</h2>
                            </div>
                            <div class="card-text">
                                <p class="lead text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Tenetur officiis totam corrupti quis, placeat accusamus ab doloremque ea, cupiditate
                                    veniam fugit eligendi aut dolorum quam minima adipisci nobis dolore suscipit nulla
                                    vitae, assumenda asperiores architecto velit aliquid. Aliquam magnam error
                                    temporibus culpa, vero consequatur? Incidunt distinctio consequuntur ipsum sapiente
                                    deserunt?</p>
                                <hr class="mx-5">
                                <!-- <div class="btn-group">
                                    <button class="btn btn-info">&plus; Información</button>
                                    <button class="btn btn-success">Reservar</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--CARD #3-->
            <div class=" border-light border rounded-lg seccion my-4">
                <div class="row">
                    <div class="col-12 col-md-5 order-1 d-flex align-items-center">
                        <img src="images/Inicio-chiapas.jpg" alt="Imagen de un crucero" class="card-img">
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <div class="card-body">
                            <div class="card-title text-center text-uppercase">
                                <h2>CHIAPAS</h2>
                            </div>
                            <div class="card-text">
                                <p class="lead text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Adipisci tempora esse, dolorum cupiditate odio vitae. Tempore ex odit provident qui
                                    delectus distinctio possimus illo, nisi asperiores dicta voluptatum quod laudantium
                                    porro libero numquam obcaecati hic ipsam nesciunt praesentium sunt amet. Odit
                                    placeat quis cupiditate dolores vero suscipit harum iure repellendus?</p>
                                <hr class="mx-5">
                                <!-- <div class="btn-group">
                                    <button class="btn btn-info">&plus; Información</button>
                                    <button class="btn btn-success">Reservar</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-5">

            <!--PROPUESTAS-->
            <div class="container-fluid text-center">
            
                <div class="row d-flex justify-content-center">
                    <h1 class="display-3 font-weight-bold">PROPUESTAS</h1>
                </div>
                
                <!--4 CARDS-->
                <div class="row d-flex justify-content-between">

                    <!--CARD #4-->
                    <div class="col-12 col-md-5 border-light border rounded-lg seccion my-4">
                        <div class="col-12 mt-1">
                            <img src="images/inicio-cancun.jpg" alt="Paisaje Cancún" class="card-img">
                        </div>
                        <div class="col-12 text-center">
                            <div class="card-body">
                                <div class="card-title text-center text-uppercase">
                                    <h2>CANCÚN</h2>
                                </div>
                                <div class="card-text">
                                    <p class="lead text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Minus autem eum atque dolor temporibus possimus adipisci a ad ipsum deleniti!
                                    </p>
                                    <hr class="mx-5">
                                    <!-- <div class="btn-group">
                                        <button class="btn btn-info">&plus; Información</button>
                                        <button class="btn btn-success">Reservar</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--CARD #5-->
                    <div class="col-12 col-md-5 border-light border rounded-lg seccion my-4">
                        <div class="col-12 mt-1">
                            <img src="images/inicio-cuba.jpeg" alt="Paisaje Cancún" class="card-img">
                        </div>
                        <div class="col-12 text-center">
                            <div class="card-body">
                                <div class="card-title text-center text-uppercase">
                                    <h2>CUBA</h2>
                                </div>
                                <div class="card-text">
                                    <p class="lead text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                        Saepe, perferendis! Voluptate sapiente quod in? Numquam sit nostrum molestiae
                                        inventore aliquid?</p>
                                    <hr class="mx-5">
                                    <!-- <div class="btn-group">
                                        <button class="btn btn-info">&plus; Información</button>
                                        <button class="btn btn-success">Reservar</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--CARD #6-->
                    <div class="col-12 col-md-5 border-light border rounded-lg seccion my-4">
                        <div class="col-12 mt-1">
                            <img src="images/inicio-disney.jpg" alt="Paisaje Cancún" class="card-img">
                        </div>
                        <div class="col-12 text-center">
                            <div class="card-body">
                                <div class="card-title text-center text-uppercase">
                                    <h2>DISNEY WORLD</h2>
                                </div>
                                <div class="card-text">
                                    <p class="lead text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Necessitatibus voluptas cupiditate at atque rerum esse deleniti molestias iste
                                        harum quos.</p>
                                    <hr class="mx-5">
                                    <!-- <div class="btn-group">
                                        <button class="btn btn-info">&plus; Información</button>
                                        <button class="btn btn-success">Reservar</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--CARD #7-->
                    <div class="col-12 col-md-5 border-light border rounded-lg seccion my-4">
                        <div class="col-12 mt-1">
                            <img src="images/inicio-europa.jpg" alt="Paisaje Cancún" class="card-img">
                        </div>
                        <div class="col-12 text-center">
                            <div class="card-body">
                                <div class="card-title text-center text-uppercase">
                                    <h2>EUROPA</h2>
                                </div>
                                <div class="card-text">
                                    <p class="lead text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Minus autem eum atque dolor temporibus possimus adipisci a ad ipsum deleniti!
                                    </p>
                                    <hr class="mx-5">
                                    <!-- <div class="btn-group">
                                        <button class="btn btn-info">&plus; Información</button>
                                        <button class="btn btn-success">Reservar</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--SEPARADOR-->
                <hr class="mt-5 mb-5">

                <!--INFO VISA-->
                <!-- <div class="row p-3 offset-3 col-6 rounded-lg d-flex justify-content-center seccion3">
                    <div class="row w-100 h-100 shadow-lg">
                        <div class="col-6 bg-info h-50 d-flex justify-content-center align-items-center">
                            <p class="lead font-weight-bold">TRÁMITE DE VISA EEUU. CANADA</p>
                        </div>
                        <div class="col-6 bg-light h-50 d-flex align-items-center">
                            <img src="images/document.png" height="40%">
                        </div>
                        <div class="col-6 bg-light h-50 d-flex align-items-center">
                            <img src="images/data_candado.png" height="40%">
                        </div>
                        <div class="col-6 bg-info h-50 d-flex align-items-center">
                            <img src="images/direccion.png" height="40%">
                        </div>
                    </div>
                </div> -->

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
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>