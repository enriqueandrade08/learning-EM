<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
        switch ($tipo) {
            case 1:
                require_once '../controller/InscritoController.php';
                $query = InscritoController::mostrarEstudiantesporCursoGrafico();

                $cursos = array();

                foreach ($query as $row) {
                    $item = array(
                        'id' => $row['idCurso'],
                        'nombre' => $row['nombreCurso'],
                        'cant' => $row['cant']
                    );
                    array_push($cursos, $item);
                }

                echo json_encode($cursos);
                break;

            default:
                # code...
                break;
        }
    }
}
