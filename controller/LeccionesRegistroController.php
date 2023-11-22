<?php
// $tipo = C crear, R read, U Update, D delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tipo'])) {
        // Incluyo el modelo a donde se procesaran los datos
        include "../model/LeccionesModel.php";
        $tipo = $_POST['tipo'];
        switch ($tipo) {
            case 'C':
                // Proceso para crear nuevo curso
                // Limpio las variables de html
                $curso = strip_tags($_POST['curso']);
                $modulo = strip_tags($_POST['nModulo']);
                $titulo = strip_tags($_POST['titulo']);
                $recurso= (isset($_POST['recurso'])) ? htmlspecialchars($_POST['recurso']) : '';
                $descripcion = strip_tags($_POST['descripcion']);
                // Hacemos el Insert 
                $insert = LeccionesModel::insertarLeccion($curso,$modulo,$titulo,$recurso,$descripcion);
                // Manejamos la respuesta
                if ($insert) {
                    // Curso Insertado Correctamente
                    $respuesta = "insLeccCorr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../lecciones-mant.php?m='.$encryp);
                }else {
                    // Error al insertar curso
                    $respuesta = "insLeccErr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../lecciones-mant.php?m='.$encryp);
                }
                exit;

                break;
            case 'R':
               
                break;
            case 'U':
                // Proceso para crear nuevo curso
                // Limpio las variables de html
                $codigo = strip_tags($_POST['cod']);
                $modulo = strip_tags($_POST['nModulo']);
                $titulo = strip_tags($_POST['titulo']);
                $recurso= (isset($_POST['recurso'])) ? strip_tags($_POST['recurso']) : '';
                $descripcion = strip_tags($_POST['descripcion']);
                // Hacemos el update
                $cont = LeccionesModel::actualizarLeccion($codigo,$modulo,$titulo,$recurso,$descripcion);
                // Manejamos la respuesta
                if ($cont !== false) { 
                    // Exito al actualizar
                    $respuesta = "updLeccCorr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../lecciones-mant.php?m='.$encryp);
                }else {
                    // Error al actualizar
                    $respuesta = "updLeccErr";
                    $encryp = base64_encode($respuesta);
                    header('Location: ../lecciones-mant.php?m='.$encryp);
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
        case 'insLeccCorr':
            echo '<script>swal.fire({
                title: "Leccion Insertado",
                text: "La leccion se ha insertado de manera correcta",
                icon: "success"
              });</script>';
            # code...
            break;
        case 'insLeccCorr':
            echo '<script>swal.fire({
                title: "Error al Crear",
                text: "Ha habido un error al momento de crear la leccion. Intente nuevamente",
                icon: "error"
                });</script>';
            break;
        case 'updLeccCorr':
            echo '<script>swal.fire({
                title: "Leccion Actualizada",
                text: "La leccion ha sido actualizado de manera correcta",
                icon: "success"
                });</script>';
            # code...
            break;
        case 'updLeccErr':
            echo '<script>swal.fire({
                title: "Error al actualizar",
                text: "Ha habido un error al momento de actualizar la leccion. Intente nuevamente",
                icon: "error"
                });</script>';
            break;
        default:
            # code...
            break;
    }
}