<?PHP
session_start();
include('fn/login_ctrl.php');
include('fn/list_opciones.php');
include('fn/datos_inmueble.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion - EstebanCostela</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/utils.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Inicio</span>
                            </a>
                        </li>

                        <li class="sidebar-item active has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-house"></i>
                                <span>Inmuebles</span>
                            </a>
                            <ul class="submenu active">
                                <li class="submenu-item active">
                                    <a href="inmuebles.php"><i class="fa-solid fa-circle-chevron-right"></i>&nbsp;Inmuebles</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="consultas.php">Consultas</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="pedidos.php">Pedidos</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item has-sub ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Datos</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item ">
                                    <a href="localidades.php">Localidades</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="operaciones.php">Operaciones</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="propiedades.php">Propiedades</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Seccion Administrativa: Solo se habilita si el ROL del Usuario es Administrador -->
                        <?PHP if ($_SESSION['rolUsu'] == '1') { ?>
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-person-badge-fill"></i>
                                    <span>Permisos</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="usuarios.php">Usuarios</a>
                                    </li>
                                </ul>
                            </li>
                        <?PHP } else { ?>
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-person-badge-fill"></i>
                                    <span>Perfil</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="usuario_abm.php?idUsuario=<?PHP echo $_SESSION['idUsu']; ?>&abm=m">Mis Datos</a>
                                    </li>
                                </ul>
                            </li>
                        <?PHP } ?>
                        <!-- /Seccion Administrativa-->

                        <li class="sidebar-item">
                            <a href="fn/logout.php" class='sidebar-link'>
                                <i class="bi bi-x-square"></i>
                                <span>Cerrar Sesi&oacute;n</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <!--li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notificaciones</h6>
                                        </li>
                                        <li><a class="dropdown-item">No hay notificaciones!</a></li>
                                    </ul>
                                </!li -->
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?PHP echo $_SESSION['nomUsu']; ?></h6>
                                            <p class="mb-0 text-sm text-gray-600">@<?PHP echo $_SESSION['uidUsu']; ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hola!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="usuario_abm.php?idUsuario=<?PHP echo $_SESSION['idUsu']; ?>&abm=m"><i class="icon-mid bi bi-person me-2"></i>
                                            Perfil</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Ayuda</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="fn/logout.php"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Cerrar Sesion</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>


            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>ABM Inmueble</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <form action="fn/abm_inmuebles.php" method="GET">
                                                <div class="col-md-12">
                                                    <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>
                                                        Informaci&oacute;n p&uacute;blica, puede ser vista desde la web.
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Titulo Inmueble</b></label>
                                                        <input type="text" class="form-control" id='tituloInmueble' name='tituloInmueble' placeholder="Titulo" value='<?PHP echo $tituloInmueble; ?>' require>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Tipo de Propiedad</b></label>
                                                        <select class="choices form-select" id='idPropiedad' name='idPropiedad' require>
                                                            <option value='<?PHP echo $idPropiedad; ?>'><?PHP echo $nombrePropiedad; ?></option>
                                                            <?PHP while ($propiedad = mysqli_fetch_assoc($rtspropiedad)) { ?>
                                                                <option value="<?PHP echo $propiedad['idPropiedad']; ?>"> <?PHP echo $propiedad['nombrePropiedad']; ?></option>
                                                            <?PHP } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Tipo de Operacion</b></label>
                                                        <select class="choices form-select" id='idOperacion' name='idOperacion' require>
                                                            <option value='<?PHP echo $idOperacion; ?>'><?PHP echo $nombreOperacion; ?></option>
                                                            <?PHP while ($operacion = mysqli_fetch_assoc($rtsoperacion)) { ?>
                                                                <option value="<?PHP echo $operacion['idOperacion']; ?>"> <?PHP echo $operacion['nombreOperacion']; ?></option>
                                                            <?PHP } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Descripcion Inmueble</b></label>
                                                        <textarea class="form-control" id='descripcionInmueble' name='descripcionInmueble' rows="3"><?PHP echo $descripcionInmueble; ?></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Calle</b></label>
                                                        <input type="text" class="form-control" id='domicilioCalleInmueble' name='domicilioCalleInmueble' placeholder="Domicilio" value='<?PHP echo $domicilioCalleInmueble; ?>' require>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>N&uacute;mero</b></label>
                                                        <input type="number" class="form-control" id='domicilioNumeroInmueble' name='domicilioNumeroInmueble' placeholder="N&uacute;mero" value='<?PHP echo $domicilioNumeroInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Orientacion</b></label>
                                                        <select class="choices form-select" id='domicilioOrientacionInmueble' name='domicilioOrientacionInmueble'>
                                                            <option value='<?PHP echo $domicilioOrientacionInmueble; ?>'><?PHP echo $domicilioOrientacionInmueble; ?></option>
                                                            <option value="Este">Este</option>
                                                            <option value="Oeste">Oeste</option>
                                                            <option value="Norte">Norte</option>
                                                            <option value="Sur">Sur</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Localidad</b></label>
                                                        <select class="choices form-select" id='idLocalidad' name='idLocalidad' require>
                                                            <option value='<?PHP echo $idLocalidad; ?>'><?PHP echo $nombreLocalidad; ?></option>
                                                            <?PHP while ($localidad = mysqli_fetch_assoc($rtslocalidad)) { ?>
                                                                <option value="<?PHP echo $localidad['idLocalidad']; ?>"> <?PHP echo $localidad['nombreLocalidad']; ?></option>
                                                            <?PHP } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Habitaciones</b></label>
                                                        <input type="number" class="form-control" id='habitacionesInmueble' name='habitacionesInmueble' placeholder="Habitaciones" value='<?PHP echo $habitacionesInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Baños</b></label>
                                                        <input type="number" class="form-control" id='banosInmueble' name='banosInmueble' placeholder="Baños" value='<?PHP echo $banosInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Plantas</b></label>
                                                        <input type="number" class="form-control" id='plantasInmueble' name='plantasInmueble' placeholder="Plantas" value='<?PHP echo $plantasInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Cloaca</b></label>
                                                        <select class="choices form-select" id='cloacaInmueble' name='cloacaInmueble'>
                                                            <option value='<?PHP echo $cloacaInmueble; ?>'><?PHP echo $cloacaInmueble; ?></option>
                                                            <option value="">Sin especificar</option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Gas</b></label>
                                                        <select class="choices form-select" id='gasNaturalInmueble' name='gasNaturalInmueble'>
                                                            <option value='<?PHP echo $gasNaturalInmueble; ?>'><?PHP echo $gasNaturalInmueble; ?></option>
                                                            <option value="">Sin especificar</option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Tipo de agua caliente</b></label>
                                                        <select class="choices form-select" id='tipoAguaCalienteInmueble' name='tipoAguaCalienteInmueble'>
                                                            <option value='<?PHP echo $tipoAguaCalienteInmueble; ?>'><?PHP echo $tipoAguaCalienteInmueble; ?></option>
                                                            <option value="">Sin especificar</option>
                                                            <option value="Calefón eléctrico">Calefón eléctrico</option>
                                                            <option value="Calefón gas">Calefón gas</option>
                                                            <option value="Termotanque eléctrico">Termotanque eléctrico</option>
                                                            <option value="Termotanque gas">Termotanque gas</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Agua corriente</b></label>
                                                        <select class="choices form-select" id='aguaCorrienteInmueble' name='aguaCorrienteInmueble'>
                                                            <option value='<?PHP echo $aguaCorrienteInmueble; ?>'><?PHP echo $aguaCorrienteInmueble; ?></option>
                                                            <option value="">Sin especificar</option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Pavimento</b></label>
                                                        <select class="choices form-select" id='pavimentoInmueble' name='pavimentoInmueble'>
                                                            <option value='<?PHP echo $pavimentoInmueble; ?>'><?PHP echo $pavimentoInmueble; ?></option>
                                                            <option value="">Sin especificar</option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Frente del terreno (m2)</b></label>
                                                        <input type="number" class="form-control" id='frenteTerrenoInmueble' name='frenteTerrenoInmueble' placeholder="Frente del terreno" value='<?PHP echo $frenteTerrenoInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Largo del terreno (m2)</b></label>
                                                        <input type="number" class="form-control" id='largoTerrenoInmueble' name='largoTerrenoInmueble' placeholder="Largo del terreno" value='<?PHP echo $largoTerrenoInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Superficie Cubierta (m2)</b></label>
                                                        <input type="number" class="form-control" id='superficieCubiertaInmueble' name='superficieCubiertaInmueble' placeholder="Superficie Cubierta" value='<?PHP echo $superficieCubiertaInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Superficie Total Terreno (Especificar Tipo)</b></label>
                                                        <input type="number" class="form-control" id='superficieTotalInmueble' name='superficieTotalInmueble' placeholder="Superficie Total" value='<?PHP echo $superficieTotalInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Tipo Superficie(m2 / ha)</b></label>
                                                        <select class="choices form-select" id='tipoSuperficieTotalInmueble' name='tipoSuperficieTotalInmueble'>
                                                            <option value='<?PHP echo $tipoSuperficieTotalInmueblee; ?>'><?PHP echo $tipoSuperficieTotalInmueble; ?></option>
                                                            <option value=""></option>
                                                            <option value="m2">m2</option>
                                                            <option value="Ha">Ha</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Antigüedad del Inmueble (Años)</b></label>
                                                        <input type="number" class="form-control" id='antiguedadInmueble' name='antiguedadInmueble' placeholder="Antigüedad" value='<?PHP echo $antiguedadInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Estado del Inmueble</b></label>
                                                        <input type="text" class="form-control" id='estadoInmueble' name='estadoInmueble' placeholder="Estado" value='<?PHP echo $estadoInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Mejoras</b></label>
                                                        <select class="choices form-select" id='mejorasInmueble' name='mejorasInmueble'>
                                                            <option value='<?PHP echo $mejorasInmueble; ?>'><?PHP echo $mejorasInmueble; ?></option>
                                                            <option value="">Sin especificar</option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Cochera</b></label>
                                                        <select class="choices form-select" id='cocheraInmueble' name='cocheraInmueble'>
                                                            <option value='<?PHP echo $cocheraInmueble; ?>'><?PHP echo $cocheraInmueble; ?></option>
                                                            <option value="">Sin especificar</option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Tipo de cochera</b></label>
                                                        <input type="text" class="form-control" id='tipoCocheraInmueble' name='tipoCocheraInmueble' placeholder="Tipo de cochera" value='<?PHP echo $tipoCocheraInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Capacidad de vehículos</b></label>
                                                        <input type="number" class="form-control" id='vehiculosCocheraInmueble' name='vehiculosCocheraInmueble' placeholder="Capacidad de vehículos" value='<?PHP echo $vehiculosCocheraInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Informacion Adicional</b></label>
                                                        <textarea class="form-control" id='informacionAdicionalInmueble' name='informacionAdicionalInmueble' rows="3"><?PHP echo $informacionAdicionalInmueble; ?></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Valor Inmueble</b></label>
                                                        <input type="number" class="form-control" id='valorInmueble' name='valorInmueble' placeholder="Valor" value='<?PHP echo $valorInmueble; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Moneda</b></label>
                                                        <select class="choices form-select" id='monedaInmueble' name='monedaInmueble'>
                                                            <option value='<?PHP echo $monedaInmueble; ?>'><?PHP echo $monedaInmueble; ?></option>
                                                            <option value="$">Pesos</option>
                                                            <option value="USD">Dolares</option>
                                                        </select>
                                                    </div>


                                                    <div class="alert alert-light-warning color-warning"><i class="bi bi-exclamation-triangle"></i>
                                                        Informaci&oacute;n privada, solo puede ser vista en esta p&aacute;gina de gesti&oacute;n.
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label"><b>Informacion Extra del Inmueble</b></label>
                                                        <textarea class="form-control" id='informacionPrivadaInmueble' name='informacionPrivadaInmueble' rows="3"><?PHP echo $informacionPrivadaInmueble; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="buttons">
                                                    <input type="hidden" id="idInmueble" name="idInmueble" value="<?PHP echo $_REQUEST['idInmueble']; ?>" />
                                                    <input type="hidden" id="abm" name="abm" value="<?PHP echo $_REQUEST['abm']; ?>" />
                                                    <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                                                    <!--button type="reset" class="btn btn-secondary me-1 mb-1">Reset</button-->
                                                    <a href="inmuebles.php" class="btn btn-warning me-1 mb-1">Cancelar</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?PHP if ($_REQUEST['abm'] != 'a') {
                                include('fn/list_imagenes.php'); ?>

                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <!--form action="fn/abm_img.php" method="GET"-->
                                            <form role="form" action="fn/abm_img.php" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label><b>Subir Im&aacute;genes</b></label><br>
                                                    <!--input type="file" class="basic-filepond" name="imagen"-->
                                                    <input type="file" name="imagen[]" id="imagen[]" multiple>
                                                    <!--input type="file" name="imagen[]" id="imagen[]" class="image-preview-filepond" multiple-->

                                                    <!--label-- for="basicInput">Detalle</°label-->
                                                    <!--textarea rows="2" class="form-control" placeholder="Detalle de la Imagen"
                                                name="detalleImagen" id="detalleImagen"></textarea-->
                                                    <input type="hidden" id="detalleImagen" name="detalleImagen" value="" />
                                                </div>

                                                <div class="buttons">
                                                    <input type="hidden" id="idInmueble" name="idInmueble" value="<?PHP echo $_REQUEST['idInmueble']; ?>" />
                                                    <input type="hidden" id="abm" name="abm" value="m" />
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Cargar</button>
                                                </div>
                                            </form>
                                        </div>

                                        <?PHP echo $caurosel ?>

                                        <div class="accordion" id="detalleimagenes">
                                            <div class="card-body">
                                                <div class="card-header" id="headingOne" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" role="button">
                                                    <span class="collapsed collapse-title"><a href="#tobottom"> <i class="bi bi-image"></i> Detalle de Imagenes</a></span>
                                                </div>
                                                <div id="collapseOne" class="collapse pt-1" aria-labelledby="headingOne" data-parent="#cardAccordion">
                                                    <?PHP echo $listado; ?>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="card-header" id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" role="button">
                                                    <span class="collapsed collapse-title"><a href="#tobottom"> <i class="bi bi-play-btn"></i> Video</a></span>
                                                </div>

                                                <div id="collapseTwo" class="collapse pt-1" aria-labelledby="headingTwo" data-parent="#cardAccordion">
                                                    <div class="card-body">
                                                        <?PHP
                                                        $video = "/gestion/assets/videos/" . str_pad($_REQUEST['idInmueble'], 8, "0", STR_PAD_LEFT) . ".mp4";
                                                        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $video)) { ?>

                                                            <form role="form" action="fn/abm_video.php" method="POST" enctype="multipart/form-data">
                                                                <div class="alert alert-light-warning color-warning"><i class="bi bi-exclamation-triangle"></i>
                                                                    Solo puede subir Videos en formato .mp4 <br>
                                                                    La carga del video puede demorar varios segundos depende del tamaño del mismo.
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Subir Video</label><br>
                                                                    <input type="file" name="video" id="video">
                                                                </div>

                                                                <div class="buttons">
                                                                    <input type="hidden" id="idInmueble" name="idInmueble" value="<?PHP echo $_REQUEST['idInmueble']; ?>" />
                                                                    <input type="hidden" id="abm" name="abm" value="m" />
                                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Cargar</button>
                                                                </div>
                                                            </form>
                                                        <?PHP } else { ?>
                                                            <div class="form-group">
                                                                <video width="auto" height="auto" controls poster="vistaprevia.jpg">
                                                                    <source src="<?PHP echo $video; ?>" type="video/mp4">
                                                                </video>
                                                            </div>
                                                            <a href='fn/abm_video.php?abm=b&idInmueble=<?PHP echo $_REQUEST['idInmueble']; ?>' class='btn btn-danger me-1 mb-1'><i class='fa-solid fa-trash-can'></i></i> Eliminar</a>
                                                        <?PHP }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <a href="inmueble_abm_mapa.php?idInmueble=<?PHP echo $_REQUEST['idInmueble']; ?>&abm=m" class="btn btn-outline-secondary me-1 mb-1">Ubicaci&oacute;n</a>
                                            <?PHP if (!empty($ubicacionInmueble)) { ?>
                                                <div id="myMap" name="myMap" style="height: 400px" required></div>
                                                <a href="https://www.google.com/maps?q=<?PHP echo $ubicacionInmueble; ?>&z=17&hl=es" target="_blank" class="btn btn-info me-1 mb-1">Ver en el Mapa</a>
                                            <?PHP } ?>
                                        </div>
                                    </div>
                                </div>
                            <?PHP } ?>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>&nbsp;Copyright <b>&copy; Esteban Costela <script>
                                    document.write(new Date().getFullYear());
                                </script></b></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="https://kit.fontawesome.com/1ffc2bde27.js" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/utils.js"></script>

    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <!-- image editor -->
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

    <!-- toastify -->
    <script src="assets/vendors/toastify/toastify.js"></script>

    <!-- filepond -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin="">
    </script>
    <!--script src="assets/js/mapview.js"></script-->


    <script>
        // register desired plugins...
        FilePond.registerPlugin(
            // validates the size of the file...
            FilePondPluginFileValidateSize,
            // validates the file type...
            FilePondPluginFileValidateType,

            // calculates & dds cropping info based on the input image dimensions and the set crop ratio...
            FilePondPluginImageCrop,
            // preview the image file type...
            FilePondPluginImagePreview,
            // filter the image file
            FilePondPluginImageFilter,
            // corrects mobile image orientation...
            FilePondPluginImageExifOrientation,
            // calculates & adds resize information...
            FilePondPluginImageResize,
        );

        // Filepond: Basic
        FilePond.create(document.querySelector('.basic-filepond'), {
            allowImagePreview: false,
            allowMultiple: false,
            allowFileEncode: false,
            required: false
        });

        // Filepond: Multiple Files
        FilePond.create(document.querySelector('.multiple-files-filepond'), {
            allowImagePreview: true,
            allowMultiple: true,
            allowFileEncode: false,
            required: false
        });

        // Filepond: With Validation
        FilePond.create(document.querySelector('.with-validation-filepond'), {
            allowImagePreview: false,
            allowMultiple: true,
            allowFileEncode: false,
            required: true,
            acceptedFileTypes: ['image/png'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: ImgBB with server property
        FilePond.create(document.querySelector('.imgbb-filepond'), {
            allowImagePreview: false,
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort) => {
                    // We ignore the metadata property and only send the file

                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);

                    const request = new XMLHttpRequest();
                    // you can change it by your client api key
                    request.open('POST', 'https://api.imgbb.com/1/upload?key=762894e2014f83c023b233b2f10395e2');

                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };

                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        } else {
                            error('oh no');
                        }
                    };

                    request.onreadystatechange = function() {
                        if (this.readyState == 4) {
                            if (this.status == 200) {
                                let response = JSON.parse(this.responseText);

                                Toastify({
                                    text: "Success uploading to imgbb! see console f12",
                                    duration: 3000,
                                    close: true,
                                    gravity: "bottom",
                                    position: "right",
                                    backgroundColor: "#4fbe87",
                                }).showToast();

                                console.log(response);
                            } else {
                                Toastify({
                                    text: "Failed uploading to imgbb! see console f12",
                                    duration: 3000,
                                    close: true,
                                    gravity: "bottom",
                                    position: "right",
                                    backgroundColor: "#ff0000",
                                }).showToast();

                                console.log("Error", this.statusText);
                            }
                        }
                    };

                    request.send(formData);
                }
            }
        });

        // Filepond: Image Preview
        FilePond.create(document.querySelector('.image-preview-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: Image Crop
        FilePond.create(document.querySelector('.image-crop-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: Image Exif Orientation
        FilePond.create(document.querySelector('.image-exif-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: true,
            allowImageCrop: false,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: Image Filter
        FilePond.create(document.querySelector('.image-filter-filepond'), {
            allowImagePreview: true,
            allowImageFilter: true,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            imageFilterColorMatrix: [
                0.299, 0.587, 0.114, 0, 0,
                0.299, 0.587, 0.114, 0, 0,
                0.299, 0.587, 0.114, 0, 0,
                0.000, 0.000, 0.000, 1, 0
            ],
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: Image Resize
        FilePond.create(document.querySelector('.image-resize-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            allowImageResize: true,
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            imageResizeMode: 'cover',
            imageResizeUpscale: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });
    </script>

    <script>
        const tilesProvider = "	https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"

        var latlng = "<?= $ubicacionInmueble ?>";
        console.log("Ubicacion: " + latlng);

        let coordenadas = latlng.split(',')
        let myMap = L.map('myMap').setView(coordenadas, 14)

        //let myMap = L.map('myMap').setView([-31.5373, -68.5251], 14)

        L.tileLayer(tilesProvider, {
            maxZoom: 18,
        }).addTo(myMap)

        let marker = L.marker(coordenadas).addTo(myMap)
    </script>

</body>

</html>