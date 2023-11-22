<?php 
include 'theme/menu.php'; 
include  'controller/LeccionesController.php';
include 'controller/LeccionesRegistroController.php';
$pagina = 'Mantenimiento Lecciones';
establecerTitulo($pagina);
// Seguro para que solo entre el admin o user con privilegio 1
$usuarios = new UsuarioController();
$usuarios -> usuarioPrivilegios($_SESSION['Privilegio']);

$lecciones = new LeccionesController();
?>            
<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $pagina ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><?php echo $pagina ?></li>
    </ol>

    <div class="mb-2">
        <a href="lecciones-crear.php" class="btn btn-primary btn-xs">
            Crear Curso <i class="fa-solid fa-circle-plus"></i>
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <table id='datatablesSimple'>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Curso</th>
                        <th>N Modulo </th>
                        <th>Titulo</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $lecciones -> leccionesMant();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="js/admin.js"></script>
<?php include 'theme/footer.php'; ?>
<?php  if (isset($_GET['m'])) {mensaje($_GET['m']) ;} ?>