<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$desc = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$estatus = $_POST['estatus'];

$sql = "INSERT INTO tbl_tareas(nombre,descripcion,fecha,estatus) VALUES('$nombre','$desc','$fecha','$estatus')";

if (mysqli_query($conn, $sql)) {//Se ejecuta la consulta SQL
    $id = mysqli_insert_id($conn);// Obtén el ID del nuevo registro insertado

    // Consulta el nuevo registro desde la base de datos
    $consulta = "SELECT * FROM tbl_tareas WHERE id = $id";
    $resultado = mysqli_query($conn, $consulta);//contendrá un "recurso" de resultado que puede ser utilizado para obtener los datos de la fila (o filas)
    $nuevoRegistro = mysqli_fetch_assoc($resultado);//Esto devuelve un array asociativo que contiene los datos del nuevo registro.

    // Devuelve los datos del nuevo registro como una respuesta en formato JSON
    echo json_encode($nuevoRegistro);
} else {
    echo "Error al insertar el registro: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
