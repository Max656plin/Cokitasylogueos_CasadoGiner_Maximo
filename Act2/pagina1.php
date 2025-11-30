<?php
session_start(); 
$_SESSION['fruta_favorita'] = 'Manzana';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página 1</title>
</head>
<body>
    <p>Variable de sesión guardada: <?php echo $_SESSION['fruta_favorita']; ?></p>
    <a href="pagina2.php">Ir a página 2</a>
</body>
</html>