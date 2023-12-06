<?php
include 'theme/menu.php';
include 'controller/CursosController.php';
$pagina = 'Cursos Disponibles';
establecerTitulo($pagina);

?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $pagina ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><?php echo $pagina ?></li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <?php $cursos = new CursosController();
            $cursos->cursosAgregar($_SESSION['Usuario']);
            ?>
        </div>
    </div>
</div>
<script src="js/estudiantes.js"></script>
<?php include 'theme/footer.php'; ?>