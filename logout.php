<?php
// Elimina la cookie de sesión
setcookie(session_name(), "", time() - 3600, "/");

// Destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión (o a donde prefieras)
header("Location: login.php");
exit();