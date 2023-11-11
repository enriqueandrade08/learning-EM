<?php

class ParametrosModel{
    
    static function extraerLogo(){
        include 'Conexion.php';
        $sql = "
        SELECT a.valor logo
        FROM parametros a
        WHERE a.estado = 'A'
            AND a.abreviatura = 'logo'
            AND a.secuencia = '1'
        ";
        $result = $conn->query($sql);
        return $result;
    }

    static function extraerFondo(){
        include 'Conexion.php';
        $sql = "
        SELECT a.valor fondo
        FROM parametros a
        WHERE a.estado = 'A'
            AND a.abreviatura = 'fondo'
        ";
        $result = $conn->query($sql);
        return $result;
    }

}
