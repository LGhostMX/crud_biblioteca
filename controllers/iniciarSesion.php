<?php

session_start();

include("../PHP/db_conn.php");


$_SESSION['id'] = $_POST['id'];
$_SESSION['telefono'] = $_POST['telefono'];


$resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = '".$_SESSION['id']."' AND telefono = '".$_SESSION['telefono']."'");
if(!$resultado){
    header("Location: ../login/login.php");
}else{
    header("Location: ../home.php");
}


?>