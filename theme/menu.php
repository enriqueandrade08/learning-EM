<?php 
include 'controller/ParametrosController.php';
include 'controller/UsuarioController.php';
include 'header.php';
// Comprobar si esta loggeado
session_start();
if (!$_SESSION['Usuario']) {
    header("Location: login.php");
}
// Logo
$logo = ParametrosController::logoUrl();
$nombre = UsuarioController::extraerNombreMenu($_SESSION['Usuario']);
?>
</head>
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="admin.php"><img src="<?php echo $logo?>"  alt="" width="20%">Learning-EM</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $nombre?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="perfil.php"><i class="fa-solid fa-user"></i>Perfil</a></li>
                        <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-circle-question"></i>¿Necesitas ayuda?</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menú</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">Mi progreso</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Mis cursos 
                            </a>

                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-award fa-lg"></i></div>
                                Diplomas
                            </a>

                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-flag-checkered"></i></div>
                                Progreso
                            </a>

                            <div class="sb-sidenav-menu-heading">Plataforma</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-plus"></i></div>
                                Añadir cursos
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesion Iniciada:</div>
                            <i class="fas fa-user fa-fw"></i> <?php echo $nombre?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
    
