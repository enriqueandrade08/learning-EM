<?php

class InscritoController
{
    function cursosInscritosMostrar($usuario)
    {
        include './model/InscritoModel.php';
        $cursos = InscritoModel::cursosInscritos($usuario);
        if ($cursos->num_rows > 0) {
            echo '
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
            while ($row = $cursos->fetch_assoc()) {
                if (strlen($row['descripcionCurso']) > 50) {
                    $descripcion = substr($row['descripcionCurso'], 0, 50) . "...";
                }

                $txtBtn = ($row['estadoCurso'] == 'C') ? 'Completado' : 'Reanudar';
                echo "
                <div class='col'>
                    <div class='card'>
                        <img src='{$row['imagen']}' alt='{$row['nombreCurso']}' class='card-img-top img-fluid'>
                        <div class='card-body'>
                            <h6 class='card-title'>{$row['nombreCurso']}</h6>
                            <p class='card-text'>$descripcion</p>
                            <button class='btn btn-primary' onclick='obtCod2({$row['idCurso']},{$row['idInscrito']},`curso-mostrar.php`)'>$txtBtn</button>
                        </div>
                    </div>
                </div>";
            }

            echo '
            </div>'; // Cierra la fila
        }
    }

    function cursosCompletados($usuario)
    {
        include './model/InscritoModel.php';
        $cursos = InscritoModel::cursosCompletos($usuario);
        if ($cursos->num_rows > 0) {
            echo '
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
            while ($row = $cursos->fetch_assoc()) {
                if (strlen($row['descripcionCurso']) > 50) {
                    $descripcion = substr($row['descripcionCurso'], 0, 50) . "...";
                }

                echo "
                <div class='col'>
                    <div class='card'>
                        <img src='{$row['imagen']}' alt='{$row['nombreCurso']}' class='card-img-top img-fluid'>
                        <div class='card-body'>
                            <h6 class='card-title'>{$row['nombreCurso']}</h6>
                            <p class='card-text'>$descripcion</p>
                            <button class='btn btn-primary' onclick='obtCod2({$row['idCurso']},{$row['idInscrito']},`certificado.php`)'>certificado&nbsp;<i class='fa-solid fa-award' style='color: #fff;'></i></button>
                        </div>
                    </div>
                </div>";
            }

            echo '
            </div>'; // Cierra la fila
        } else {
            echo '<br><center><strong>No tiene cursos completados.</strong></center>';
        }
    }

    static function inscritoCompletarCurso($inscrito, $usuario, $curso)
    {
        include '../model/InscritoModel.php';
        $query = InscritoModel::updCursoCompleto($inscrito, $usuario, $curso);
        // $datos = $query->fetch_assoc();
        return $query;
    }

    static function datosCertificado($inscrito, $usuario, $curso)
    {
        include './model/InscritoModel.php';
        $inscrito = InscritoModel::extraerDatosCertificado($inscrito, $usuario, $curso);
        $datos = $inscrito->fetch_assoc();
        return $datos;
    }

    function extraerCantCursosInscritos($usuario)
    {
        include './model/InscritoModel.php';
        $curso = InscritoModel::extraerCantidadCursosInscritos($usuario);
        $datos = $curso->fetch_assoc()['cant'];
        echo $datos;
    }

    function cursosInscritosProgresoMostrar($usuario)
    {
        include './model/InscritoModel.php';
        include './model/LeccionProgresoModel.php';
        $cursos = InscritoModel::cursosInscritos($usuario);
        if ($cursos->num_rows > 0) {
            echo '
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
            while ($row = $cursos->fetch_assoc()) {
                $idCurso = $row['idCurso'];
                $idInscr = $row['idInscrito'];
                $cantAprob = LeccionProgresoModel::verificarTerminacionCurso($idCurso, $idInscr);
                $row2 = $cantAprob->fetch_assoc();
                if ($row2['aprobado'] != 0) {
                    $progreso = round($row2['cantLecciones'] / $row2['aprobado'] * 100);
                } else {
                    $progreso = 0;
                }
                echo "
                <div class='col'>
                    <div class='card'>
                        <img src='{$row['imagen']}' alt='{$row['nombreCurso']}' class='card-img-top img-fluid'>
                        <div class='card-body text-xl-center'>
                            <h6 class='card-title'>{$row['nombreCurso']}</h6>
                            <p class='card-text'>Progreso del curso $progreso%</p>
                            <progress id='file' max='100' value='$progreso'></progress>
                            <br>";
                if ($row['estadoCurso'] == 'C') {
                    echo "<button class='btn btn-primary' onclick='obtCod2({$row['idCurso']},{$row['idInscrito']},`certificado.php`)'>Ver Certificado</button>";
                } else {
                    echo "<button class='btn btn-primary' onclick='obtCod2({$row['idCurso']},{$row['idInscrito']},`curso-mostrar.php`)'>Ir al Curso</button>";
                }
                echo "</div>
                    </div>
                </div>";
            }

            echo '
            </div>'; // Cierra la fila
        }
    }

    function mostrarCantCursosCompletos($usuario)
    {
        require_once './model/InscritoModel.php';
        $inscritos = InscritoModel::extraerCantCursosCompletos($usuario);
        $datos = $inscritos->fetch_assoc()['completado'];
        echo $datos;
    }

    function mostrarEstudiantesporCurso()
    {
        require_once './model/InscritoModel.php';
        $inscritos = InscritoModel::extraerEstudiantesporCurso();
        if ($inscritos->num_rows > 0) {
            echo "
            <table id='datatablesSimple'>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre del Curso</th>
                        <th>Estudiantes</th>
                </thead>
                <tbody>";
            while ($row = $inscritos->fetch_assoc()) {
                echo
                "<tr>
                    <td>" . $row['idCurso'] . "</td>
                    <td>" . $row['nombreCurso'] . "</td>
                    <td>" . $row['cant'] . "</td>
                </tr>";
            }
        }
        echo "       
                </tbody>
            </table>";
    }

    static function mostrarEstudiantesporCursoGrafico()
    {
        require_once '../model/InscritoModel.php';
        $inscritos = InscritoModel::extraerEstudiantesporCurso();
        $datos = array();
        while ($row = $inscritos->fetch_assoc()) {
            $datos[] = $row;
        }
        return $datos;
    }
}
