<?php
include './model/ParametrosModel.php';


class ParametrosController{

  static function logoUrl(){
    $query = ParametrosModel::extraerLogo();
    if ($query && $query->num_rows > 0) {
        // Obtiene la primera fila del resultado
        $logo = $query->fetch_assoc();
        return $logo['logo'];
    }
  }

  static function fondoLoginUrl(){
    $query = ParametrosModel::extraerFondo();
    if ($query && $query->num_rows > 0) {
        // Obtiene la primera fila del resultado
        $fondo = $query->fetch_assoc();
        return $fondo['fondo'];
    }
  }
  
}

