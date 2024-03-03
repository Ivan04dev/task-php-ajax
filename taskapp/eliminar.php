<?php
    include 'conexion.php';

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        // echo $id;
        // exit;
        $query = "DELETE FROM tareas WHERE id = $id";
        $resultado = mysqli_query($conn, $query);
        if(!$resultado){
            die("Error al eliminar");
        }
        echo "Se eliminó correctamente";
    }