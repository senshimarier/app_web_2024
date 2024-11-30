<?php
session_start();

include '../php/conexion.php'; // Asegúrate de que este archivo existe y está configurado correctamente

// Consulta para obtener los artículos, sus categorías, y la imagen
$query = "
    SELECT a.id, a.descripcion AS articulo, a.pu, a.cantidad, a.imagen, c.descripcion AS categoria
    FROM articulos a
    INNER JOIN categorias c ON a.id_categoria = c.id
";
$resultado = $conexion->query($query);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

// ID del artículo al que se le va a asignar la imagen
$id_articulo = 1; // Cambia esto al ID del artículo que deseas actualizar

// Ruta de la imagen en el servidor
$ruta_imagen = '../img/articulos/messi.jpeg';

// Actualizar la base de datos con la ruta de la imagen
$query = "UPDATE articulos SET imagen = '$ruta_imagen' WHERE id = $id_articulo";


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos | PHP Proyecto UTD</title>
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
            <?php if (isset($_SESSION['usuario'])): ?>
                <li><a href="acercade.php">Acerca de</a></li>
                <li><a href="mision.php">Misión</a></li>
                <li><a href="vision.php">Visión</a></li>
                <li><a href="articulos.php" class="active">Artículos</a></li>
                <li><a href="categorias.php">Categorías</a></li>
                <li><a href="../php/cerrarsesion.php" style="color: red;">Cerrar sesión</a></li>
            <?php else: ?>
                <li><a href="../html/registro.html">Registro</a></li>
                <li><a href="../html/iniciodesesion.html">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Lista de Artículos</h1>
            <hr>
            <?php if (isset($_SESSION['usuario'])): ?>
                <table border="1" style="width: 100%; text-align: left;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Artículo</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>Categoría</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['articulo']); ?></td>
                                <td><?php echo htmlspecialchars($row['pu']); ?></td>
                                <td><?php echo htmlspecialchars($row['cantidad']); ?></td>
                                <td><?php echo htmlspecialchars($row['categoria']); ?></td>
                                <td> 
                                    <?php if (!empty($row['imagen'])): ?>
                                        <img src="<?php echo htmlspecialchars($row['imagen']); ?>" alt="Imagen del artículo" style="width: 100px;">
                                    <?php else: ?>
                                        <p>No tiene imagen</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Para gestionar los artículos, por favor <a href="../html/iniciodesesion.html">inicia sesión</a>.</p>
            <?php endif; ?>
        </div>
    </section>
    <footer>
        <p>PHP MariWeb &copy; 2024</p>
    </footer>
</body>
</html>
