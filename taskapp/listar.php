<?php
    include 'conexion.php';

    $query = "SELECT * FROM tareas";
    $tareas = mysqli_query($conn, $query);

    if(!$tareas){
        die("Consulta fallida");
    }

    $json = array();
    while($row = mysqli_fetch_array($tareas)){
        $json[] = array(
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'id' => $row['id']
        );
    }
    
    $jsonString = json_encode($json);
    echo $jsonString;
