<?php
session_start(); // Inicia la sesión

// Verificar si el usuario ha iniciado sesión
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misión | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
        <li><a href="../php/index.php">Inicio</a></li>
            <?php if ($usuario): ?>
                <!-- Opciones para usuarios autenticados -->
                <li><a href="acercade.php">Acerca de</a></li>
                <li><a href="mision.php" class="active">Misión</a></li>
                <li><a href="vision.php">Visión</a></li>
                <li><a href="articulos.php">Artículos</a></li>
                <li><a href="categorias.php">Categorías</a></li>
                <li><a href="../php/cerrarsesion.php" style="color: red;">Cerrar sesión</a></li>
            <?php else: ?>
                <!-- Opciones para visitantes no autenticados -->
                <li><a href="../html/registro.html">Registro</a></li>
                <li><a href="../html/iniciodesesion.html">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Misión</h1>
            <hr>
            <p>Nuestra misión es proporcionar soluciones web eficientes y accesibles utilizando PHP.</p>
            <?php if ($usuario): ?>
            <?php else: ?>
                <p>Para conocer más sobre nosotros, por favor <a href="../html/iniciodesesion.html">inicia sesión</a> o <a href="../html/registro.html">regístrate</a>.</p>
            <?php endif; ?>
        </div>
    </section>
    <footer>
        <p>PHP MariWeb &copy; 2024 | Visitado el: <?php echo date("d/m/Y"); ?></p>
    </footer>
</body>
</html>
