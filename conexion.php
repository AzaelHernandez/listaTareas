<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db="practica_fetch";

$conn = mysqli_connect($hostname, $username, $password, $db);

// Verificar la conexión
if (!$conn) {
    die("Error al conectar: " . mysqli_connect_error());
}

?>