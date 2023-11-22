<?php 
include 'theme/menu.php'; 
include 'controller/LeccionesController.php';
$pagina = 'Editar Lecciones';
establecerTitulo($pagina);
// Seguro para que solo entre el admin o user con privilegio 1
$usuarios = new UsuarioController();
$usuarios -> usuarioPrivilegios($_SESSION['Privilegio']);

if (!isset($_POST['cod'])) {
    echo "<script>location.href ='cursos-mant.php';</script>";
}

$leccion = LeccionesController::leccionesEditar($_POST['cod']);
?>            
<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $pagina ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="lecciones-mant.php">Mantenimiento</a></li>
        <li class="breadcrumb-item active"><?php echo $pagina ?></li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
        <form action="controller/LeccionesRegistroController.php" method="post">
                <input type="hidden" value="U" name="tipo">
                <input type="hidden"  name="cod" id="cod" value="<?php echo $leccion['idLeccion']?>" readonly>

                <div class="row">
                    <div class="col-md-6">
                        <label for="codigo" class="form-label">Codigo:<b style="color:red">*</b></label>  
                        <input type="text" class="form-control"  name="codigo" id="codigo" value="<?php echo $leccion['idLeccion']?>" readonly disabled>
                    </div>
                    <div class="col-md-6">
                    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="curso" class="form-label">Curso al que pertenece:<b style="color:red">*</b></label>  
                        <input type="text" class="form-control"  name="curso" id="curso" value="<?php echo $leccion['nombreCurso']?>" readonly disabled>
                    </div>
                    <div class="col-md-6">
                    <label for="nModulo" class="form-label">Numero del Modulo:<b style="color:red">*</b></label>  
                        <input type="number" class="form-control" placeholder="Numero del modulo" name="nModulo" id="nModulo" value="<?php echo $leccion['numeroModulo']?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="titulo" class="form-label">Titulo:<b style="color:red">*</b></label>  
                        <input type="text" class="form-control" placeholder="Titulo de la leccion" name="titulo" id="titulo" value="<?php echo $leccion['titulo']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="recurso" class="form-label">Recurso:</label>  
                        <input type="text" class="form-control" placeholder="Link del recurso" name="recurso" id="recurso" value="<?php echo $leccion['Recurso']?>">
                    </div>
                </div>

                <div class="pt-3">
                    <label for="descripcion" class="form-label">Descripcion:<b style="color:red">*</b></label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="Escriba la leccion aqui" oninput="contCaracteres('descripcion','count')" required><?php echo $leccion['descripcion']?></textarea>
                    <div id="count"></div>
                </div>
                <div class="row pt-3">
                    <div>
                        <button type="submit" class="btn btn-success" id="btnSave">Guardar Cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/main.js"></script>
<?php include 'theme/footer.php'; ?>