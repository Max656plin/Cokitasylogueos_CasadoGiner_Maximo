<?php
session_start();

$timeout = 600;
if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso']) > $timeout) {
    session_unset();
    session_destroy();
    header('Location: login.php?timeout=1');
    exit;
}
$_SESSION['ultimo_acceso'] = time();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    http_response_code(403);
    echo "<h1>Acceso denegado</h1><p>No tienes permisos para ver esta página.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración</title>
</head>
<body>
    <h1>Configuración (zona de administradores)</h1>
    <p>Aquí irían las opciones solo para <strong>admin</strong>.</p>
    <a href="panel.php">Volver al panel</a>
</body>
</html>