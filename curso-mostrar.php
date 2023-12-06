<?php
include 'theme/menu.php';
include  'controller/CursosController.php';
$pagina = 'Vista Curso';

establecerTitulo($pagina);
$cursos = new CursosController();
?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $pagina ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><?php echo $pagina ?></li>
    </ol>
    <p><b>Leyenda:</b> Leccion aprobada&nbsp;<i class="fa-solid fa-check " style="color: #008000;"></i>|&nbsp;Leccion Incompleta&nbsp;<i class="fa-solid fa-xmark " style="color: #ff0006;"></i></p>
    <input type="hidden" name="curso" id="curso" value="<?php echo $_POST['cod'] ?>">
    <input type="hidden" name="inscrito" id="inscrito" value="<?php echo $_POST['inscrito'] ?>">
    <div class="card mb-4">
        <div class="card-body">
            <div id="resp"></div>
        </div>
    </div>
</div>
<script src="js/estudiantes.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        cargarCursoEst();
    });
</script>
<?php include 'theme/footer.php'; ?>