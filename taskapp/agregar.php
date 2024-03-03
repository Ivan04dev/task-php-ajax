<?php
    include 'conexion.php';

    if(isset($_POST['nombre']) && isset($_POST['descripcion'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        
        $query = "INSERT INTO tareas(nombre, descripcion) VALUES('$nombre', '$descripcion')";
        $resultado = mysqli_query($conn, $query);
        // var_dump($resultado);
        if(!$resultado){
            die('Error al guardar');
        }

        echo 'Agregado Correctamente';
    }