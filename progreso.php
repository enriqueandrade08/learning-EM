<?php
include 'theme/menu.php';
include 'controller/InscritoRegistroController.php';
include 'controller/InscritoController.php';
$pagina = 'Mis Cursos';
establecerTitulo($pagina);
?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $pagina ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><?php echo $pagina ?></li>
    </ol>

    <div class="mb-2">
        <a href="cursos-agregar.php" class="btn btn-primary btn-xs">
            Agregar Curso <i class="fa-solid fa-circle-plus"></i>
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <?php
            $inscrito = new InscritoController();
            $inscrito->cursosInscritosProgresoMostrar($_SESSION['Usuario']);
            ?>
        </div>
    </div>
</div>
<script src="js/estudiantes.js"></script>
<?php include 'theme/footer.php'; ?>
<?php if (isset($_GET['m'])) {
    mensaje($_GET['m']);
} ?>