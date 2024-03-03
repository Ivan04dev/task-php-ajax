<?php 
    include 'conexion.php';

    if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['descripcion'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $query = "UPDATE tareas SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = '$id'";
        $resultado = mysqli_query($conn, $query);
        
        if(!$resultado){
            die('Error de conexión');
        }

        echo "Tarea Actualizada Correctamente";
    }
    