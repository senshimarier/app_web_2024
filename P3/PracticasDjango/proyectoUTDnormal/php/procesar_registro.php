<?php
include 'conexion.php'; // Asegúrate de que este archivo esté correctamente configurado

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($apellidos) || empty($email) || empty($usuario) || empty($password)) {
        echo "
        <script>
            alert('Todos los campos son obligatorios.');
            window.location.href = '../html/registro.php';
        </script>
        ";
        exit();
    }

    // Encriptar la contraseña
    $password_encriptada = password_hash($password, PASSWORD_BCRYPT);

    // Preparar la consulta para insertar el nuevo usuario
    $query = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, email, username, password, privilegio) VALUES (?, ?, ?, ?, ?, 'usuario')");
    $query->bind_param("sssss", $nombre, $apellidos, $email, $usuario, $password_encriptada);

    // Ejecutar la consulta y manejar errores
    if ($query->execute()) {
        echo "
        <script>
            alert('Registro exitoso.');
            window.location.href = '../html/iniciodesesion.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error en el registro: " . $conexion->error . "');
            window.location.href = '../html/registro.php';
        </script>
        ";
    }

    // Cerrar la conexión
    $query->close();
    $conexion->close();
} else {
    // Si se accede al archivo por un método diferente a POST
    echo "
    <script>
        alert('Error: Método no permitido.');
        window.location.href = '../html/registro.php';
    </script>
    ";
}

?>
