<?php
include("conexion.php");

$sql = "SELECT id,nombre,descripcion,fecha,estatus FROM tbl_tareas";

$resultado = mysqli_query($conn,$sql);// está ejecutando una consulta a una base de datos utilizando la extensión mysqli de PHP.

$data = array();

while($fila = mysqli_fetch_assoc($resultado)){//es una función de PHP que se utiliza para obtener una fila de resultados como un array asociativo desde un conjunto de resultados devuelto por una consulta a la base de datos utilizando la extensión mysqli.
    $data []= $fila;//en cada iteración del bucle, se agrega una nueva entrada al array $data, que contiene los datos de la fila actual de la base de datos.
}

echo json_encode($data);//transformado en formato json

?>




