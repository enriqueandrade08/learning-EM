<?php

class LeccionesModel
{

    static function extraerLeccionesMant()
    {
        include 'Conexion.php';
        $sql = "
        SELECT a.*, b.nombreCurso
        FROM  
            leccion a,
            cursos b
        WHERE a.estado = 'A'
            AND b.idCurso = a.idCurso
            AND b.estado = 'A'
        ";
        $result = $conn->query($sql);
        return $result;
    }

    static function insertarLeccion($curso, $modulo, $titulo, $recurso, $descripcion)
    {
        include 'Conexion.php';
        $estado = 'A';
        $stmt = $conn->prepare("
            INSERT INTO leccion (idCurso, numeroModulo, titulo, Recurso, descripcion, estado)    
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("iissss", $curso, $modulo, $titulo, $recurso, $descripcion, $estado);
        $response = $stmt->execute();
        $stmt->close();
        return $response;
    }

    static function actualizarLeccion($codigo, $modulo, $titulo, $recurso, $descripcion)
    {
        include 'Conexion.php';
        $stmt = $conn->prepare("
            UPDATE leccion 
            SET numeroModulo = ?, 
                titulo = ?,
                Recurso = ?,
                descripcion = ?
            WHERE idLeccion = ?
        ");
        $stmt->bind_param("isssi", $modulo, $titulo, $recurso, $descripcion, $codigo);
        $stmt->execute();
        // Verificar si la actualización fue exitosa
        $filas_afectadas = $stmt->affected_rows;
        $stmt->close();
        return $filas_afectadas;
    }

    static function extraerLeccionDetalle($id)
    {
        include 'Conexion.php';
        $sql = "
        SELECT a.*, b.nombreCurso
        FROM  
            leccion a,
            cursos b
        WHERE a.estado = 'A'
            AND a.idLeccion = $id
            AND b.idCurso = a.idCurso
            AND b.estado = 'A'
        ";
        $result = $conn->query($sql);
        return $result;
    }

    static function extraerLeccionesCurso($curso)
    {
        include 'Conexion.php';
        $sql = "
        SELECT a.idLeccion, a.titulo
        FROM  
            leccion a
        WHERE a.estado = 'A'
            AND a.idCurso = $curso
        ";
        $result = $conn->query($sql);
        return $result;
    }

    static function extraerLeccionesCursoTodo($curso)
    {
        include 'Conexion.php';
        $sql = "
        SELECT a.*
        FROM  
            leccion a
        WHERE a.estado = 'A'
            AND a.idCurso = $curso
        ";
        $result = $conn->query($sql);
        return $result;
    }

    static function extraerCantidadLecciones()
    {
        include 'Conexion.php';
        $sql = "
        SELECT COUNT(idLeccion) cantLeccion FROM leccion 
        WHERE estado = 'A'
        ";
        $result = $conn->query($sql);
        return $result;
    }
}
