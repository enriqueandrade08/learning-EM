<?php
// include './model/LeccionesModel.php';

class LeccionesController
{

    function leccionesMant()
    {
        include './model/LeccionesModel.php';

        $lecciones = LeccionesModel::extraerLeccionesMant();
        if ($lecciones->num_rows > 0) {
            while ($row = $lecciones->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['idLeccion']}</td>
                    <td>{$row['nombreCurso']}</td>
                    <td>{$row['numeroModulo']}</td>
                    <td>{$row['titulo']}</td>
                    <td>{$row['estado']}</td>
                    <td>
                        <button class='btn btn-secondary btn-xs' onclick='obtCodigo({$row['idLeccion']}, `lecciones-editar.php`)'>
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

    static function leccionesEditar($id)
    {
        include './model/LeccionesModel.php';

        $curso = LeccionesModel::extraerLeccionDetalle($id);
        $datos = $curso->fetch_assoc();
        return $datos;
    }

    static function leccionesCurso($curso)
    {
        include '../model/LeccionesModel.php';
        $lecciones = LeccionesModel::extraerLeccionesCurso($curso);
        return $lecciones;
    }
}
