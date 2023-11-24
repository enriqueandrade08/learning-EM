<?php

class EjerciciosModel
{

    static function extraerEjerciciosMant()
    {
        include 'Conexion.php';
        $sql = "
        SELECT a.*, b.nombreCurso, c.titulo
        FROM 
            ejercicios a,
            cursos b,
            leccion c
        WHERE a.estado = 'A'
            AND b.idCurso = a.idCurso
            AND b.estado = 'A'
            AND c.idLeccion = a.idLeccion
            AND c.idCurso = b.idCurso
        ";
        $result = $conn->query($sql);
        return $result;
    }

    static function insertarEjercicio($curso, $leccion, $descripcion, $resultado)
    {
        include 'Conexion.php';
        $estado = 'A';
        $stmt = $conn->prepare("
            INSERT INTO ejercicios (idCurso, idLeccion, descripcion, resultado, estado)    
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("iisss", $curso, $leccion, $descripcion, $resultado, $estado);
        $response = $stmt->execute();
        $stmt->close();
        return $response;
    }

    /*

    static function actualizarLeccion($codigo,$modulo,$titulo,$recurso,$descripcion){
        include 'Conexion.php';
        $stmt = $conn->prepare("
            UPDATE leccion 
            SET numeroModulo = ?, 
                titulo = ?,
                Recurso = ?,
                descripcion = ?
            WHERE idLeccion = ?
        ");
        $stmt->bind_param("isssi", $modulo,$titulo,$recurso,$descripcion,$codigo);
        $stmt->execute();
        // Verificar si la actualización fue exitosa
        $filas_afectadas = $stmt->affected_rows;
        $stmt->close();
        return $filas_afectadas;
    }

    static function extraerLeccionDetalle($id){
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
    }*/
}
