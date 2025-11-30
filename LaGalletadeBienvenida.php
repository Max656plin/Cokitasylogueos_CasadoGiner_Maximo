<?php
if (isset($_POST['nombre'])) {
    setcookie('nombre', $_POST['nombre'], time() + 3600, '/');
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cookie Básica</title>
</head>
<body>
    <?php
    if (isset($_COOKIE['nombre'])) {
        echo "¡Hola de nuevo, " . $_COOKIE['nombre'] . "!";
    } else {   
    ?>
        <form method="POST">
            <input type="text" name="nombre" placeholder="Escribe tu nombre">
            <button type="submit">Enviar</button>
        </form>
    <?php
    }
    ?>
</body>
</html>