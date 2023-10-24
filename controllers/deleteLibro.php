<?php
    session_start();
    if(isset($_GET["autores"]) && isset($_GET["titulo"]) && isset($_GET["editorial"]) && isset($_GET["ISBN"]) && isset($_GET["num_pags"]) && isset($_GET["clasificacion"]) && isset($_GET["codigo"])){
        include("../PHP/db_conn.php");
        $autores = $_GET['autores'];
        $titulo = $_GET['titulo'];
        $editorial = $_GET['editorial'];
        $ISBN = $_GET['ISBN'];
        $num_pags = $_GET['num_pags'];
        $clasificacion = $_GET['clasificacion'];
        $codigoR = $_GET['codigo']; 

        $off_restrictions = mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

        $query_autores = mysqli_query($conn, "DELETE FROM autores WHERE nombre = '$autores'");

        $query_libros = mysqli_query($conn,"DELETE FROM libros WHERE titulo = '$titulo' AND editorial = '$editorial' AND ISBN = '$ISBN' AND num_pags = $num_pags ");

        $query_ejemplares = mysqli_query($conn,"DELETE FROM ejemplares WHERE clasificacion = '$clasificacion'");

        $query_relacion = mysqli_query($conn, "DELETE FROM autor_libro WHERE codigo_libro_autor = $codigoR");

        $on_restrictions = mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

        if($query_autores && $query_libros && $query_ejemplares && $query_relacion){
            $_SESSION['message'] = "Libro eliminado correctamente";
            $_SESSION['message_type'] = "danger";
            header("Location: ../view/libros.php");
        }


    }


?>