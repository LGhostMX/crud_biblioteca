    <?php
    session_start();

    include("../PHP/db_conn.php");

    if(isset($_POST["insertar"])){
        $autor = $_POST["autor"];
        $titulo = $_POST["titulo"];
        $editorial = $_POST["editorial"];
        $ISBN = $_POST["ISBN"];
        $num_pags = $_POST["num_pags"];
        $clasificacion = $_POST["clasificacion"];
        $localizacion = $_POST["localizacion"];

        $query_autor = mysqli_query($conn, "INSERT INTO autores (nombre) VALUES ('$autor')");
        if ($query_autor) {
            $autor_AI = mysqli_insert_id($conn);
        } else {
            die("Error en consulta autor: " . mysqli_error($conn));
        }
        
        $query_libros = mysqli_query($conn, "INSERT INTO libros (titulo, editorial, ISBN, num_pags) VALUES ('$titulo', '$editorial', '$ISBN', $num_pags)");
        if ($query_libros) {
            $libros_AI = mysqli_insert_id($conn);
        } else {
            die("Error en consulta libros: " . mysqli_error($conn));
        }
        

        $query_ejemplares = mysqli_query($conn, "INSERT INTO ejemplares (clasificacion, codigo_lib, localizacion) VALUES ('$clasificacion', '$libros_AI', '$localizacion')");
        
        $query_relacion = mysqli_query($conn, "INSERT INTO autor_libro (codigo_autor, codigo_libro) VALUES ('$autor_AI', '$libros_AI')");

        if(!($query_autor && $query_libros && $query_ejemplares && $query_relacion)){
            echo "Error en las consultas: " . mysqli_error($conn);
            
        }else{
            $_SESSION['message'] = 'Libro agregado exitosamente';
            $_SESSION['message_type'] = 'success';

            header("Location: ../view/libros.php");
        }

    }

    ?>