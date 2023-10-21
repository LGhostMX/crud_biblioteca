<?php


    session_start();

    include("../PHP/db_conn.php");

    $codigoPOST = $_GET["codigo"];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $resultado = mysqli_query($conn, "INSERT INTO usuarios (telefono, direccion, nombre) VALUES ('$telefono', '$direccion', '$nombre')");

    if(!$resultado){
        die("Error en consulta: " . mysqli_error($conn));
    }else{
        // Obtén el ID autoincrementable que se acaba de crear
        $ultimo_id = mysqli_insert_id($conn);
        $_SESSION['message'] = 'Usuario registrado exitosamente';
        $_SESSION['message_type'] = 'success';
        $_SESSION['codigo'] = $ultimo_id;
        $_SESSION['telefono'] = $telefono;

        header("Location: ../login/index.php?codigo=$codigoPOST");
    }
    

?>