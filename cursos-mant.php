<?php 
include 'theme/menu.php'; 
include 'controller/CursosController.php';
include 'controller/CursosRegistroController.php';
$pagina = 'Mantenimiento Cursos';
establecerTitulo($pagina);
// Seguro para que solo entre el admin o user con privilegio 1
$usuarios = new UsuarioController();
$usuarios -> usuarioPrivilegios($_SESSION['Privilegio']);
?>            
<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $pagina ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><?php echo $pagina ?></li>
    </ol>

    <div class="mb-2">
        <a href="cursos-crear.php" class="btn btn-primary btn-xs">
            Crear Curso <i class="fa-solid fa-circle-plus"></i>
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <table id='datatablesSimple'>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Fecha de creacion</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $cursos = new CursosController();
                        $cursos -> cursosMant();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="js/admin.js"></script>
<?php include 'theme/footer.php'; ?>
<?php  if (isset($_GET['m'])) {mensaje($_GET['m']) ;} ?>