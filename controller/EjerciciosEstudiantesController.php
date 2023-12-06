<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../model/EjerciciosModel.php';
    include '../model/LeccionProgresoModel.php';
    $curso = $_POST['curso'];
    $leccion = $_POST['leccion'];
    $codInscrito = $_POST['inscrito'];
    // Contador de errores
    $cont = 0;

    $query = EjerciciosModel::extraerEjercicioLeccion($curso, $leccion);
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $id = $row['idEjercicio'];
            $ejercicio = $_POST['e' . $id];
            if ($ejercicio != $row['resultado']) {
                $cont++;
            }
        }
    }
    // si es 0 significa que aprobo los ejercicios y aprobo la leccion
    if ($cont == 0) {
        $verificar = LeccionProgresoModel::verificarLeccionProgreso($codInscrito, $curso, $leccion);
        if ($verificar->num_rows == 0) {
            //Ya que no trae filas se hace el insert
            $insert = LeccionProgresoModel::insertarLeccionProgreso($codInscrito, $curso, $leccion);
            echo "Leccion aprobada";
        } else {
            // Se muestra un mensaje de que ya realizo esta leccion
            echo "Esta leccion ya fue realizada";
        }
    } else {
        echo "Tuviste $cont errores";
    }
} else {
    echo "error";
}
