<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD fetch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="row pl-5">
            <div class="class col bg-dark text-light">
                <h1 class="text-center">Actividades diarias</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-4">
                <form>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Tarea</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu tarea" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" rows="4"
                            placeholder="Escribe una breve descripción" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit" id="insertar">Enviar</button>
                    </div>
                </form>
            </div>

            <div class="col-8">
                <table class="table">
                    <thead>
                        <tr class="table-primary text-white">
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Estatus</th>
                            <th scope="col" class="text-center">Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody id="cuerpoTabla">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>

</html>