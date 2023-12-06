<?php
include 'theme/menu.php';
include  'controller/CursosController.php';
$pagina = 'Vista Previa Curso';

establecerTitulo($pagina);
// Seguro para que solo entre el admin o user con privilegio 1
$usuarios = new UsuarioController();
$usuarios->usuarioPrivilegios($_SESSION['Privilegio']);

$cursos = new CursosController();
?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $pagina ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><?php echo $pagina ?></li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="curso" class="form-label">Curso al que pertenece:<b style="color:red">*</b></label>
                    <select class="form-select" name="curso" id="curso" onchange="cargarCurso()" required>
                        <option value="">Seleccione un curso</option>
                        <?php $cursos->cursosSelect(); ?>
                    </select>
                </div>
            </div>
            <div class="resp" id="resp"></div>
        </div>
    </div>
</div>
<script src="js/cursosAdmin.js"></script>
<?php include 'theme/footer.php'; ?>