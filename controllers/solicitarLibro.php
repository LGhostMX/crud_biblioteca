<?php

include("../PHP/db_conn.php");

$codigo_usuario = $_POST['codigo'];
$telefono = $_POST['telefono'];
$codigo_libro = $_POST['libro'];

$query = "INSERT INTO ejemplar_usuario (codigo_ejemplar, codigo_usuario) VALUES ('$codigo_libro', '$codigo_usuario')";
$resultado = mysqli_query($conn, $query);

if(!$resultado){
    die("". mysqli_error($conn));
}else{
    header("Location: ../view/prestamos.php");
}

?>