<?php


if ($_POST['curso']) {
    include '../controller/CursosController.php';
    include '../controller/LeccionesController.php';
    include '../controller/EjerciciosController.php';
    include '../controller/LeccionProgresoController.php';
    include '../controller/InscritoController.php';
    session_start();
    // Variables recibidas por post
    $codIncrito = $_POST['inscrito'];
    $curso = $_POST['curso'];
    // Verificamos el progreso para ver si mostramos el boton para el diploma
    $progreso = LeccionProgresoController::LeccionProgresoVerificarTerminacion($curso, $codIncrito);
    if ($progreso === true) {
        // Se hace el select para que complete el curso
        $completarCurso = InscritoController::inscritoCompletarCurso($codIncrito, $_SESSION['Usuario'], $curso);
        // Se imprime el boton para ver el diploma
        echo "<a class='btn btn-primary' onclick='obtCod2($curso,$codIncrito,`certificado.php`)'>Diploma Disponible&nbsp;<i class='fa-solid fa-award' style='color: #fff;'></i></a>";
    }
    // Variables necesarias para empezar a armar el programa
    $cabeza = CursosController::cabezaCursos($curso);
    $img = $cabeza['imagen'];
    $titulo = $cabeza['nombreCurso'];
    $descrip = $cabeza['descripcionCurso'];
    // Armamos la cabeza del curso
    echo "
    <div class='mt-3 row'>
        <div class='col-md-4'>
            <img class='img-fluid' src='$img' alt='' >
        </div>
        <div class='col-md-8 my-auto'>
            <h1>$titulo</h1>
            <br>
            <p>" . nl2br(htmlspecialchars($descrip)) . "</p>
        </div>
    </div>
    <br>
    <div class='accordion' id='accordionExample'>";
    // Armamos las lecciones
    $leccion = LeccionesController::leccionesCursoTodo($curso);
    $ejercicios = new EjerciciosController();
    if ($leccion->num_rows > 0) {
        $counter = 1; // Contador para generar identificadores únicos
        while ($row = $leccion->fetch_assoc()) {
            // Extraemos el progreso del curso
            $qProgreso = LeccionProgresoModel::verificarLeccionProgreso($codIncrito, $curso, $row['idLeccion']);
            $progreso = ($qProgreso->num_rows == 0) ? "I" : "C";
            $icon = ($progreso == 'C') ? '<i class="fa-solid fa-check fa-lg" style="color: #008000;"></i>' : '<i class="fa-solid fa-xmark fa-lg" style="color: #ff0006;"></i>';

            $uniqueId = "collapse" . $counter;
            echo "
        <div class='accordion-item'>
            <h2 class='accordion-header' id='heading{$counter}'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#$uniqueId' aria-expanded='false' aria-controls='$uniqueId'>";
            echo " {$row['titulo']}&nbsp;$icon
                </button>
            </h2>
            <div id='$uniqueId' class='accordion-collapse collapse' aria-labelledby='heading{$counter}' data-bs-parent='#accordionExample'>
                <div class='accordion-body'>
                    " . nl2br(htmlspecialchars($row['descripcion'])) . "
                    <div class='mt-2'>
                    ";
            if ($row['Recurso']) {
                echo $row['Recurso'];
            }
            echo "</div>";
            $ejercicios->ejerciciosLeccion($curso, $row['idLeccion'], $codIncrito, $progreso);
            echo "        
                </div>
            </div>
        </div>";


            $counter++;
        }
    }
    echo "
    </div>";
} else {
    header("Location: ../admin.php");
}
