<?php

include("conexion.php");

$nombre = $_POST['nombre'];
$desc = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$estatus = $_POST['estatus'];

$id = $_POST['id'];

$sql = "UPDATE tbl_tareas SET nombre='$nombre',descripcion='$desc',fecha='$fecha',estatus='$estatus' WHERE id=$id";


mysqli_query($conn,$sql);