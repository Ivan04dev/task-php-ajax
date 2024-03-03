<?php
    include 'conexion.php';

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        // echo $id;
        $query = "SELECT * FROM tareas WHERE id = $id";
        $resultado = mysqli_query($conn, $query);
        if(!$resultado){
            die("Error al editar");
        }

        $json = array();
        while($row = mysqli_fetch_array($resultado)){
            $json[] = array(
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion'],
                'id' => $row['id']
            );
        }

        $jsonString = json_encode($json[0]);
        echo $jsonString;
    }