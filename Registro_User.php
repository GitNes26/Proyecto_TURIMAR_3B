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

    <style>
        .escondido{ 
            postion:fixed;
            z-index: 1;
            margin-left:10px; margin-top: 60px}
        .sobre{
            position: absolute; z-index:2;}
    </style>
    <title>TuriViajes - Registrarse</title>
</head>

<body class="bg-light">

    <div class="container-fluid text-dark">
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


        <!--CONTENIDO-->
        <div class="container mt-2 bg-light rounded-lg">
            <nav class="row bg-primary text-light text-center p-2 rounded">
                <div class=" h1 text-center">Registrar Usuario <i class="fas fa-user-plus fa-sm"></i></div>
            </nav>
            <form action="scripts/guardarUsuario.php" method="POST" enctype='multipart/form-data'>
                <div class="row border rounded-lg p-3 mb-2">
                    <div class="col-12 col-md-6">
                        <!-- Foto de perfil -->
                        <div class="form-row mb-5">
                            <input  type="file" id="BtnFotoPerfil" name="foto" value='user.png' class="escondido">
                            <label for="BtnFotoPerfil" class="form-label sobre"><img src="images/user-edit.svg"
                                   alt="NuevoUsuario"
                                  class="img-fluid mx-auto d-block  rounded-circle img-newuser">
                            </label>
                        </div>
                        <br>
                        <!-- Nombre y Apellido -->
                        <div class="row mt-2">
                            <div class="form-group mt-2 col-12 col-md-6">
                                <label for="input-name" class="col-form-label">
                                    Nombre:
                                </label>
                                <input type="text" name="nombre" class="form-control" id="input-Nombre" required />
                            </div>
                            <div class="form-group mt-2 col-12 col-md-6">
                                <label for="input-AP" class="col-form-label">
                                    Apellido Paterno:
                                </label>
                                <input type="text" name="aPaterno" class="form-control"
                                    id="input-ApellidoPa" required />
                            </div>
                        </div>
                        <!-- Correo -->
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="input-correo" class="col-form-label">
                                    Correo:
                                </label>
                                <input type="email" name="correo" class="form-control" id="input-correo"
                                    placeholder="micorreo@ejemplo.com" required/>
                            </div>
                        </div>
                        <!-- Usuario y Contrasena -->
                        <div class="row mt-2">
                            <div class="form-group col-12 col-md-6">
                                <label for="input-usuario" class="col-form-label">
                                    Nombre de usuario:
                                </label>
                                <input type="text" name="user" class="form-control" id="input-usuario" required />
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="input-contraseña" class="col-form-label">
                                    Contraseña:
                                </label>
                                <input type="password" name="password" class="form-control" id="input-contraseña"
                                    placeholder="Usa diferentes caracteres" required>
                            </div>
                        </div>                        
                    </div>

                    <div class="col-12 col-md-6 border-left">
                        <!-- Sexo y Pais-->
                        <div class="row mt-2">
                            <div class="form-group col-12 col-md-6">
                                <h6>SEXO:</h6>
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
                                          $SQL1="SELECT ID,PAIS FROM paises WHERE PAIS='Mexico'";
                                          $resultado1=$turi->seleccionar($SQL1);
                                          foreach ($resultado1 as $paises)
                                          {
                                              echo "<option value='".$paises->ID."'>".$paises->PAIS."</option>";
                                          }echo" 
                                    </select>
                                </div>";?>
                            </div>
                        </div>
                        <hr>
                        <!-- Concentimiento -->
                        <div class="form-check">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id='check' required>
                                <label for='check' class="form-check-label">
                                    Consiento el tratamiento de mis datos personales.
                                </label>
                            </div>
                        </div>
                        <hr>
                        <!-- Parrafo -->
                        <div class="row">
                            <div class="col">
                                <p>
                                    TuriApp es un sistema abierto a la consulta libre y gratuita
                                    de cualquier usuario, sin embargo, muchas de las
                                    funcionalidades disponibles requieren registrarse como
                                    usuario.<br>Iguamente el registro es libre y gratuito.<br />
                                    Para darse de alta como usuario registrado de TuriApp es
                                    necesario rellenar el siguiente formulario.<br>Confiamos en que
                                    sus datos sean reales e indique un correo electrónico válido.
                                </p>
                            </div>
                        </div>
                        <input type="hidden" name="rol" value=0>
                        <!-- Btn Registrar -->
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success btn-lg btn-block">
                                Crear Cuenta
                            </button>
                        </div>
                    </div>
                </div>
            </form>
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