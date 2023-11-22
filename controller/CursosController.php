<?php
include './model/CursosModel.php';

class CursosController{

    function cursosMant(){
        $cursos = CursosModel::extraerCursosAdmin();
        if ($cursos->num_rows > 0) {
            while($row = $cursos->fetch_assoc()) {
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

    static function cursosEditar($id){
        $curso = CursosModel::extraerCursosDetalle($id);
        $datos = $curso->fetch_assoc();
        return $datos;
    }

    function cursosSelect(){
        $cursos = CursosModel::extraerCursosAdmin();
        if ($cursos->num_rows > 0) {
            while($row = $cursos->fetch_assoc()) {
                echo "<option value='{$row['idCurso']}'>{$row['nombreCurso']}</option>";
            }
        }
    }

}
