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

    <title>Formas de pago</title>
    
    <style>        
        body{
        background: -webkit-linear-gradient(left, #b3d6ff, #3931af);
        }
        
        .eFONDO{
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 1rem;
        background: #fff;
        }
    </style>
    
</head>

<body>


    <div class="container-fluid">
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
                        <a class="nav-link mx-2" href="index.php">INICIO <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item border-dark link">
                        <a class="nav-link mx-2" href="tours.php">TOURS</a>
                    </li>
                    <li class="nav-item border-dark link">
                        <a class="nav-link mx-2 active font-weight-bold" href="formasDePago.php">FORMAS DE PAGO</a>
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

        <!--CONTENIDO-->
            
      <DIV class="container eFONDO">
	<div class="col-xl-8 col-lg-12" id="cont_list">
		<div class="title-blq">
			<h1>
				<strong>FORMAS DE PAGO</strong><br>
			</h1>
		</div>

		<!-- view list -->
		<div id="view_list">
			<div class="lnk_vistasss" id="lnk_vistasss"> &nbsp;</div>

			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th colspan="3">1. Depósitos y Transferencias</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="3">Puede realizar su pago mediante depósito o transferencia bancaria, de la siguiente manera.</td>
						</tr>
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
						<!-- Canadá, Estados Unidos, México, Asia, África, Pacífico, Medio Oriente y Cruceros -->
						<tr>
							<td colspan="3" class="backdif" id="astro">
								Realice su depósito en cualquiera de las siguientes cuentas a nombre de <strong>TURIMAR</strong>
							</td>
						</tr>



						<!-- santander-->

						<tr>

							<td colspan="3">

								<img src="https://img1.mtmedia.com.mx/Logos/bancos/logo-santander.jpg" alt="Santander">

							</td>

						</tr>

						<tr>

							<td>

								&nbsp;

							</td>

							<td colspan="2">

								<strong>MONEDA NACIONAL</strong>

							</td>

						</tr>

						<tr>

							<td><strong>CLABE:</strong></td>

							<td colspan="2">014180655012517664</td>

						</tr>

						<tr>

							<td><strong>CUENTA:</strong></td>

							<td colspan="2">65501251766</td>

						</tr>



						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>



						<!-- banamex -->

						<tr>

							<td colspan="3">

								<img src="https://img1.mtmedia.com.mx/Logos/bancos/logo-banamex.jpg" alt="Banamex">

							</td>

						</tr>

						<tr>

							<td>

								&nbsp;

							</td>

							<td>

								<strong>MONEDA NACIONAL</strong>

							</td>

							<td>

								<strong>DÓLARES</strong>

							</td>

						</tr>

						<tr>

							<td><strong>CLABE:</strong></td>

							<td>0021 8070 1173 9107 65</td>

							<td>0021 8070 0095 6512 26</td>

						</tr>

						<tr>

							<td><strong>CUENTA:</strong></td>

							<td>7011 - 7391076</td>

							<td>7000 - 9565122</td>

						</tr>



						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>



						<!-- bancomer -->

						<tr>

							<td colspan="3">

								<img src="https://img1.mtmedia.com.mx/Logos/bancos/logo-bancomer.jpg" alt="bancomer">

							</td>

						</tr>

						<tr>

							<td>

								&nbsp;

							</td>

							<td>

								<strong>MONEDA NACIONAL</strong>

							</td>

							<td>

								<strong>DÓLARES</strong>

							</td>

						</tr>

						<tr>

							<td><strong>CLABE:</strong></td>

							<td>0121 800 0111 2277 188</td>

							<td>0121 800 0111 2277 340</td>

						</tr>

						<tr>

							<td><strong>CUENTA:</strong></td>

							<td>0111 227718</td>

							<td>0111 227734</td>

						</tr>





						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>

						<tr>
							<td colspan="3">&nbsp;</td>
                        </tr>

						<tr>

							<td colspan="3">

								Favor de reportar sus pagos enviando copia de la transferencia o deposito incluyendo la siguiente información:<br><br>



								• Nombre de agencia. <br>

								• Número de expediente de localización.<br>

								• Ejecutivo de ventas que lo atiende.<br>

								• Paquete que adquiere<br>

								• Fecha de salida.<br>

								• Datos de facturación.<br><br>



								Todo esto al correo de: <a href="turimar-castro@hotmail.com">turimar-castro@hotmail.com</a> con copia al asesor de ventas que lo está atendiendo.

							</td>

						</tr>

					</tbody>

				</table>
                
                
				<br>





				<table class="table">



					<thead>

						<tr>

							<th>2. Pago presencial</th>

						</tr>

					</thead>



					<tbody>

						<tr>

							<td>

								Acude a nuestras oficinas con tu recibo.

							</td>

						</tr>

					</tbody>



				</table>
                
            </div>
        </div>
    </div>
</div>  
</DIV>
        <!-- ------------------------------------------------------------------------------- -->
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