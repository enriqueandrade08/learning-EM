<?php
include 'theme/menu.php';
$pagina = 'Admin';
establecerTitulo($pagina);

//Incluimos la plantilla dependiendo del rol que tenga el user

if ($_SESSION['Privilegio'] == 1) {
    include 'theme/dashboard-admin.php';
} else {
    include 'theme/dashboard-estudiantes.php';
}
include 'theme/footer.php';
