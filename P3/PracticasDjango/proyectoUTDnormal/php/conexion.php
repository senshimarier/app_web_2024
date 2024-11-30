<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bd_proyectoutd';

$conexion = new mysqli($host, $user, $password, $dbname);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>
