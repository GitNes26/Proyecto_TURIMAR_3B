<!--Instancia turi-->
<?php
  session_start();
  error_reporting(0);
  $sesion = $_SESSION["usuario"];
  $sesionID =$_SESSION["usuario2"];

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

    <link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <!------ Include the above in your HEAD tag ---------->

    <style>
        body{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }
        .eFONDO{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 1rem;
            background: #fff;
        }
        .eFOTOperfil{
            text-align: center;
            margin-bottom: 10%;
            margin-top: -5%;
        }
        .eFOTOperfil img{
            width: 28vh;
            height: 28vh;
            border-radius: 50%;
            filter: brightness(1);
            transition: 0.2s linear;
        }
        .eFOTOperfil img:hover{
            cursor: pointer;
            filter: brightness(.7);
        }
        .profile-tab{margin-top: 2%}
        @media (max-width: 767px){ 
            .profile-WORK{margin-top: 30%}
        }

        .ebtn-EDITprofile{
            border: none;
            border-radius: 1.5rem;
            width: 60%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
            bottom: 70%;
            position: center;
        }
        .eFOTOperfil .file {
            border: none;
        }
                
        .profile-WORK h5{
            color: #333;
        }
        .profile-WORK h6{
            color: #0062cc;
        }        
        .profile-work .nav-tabs{
            margin-bottom:5%;
        }
        .profile-WORK .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-WORK .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
            
        label{
            font-weight: 600;
        }
        p{
            font-weight: 600;
            color: #0062cc;
        }

                
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .lar{font-size:13px; margin-right: 0; margin-left: 0;}

        .menos{top:-5px; right:-10px}
    </style>

    <title>Mi Perfil</title>
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



        <!-- ------------------------------------------------------------------------------- -->

        <!--CONTENIDO-->            
        <div class="container eFONDO">
            <!-- PARTE SUPERIOR -->
            <div class="row">
                <div class="col-md-3">
                    <!-- FOTO DE PERFIL -->
                    <div class="profile-img position-absolute">
                        <div class="eFOTOperfil">
                            <div class="col-md-3">
                                <?php
                                    $SQL="SELECT * FROM USUARIOS INNER JOIN PAISES ON USUARIOS.PAIS=PAISES.ID WHERE USUARIO='$sesion'";
                                    $resultado=$turi->seleccionar($SQL);
                                    
                                    foreach ($resultado as $u){
                                        echo "<form action='scripts/cambiarFoto.php' method='POST' enctype='multipart/form-data'>
                                        <input  type='file' id='BtnFotoPerfil' name='foto' class='d-none' >
                                        <label for='BtnFotoPerfil' class='form-label'><img class='fotoMiPerfil' src='".$u->FOTO."' height='50px' width='50px' alt='foto usuario'/></label>
                                        <button class='btn btn-secondary' type='submit'>Cambiar Foto</button></form>";                                    
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <!-- USUARIO -->
                    <div class="profile-WORK">
                            <?php
                            echo "<h5>".$u->USUARIO."</h5>
                            <h6>".$u->CORREO." </h6>";
                            ?>


                        <!-- PESTAÑAS -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Cotizaciones</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="historial-tab" data-toggle="tab" href="#historial" role="tab" aria-controls="historial" aria-selected="false">Historial</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" id="favoritos-tab" data-toggle="tab" href="#favoritos" role="tab" aria-controls="favoritos" aria-selected="false">Favoritos</a>
                            </li>
                        </ul>
                    </div>
                </div>                    
            </div>

            <!-- CONTENIDO -->
            <div class="row">
                <div class="col-md-8 offset-md-3">
                    <div class="tab-content profile-tab subir" id="myTabContent">

                        <!-- USUARIO -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class='row'><?php echo "
                                <div class='col-md-6'> <label>Usuario</label> </div>
                                <div class='col-md-6'> <p>".$u->USUARIO."</p> </div>
                            </div> 
                            <div class='row'>
                                <div class='col-md-6'> <label>Correo</label> </div>
                                <div class='col-md-6'> <p>".$u->CORREO."</p> </div>
                            </div> 
                            <div class='row'>
                                <div class='col-md-6'> <label>Contrasena</label> </div>
                                <div class='col-md-6'> <p>*********</p> </div>
                            </div> <br>
            
                            <div class='row'> 
                                <div class='col-md-6'>
                                    <div class='row'>
                                        <div class='col-md-6'> <label>Nombre(s)</label> </div>
                                        <div class='col-md-6'> <p> ".$u->NOMBRE." </p> </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-6'> <label>Apellido paterno</label> </div>
                                        <div class='col-md-6'> <p> ".$u->APELLIDO_PATERNO." </p> </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-6'> <label>Apellido materno</label> </div>
                                        <div class='col-md-6'> <p> ".$u->APELLIDO_MATERNO." </p> </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-6'> <label>Sexo</label> </div>
                                        <div class='col-md-6'> <p> ".$u->SEXO." </p> </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-6'> <label>Telefono</label> </div>
                                        <div class='col-md-6'> <p> ".$u->CELULAR." </p> </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-6'> <label>Fecha_nacimiento</label> </div>
                                        <div class='col-md-6'> <p> ".$u->FECHA_NACIMIENTO." </p> </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='row'>
                                        <div class='col-md-6'> <label>Calle</label> </div>
                                        <div class='col-md-6'> <p> ".$u->CALLE." </p> </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-6'> <label> Num_Externo </label> </div>
                                        <div class='col-md-6'> <p> ".$u->NO_EXT." </p> </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-6'> <label> Colonia </label> </div>
                                        <div class='col-md-6'> <p> ".$u->COLONIA." </p> </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-6'> <label> Ciudad </label> </div>
                                        <div class='col-md-6'> <p> ".$u->CIUDAD." </p> </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-6'> <label> Pais </label> </div>
                                        <div class='col-md-6'> <p> ".$u->PAIS." </p> </div>
                                    </div>";}?>
                        
                                    <!-- BOTON EDITAR PERFIL -->
                                    <div class='row'>
                                        <div class='col-md-12'>
                                            <a type="button" class="btn btn-primary rounded-pill" name="btnEDITPROFILE"
                                                href="Formularios/FormEditarPerfil.php">Editar Perfil<i
                                                    class="fas fa-pencil-alt ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- COTIZACIONES -->
                        <div class="tab-pane fade lar" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <table class='table table-bordered table-hover table-sm table-responsive'>
                                <thead class="text-center thead-light">
                                    <tr>
                                        <th scope='col' rowspan='2'>Folio</th>
                                        <th scope='col' rowspan='2'>Fecha_de___ Reserva</th>
                                        <th scope='col' rowspan='2'>_____Tour_____</th>
                                        <th scope='col' rowspan='2'>Fecha_de___ Salida</th>
                                        <th scope='col' colspan='2'>Personas</th>
                                        <th scope='col' rowspan='2'>___Hotel___</th>
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
                                    $SQLct="Call MisCotizaciones($sesionID)";
                                    $RESULTADOta=$turi->seleccionar($SQLct);
                                    
                                    foreach ($RESULTADOta as $ta){
                                        switch($ta->ESTATUS){
                                            case 'EN PROCESO':
                                                echo"
                                                <tr>
                                                    <th scope='row'>".$ta->ID."</th>
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
                                                            <!-- <button class='btn btn-success'><i class='fas fa-check fa-sm'></i></button> -->
                                                            <form action='scripts/cancelarTour.php' method='POST'><button class='btn btn-danger' name='BtnCancelar' value='".$ta->ID."' data-toggle='tooltip' title='Cancelar Cotizacion'><i class='fas fa-ban fa-sm'></i></button></form>
                                                        </div>
                                                        <p>".$ta->ESTATUS."</p>
                                                    </td>
                                                </tr>";
                                            break;
                                            case 'CANCELADO':
                                                echo"
                                                <tr>
                                                    <th scope='row' class='bg-danger text-light'>".$ta->ID."</th>
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
                        
                        <!-- HISTORIAL -->
                        <!-- <div class="tab-pane fade" id="historial" role="tabpanel" aria-labelledby="historial-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Historial</label>
                                </div>
                                <div class="col-md-6">
                                    <p>prueba</p>
                                </div>
                            </div>
                        </div> -->
                        
                        <!-- FAVORITOS -->              
                        <div class="tab-pane fade" id="favoritos" role="tabpanel" aria-labelledby="favoritos-tab">
                            <div class="row">
                                <?php
                                    $SQL1="SELECT tours.ID, tours.FOTO ,tours.TOUR  FROM tours INNER JOIN tours_favoritos on tours_favoritos.TOUR=tours.ID INNER JOIN usuarios on usuarios.ID=tours_favoritos.USUARIO WHERE usuarios.USUARIO='$sesion'";
                                    $resultado1= $turi->seleccionar($SQL1);
                                    foreach($resultado1 as $e){
                                        echo"<div class='card bg-light m-3' style='width: 18rem'>
                                            <img src='".$e->FOTO."' class='card-img-top' alt='Imagen Tour'>
                                            <div class='card-body'>
                                                <p class='card-text'>$e->TOUR</p>
                                            </div>
                                            <div>
                                                <form action='scripts/eliminarFavs.php' method='POST'>
                                                    <button class='btn btn-danger badge position-absolute menos' data-toggle='tooltip' data-placement='top' title='Eliminar de Favoritos' name='BtnFav' value='".$e->ID."'><i class='fas fa-minus-circle fa-lg'></i></button>
                                                </form>
                                            </div>
                                        </div>";
                                    }
                                ?>
                            </div>
                        </div>
                        
                    </div>
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