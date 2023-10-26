<?php

include("../PHP/db_conn.php");

$codigo_usuario = $_POST['codigo'];
$telefono = $_POST['telefono'];
$codigo_libro = $_POST['libro'];
$fecha_pre = $_POST['fecha_pre'];
$fecha_dev = $_POST['fecha_dev'];


$query = "INSERT INTO ejemplar_usuario (codigo_ejemplar, codigo_usuario, fecha_pre, fecha_dev) VALUES ('$codigo_libro', '$codigo_usuario', '$fecha_pre', '$fecha_dev')";
$resultado = mysqli_query($conn, $query);

if(!$resultado){
    die("". mysqli_error($conn));
}else{
    header("Location: ../view/prestamos.php");
}

?>