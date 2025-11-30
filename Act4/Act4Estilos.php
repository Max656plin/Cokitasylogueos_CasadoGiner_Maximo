<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tema'])) {
    $tema = $_POST['tema'];
    setcookie('galleta_gorda', $tema, time() + 30 * 24 * 60 * 60, '/'); //Reto extra de 30 días
} else {
    $tema = $_COOKIE['galleta_gorda'] ?? 'claro';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selector de Tema Persistente</title>
    <style>
        body.claro {
            background-color: #ffffff;
            color: #000000;
        }
        body.oscuro {
            background-color: #333333;
            color: #ffffff;
        }
    </style>
</head>
<body class="<?php echo $tema; ?>">
    <h1>Elige tu tema</h1>

    <form method="POST">
        <select name="tema">
            <option value="claro" <?php if ($tema === 'claro') echo 'selected'; ?>>Modo Claro</option>
            <option value="oscuro" <?php if ($tema === 'oscuro') echo 'selected'; ?>>Modo Oscuro</option>
        </select>
        <button type="submit">Guardar preferencia</button>
    </form>
</body>
</html>