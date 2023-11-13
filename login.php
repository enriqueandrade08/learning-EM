<?php 
include 'theme/header.php'; 
include 'controller/LoginController.php';
include 'controller/ParametrosController.php';
$pagina = 'Login';
establecerTitulo($pagina);
// Redireccion en caso de que este loggeado
verificarLogin();
// Contiene img de la app
$logo = ParametrosController::logoUrl();
$fondo = ParametrosController::fondoLoginUrl();
?>   
<body class="" style="background-image:url('<?php echo $fondo?>');background-size: cover;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <div class="">                                            
                                        <h1 class=" my-4"><img src="<?php echo $logo?>"  alt="" width="30%">Learning-EM</h1>                                       
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="controller/LoginController.php" method="POST">
                                        <input type="hidden" name="tipo" value="R">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="correo" name="correo" type="email" placeholder="name@example.com" />
                                            <label for="correo">Correo Electronico</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="pass" name="pass" type="password" placeholder="Password" />
                                            <label for="pass">Contreaseña</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="mailto:20180505@miucateci.edu.do">¿Olvidaste tu Contraseña?</a>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.php">¿Necesitas una cuenta? Registrate aqui</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
<?php include 'theme/footer.php' ?>
<?php  if (isset($_GET['m'])) {mensaje($_GET['m']) ;} ?>