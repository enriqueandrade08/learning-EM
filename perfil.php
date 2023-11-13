<?php 
include 'theme/menu.php'; 
include 'controller/LoginController.php';
$pagina = 'Editar Perfil';
establecerTitulo($pagina);
// Datos del usuario
$usuario = UsuarioController::extraerUsuarioDetalle($_SESSION['Usuario']);
// Codigo del usuario encriptado
$codigoUser = base64_encode($_SESSION['Usuario']);
?>      

<div class="container-fluid px-4">
    <h1 class="mt-4">Datos del Perfil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Perfil</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="controller/LoginController.php" method="post" id="fperfil">
                <input type="hidden" value="<?php echo $codigoUser ?>" name="cod">
                <input type="hidden" value="U" name="tipo">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre:</label>  
                        <input type="text" class="form-control" placeholder="" name="nombre" id="nombre" value="<?php echo $usuario['nombre']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" placeholder="" name="apellido" id="apellido" value="<?php echo $usuario['apellido']?>">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-6">
                        <label for="nacionalidad" class="form-label">Nacionalidad:</label>  
                        <input type="text" class="form-control" placeholder="" name="nacionalidad" id="nacionalidad" value="<?php echo $usuario['nacionalidad']?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="fecha" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" placeholder="" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $usuario['fnacimiento']?>" disabled>
                    </div>
                </div>
                <div class="row pt-2 align-items-end">
                    <div class="col-md-6">
                        <label for="correo" class="form-label">Correo:</label>  
                        <input type="text" class="form-control" placeholder="" name="correo" id="correo" value="<?php echo $usuario['correo']?>" disabled>
                    </div>
                    <div class="col-md-6 mt-2">
                        <button type="button" class="btn btn-primary btn-block" id="btnCon" onclick="addCamposPass()">Cambiar Contraseña</button>
                    </div>
                </div>
                <div class="row pt-2" id="divPass"></div>
                <div class="row pt-3">
                    <div>
                        <button type="submit" class="btn btn-success" id="btnSave" onclick="valCon(event)">Guardar Cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/main.js"></script>
<?php include 'theme/footer.php'; ?>
<?php  if (isset($_GET['m'])) {mensaje($_GET['m']) ;} ?>