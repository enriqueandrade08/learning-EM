<?php
include './model/UsuarioModel.php';

class UsuarioController
{

  static function nacionalidad()
  {

    $usuario = new UsuarioModel();
    $datos = $usuario->extraerNacionalidad();
    if ($datos->num_rows > 0) {
      // output data of each row
      while ($row = $datos->fetch_assoc()) {
        echo "<option value='" . $row['idNacionalidad'] . "'>" . $row['Descripcion'] . "</option>";
      }
    }
  }

  static function extraerUsuarioDetalle($id)
  {
    $usuario = UsuarioModel::usuarioDetalle($id);
    $datos = $usuario->fetch_assoc();
    return $datos;
  }

  static function extraerNombreMenu($id)
  {
    $nombre = UsuarioModel::nombreMenu($id);
    $datos = $nombre->fetch_assoc()['nombre'];
    return $datos;
  }

  function usuariosMant()
  {
    $usuarios = UsuarioModel::extraerUsuarios();
    if ($usuarios->num_rows > 0) {
      while ($row = $usuarios->fetch_assoc()) {
        echo
        "<tr>
          <td>" . $row['idUsuario'] . "</td>
          <td>" . $row['nombre'] . "</td>
          <td>" . $row['apellido'] . "</td>
          <td>" . $row['correo'] . "</td>
          <td>" . $row['fecha_creacion'] . "</td>
          <td>" . $row['estado'] . "</td>
          <td>
            <a href='#' class='btn btn-danger btn-xs'><i class='fa-solid fa-trash'></i></a>
          </td>
        </tr>";
      }
    }
  }

  function usuarioPrivilegios($privilegio)
  {
    $usuario = $privilegio;
    if ($usuario > 1) {
      echo "<script>location.href ='admin.php';</script>";
    }
  }
}
