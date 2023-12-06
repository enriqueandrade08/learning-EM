<?php
include '../controller/CursosController.php';
include '../controller/LeccionesController.php';
include '../controller/EjerciciosController.php';

if ($_POST['curso']) {

    $curso = $_POST['curso'];
    $cabeza = CursosController::cabezaCursos($curso);
    $img = $cabeza['imagen'];
    $titulo = $cabeza['nombreCurso'];
    $descrip = $cabeza['descripcionCurso'];
    // Incluyo bootstrap para pruebas
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';
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
            $uniqueId = "collapse" . $counter;

            echo "
        <div class='accordion-item'>
            <h2 class='accordion-header' id='heading{$counter}'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#$uniqueId' aria-expanded='false' aria-controls='$uniqueId'>
                    {$row['titulo']}
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
            $ejercicios->ejerciciosLeccion($curso, $row['idLeccion'], null, null);
            echo "        
                </div>
            </div>
        </div>";


            $counter++;
        }
    }
    echo "
    </div>";
    echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>';
} else {
    // header("Location: ../admin.php");
}
