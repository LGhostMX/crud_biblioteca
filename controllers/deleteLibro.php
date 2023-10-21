<?php

    if(isset($_GET['codigo'])){
        include("../PHP/db_conn.php");
        $codigo = $_GET['codigo'];
        $query = "DELETE FROM libros WHERE codigo = $codigo";
        $resultado = mysqli_query($conn, $query);
        session_start();
        $_SESSION['message'] = "Libro eliminado correctamente";
        $_SESSION["message_type"] = "danger";
        header("Location: ../view/libros.php");
    }


?>