<?php
include './controller/CursosController.php';
include './controller/LeccionesController.php';
include './controller/EjerciciosController.php';
$priv = $_SESSION['Privilegio'];
$usuario = new UsuarioController();
$cursos = new CursosController();
$lecciones = new LeccionesController();
$ejercicios = new EjerciciosController();
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h2>Usuarios</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <p class="text-center"><?php $usuario->mostrarCantUser($priv) ?></p>
                    <a class="small text-white stretched-link" href="usuarios-mant.php"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h2>Cursos</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <p class="text-center"><?php $cursos->mostrarCantidadCursos() ?></p>
                    <a class="small text-white stretched-link" href="cursos-mant.php"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h2>Lecciones</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <p class="text-center"><?php $lecciones->mostrarCantidadLecciones() ?></p>
                    <a class="small text-white stretched-link" href="lecciones-mant.php"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h2>Ejercicios</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <p class="text-center"><?php $ejercicios->mostrarCantidadEjercicios() ?></p>
                    <a class="small text-white stretched-link" href="ejercicios-mant.php"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Estudiantes por curso
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
</div>
<script src="assets/demo/chart-bar-demo.js"></script>