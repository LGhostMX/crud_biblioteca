<?php

    include("../PHP/db_conn.php");

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $resultado = mysqli_query($conn, "INSERT INTO usuarios (telefono, direccion, nombre) VALUES ('$telefono', '$direccion', '$nombre')");

    if(!$resultado){
        die("Error en consulta: " . mysqli_error($conn));
    }else{
        header("Location: ../login/index.php");
    }
    

?>