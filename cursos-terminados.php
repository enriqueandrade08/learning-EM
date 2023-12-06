<?php
include 'theme/menu.php';
include 'controller/InscritoController.php';
$pagina = 'Cursos Completado';
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
            <?php
            $inscrito = new InscritoController();
            $inscrito->cursosCompletados($_SESSION['Usuario']);
            ?>
        </div>
    </div>
</div>
<script src="js/estudiantes.js"></script>
<?php include 'theme/footer.php'; ?>