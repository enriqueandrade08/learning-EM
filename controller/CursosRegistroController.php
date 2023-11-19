<?php
// $tipo = C crear, R read, U Update, D delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tipo'])) {
        // Incluyo el modelo a donde se procesaran los datos
        include "../model/CursosModel.php";
        $tipo = $_POST['tipo'];
        switch ($tipo) {
            case 'C':
                // Proceso para crear nuevo curso
                // Limpio las variables de html
                $nombre = strip_tags($_POST['nombre']);
                $descripcion = strip_tags($_POST['descripcion']);
                $imagen = strip_tags($_POST['imagen']);
                // Hacemos el Insert 
                $insert = CursosModel::insertarCurso($nombre,$descripcion,$imagen);
                // Manejamos la respuesta
                if ($insert) {
                    // Curso Insertado Correctamente
                    $respuesta = "insCursoCorr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../cursos-mant.php?m='.$encryp);
                }else {
                    // Error al insertar curso
                    $respuesta = "insCursoErr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../cursos-mant.php?m='.$encryp);
                }
                exit;

                break;
            case 'R':
               
                break;
            case 'U':
                // Proceso para crear nuevo curso
                // Limpio las variables de html
                $codigo = strip_tags($_POST['cod']);
                $nombre = strip_tags($_POST['nombre']);
                $descripcion = strip_tags($_POST['descripcion']);
                $imagen = strip_tags($_POST['imagen']);
                // Hacemos el update
                $cont = CursosModel::actualizarCurso($codigo,$nombre,$descripcion,$imagen);
                // Manejamos la respuesta
                if ($cont !== false) { 
                    // Exito al actualizar
                    $respuesta = "updCursoCorr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../cursos-mant.php?m='.$encryp);
                }else {
                    // Error al actualizar
                    $respuesta = "updCursoErr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../cursos-mant.php?m='.$encryp);
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
        case 'insCursoCorr':
            echo '<script>swal.fire({
                title: "Curso Insertado",
                text: "El curso se ha insertado de manera correcta",
                icon: "success"
              });</script>';
            # code...
            break;
        case 'insCursoErr':
            echo '<script>swal.fire({
                title: "Error al Crear",
                text: "Ha habido un error al momento de crear el curso. Intente nuevamente",
                icon: "error"
                });</script>';
            break;
        case 'updCursoCorr':
            echo '<script>swal.fire({
                title: "Curso Actualizado",
                text: "El curso ha sido actualizado de manera correcta",
                icon: "success"
                });</script>';
            # code...
            break;
        case 'updCursoErr':
            echo '<script>swal.fire({
                title: "Error al actualizar",
                text: "Ha habido un error al momento de actualizar el curso. Intente nuevamente",
                icon: "error"
                });</script>';
            break;
        default:
            # code...
            break;
    }
}