<?php 
include 'theme/menu.php'; 
$pagina = 'Mantenimiento Usuarios';
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
    <div class="card mb-4">
        <div class="card-body">
            <table id='datatablesSimple'>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Fecha de creacion</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $usuarios->usuariosMant();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'theme/footer.php'; ?>