<?php

class CursosModel{
    
    static function extraerCursosAdmin(){
        include 'Conexion.php';
        $sql = "
            SELECT * FROM cursos
        ";
        $result = $conn->query($sql);
        return $result;
    }

    static function insertarCurso($nombre,$descripcion,$imagen){
        include 'Conexion.php';
        $estado = 'A'; 
        $stmt = $conn->prepare("
            INSERT INTO cursos (nombreCurso, imagen, descripcionCurso, estado)    
            VALUES (?, ?, ?, ?)
        ");
        $stmt->bind_param("ssss", $nombre, $imagen, $descripcion, $estado);
        $response = $stmt->execute();
        $stmt->close();
        return $response;  
    }

    static function actualizarCurso($codigo,$nombre,$descripcion,$imagen){
        include 'Conexion.php';
        $stmt = $conn->prepare("
            UPDATE cursos 
            SET nombreCurso = ?, 
                descripcionCurso = ?,
                imagen = ?
            WHERE idCurso = ?
        ");
        $stmt->bind_param("sssi", $nombre, $descripcion, $imagen, $codigo);
        $stmt->execute();
        // Verificar si la actualización fue exitosa
        $filas_afectadas = $stmt->affected_rows;
        $stmt->close();
        return $filas_afectadas;
    }

    static function extraerCursosDetalle($id){
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