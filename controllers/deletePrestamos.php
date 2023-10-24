<?php
    session_start();

   include("../PHP/db_conn.php");
 
    if (isset($_GET['codigo'])) {
        $codigo = $_GET['codigo'];
        $query = mysqli_query($conn, "DELETE FROM ejemplar_usuario WHERE ejemplar_usuario = $codigo");
        if(!$query){
            die("Error en la consulta: " . mysqli_error($conn));
        }else{
            $_SESSION['message2'] = 'Prestamo eliminado exitosamente';
            $_SESSION['message2_type'] = 'danger';
            header("Location: ../view/prestamos.php");

        }

    } else {
        echo "No se proporcionó un valor para 'codigo'.";
    }





?>


