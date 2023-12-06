<?php
// include './model/CursosModel.php';

class CursosController
{

    function cursosMant()
    {
        include './model/CursosModel.php';

        $cursos = CursosModel::extraerCursosAdmin();
        if ($cursos->num_rows > 0) {
            while ($row = $cursos->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['idCurso']}</td>
                    <td>{$row['nombreCurso']}</td>
                    <td>{$row['descripcionCurso']}</td>
                    <td>{$row['fecha_creacion']}</td>
                    <td>{$row['estado']}</td>
                    <td>
                        <button class='btn btn-secondary btn-xs' onclick='obtCodigo({$row['idCurso']}, `cursos-editar.php`)'>
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

    function cursosAgregar($usuario)
    {
        include './model/CursosModel.php';
        include './model/InscritoModel.php';
        $cursos = CursosModel::extraerCursosAdmin();
        if ($cursos->num_rows > 0) {
            echo '
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
            while ($row = $cursos->fetch_assoc()) {
                // Verifica si ya esta inscrito para cambiar el boton
                $cursoInscrito = InscritoModel::verificarInscritoCurso($usuario, $row['idCurso']);
                // Corta los textos largos
                if (strlen($row['descripcionCurso']) > 50) {
                    $descripcion = substr($row['descripcionCurso'], 0, 50) . "...";
                }
                echo "
                <div class='col'>
                    <div class='card'>
                        <img src='{$row['imagen']}' alt='{$row['nombreCurso']}' class='card-img-top img-fluid'>
                        <div class='card-body'>
                            <h6 class='card-title'>{$row['nombreCurso']}</h6>
                            <p class='card-text'>$descripcion</p>";
                if ($cursoInscrito == 0) {
                    echo   "<button class='btn btn-primary' onclick='obtCodigoCRUD({$row['idCurso']},`controller/InscritoRegistroController.php`,`C`)'>Inscribirse</button>";
                } else {
                    echo    "<button class='btn btn-primary' disabled>Curso Inscrito</button>";
                }
                echo "   </div>
                    </div>
                </div>";
            }

            echo '
            </div>'; // Cierra la fila
        }
    }

    function cursosAgregarlimit3($usuario)
    {
        require_once './model/CursosModel.php';
        require_once './model/InscritoModel.php';
        $cursos = CursosModel::extraerCursosAdminlimit3();
        if ($cursos->num_rows > 0) {
            echo '
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
            while ($row = $cursos->fetch_assoc()) {
                // Verifica si ya esta inscrito para cambiar el boton
                $cursoInscrito = InscritoModel::verificarInscritoCurso($usuario, $row['idCurso']);
                // Corta los textos largos
                if (strlen($row['descripcionCurso']) > 50) {
                    $descripcion = substr($row['descripcionCurso'], 0, 50) . "...";
                }
                echo "
                <div class='col'>
                    <div class='card'>
                        <img src='{$row['imagen']}' alt='{$row['nombreCurso']}' class='card-img-top img-fluid'>
                        <div class='card-body'>
                            <h6 class='card-title'>{$row['nombreCurso']}</h6>
                            <p class='card-text'>$descripcion</p>";
                if ($cursoInscrito == 0) {
                    echo   "<button class='btn btn-primary' onclick='obtCodigoCRUD({$row['idCurso']},`controller/InscritoRegistroController.php`,`C`)'>Inscribirse</button>";
                } else {
                    echo    "<button class='btn btn-primary' disabled>Curso Inscrito</button>";
                }
                echo "   </div>
                    </div>
                </div>";
            }

            echo '
            </div>'; // Cierra la fila
        }
    }

    static function cursosEditar($id)
    {
        include './model/CursosModel.php';

        $curso = CursosModel::extraerCursosDetalle($id);
        $datos = $curso->fetch_assoc();
        return $datos;
    }

    function cursosSelect()
    {
        include './model/CursosModel.php';
        $cursos = CursosModel::extraerCursosAdmin();
        if ($cursos->num_rows > 0) {
            while ($row = $cursos->fetch_assoc()) {
                echo "<option value='{$row['idCurso']}'>{$row['nombreCurso']}</option>";
            }
        }
    }

    static function cabezaCursos($id)
    {
        include '../model/CursosModel.php';

        $curso = CursosModel::extraerCursosDetalle($id);
        $datos = $curso->fetch_assoc();
        return $datos;
    }

    function mostrarCantidadCursos()
    {
        include './model/CursosModel.php';
        $cursos = CursosModel::extraerCantidadCursos();
        $dato = $cursos->fetch_assoc()['cantCursos'];
        echo $dato;
    }
}
