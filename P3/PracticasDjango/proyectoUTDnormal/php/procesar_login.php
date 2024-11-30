<?php
session_start();
include 'conexion.php';

// Recibir datos del formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Validar campos vacíos
if (empty($usuario) || empty($password)) {
    $_SESSION['mensaje_error'] = 'Todos los campos son obligatorios.';
    header('Location: ../html/iniciodesesion.php');
    exit();
}

// Verificar usuario en la base de datos
$query = $conexion->prepare("SELECT id, username, password, nombre, apellidos, email FROM usuarios WHERE username = ?");
$query->bind_param("s", $usuario);
$query->execute();
$resultado = $query->get_result();

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();

    // Verificar contraseña
    if (password_verify($password, $fila['password'])) {
        // Guardar datos en la sesión
        $_SESSION['usuario'] = $fila['username'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['apellidos'] = $fila['apellidos'];
        $_SESSION['email'] = $fila['email'];

        // Mensaje de éxito
        $_SESSION['mensaje_exito'] = 'Inicio de sesión exitoso.';
        header('Location: ../php/index.php');
        exit();
    } else {
        // Contraseña incorrecta
        $_SESSION['mensaje_error'] = 'Contraseña incorrecta.';
        header('Location: ../html/iniciodesesion.php');
        exit();
    }
} else {
    // Usuario no existe
    $_SESSION['mensaje_error'] = 'El usuario no existe.';
    header('Location: ../html/iniciodesesion.php');
    exit();
}

$query->close();
$conexion->close();
?>
