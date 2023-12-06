<?php

class LeccionProgresoModel
{
    static function extraerLeccionProgreso($usuario)
    {
        include 'Conexion.php';
        /* $sql = "
            SELECT a.*, b.descripcionCurso, b.imagen, b.nombreCurso
            FROM 
                inscrito a,
                cursos b
            WHERE a.idUsuario = $usuario
                AND a.estado = 'A'
                AND b.idCurso = a.idCurso
                AND b.estado = 'A'
            ";*/
        $result = $conn->query($sql);
        return $result;
    }

    static function verificarLeccionProgreso($inscrito, $curso, $leccion)
    {
        include 'Conexion.php';
        $sql = "
        SELECT a.* FROM leccionprogreso a
        WHERE a.estado = 'A'
            AND a.idInscrito = '$inscrito'
            AND a.idCurso = '$curso'
            AND a.idLeccion = '$leccion'
            AND a.estadoLeccion = 'C'
        ";
        $result = $conn->query($sql);
        return $result;
    }

    static function insertarLeccionProgreso($inscrito, $curso, $leccion)
    {
        include 'Conexion.php';
        $estadoLeccion = 'C';
        $estado = 'A';
        $stmt = $conn->prepare("
            INSERT INTO leccionprogreso (idInscrito, idCurso, idLeccion, estadoLeccion, estado)    
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("iiiss", $inscrito, $curso, $leccion, $estadoLeccion, $estado);
        $response = $stmt->execute();
        $stmt->close();
        return $response;
    }

    static function verificarTerminacionCurso($curso, $inscrito)
    {
        // funcion que saca la cuenta de cuantas lecciones son y cuantas ha aprobado
        include 'Conexion.php';
        $sql = "
        SELECT a.*,b.*
        FROM (
                SELECT COUNT(l.idCurso) cantLecciones FROM leccion l
                WHERE l.estado = 'A'
                    AND l.idCurso = '$curso'
		    )a,
		    (
                SELECT COUNT(lp.idCurso) aprobado FROM leccionprogreso lp
                WHERE lp.idInscrito = '$inscrito'
                    AND lp.idCurso = '$curso'
                    AND lp.estadoLeccion = 'C'
                    AND lp.estado = 'A'
            )b

        ";
        $result = $conn->query($sql);
        return $result;
    }
}
