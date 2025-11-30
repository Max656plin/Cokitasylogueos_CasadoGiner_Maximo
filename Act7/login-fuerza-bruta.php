<?php
session_start(); 


if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 0;
}


$usuarioCorrecto = 'admin';
$claveCorrecta   = '1234';
$error           = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario'])) {

    if ($_SESSION['intentos'] < 3) {
        $user = $_POST['usuario'];
        $pass = $_POST['password'];

        if ($user === $usuarioCorrecto && $pass === $claveCorrecta) {
           
            $_SESSION['intentos'] = 0;
            $_SESSION['usuario']  = 'admin';
            header('Location: panel.php'); 
            exit;
        } else {
         
            $_SESSION['intentos']++;
            $error = "Usuario o contraseña incorrectos (intento " . $_SESSION['intentos'] . "/3)";
        }
    }
}


if (isset($_GET['reset'])) {
    $_SESSION['intentos'] = 0;
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}


$bloqueado = $_SESSION['intentos'] >= 3;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login con defensa fuerza bruta</title>
</head>
<body>
    <h1>Login</h1>

    <?php if ($bloqueado): ?>

        <p style="color:red;">Has fallado 3 veces. El acceso está bloqueado.</p>
        <a href="?reset=1">Resetear bloqueo (prueba)</a>

    <?php else: ?>

        <?php if ($error): ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            <label>Usuario: <input type="text" name="usuario" required></label><br>
            <label>Contraseña: <input type="password" name="password" required></label><br>
            <button type="submit">Entrar</button>
        </form>
    <?php endif; ?>
</body>
</html>