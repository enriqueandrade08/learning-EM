<?php

function conect(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "learning_em";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
}

function disconect(){
  global $conn;
  $conn = null;
}
