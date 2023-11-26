<?php
// include './model/EjerciciosModel.php';

class EjerciciosController
{

    function ejerciciosMant()
    {
        include './model/EjerciciosModel.php';
        $ejercicios = EjerciciosModel::extraerEjerciciosMant();
        if ($ejercicios->num_rows > 0) {
            while ($row = $ejercicios->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['idEjercicio']}</td>
                    <td>{$row['nombreCurso']}</td>
                    <td>{$row['titulo']}</td>
                    <td>{$row['descripcion']}</td>
                    <td>" . htmlspecialchars($row['resultado']) . "</td>
                    <td>{$row['estado']}</td>
                    <td>
                        <button class='btn btn-secondary btn-xs' onclick='obtCodigo({$row['idEjercicio']}, `lecciones-editar.php`)'>
                            <i class='fa-solid fa-pencil'></i>
                        </button>
                        <a href='#' class='btn btn-danger btn-xs'>
                            <i class='fa-solid fa-trash'></i>
                        </a>
                    </td>
                </tr>";
            }
        }
    }

    function ejerciciosLeccion($curso, $leccion)
    {
        include_once '../model/EjerciciosModel.php';
        $ejercicios = EjerciciosModel::extraerEjercicioLeccion($curso, $leccion);
        if ($ejercicios->num_rows > 0) {
            while ($row2 = $ejercicios->fetch_assoc()) {
                echo "
                        <div class=''>
                            ¿{$row2['descripcion']}?
                            <input>
                        </div>";
            }
        }
    }
    /*
    static function leccionesEditar($id){
        $curso = LeccionesModel::extraerLeccionDetalle($id);
        $datos = $curso->fetch_assoc();
        return $datos;
    }
*/
}
