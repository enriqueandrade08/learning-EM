<?php
include 'theme/menu.php';
$pagina = 'Reportes';
establecerTitulo($pagina);
// Seguro para que solo entre el admin o user con privilegio 1
$usuarios = new UsuarioController();
$usuarios->usuarioPrivilegios($_SESSION['Privilegio']);
?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $pagina ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><?php echo $pagina ?></li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <div class='col'>
                    <div class='card'>
                        <img src='https://cdn4.iconfinder.com/data/icons/education-3-13/65/107-256.png' style="height: auto; width: 150px; margin:auto;" class='card-img-top img-fluid'>
                        <div class='card-body text-center'>
                            <h6 class='card-title'>Estudiantes Por curso</h6>
                            <button class='btn btn-primary' onclick="obtCodigoTitulo(1,'reporte-detalle.php','Estudiante por Curso')">Ver Detalle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/admin.js"></script>
<?php include 'theme/footer.php'; ?>