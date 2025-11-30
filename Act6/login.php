<?php
session_start();
session_regenerate_id(); // parida de seguridad 

$usuarioFijo = 'admin';
$claveFija   = '1234';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['usuario'] ?? '';
    $pass = $_POST['password'] ?? '';

    if ($user === $usuarioFijo && $pass === $claveFija) {
        // Guardar usuario, rol y tiempo de acceso
        $_SESSION['usuario']       = 'admin';
        $_SESSION['rol']           = 'admin';
        $_SESSION['ultimo_acceso'] = time();

        header('Location: panel.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login con roles y timeout</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <label>Usuario: <input type="text" name="usuario" required></label><br>
        <label>Contraseña: <input type="password" name="password" required></label><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>