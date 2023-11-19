<?php 
include 'theme/menu.php'; 
$pagina = 'Crear Curso';
establecerTitulo($pagina);
// Seguro para que solo entre el admin o user con privilegio 1
$usuarios = new UsuarioController();
$usuarios -> usuarioPrivilegios($_SESSION['Privilegio']);
?>            
<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $pagina ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="cursos-mant.php">Mantenimiento</a></li>
        <li class="breadcrumb-item active"><?php echo $pagina ?></li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
        <form action="controller/CursosRegistroController.php" method="post">
                <input type="hidden" value="C" name="tipo">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre del Curso:<b style="color:red">*</b></label>  
                        <input type="text" class="form-control" placeholder="Nombre del curso" name="nombre" id="nombre" required>
                    </div>
                    <div class="col-md-6">
                    <label for="imagen" class="form-label">Link de la Imagen:<b style="color:red">*</b></label>  
                        <input type="text" class="form-control" placeholder="Nombre del curso" name="imagen" id="imagen" required>
                    </div>
                </div>
                <div class="pt-3">
                    <label for="descripcion" class="form-label">Descripcion:<b style="color:red">*</b></label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="Escriba una breve descripcion sobre que se busca con el curso" maxlength="500" oninput="contCaracteres('descripcion','count',500)" required></textarea>
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