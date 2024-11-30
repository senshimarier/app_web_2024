<?php
session_start();

// Verificar si el usuario ha iniciado sesión
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;
$apellidos = isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : null;
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

// Obtener mensaje de éxito desde la sesión
$mensaje_exito = isset($_SESSION['mensaje_exito']) ? $_SESSION['mensaje_exito'] : null;

// Limpiar el mensaje después de mostrarlo
unset($_SESSION['mensaje_exito']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | PHP Proyecto UTD</title>
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
            <li><a href="index.php">Inicio</a></li>
            <?php if ($usuario): ?>
                <li><a href="../html/acercade.php">Acerca de</a></li>
                <li><a href="../html/mision.php">Misión</a></li>
                <li><a href="../html/vision.php">Visión</a></li>
                <li><a href="../html/articulos.php">Artículos</a></li>
                <li><a href="../html/categorias.php">Categorías</a></li>
                <li><a href="cerrarsesion.php" style="color: red;">Cerrar sesión</a></li>
            <?php else: ?>
                <li><a href="../html/iniciodesesion.php">Iniciar Sesión</a></li>
                <li><a href="../html/registro.php">Registro</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Inicio</h1>
            <hr>
            
            <!-- Mostrar mensaje de inicio de sesión exitoso -->
            <?php if ($mensaje_exito): ?>
                <div class="mensaje-exito" style="background-color: green; color: white; padding: 10px; margin-bottom: 10px;">
                    <?php echo htmlspecialchars($mensaje_exito); ?>
                </div>
            <?php endif; ?>

            <?php if ($usuario): ?>
                <p>Bienvenido, <strong><?php echo htmlspecialchars($nombre . ' ' . $apellidos); ?></strong>.</p>
                <p>Email: <strong><?php echo htmlspecialchars($email); ?></strong></p>
            <?php else: ?>
                <p>Bienvenido a nuestro sitio web. Por favor, <a href="../html/iniciodesesion.html">inicia sesión</a> o <a href="../html/registro.html">regístrate</a>.</p>
            <?php endif; ?>
        </div>
    </section>
    <footer>
        <p>PHP MariWeb &copy; 2024</p>
    </footer>
</body>
</html>
