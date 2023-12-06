<?php
if (!$_POST['cod']) {
    echo "<script>window.location.href='reportes.php'</script>";
}
include 'theme/menu.php';
$pagina = $_POST['titulo'];
$tipoReporte = $_POST['cod'];
establecerTitulo($pagina);
// Seguro para que solo entre el admin o user con privilegio 1
$usuarios = new UsuarioController();
$usuarios->usuarioPrivilegios($_SESSION['Privilegio']);
?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $pagina ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="reportes.php">Reportes</a></a></li>
        <li class="breadcrumb-item active"><?php echo $pagina ?></li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <?php
            switch ($tipoReporte) {
                case 1:
                    require_once './controller/InscritoController.php';
                    $inscrito = new InscritoController();
                    $inscrito->mostrarEstudiantesporCurso();
                    break;
                default:
                    # code...
                    break;
            }
            ?>
        </div>
    </div>
</div>
<script src="js/admin.js"></script>
<?php include 'theme/footer.php'; ?>