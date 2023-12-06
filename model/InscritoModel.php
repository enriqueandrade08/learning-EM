<?php

class InscritoModel
{
    static function insertarInscrito($usuario, $curso)
    {
        include 'Conexion.php';
        // Verificar que no este inscrito
        $stmt1 = $conn->prepare("
            SELECT a.* FROM inscrito a
            WHERE a.idUsuario = ?
                AND a.idCurso = ?
                AND a.estado = 'A'
                                ");
        $stmt1->bind_param("ii", $usuario, $curso);
        $stmt1->execute();
        $stmt1->store_result();
        // Contador para que nos regrese la cantidad de resultados
        $cont = 0;
        // verificamos si existe en la bd
        if ($stmt1->num_rows > 0) {
            $cont = 1;
            $stmt1->close();
            return $cont;
        }
        // Insertamos el curso
        $estadoCurso = 'I';
        $estado = 'A';
        $stmt = $conn->prepare("
            INSERT INTO inscrito (idUsuario, idCurso, estadoCurso, estado)    
            VALUES (?, ?, ?, ?)
        ");
        $stmt->bind_param("iiss", $usuario, $curso, $estadoCurso, $estado);
        $response = $stmt->execute();
        $stmt->close();
        return $cont;
    }

    static function verificarInscritoCurso($usuario, $curso)
    {
        include 'Conexion.php';
        // Verificar que no este inscrito
        $stmt1 = $conn->prepare("
            SELECT a.* FROM inscrito a
            WHERE a.idUsuario = ?
                AND a.idCurso = ?
                AND a.estado = 'A'
                                ");
        $stmt1->bind_param("ii", $usuario, $curso);
        $stmt1->execute();
        $stmt1->store_result();
        // Contador para que nos regrese la cantidad de resultados
        $cont = 0;
        // verificamos si existe en la bd
        if ($stmt1->num_rows > 0) {
            $cont = 1;
            $stmt1->close();
        }
        return $cont;
    }

    static function cursosInscritos($usuario)
    {
        include 'Conexion.php';
        $sql = "
            SELECT a.*, b.descripcionCurso, b.imagen, b.nombreCurso
            FROM 
                inscrito a,
                cursos b
            WHERE a.idUsuario = $usuario
                AND a.estado = 'A'
                AND b.idCurso = a.idCurso
                AND b.estado = 'A'
            ";
        $result = $conn->query($sql);
        return $result;
    }

    static function cursosCompletos($usuario)
    {
        include 'Conexion.php';
        $sql = "
            SELECT a.*, b.descripcionCurso, b.imagen, b.nombreCurso
            FROM 
                inscrito a,
                cursos b
            WHERE a.idUsuario = $usuario
                AND a.estado = 'A'
                AND a.estadoCurso = 'C'
                AND b.idCurso = a.idCurso
                AND b.estado = 'A'
            ";
        $result = $conn->query($sql);
        return $result;
    }

    static function extraerDatosCertificado($inscrito, $usuario, $curso)
    {
        include 'Conexion.php';
        $sql = "
        SELECT 
            b.nombre,
            b.apellido,
            c.nombreCurso,
            DATE_FORMAT(a.fecha_actualizacion, '%e %M %Y') fechaFin
        FROM 
            inscrito a,
            usuarios b,
            cursos c
        WHERE a.idInscrito = $inscrito
            AND a.idUsuario = $usuario
            AND a.idCurso = $curso
            AND a.estado = 'A'
            AND a.estadoCurso = 'C'
            AND b.idUsuario = a.idUsuario
            AND b.estado = 'A'
            AND c.idCurso = a.idCurso
            AND c.estado = 'A'
        ";
        $result = $conn->query($sql);
        return $result;
    }

    static function updCursoCompleto($inscrito, $usuario, $curso)
    {
        include 'Conexion.php';
        // Verificar que no esté inscrito
        $stmt1 = $conn->prepare("
        SELECT estadoCurso FROM inscrito
        WHERE idInscrito = ?
            AND idUsuario = ?
            AND idCurso = ?
            AND estado = 'A'
    ");
        $stmt1->bind_param("iii", $inscrito, $usuario, $curso);
        $stmt1->execute();
        $stmt1->store_result();
        $stmt1->bind_result($estadoCurso);

        if ($stmt1->num_rows > 0) {
            $stmt1->fetch();
            if ($estadoCurso == 'I') {
                // Insertamos curso Completo
                $estadoCurso = 'C';
                $stmt2 = $conn->prepare("
                UPDATE inscrito
                SET estadoCurso = 'C'
                WHERE idInscrito = ?
                    AND idUsuario = ?
                    AND idCurso = ?
                    AND estado = 'A'
                ");
                $stmt2->bind_param("iii", $inscrito, $usuario, $curso);
                $response = $stmt2->execute();
                return $response;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    static function extraerCantidadCursosInscritos($usuario)
    {
        include 'Conexion.php';
        $sql = "
        SELECT IFNULL(COUNT(a.idUsuario),0) cant FROM inscrito a
        WHERE a.idUsuario = '$usuario'
	        AND a.estado = 'A'
        ";
        $result = $conn->query($sql);
        return $result;
    }

    static function extraerCantCursosCompletos($usuario)
    {
        include 'Conexion.php';
        $sql = "
        SELECT IFNULL(COUNT(a.idUsuario),0) as completado FROM inscrito a
        WHERE a.idUsuario = '$usuario'
            AND a.estado = 'A'
            AND a.estadoCurso = 'C'";
        $result = $conn->query($sql);
        return $result;
    }

    static function extraerEstudiantesporCurso()
    {
        include 'Conexion.php';
        $sql = "
        SELECT 
            b.idCurso,
            COUNT(a.idCurso) cant,
            b.nombreCurso
        FROM 
            inscrito a,
            cursos b
        WHERE a.estado = 'A'
            AND b.idCurso = a.idCurso
            AND b.estado = 'A'
        GROUP BY a.idCurso
        ";
        $result = $conn->query($sql);
        return $result;
    }
}
