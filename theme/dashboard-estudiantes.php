<?php
include './controller/CursosController.php';
include './controller/InscritoController.php';
$cursos = new CursosController();
$inscrito = new InscritoController();
?><div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h3>Cursos Disponibles</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <p class="text-center"><b><?php $cursos->mostrarCantidadCursos() ?></b></p>
                    <a class="small text-white stretched-link" href="cursos-agregar.php"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h3>Cursos Inscritos</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <p class="text-center"><b><?php $inscrito->extraerCantCursosInscritos($_SESSION['Usuario']) ?></b>
                        <a class="small text-white stretched-link" href="cursos-inscritos.php"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h2>Diplomas</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <p class="text-center"><b><?php $inscrito->mostrarCantCursosCompletos($_SESSION['Usuario']) ?></b></p>
                    <a class="small text-white stretched-link" href="cursos-terminados.php"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <a href="cursos-agregar.php" style="text-decoration: none; color:#000000" title="Ver todos los cursos">Ultimos Cursos Agregados <i class="fa-solid fa-arrow-right" style="color: #000000;"></i></a>
            </div>
            <div class="card-body">
                <?php $cursos->cursosAgregarlimit3($_SESSION['Usuario']) ?>
            </div>
        </div>
    </div>
</div>
<script src="js/estudiantes.js"></script>
<script src="assets/demo/chart-area-demo.js"></script>