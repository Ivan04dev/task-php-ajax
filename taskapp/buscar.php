<?php
    include 'conexion.php';

    $buscar;
    if($_POST['buscar']){
        $buscar = $_POST['buscar'];
        // echo $buscar;
        if(!empty($buscar)){
            // Realiza la búsqueda por nombre
            $query = "SELECT * FROM tareas WHERE nombre LIKE '$buscar%'";
            // Almacena el resultado de la consulta 
            $resultado = mysqli_query($conn, $query);
            if(!$resultado){
                die('Error de consulta' . mysqli_error($conn));
            }

            $json = array();
            
            while($row = mysqli_fetch_array($resultado)){
                $json[] = array(
                    'nombre' => $row['nombre'],
                    'descripcion' => $row['descripcion'],
                    'id' => $row['id']
                );
            }
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }