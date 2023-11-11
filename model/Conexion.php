<?php
// Establecer variables de configuración de la base de datos
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'learning_em';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
