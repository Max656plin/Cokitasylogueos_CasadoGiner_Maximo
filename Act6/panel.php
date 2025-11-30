<?php
session_start();

$timeout = 600; 
if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso']) > $timeout) {
    session_unset();
    session_destroy();
    header('Location: login.php?timeout=1');
    exit;
}
$_SESSION['ultimo_acceso'] = time(); // renovamos timestamp


if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de control</title>
</head>
<body>
    <h1>Bienvenido, <?= $_SESSION['usuario'] ?> (rol: <?= $_SESSION['rol'] ?>)</h1>

    <nav>
        <a href="configuracion.php">Configuración (solo admin)</a> |
        <a href="logout.php">Cerrar sesión</a>
    </nav>

    <p>Recarga esta página cuantas veces quieras. Si pasan 10 min sin actividad, tu sesión expirará.</p>
</body>
</html>