<?php
include "LeccionesController.php";

$curso = $_POST['curso'];
if ($curso != "") {
  $lecciones = LeccionesController::leccionesCurso($curso);
  echo "<option value=''>Seleccione una leccion</option>";
  if ($lecciones->num_rows > 0) {
    while ($row = $lecciones->fetch_assoc()) {
      echo "<option value='{$row['idLeccion']}'>{$row['titulo']}</option>";
    }
  }
} else {
  echo "<option value=''>Seleccione una leccion</option>";
}
