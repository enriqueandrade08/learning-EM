<?php 
include 'theme/header.php';
include './controller/UsuarioController.php';
include 'controller/ParametrosController.php';
$pagina = 'Registro';
establecerTitulo($pagina);
$logo = ParametrosController::logoUrl();
$fondo = ParametrosController::fondoLoginUrl();
?>   
<body class="" style="background-image:url('<?php echo $fondo?>');background-size: cover;">
    <div id="layoutAuthentication">
        <div class="mb-3" id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4"><img src="<?php echo $logo?>"  alt="" width="10%">Crear una Cuenta</h3></div>
                                <div class="card-body">
                                    <form action="controller/LoginController.php" method="POST">
                                        <input type="hidden" name="tipo" value="C">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre" />
                                                    <label for="nombre">Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" name="apellido" id="apellido" type="text" placeholder="Apellido" />
                                                    <label for="apellido">Apellido</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="correo" id="correo" type="email" placeholder="name@example.com" />
                                            <label for="correo">Email</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="pass" id="pass" type="password" placeholder="Create a password" />
                                                    <label for="pass">contraseña</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="pass2" id="pass2" type="password" placeholder="Confirm password" />
                                                    <label for="pass2">Confirma la Contraseña</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="fecha" id="fecha" type="date" placeholder="Intro your birthday" />
                                                    <label for="fecha">Fecha de Nacimiento</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-select" name="nacionalidad" id="nacionalidad">
                                                        <option value="">Seleccione su nacionalidad</option>
                                                        <?php UsuarioController::nacionalidad();?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-block">Crear Cuenta</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        <a href="login.html">Have an account? Go to login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    <div id="layoutAuthentication_footer">
<?php include 'theme/footer.php'?>
