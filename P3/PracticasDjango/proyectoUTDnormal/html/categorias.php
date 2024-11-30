<?php
session_start(); // Inicia la sesión (elimina la segunda llamada)

// Verificar si el usuario ha iniciado sesión
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

// Conexión a la base de datos
include '../php/conexion.php';

// Verifica que la conexión se haya realizado correctamente
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para obtener los artículos, sus categorías, y la imagen
$query = "
    SELECT a.id, a.descripcion, a.imagen
    FROM categorias a
";
$resultado = $conexion->query($query);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

// ID del artículo al que se le va a asignar la imagen
$id_categorias = 1; // Cambia esto al ID del artículo que deseas actualizar

// Ruta de la imagen en el servidor
$ruta_imagen = '../img/categorias/logo.jpg';

// Actualizar la base de datos con la ruta de la imagen
$query = "UPDATE categorias SET imagen = '$ruta_imagen' WHERE id = $id_categorias";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #009879;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

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
            <?php if ($usuario): ?>
                <!-- Opciones para usuarios autenticados -->
                <li><a href="acercade.php">Acerca de</a></li>
                <li><a href="mision.php">Misión</a></li>
                <li><a href="vision.php">Visión</a></li>
                <li><a href="articulos.php">Artículos</a></li>
                <li><a href="categorias.php" class="active">Categorías</a></li>
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
            <h1>Gestión de Categorías</h1>
            <hr>
            <?php if ($usuario): ?>
                <p>Aquí puedes gestionar las categorías disponibles en el sistema.</p>

                <!-- Mostrar las categorías de la base de datos -->
                <h2>Categorías actuales</h2>
                <table border="1" cellpadding="5" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Consulta para obtener las categorías
                        $consulta = "SELECT id, descripcion, imagen FROM categorias";
                        $resultado = $conexion->query($consulta);

                        if ($resultado && $resultado->num_rows > 0):
                            while ($categoria = $resultado->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $categoria['id']; ?></td>
                                    <td><?php echo htmlspecialchars($categoria['descripcion']); ?></td>
                                    <td>
                                        <?php if (!empty($categoria['imagen'])): ?>
                                            <img src="<?php echo htmlspecialchars($categoria['imagen']); ?>" alt="Imagen de la categoría" style="width: 100px;">
                                        <?php else: ?>
                                            <p>No tiene imagen</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile;
                        else: ?>
                            <tr>
                                <td colspan="3">No hay categorías registradas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Para gestionar las categorías, por favor <a href="../html/iniciodesesion.html">inicia sesión</a>.</p>
            <?php endif; ?>
        </div>
    </section>
    <footer>
        <p>PHP MariWeb &copy; 2024</p>
    </footer>
</body>
</html>
