<?php
include './model/UsuarioModel.php';

class UsuarioController{

  static function nacionalidad(){
    $usuario = new UsuarioModel();
    $datos = $usuario->extraerNacionalidad();
    if ($datos->num_rows > 0) {
          // output data of each row
      while($row = $datos->fetch_assoc()) {
        echo "<option value='".$row['idNacionalidad']."'>".$row['Descripcion']."</option>";
      }
    }
  }

  static function extraerUsuarioDetalle($id){
    $usuario = UsuarioModel::usuarioDetalle($id);
    $datos= $usuario->fetch_assoc();
    return $datos;
  }

  static function extraerNombreMenu($id){
    $nombre = UsuarioModel::nombreMenu($id);
    $datos = $nombre->fetch_assoc()['nombre'];
    return $datos;
  }
}

