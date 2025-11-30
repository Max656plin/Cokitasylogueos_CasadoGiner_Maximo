<?php
session_start();

$catalogo = [
    'mando' => 'Mando',
    'teclado'    => 'Teclado',
    'pilas' => 'Pilas'
];


if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = []; 
}


if (isset($_GET['add'])) {
    $producto = $_GET['add'];
    if (array_key_exists($producto, $catalogo)) {
        $_SESSION['carrito'][] = $producto; 
    }
    header('Location: ' . $_SERVER['PHP_SELF']); // evita reenvío F5 (lo vi en internet)
    exit;
}

if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <style>
        .producto { display:inline-block; margin:10px; padding:10px; border:1px solid #ccc; }
        .carrito  { margin-top:30px; }
    </style>
</head>
<body>
    <h1>Catálogo</h1>

    <?php foreach ($catalogo as $key => $nombre): ?>
        <div class="producto">
            <?= $nombre ?>
            <br>
            <a href="?add=<?= $key ?>">Añadir</a>
        </div>
    <?php endforeach; ?>

    <hr>

    <div class="carrito">
        <h2>Tu carrito</h2>
        <?php if (empty($_SESSION['carrito'])): ?>
            <p>El carrito está vacío.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($_SESSION['carrito'] as $item): ?>
                    <li><?= $catalogo[$item] ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <a href="?vaciar=1">Vaciar Carrito</a>
    </div>
</body>
</html>