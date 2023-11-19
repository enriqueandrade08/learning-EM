<?php
// $tipo = C crear, R read, U Update, D delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tipo'])) {
        // Incluyo el modelo a donde se procesaran los datos
        include "../model/UsuarioModel.php";
        $tipo = $_POST['tipo'];
        switch ($tipo) {
            case 'C':
                // Proceso para crear nuevo usuario
                // Limpio las variables de html
                $nombre = strip_tags($_POST['nombre']);
                $apellido = strip_tags($_POST['apellido']);
                $correo = strip_tags($_POST['correo']);
                $pass = strip_tags($_POST['pass']);
                $fecha = strip_tags($_POST['fecha']);
                $nacionalidad = strip_tags($_POST['nacionalidad']);
                // Hacemos el Insert 
                $cont = UsuarioModel::insertUser($nombre,$apellido,$correo,$pass,$fecha,$nacionalidad);
                // Manejamos la respuesta
                if ($cont == 1) {
                    // Correo existente
                    $respuesta = "corrEx";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../login.php?m='.$encryp);
                }else {
                    // Exito en insertar Usuario
                    header('Location: ../admin.php');
                }
                exit;

                break;
            case 'R':
                // Proceso de login para verificar user
                $correo = strip_tags($_POST['correo']);
                $pass = strip_tags($_POST['pass']);
                $cont = UsuarioModel::login($correo,$pass);
                if ($cont==1) {
                    // login completado con exito
                    header('Location: ../admin.php');
                }else{
                    if ($cont == -1) {
                        // Correo Incorrecto
                        $respuesta = "corrInc";
                        $encryp = base64_encode($respuesta);
                    header('Location: ../login.php?m='.$encryp);
                    }
                    else{
                        // Contraseña incorrecta
                        $respuesta = "passInc";
                        $encryp = base64_encode($respuesta);
                    header('Location: ../login.php?m='.$encryp);
                    }
                }
                break;
            case 'U':
                // Actualizar los datos del usuario
                // Recibo y limpio variables
                $cod = base64_decode($_POST["cod"]);
                $nombre = strip_tags($_POST['nombre']);
                $apellido = strip_tags($_POST['apellido']);
                $pass1 = strip_tags($_POST['pass1']);
                $pass2 = strip_tags($_POST['pass2']);
                
                $cont = UsuarioModel::updUser($cod, $nombre, $apellido, $pass1);
                if ($cont !== false) { 
                    // Exito al actualizar
                    $respuesta = "userAct";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../perfil.php?m='.$encryp);
                }else {
                    // Error al actualizar
                    $respuesta = "userErr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../perfil.php?m='.$encryp);
                }
                break;
            default:
                # code...
                break;
        }
    }
}
// Mensajes de respuestas para el login
function mensaje($mensaje){
    $txt = base64_decode($mensaje);
    switch ($txt) {
        case 'corrEx':
            echo '<script>swal.fire({
                title: "Correo invalido",
                text: "Este correo ya esta registrado en nuestra plataforma, por favor inicie sesión acá",
                icon: "error"
              });</script>';
            break;
        case 'corrInc':
            echo '<script>swal.fire({
                title: "Correo invalido",
                text: "Este correo no existe entre nuestros alumnos",
                icon: "error"
              });</script>';
            break;
        case 'passInc':
            echo '<script>swal.fire({
                title: "Contraseña Incorrecta",
                text: "La contraseña que estas ingresando no es valida para esta cuenta de correo",
                icon: "error"
                });</script>';
            break;
        case 'userAct':
            echo '<script>swal.fire({
                title: "Usuario Actualizado",
                text: "Los datos del usuario han sido actualizados de forma correcta",
                icon: "success"
              });</script>';
            # code...
            break;
        case 'userErr':
            echo '<script>swal.fire({
                title: "Error al Actualizar",
                text: "Ha habido un error al momento de actualizar los datos",
                icon: "error"
                });</script>';
            break;
        case 'userNoPass':
            echo '<script>swal.fire({
                title: "Error al Actualizar",
                text: "Las contraseñas no coinciden ",
                icon: "error"
                });</script>';
            break;
        default:
            # code...
            break;
    }
}
// Redireccion si ya el usuario esta loggeado
function verificarLogin(){
    // Si ya esta loggeado
    session_start();
    if (isset($_SESSION['Usuario'])) {
        header("Location: admin.php");
    }
}