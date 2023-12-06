<?php
// include './model/LeccionesModel.php';

class LeccionProgresoController
{
    static function LeccionProgresoVerificarTerminacion($curso, $inscrito)
    {
        include '../model/LeccionProgresoModel.php';
        $progreso = LeccionProgresoModel::verificarTerminacionCurso($curso, $inscrito);
        $datos = $progreso->fetch_assoc();
        if ($datos['cantLecciones'] == $datos['aprobado']) {
            return true;
        } else {
            return false;
        }
    }
}
