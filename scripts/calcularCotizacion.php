<?php
    session_start();
    error_reporting(0);
    $sesion = $_SESSION["usuario"];
    $sesionID = $_SESSION["usuario2"];
    include 'database.php';
    $turi= new Database();
    $turi->conectarBD();

    extract($_GET);

    $Tour=$_GET['IDtour'];
    $Pinicial=$_GET['precioTour']; #4,000
    $Pais=$_GET['cotizarPais']; $Edo=$_GET['cotizarEstado']; $Cd=$_GET['cotizarCiudad'];
    $FechaTour=$_GET['cotizarFechaTour'];
    $Men=$_GET['cotizarMenores']; #2
    $Ad=$_GET['cotizarAdultos']; #2
    $Pmen=0;
    if($Men>0){$Pmen=($Men/2);}         #1
    
    $CheckAero=$_GET['checkAerolinea'];
        $Pvuelo=0;
        $Aerolinea=0;
        $TipoVuelo="";
        $Hvuelo="00:00:00";
        $IDaeropuerto=0;
    if($CheckAero)
    {
        $Aerolinea=$_GET['cotizarAerolinea']; #100  -  #200
        $TipoVuelo=$_GET['cotizarTipoVuelo']; #100/50 - $200/$100
        $Pvuelo=$_GET['precioVuelo'];
        $Hvuelo=$_GET['cotizarHora'];
        $IDaeropuerto=$_GET['IDaeropuerto'];
        $Aeropuerto=$_GET['aeropuerto'];
        // $SQL="Call TarifaVuelo_X_Tour('$Aerolinea','$TipoVuelo')";
        // $rPvuelo=$db->ejecutarSQL($SQL);
    }

    $CheckHotel=$_GET['checkHotel'];
    $Noches=$_GET['cotizarNoches'];
        $Photel=0;
        $Categoria="";
        $Hotel=0;
        $TipoHabitacion="";
    if($CheckHotel)
    {
        
        $Categoria=$_GET['cotizarCategoria'];
        $Hotel=$_GET['cotizarHotel'];
        $TipoHabitacion=$_GET['cotizarTipoHabitacion'];
        $Photel=$_GET['precioHospedaje'];
        // $SQL1="Call TarifaHoteles_X_Tour($Hotel,'$TipoHabitacion')";
        // $rPhotel=$db->ejecutarSQL($SQL1);
    }

    $PF=(($Pinicial*$Ad)+($Pinicial*$Pmen)+($Pvuelo*$Ad)+($Pvuelo*$Pmen)+($Photel*$Noches));
    
    // $Date=date('Y-m-d H:i:s');

    // echo "Tours:".$Tour."----Usuario: ".$sesionID."---Origen: ".$Pais,$Edo,$Cd."----FechaReserva:".$Date."----FechaTour: ".$FechaTour."----Pinicial-".$Pinicial."----Men-".$Men."----Ad-".$Ad."----Pmen-".$Pmen."----CheckAero(".$CheckAero.")----Pvuelo-".$Pvuelo."----Aerolinea-".$Aerolinea."----TipoVuelo-".$TipoVuelo."----HoraVuelo-".$Hvuelo."----Pvuelo-".$Pvuelo."----CheckHotel(".$CheckHotel.")----Noches-".$Noches."---Categoria:".$Categoria."----Photel-".$Photel."----Hotel-".$Hotel."----TipoHabitacion-".$TipoHabitacion."----Photel-".$Photel."-----$".$PF."";    
    
    $DatosCot="Call DatosAcotizar($sesionID,$Tour,$Pais,$Edo,$Cd,'$FechaTour',$Ad,$Men,$Hotel,$IDaeropuerto,'$Hvuelo',$Aerolinea,$PF)";
    $turi->ejecutarSQL($DatosCot);
    
    // header('Location: ../tours.php');
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
        body{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }
        .eFONDO{
            /* padding: 3%; */
            margin-top: .5%;
            margin-bottom: 6%;
            border-radius: 1rem;
            /* background: #fff; */
        }
    </style>
    <title>Resumen de cotizacion</title>
</head>

<body>

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
                    echo "<a class='btn fas fa-sign-out-alt ml-md-5 close' href='cerrarSesion.php' title='Cerrar sesión'></a>";
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
                        <form action="scripts/verificarLogin.php" method="post" class="lead font-weight-bold">
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
            <div class='btn btn-light position-fixed posicionChat d-flex justify-content-start posicion'><img src='images/chat-square-text.svg' class='icoredes'>&nbsp;Chat</div> -->
              
            <!--REDES SOCIALES-->";
          }
        ?>

        <!-- ------------------------------------------------------------------------------- -->


        <!--CONTENIDO-->
        <div class="container eFONDO">
            <div class="card rounded-lg text-center">
                <div class="card-header bg-success display-4">
                    RESUMEN DE COTIZACION <i class='fas fa-file-invoice-dollar ml-4'></i>
                </div>
                <div class="card-body text-dark">
                    <table class="table"> <?php 
                        
                        $RESUMEN="Call ResumenCotizacion($sesionID)";
                        $RESULTADOta=$turi->seleccionar($RESUMEN);

                        foreach ($RESULTADOta as $ta){echo"
                            
                        <tbody>
                            <tr>
                                <th scope='row' class='text-right'>Fecha de Reserva</th>
                                <td class='text-left'>".$ta->FECHA_RESERVA."</td>
                            </tr>
                            <tr>
                                <th scope='row' class='text-right'>Tour</th>
                                <td class='text-left'>".$ta->TOUR."</td>
                            </tr>
                            <tr>
                                <th scope='row' class='text-right'>Fecha de Salida</th>
                                <td class='text-left'>".$ta->FECHA_SALIDA."</td>
                            </tr>
                            <tr>
                                <th scope='row' class='text-right'>Personas</th>
                                <td class='text-left'>".$ta->ADULTOS." Adulto(s) y ".$ta->MENORES." Menor(es)</td>
                            </tr>
                            <tr>
                                <th scope='row' class='text-right'>Aerolinea</th>";
                                if($CheckAero){ echo"
                                    <td class='text-left'>".$ta->AEROLINEA." → Hora de Salida: ".$Hvuelo." en el ".$Aeropuerto."</td>";
                                }
                                else{ echo"
                                    <td class='text-left'>Sin Solicitud de vuelo en cotizacion</td>";
                                } echo"
                            </tr>
                            <tr>
                                <th scope='row' class='text-right'>Hospedaje</th>";
                                if($CheckHotel){ echo"
                                    <td class='text-left'>".$Categoria." → ".$ta->HOTEL."</td>";
                                }
                                else{ echo"
                                    <td class='text-left'>Sin Solicitud de Hospedaje en cotizacion</td>";
                                } echo"
                            </tr>
                            <tr>
                                <th scope='row' class='text-right'>COSTO TOTAL</th>
                                <th class='text-left'>$ ".$PF."</th>
                            </tr>
                        </tbody>";}?>
                    </table>
                </div>
                <div class="card-footer bg-success text-light">
                    Esta informacion estara disponible en tu perfil, en la seccion <b>Cotizaciones</b>. 
                    <a href="../miPerfil.php" class="btn btn-outline-light ml-2">Mi Perfil</a>

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