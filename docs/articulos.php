<?PHP
session_start();
include('fn/login_ctrl.php');
include('fn/list_opciones.php');
include('fn/list_articulos.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion - Inmuebles</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

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
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Articulos</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="buttons">
                                            <a href="articulo_abm.php?abm=a" class="btn btn-outline-success">Nuevo Articulo</a>
                                        </div>
                                        <?PHP echo $listado; ?>
                                    </div>
                                </div>
                            </div>
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

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="https://kit.fontawesome.com/1ffc2bde27.js" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>