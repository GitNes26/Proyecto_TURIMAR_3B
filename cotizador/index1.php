<!--Instancia turi-->
<?php
    session_start();
    error_reporting(0);
    $sesion = $_SESSION["usuario"];
    
  include '../scripts/database.php';
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
                <a class="navbar-brand d-none d-sm-block" href="../index.php">
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
                        <form action="../scripts/verificarLogin.php" method="post" class="lead font-weight-bold">
                            <img src="../images/user-circle-solid.svg" alt="Usuario"
                                class="img-fluid mx-auto d-block img-login">
                            <div class="form-group">
                                <label for="user" class="col-form-label">Usuario:</label>
                                <input type="text" name="user" class="form-control" id="user"
                                    placeholder="usuario">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Contraseña:</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="***">
                            </div>
                            <div class="text-center">
                                <!-- <a href="" class="text-dark font-weight-bold lead olvide">olvide mi usuario y/o
                                    contraseña</a> <br> -->
                                <a href="../Registro_User.php" class="text-dark font-weight-bold lead olvide">Crear una cuenta</a>
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
                    <img src='../".$i->FOTO."' class='profile_image rounded-circle' alt=''>
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
                <div class='btn btn-success position-fixed rounded-pill posicionWhats d-flex justify-content-start posicion'><img src='../images/whatsapp.png' class='icoredes'>&nbsp; WhatsApp</div>
                <a href='https://www.facebook.com/turimar1.mx' target='_blank' class='btn btn-primary position-fixed rounded-pill posicionFb d-flex justify-content-start posicion'><img src='../images/facebook.png' class='icoredes'> &nbsp; Facebook</a>
                <a href='https://www.instagram.com/turimartrave/' target='_blank' class='btn btn-light position-fixed rounded-pill posicionIns d-flex justify-content-start posicion'><img src='../images/instagram.png' class='icoredes'> &nbsp; Instagram</a>
                <a href='https://www.youtube.com/channel/UC1ra5LppwV8ARMakNGyLxig/featured' target='_blank' class='btn btn-danger position-fixed rounded-pill posicionYt d-flex justify-content-start posicion'><img src='../images/youtube.png' class='icoredes'> &nbsp; Youtube</a>
                <a href='https://twitter.com/turimaroficial' target='_blank' class='btn btn-info position-fixed rounded-pill posicionTwit d-flex justify-content-start posicion'><img src='../images/twitter.png' class='icoredes'> &nbsp; Twitter</a>
                </div>
                <!-- CHAT PARA LO SQUE NO ESTAN REGISTRADOS
                <div class='btn btn-light position-fixed posicionChat d-flex justify-content-start posicion'><img src='../images/chat-square-text.svg' class='icoredes'>&nbsp;Chat</div> -->
                
                <!--REDES SOCIALES-->";
            }
        ?>


        <!-- ----------------------------------------------------------------------------------------------- -->


        <?php
            $SQL="Call CotizarTour($IDtour)";
            $RESULTADO=$turi->seleccionar($SQL); foreach($RESULTADO as $i)

            $PAIS="SELECT * FROM PAISES WHERE PAIS='Mexico'  ORDER BY PAIS";
            $RESULTADOp=$turi->seleccionar($PAIS);

            $ESTADOS="SELECT * FROM ESTADOS WHERE PAIS=$cotizarPais ORDER BY ESTADO";
            $RESULTADOe=$turi->seleccionar($ESTADOS);

            
            echo"
                <!--MODAL 'BtnCotizarID' BTN 'Cotizar Viaje'-->
                <div class='' id='BtnCotizar".$i->ID."' tabindex='-1' role='dialog' data-backdrop='static' aria-labelledby='BtnCotizar".$i->ID."Label' aria-hidden='false'>
                    <div class='modal-dialog modal-lg'>
                        <div class='modal-content bg-light'>
                            <div class='modal-header bg-success text-light'>
                                <h5 class='modal-title display-4' id='BtnCotizar".$i->ID."Label'>COTIZAR VIAJE <i class='fas fa-calculator fa-sm my-auto ml-4'></i></h5>
                            </div>

                            <div class='modal-body text-dark'>
                                <form action='index2.php' method='POST'>    
                                    <!--Mostrar destino-->
                                    <div class='row'><div class='col-6'><h5>DESTINO: ".$i->TOUR."</h5></div>
                                    <!--Mostrar nombre de usuario-->";
                                    if(isset($sesion))
                                    {
                                        echo "<div class='col-6'>
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
                                                <select name='cotizarPais1' class='form-control' id='selectPais' readonly>";
                                                    foreach ($RESULTADOp as $p)
                                                    {
                                                        echo "<option value='".$p->ID."'>".$p->PAIS."</option>";
                                                    } echo"
                                                </select>
                                            </div>
                                            <!--Estado-->
                                            <div class='col-md-4'>
                                                <label for='origen' class='col-form-label lead font-weight-bold'>-</label>
                                                <select name='cotizarEstado1' class='form-control' id='selectEstado'>
                                                    <option >Estado</option>";
                                                    foreach ($RESULTADOe as $e)
                                                    {
                                                        echo "<option value='".$e->ID."'>".$e->ESTADO."</option>";
                                                    } echo"
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='row modal-footer d-flex justify-content-between text-light'>
                                        <div class='col-4'>
                                           <!-- <a rol='button' href='index.php' class='btn btn-secondary btn-lg btn-block font-weight-bold'><i class='fas fa-arrow-left'></i> Regresar</a> -->
                                        </div>
                                        <div class='col-4'>
                                            <button type='submit' class='btn btn-success btn-lg btn-block font-weight-bold'>Siguiente <i class='fas fa-arrow-right'></i></button>
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
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
