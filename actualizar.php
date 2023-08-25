<?php
include('conexion.php');

$id = $_GET['id'];

$sql = "SELECT * FROM tbl_tareas WHERE id = $id";

$resultado = mysqli_query($conn, $sql);

$fila = mysqli_fetch_assoc($resultado);

$nombre = $fila['nombre'];
$descripcion = $fila['descripcion'];
$fecha = $fila['fecha'];
$estatus = $fila['estatus'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD fetch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <div class="row pl-5">
            <div class="class col bg-dark text-light">
                <h1 class="text-center">Modificar tarea</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                <form>
                    <input type="hidden" id="id" value="<?php echo $id; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Tarea</label>
                        <input type="text" class="form-control" id="nombre" value="<?php echo $nombre; ?>"
                            placeholder="Ingresa tu tarea" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" rows="4"
                            placeholder="Escribe una breve descripción" required><?php echo $descripcion; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" value="<?php echo $fecha; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="realizado" class="form-label">¿Realizado?</label>
                        <input type="checkbox" class="form-check-input" id="estatus"
                            <?php echo $estatus === '1' ? 'checked' : ''; ?>>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="button" id="actualizar">Actualizar</button>
                    </div>
                </form>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
<script src="scriptActualizar.js"></script>
</body>

</html>