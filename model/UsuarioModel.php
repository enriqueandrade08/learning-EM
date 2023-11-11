<?php

class UsuarioModel{
    
    function extraerNacionalidad(){
        include 'Conexion.php';
        $sql = "SELECT * FROM nacionalidad ORDER BY Descripcion";
        $result = $conn->query($sql);
        return $result;
    }

    static function insertUser($nombre,$apellido,$correo,$pass,$fecha,$nacionalidad){
        include 'Conexion.php';
        // Verificar si el correo ya está asignado a otro usuario
        // buscamos en la bd
        $stmt1 = $conn->prepare("SELECT correo FROM usuarios WHERE correo = ?");
        $stmt1->bind_param("s", $correo);
        $stmt1->execute();
        $stmt1->store_result();
        // Contador para que nos regrese la cantidad de resultados
        $cont = 0;
        // verificamos si existe en la bd ese correo
        if ($stmt1->num_rows > 0) {
            $cont = 1;
            $stmt1->close();
            return $cont;
        }
        // Si no existe se insertara uno nuevo
        $privilegios = 2; // 2 ya que es estudiante
        $stmt2 = $conn->prepare("INSERT INTO usuarios (nombre, apellido, correo, pass, fecha, nacionalidad, Privilegios) VALUES (?, ?, ?, ?, ? ,? ,?)");
        $stmt2->bind_param("sssssii",$nombre,$apellido,$correo,$pass,$fecha,$nacionalidad,$privilegios);
        $stmt2->execute();
        $stmt2->close();

        return $cont;    
    }

    static function login($correo, $contrasena){
        include 'Conexion.php';
        // Consulta para verificar las credenciales del usuario
        $stmt = $conn->prepare("SELECT idUsuario, correo, pass FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->store_result();
        
        $cont=0;

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($idUsuario_bd, $correo_db, $contrasena_db);
            $stmt->fetch();
            // Verificar la contraseña
            if ($contrasena == $contrasena_db) {
                // Inicio de sesión exitoso
                session_start();
                $_SESSION['Usuario'] = $idUsuario_bd;
                $cont = 1;
            } else{
                // echo "Contraseña incorrecta";
                $cont = 0;
            }
            return $cont;
            exit;
        } else {
            // echo "Correo electrónico incorrecto";
            $cont = -1;
            return $cont;
        }

        $stmt->close();
        $conn->close();

    }
}
