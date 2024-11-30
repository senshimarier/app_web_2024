<?php
session_start(); // Inicia la sesión

// Verificar si el usuario ya inició sesión
if (isset($_SESSION['usuario'])) {
    header("Location: ../php/index.php"); // Redirigir al inicio si ya está autenticado
    exit;
}

// Obtener mensajes de error o éxito desde la sesión
$mensaje_error = isset($_SESSION['mensaje_error']) ? $_SESSION['mensaje_error'] : null;
$mensaje_exito = isset($_SESSION['mensaje_exito']) ? $_SESSION['mensaje_exito'] : null;

// Limpiar mensajes después de mostrarlos
unset($_SESSION['mensaje_error']);
unset($_SESSION['mensaje_exito']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Logo PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../php/index.php">Inicio</a></li>
            <li><a href="iniciodesesion.php" class="active">Iniciar Sesión</a></li>
            <li><a href="registro.php">Registro</a></li>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Iniciar Sesión</h1>
            <hr>
            <!-- Mostrar mensajes -->
            <?php if ($mensaje_error): ?>
                <div class="mensaje-error" style="background-color: red; color: white; padding: 10px; margin-bottom: 10px;">
                    <?php echo htmlspecialchars($mensaje_error); ?>
                </div>
            <?php endif; ?>
            <?php if ($mensaje_exito): ?>
                <div class="mensaje-exito" style="background-color: green; color: white; padding: 10px; margin-bottom: 10px;">
                    <?php echo htmlspecialchars($mensaje_exito); ?>
                </div>
            <?php endif; ?>

            <!-- Formulario de inicio de sesión -->
            <form action="../php/procesar_login.php" method="POST">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
                <br><br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                <button type="submit">Ingresar</button>
            </form>
        </div>
    </section>
    <footer>
        <p>PHP MariWeb &copy; 2024</p>
    </footer>
</body>
</html>
