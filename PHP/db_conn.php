<?php
$servername = "localhost";
$username = "root";
$password = "27115518";
$dbname = "biblioteca";


    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Error al conectar a la base de datos 2: " . mysqli_connect_error());
    }


?>
