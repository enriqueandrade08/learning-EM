<?php 
include 'theme/menu.php'; 
include  'controller/CursosController.php';
$pagina = 'Crear Leccion';
establecerTitulo($pagina);
// Seguro para que solo entre el admin o user con privilegio 1
$usuarios = new UsuarioController();
$usuarios -> usuarioPrivilegios($_SESSION['Privilegio']);

$cursos = new CursosController();
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
                <input type="hidden" value="C" name="tipo">
                <div class="row">
                    <div class="col-md-6">
                        <label for="curso" class="form-label">Curso al que pertenece:<b style="color:red">*</b></label>  
                        <select class="form-select" name="curso" id="curso" required>
                            <option value="">Seleccione un curso</option>
                            <?php $cursos->cursosSelect(); ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                    <label for="nModulo" class="form-label">Numero del Modulo:<b style="color:red">*</b></label>  
                        <input type="number" class="form-control" placeholder="Numero del modulo" name="nModulo" id="nModulo" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="titulo" class="form-label">Titulo:<b style="color:red">*</b></label>  
                        <input type="text" class="form-control" placeholder="Titulo de la leccion" name="titulo" id="titulo" required>
                    </div>
                    <div class="col-md-6">
                        <label for="recurso" class="form-label">Recurso:<b style="color:red">*</b></label>  
                        <input type="text" class="form-control" placeholder="Link del recurso" name="recurso" id="recurso">
                    </div>
                </div>

                <div class="pt-3">
                    <label for="descripcion" class="form-label">Descripcion:<b style="color:red">*</b></label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="Escriba la leccion aqui" oninput="contCaracteres('descripcion','count')" required></textarea>
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