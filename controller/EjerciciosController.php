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

    function ejerciciosLeccion($curso, $leccion, $inscrito, $verificacion)
    {
        include_once '../model/EjerciciosModel.php';
        $ejercicios = EjerciciosModel::extraerEjercicioLeccion($curso, $leccion);
        if ($ejercicios->num_rows > 0) {
            echo "<form id='form$leccion'>
                    <input type='hidden' name='curso' id='curso' value='$curso'>
                    <input type='hidden' name='leccion' id='leccion' value='$leccion'>
                    <input type='hidden' name='inscrito' id='inscrito' value='$inscrito'>";
            while ($row2 = $ejercicios->fetch_assoc()) {
                $control = ($verificacion == 'C') ? "value='" . htmlspecialchars($row2['resultado']) . "' readonly" : "";
                echo "
                <div class='p-2'>
                    ¿" . htmlspecialchars($row2['descripcion']) . "?
                    <input name='e{$row2['idEjercicio']}' id='e{$row2['idEjercicio']}' $control>
                </div>
            ";
            }
            echo "
                <div>";
            if ($verificacion == 'C') {
                echo "<button type='button' class='btn btn-success mt-2' disabled>Completado</button>";
            } else {
                echo "<button type='button' class='btn btn-success mt-2' onclick='enviarRespuestas(this.form)'>Enviar Respuestas</button>";
            }
            echo "
                </div>
            </form>";
        }
    }

    function mostrarCantidadEjercicios()
    {
        include './model/EjerciciosModel.php';
        $ejercicios = EjerciciosModel::extraerCantidadEjercicios();
        $datos = $ejercicios->fetch_array()['cantEjercicio'];
        echo $datos;
    }
    /*
    static function leccionesEditar($id){
        $curso = LeccionesModel::extraerLeccionDetalle($id);
        $datos = $curso->fetch_assoc();
        return $datos;
    }
*/
}
