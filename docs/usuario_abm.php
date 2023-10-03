<?PHP
session_start();
include('fn/login_ctrl.php');
include('fn/datos_usuario.php')
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

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
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

                        <li class="sidebar-itemhas-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-house"></i>
                                <span>Inmuebles</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="inmuebles.php">Inmuebles</a>
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

                        <!-- Seccion que solo se habilita si el ROL del Usuario es Administrador -->
                        <?PHP if ($_SESSION['rolUsu'] == '1') { ?>
                            <li class="sidebar-item   active has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-person-badge-fill"></i>
                                    <span>Permisos</span>
                                </a>
                                <ul class="submenu active">
                                    <li class="submenu-item active">
                                        <a href="usuarios.php"><i class="fa-solid fa-circle-chevron-right"></i>&nbsp;Usuarios</a>
                                    </li>
                                </ul>
                            </li>
                        <?PHP } else { ?>
                            <li class="sidebar-item active has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-person-badge-fill"></i>
                                    <span>Perfil</span>
                                </a>
                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <a href="usuario_abm.php?idUsuario=<?PHP echo $_SESSION['idUsu']; ?>&abm=m">Mis Datos</a>
                                    </li>
                                </ul>
                            </li>
                        <?PHP } ?>

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
                                        <h4><?PHP if ($_SESSION['rolUsu'] == '1') {
                                                echo "Datos del Usuario";
                                            } else {
                                                echo "Mis Datos";
                                            } ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?PHP if ($_REQUEST['abm'] == 'b') { ?>
                                            <div class="alert alert-danger"><i class="bi bi-exclamation-triangle"></i> Baja Usuario</div>
                                        <?PHP } ?>
                                        <div class="row">
                                            <form action="fn/abm_usuarios.php" method="GET">
                                                <div class="col-md-8">

                                                    <?PHP if ($_REQUEST['abm'] == 'b') {
                                                        $disabled = "disabled";
                                                    } else {
                                                        $disabled = "";
                                                    } ?>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Usuario</b></label>
                                                        <input type="text" class="form-control" id='uidUsuario' name='uidUsuario' <?PHP echo $disabled; ?> placeholder="Usuario" value='<?PHP echo $uidUsuario; ?>' onKeyUp="this.value=this.value.toLowerCase();" require>
                                                    </div>
                                                    <?PHP if ($_REQUEST['abm'] == 'a') { ?>
                                                        <div class="form-group">
                                                            <label for="basicInput"><b>Contraseña</b></label>
                                                            <input type="password" class="form-control" id='pswUsuario' name='pswUsuario' placeholder="Contraseña" value='<?PHP echo $pswUsuario; ?>' onKeyUp="this.value=this.value.toLowerCase();" require>
                                                        </div>
                                                    <?PHP } ?>
                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Nombre y Apellido</b></label>
                                                        <input type="text" class="form-control" id='nombreUsuario' name='nombreUsuario' <?PHP echo $disabled; ?> placeholder="Nombre y Apellido" value='<?PHP echo $nombreUsuario; ?>' require>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Matrícula</b></label>
                                                        <input type="number" class="form-control" id='matriculaUsuario' name='matriculaUsuario' <?PHP echo $disabled; ?> placeholder="Matricula" value='<?PHP echo $matriculaUsuario; ?>' require>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Mail</b></label>
                                                        <input type="text" class="form-control" id='mailUsuario' name='mailUsuario' <?PHP echo $disabled; ?> placeholder="Mail" value='<?PHP echo $mailUsuario; ?>' require>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Teléfono</b></label>
                                                        <input type="number" class="form-control" id='telefonoUsuario' name='telefonoUsuario' <?PHP echo $disabled; ?> placeholder="Teléfono" value='<?PHP echo $telefonoUsuario; ?>'>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput"><b>Domicilio</b></label>
                                                        <input type="text" class="form-control" id='telefonoUsuario' name='domicilioUsuario' <?PHP echo $disabled; ?> placeholder="Domicilio" value='<?PHP echo $domicilioUsuario; ?>'>
                                                    </div>


                                                    <?PHP if ($_REQUEST['abm'] == 'm') { ?>
                                                        <div class="form-group">
                                                            <a href="usuario_psw.php?idUsuario=<?PHP echo $_REQUEST['idUsuario']; ?>&abm=p" class="btn btn-info me-1 mb-1">Cambiar Contraseña</a>
                                                        </div>
                                                    <?PHP } ?>
                                                </div>

                                                <div class="buttons">
                                                    <?PHP if ($_SESSION['rolUsu'] == '1') {
                                                        $return = "usuarios.php";
                                                    } else {
                                                        $return = "index.php";
                                                    } ?>
                                                    <input type="hidden" id="idUsuario" name="idUsuario" value="<?PHP echo $_REQUEST['idUsuario']; ?>" />
                                                    <input type="hidden" id="abm" name="abm" value="<?PHP echo $_REQUEST['abm']; ?>" />
                                                    <?PHP if ($_REQUEST['abm'] == 'b') { ?>
                                                        <button type="submit" class="btn btn-danger me-1 mb-1">Eliminar</button>
                                                    <?PHP } else { ?>
                                                        <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                                                    <?PHP } ?>
                                                    <a href="<?PHP echo $return; ?>" class="btn btn-warning me-1 mb-1">Cancelar</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?PHP if ($_REQUEST['abm'] == 'm') { ?>
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Logo del Corredor</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <img class="img-fluid w-100" src="<?PHP echo $imagen; ?>" alt="<?PHP echo $nombre; ?>">
                                                <?PHP if (!empty($nombre)) { ?>
                                                    <div class="form-group">
                                                        <br>
                                                        <a href='fn/abm_usuarios.php?abm=x&idUsuario=<?PHP echo $_REQUEST['idUsuario']; ?>&logoUsuario=<?PHP echo $nombre; ?>' class='btn btn-danger me-1 mb-1'><i class='fa-solid fa-trash-can'></i></i> Eliminar</a>
                                                    </div>
                                                <?PHP } else { ?>
                                                    <form role="form" action="fn/abm_usuarios.php" method="POST" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label>Subir Im&aacute;gen</label><br>
                                                            <input type="file" name="imagen" id="imagen">
                                                        </div>
                                                        <div class="buttons">
                                                            <input type="hidden" id="idUsuario" name="idUsuario" value="<?PHP echo $_REQUEST['idUsuario']; ?>" />
                                                            <input type="hidden" id="abm" name="abm" value="i" />
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">Guardar Imagen</button>
                                                        </div>
                                                    </form>
                                                <?PHP } ?>
                                            </div>
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
</body>

</html>