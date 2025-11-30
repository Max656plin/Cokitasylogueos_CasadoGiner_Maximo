<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página 2</title>
</head>
<body>
    <p>Valor de la sesión: <?php echo $_SESSION['fruta_favorita']; ?></p>
</body>
</html>