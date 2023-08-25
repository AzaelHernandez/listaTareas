<?php
include("conexion.php");

$id = $_POST['id'];

$sql = "DELETE FROM tbl_tareas WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    // Consulta la lista actualizada de registros desde la base de datos
    $consulta = "SELECT * FROM tbl_tareas";
    $resultado = mysqli_query($conn, $consulta);
    $registros = array();
    while ($row = mysqli_fetch_assoc($resultado)) {
        $registros[] = $row;
    }

    // Devuelve la lista actualizada de registros como una respuesta en formato JSON
    echo json_encode($registros);
} else {
    echo "Error al borrar el registro: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
