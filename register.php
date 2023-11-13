<?php 
include 'theme/header.php';
include './controller/UsuarioController.php';
include 'controller/ParametrosController.php';
include 'controller/LoginController.php';
$pagina = 'Registro';
establecerTitulo($pagina);
// Verificar si el usuario esta loggeado
verificarLogin();
// Imagenes necesarias para la app
$logo = ParametrosController::logoUrl();
$fondo = ParametrosController::fondoLoginUrl();
?> 
<script src="js/login.js"></script>
<body class="" style="background-image:url('<?php echo $fondo?>');background-size: cover;">
    <div id="layoutAuthentication">
        <div class="mb-3" id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4"><a href="login.php"><img src="<?php echo $logo?>"  alt="" width="10%"></a>Crear una Cuenta</h3></div>
                                <div class="card-body">
                                    <form action="controller/LoginController.php" method="POST" id="formaRegis" onsubmit="return valCon()">
                                        <input type="hidden" name="tipo" value="C">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre" required/>
                                                    <label for="nombre">Nombre<b style="color:red">*</b></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" name="apellido" id="apellido" type="text" placeholder="Apellido" required/>
                                                    <label for="apellido">Apellido<b style="color:red">*</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="correo" id="correo" type="email" placeholder="name@example.com" required/>
                                            <label for="correo">Email<b style="color:red">*</b></label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="pass" id="pass" type="password" placeholder="Create a password" required/>
                                                    <label for="pass">contraseña<b style="color:red">*</b></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="pass2" id="pass2" type="password" placeholder="Confirm password" required/>
                                                    <label for="pass2">Confirma la Contraseña<b style="color:red">*</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="fecha" id="fecha" type="date" placeholder="Intro your birthday" required/>
                                                    <label for="fecha">Fecha de Nacimiento<b style="color:red">*</b></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-select" name="nacionalidad" id="nacionalidad" required>
                                                        <option value="">Seleccione su nacionalidad<b style="color:red">*</b></option>
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
                                        <a href="login.php">¿Tienes una cuenta? click aqui para iniciar sesión</a>
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
