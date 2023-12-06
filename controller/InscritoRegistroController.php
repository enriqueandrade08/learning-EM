<?php
// $tipo = C crear, R read, U Update, D delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tipo'])) {
        // Inicio sesion para obtener el id del user
        session_start();
        // Incluyo el modelo a donde se procesaran los datos
        include "../model/InscritoModel.php";
        $tipo = $_POST['tipo'];
        switch ($tipo) {
            case 'C':
                $usuario = $_SESSION['Usuario'];
                $curso = $_POST['cod'];
                // Hacemos el Insert 
                $insert = InscritoModel::insertarInscrito($usuario, $curso);
                // Manejamos la respuesta
                if ($insert == 0) {
                    // Curso Insertado Correctamente
                    $respuesta = "insCorr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../cursos-inscritos.php?m=' . $encryp);
                } else {
                    // Error al insertar curso
                    $respuesta = "insErr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../cursos-inscritos.php?m=' . $encryp);
                }
                exit;

                break;
            case 'R':

                break;
            case 'U':/*
                // Proceso para crear nuevo curso
                // Limpio las variables de html
                $codigo = strip_tags($_POST['cod']);
                $nombre = strip_tags($_POST['nombre']);
                $descripcion = strip_tags($_POST['descripcion']);
                $imagen = strip_tags($_POST['imagen']);
                // Hacemos el update
                $cont = CursosModel::actualizarCurso($codigo, $nombre, $descripcion, $imagen);
                // Manejamos la respuesta
                if ($cont !== false) {
                    // Exito al actualizar
                    $respuesta = "updCursoCorr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../cursos-mant.php?m=' . $encryp);
                } else {
                    // Error al actualizar
                    $respuesta = "updCursoErr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../cursos-mant.php?m=' . $encryp);
                }*/
                break;
            default:
                # code...
                break;
        }
    }
}
// Mensajes de respuestas para el login
function mensaje($mensaje)
{
    $txt = base64_decode($mensaje);
    switch ($txt) {
        case 'insCorr':
            echo '<script>swal.fire({
                title: "Curso Insertado",
                text: "Te has incrito en un nuevo curso de manera correcta",
                icon: "success"
              });</script>';
            # code...
            break;
        case 'insErr':
            echo '<script>swal.fire({
                title: "Error al Crear",
                text: "Ha habido un error al inscribirse en el curso. Intente nuevamente",
                icon: "error"
                });</script>';
            break;
        default:
            # code...
            break;
    }
}
