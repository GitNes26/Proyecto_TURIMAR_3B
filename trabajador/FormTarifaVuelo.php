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
      <link rel="icon" type="image/png" href="../images/Logo_Turimar_rectangular.png" />
      <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
      <script src="https://kit.fontawesome.com/208a113de3.js" crossorigin="anonymous"></script>

      <style></style>
      <title>Tours - Turimar</title>
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
                <a class="navbar-brand d-none d-sm-block" href="#">
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

                    <li class='nav-item dropdown border-dark link pl-3 border-left'>
                        <a class='nav-link dropdown-toggle active font-weight-bold' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>TRABAJADORES</a>
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

          

          <!-- ------------------------------------------------------------------------------- -->

          <!-- ------------------------------------------------------------------------------- -->

          <!--JUMBOTRON-->
          <div class="row jumbotron jumbotron-fluid d-flex justify-content-center"
              style="background-image: url(../images/bgaerolineas.jpg); background-size: cover; background-repeat: no-repeat; background-position: center; height:300px;">
              <div class=" w-50 text-dark">
                  <h1 class="display-1 text-center font-weight-bold text-dark">TARIFA VUELO</h1>
              </div>
          </div>

          <!--CONTENIDO-->
          <div class="container bg-light mt-5 text-dark">
            <!--FORM REGISTRO AEROLINEAS-->
            <form action="registroTarifaVuelo.php" method="POST">
                <div class="form-row">
                    <div class="col mt-4">
                        <h2>Registro Tarifa Vuelo</h2>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-7 mt-2">
                        <select class="form-control form-control-lg" name="aeropuerto">
                            <option selected>Seleccionar Aeropuerto</option>
                            <?php
                                $SQL="SELECT ID, AEROPUERTO FROM AEROPUERTOS";
                                $RESULTADO=$turi->seleccionar($SQL);
                                foreach($RESULTADO as $fila){
                                    echo "<option value='".$fila->ID."'>$fila->AEROPUERTO</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-5 mt-2">
                        <select class="form-control form-control-lg" name="aerolinea">
                            <option selected>Seleccionar Aerolínea</option>
                            <?php
                                $SQL="SELECT ID, AEROLINEA FROM AEROLINEAS";
                                $RESULTADO=$turi->seleccionar($SQL);
                                foreach($RESULTADO as $fila){
                                    echo "<option value='".$fila->ID."'>$fila->AEROLINEA</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-4 mt-2">
                        <select class="form-control form-control-lg" name="pais">
                            <option selected>Seleccionar País</option>
                        </select>
                    </div>
                    <div class="col-4 mt-2">
                        <select class="form-control form-control-lg" name="estado">
                            <option selected>Seleccionar Estado</option>
                        </select>
                    </div>
                    <div class="col-4 mt-2">
                        <select class="form-control form-control-lg" name="ciudad">
                            <option selected>Seleccionar Ciudad</option>
                            <?php
                                $SQL="SELECT ID, CIUDAD FROM CIUDADES";
                                $RESULTADO=$turi->seleccionar($SQL);
                                foreach($RESULTADO as $fila){
                                    echo "<option value='".$fila->ID."'>$fila->CIUDAD</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 mt-2">
                        <select class="form-control form-control-lg" name="tipoVuelo">
                            <option selected>Seleccionar Tipo de Vuelo</option>
                            <option value="ABIERTO">ABIERTO</option>
                            <option value="REDONDO">REDONDO</option>
                        </select>
                    </div>
                    <div class="col-6 mt-2">
                        <input type="number" name="precio" placeholder="Precio del Vuelo" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col mt-3">
                        <button type="submit" class="btn btn-success btn-block btn-lg" name="insertarTarifaVuelo">Registrar</button>
                    </div>
                </div>
            </form><hr>


            <!--TABLA TARIFA VUELO-->
            <div class="row mt-5">
              <div class="col">
                <table class="table table-hover">
                  <thead class="thead-dark text-center">
                    <tr>
                      <th colspan="7">TARIFA VUELO</th>
                    </tr>
                    <tr>
                        <td class="font-weight-bold text-left">AEROPUERTO</td>
                        <td class="font-weight-bold text-left">AEROLINEA</td>
                        <td class="font-weight-bold text-left">TIPO DE VUELO</td>
                        <td class="font-weight-bold text-left">DESTINO</td>
                        <td class="font-weight-bold text-left">TARIFA</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $SQL_CONSULTA="SELECT AP.AEROPUERTO, AL.AEROLINEA, TV.TIPO_VUELO, CD.CIUDAD, TV.TARIFA FROM TARIFA_VUELO AS TV
                                    INNER JOIN AEROPUERTOS AS AP ON AP.ID = TV.AEROPUERTO
                                    INNER JOIN AEROLINEAS AS AL ON AL.ID = TV.AEROLINEA
                                    INNER JOIN CIUDADES AS CD ON CD.ID = TV.DESTINO";
                      $RESULTADO=$turi->seleccionar($SQL_CONSULTA);
                      foreach ($RESULTADO as $fila) {
                        echo "<tr>
                                <td>$fila->AEROPUERTO</td>
                                <td>$fila->AEROLINEA</td>
                                <td>$fila->TIPO_VUELO</td>
                                <td>$fila->CIUDAD</td>
                                <td>$fila->TARIFA</td>
                                <td>
                                <div class='btn-group btn-block' role='group' aria-label='Basic example'>
                                  <button type='button' class='btn btn-info btn-editar' data-toggle='modal' data-target='#editar-aerolinea' data-id='".$fila->ID."' data-aerolinea='".$fila->AEROLINEA."'><i class='fas fa-pencil-alt'></i></button>";
                                  if($sesionROL>2){ echo"
                                  <button type='button' class='btn btn-danger btn-eliminar' data-toggle='modal' data-target='#eliminar-aerolinea' data-id='".$fila->ID."'><i class='far fa-trash-alt'></i></button>";} echo"
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
          <!-- ------------------------------------------------------------------------------- -->
                <!-- Modal Eliminar-->
                <div class="modal fade text-dark" id="eliminar-aerolinea" tabindex="-1" aria-labelledby="EliminarModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EliminarModalLabel">Eliminar Aerolinea</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="eliminarAerolinea.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" id="id_aerolinea" name="id_aerolinea">
                                    <h3>¿Deseas eliminar esto?</h3>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger eliminar">Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Editar-->
                <div class="modal fade text-dark" id="editar-aerolinea" tabindex="-1" aria-labelledby="EditarLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EditarModalLabel">Editar Aerolinea</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="editarAerolinea.php" method="POST">
                                <div class="modal-body">
                                    <div class="form-control">
                                        <input type="hidden" id="id_aerolinea_editar" name="idAerolinea">
                                    </div>
                                    <div class="form-control">
                                        <input type="text" class="form-control form-control-lg" id="nombre_aerolinea_editar" name="nombreAerolinea" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


      <!-- ------------------------------------------------------------------------------- -->

          

          <!--FOOTER-->
          <div class="row bg-dark footer mt-5">

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