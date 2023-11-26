<?php

class CursosLeccionesModel
{

    static function extraerCursosDetalle($id)
    {
        include 'Conexion.php';
        $sql = "
        SELECT * FROM cursos
        WHERE idCurso = $id
            AND estado = 'A'
        ";
        $result = $conn->query($sql);
        return $result;
    }
}
