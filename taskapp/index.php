<?php
    include 'conexion.php';

    // $query = "SELECT * FROM tareas";
    // $tareas = mysqli_query($conn, $query);
    // var_dump($tareas);    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Seet Alert -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Task</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" id="buscar" placeholder="Ingresar tarea" aria-label="Search">
                <button class="btn btn-success" type="submit" >Buscar</button>
            </form>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title">
                        <h2 class="text-center">Formulario</h2>
                    </div>
                    <div class="card-body">
                        <form action="" id="formulario">
                            <input type="hidden" id="tareaId">
                            <div class="form-group mt-2">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            
                            <div class="d-grid gap-2 col-6 mx-auto mt-4">
                                <button class="btn btn-primary" id="boton">Guardar Tarea</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Tareas Encontradas -->
                <div class="card my-4" id="resultado-tareas">
                    <div class="card-body">
                        <ul id="contenedor-tareas"></ul>
                    </div>
                </div>
                <h2>Tareas</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-tareas-body">
                        <!-- <?php #while($tarea = mysqli_fetch_assoc($tareas)) : ?>
                        <tr>
                            <td><?php #echo $tarea['id']; ?></td>
                            <td><?php #echo $tarea['nombre']; ?></td>
                            <td><?php #echo $tarea['descripcion']; ?></td>
                        </tr>
                        <?php #endwhile; ?> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>          
    <!-- Sweet Alert -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> -->
    <script src="js/app.js"></script>
</body>
</html>