<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editando libro</title>
</head>
<body>
    <?php
    include("../PHP/db_conn.php");

    if(isset($_GET['codigo'])){
        $codigo = $_GET['codigo'];
        $query = "SELECT * FROM libros WHERE codigo = $codigo";
        $resultado = mysqli_query($conn, $query);
        $res = mysqli_fetch_array($resultado);
    }


    if(isset($_POST['update'])){
        session_start();
        $titulo = $_POST['titulo'];
        $editorial = $_POST['editorial'];
        $ISBN = $_POST['ISBN'];
        $num_pags = $_POST['num_pags'];

        $query = "UPDATE libros SET titulo = '$titulo', editorial = '$editorial', ISBN = '$ISBN', num_pags = '$num_pags' WHERE codigo = $codigo";
        $resultado = mysqli_query($conn, $query);
        $_SESSION['message'] = "Libro editado correctamente";
        $_SESSION["message_type"] = "warning";
        header("Location: libros.php");
    }

    ?>

    <div class="container">

        <h1>Editando libro  "<?php echo $res['titulo'] ?>"</h1>

        <form action="editLibro.php?codigo=<?php echo $codigo ?>" method="post">

        <input type="text" name="codigolibro" value="<?php echo $codigo ?>" hidden>
        <div class="mb-3">
            <label class="form-label">Titulo del libro</label>
            <input type="text" class="form-control" name="titulo" value="<?php echo $res['titulo']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Editorial</label>
            <input type="text" class="form-control" name="editorial" value="<?php echo $res['editorial']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">ISBN</label>
            <input type="text" class="form-control" name="ISBN" value="<?php echo $res['ISBN']; ?>">
        </div>  
        <div class="mb-3">
            <label class="form-label">Número de páginas</label>
            <input type="text" class="form-control" name="num_pags" value="<?php echo $res['num_pags']; ?>">
        </div>  
        
        
        <input type="submit" value="Confirmar editado" class="btn btn-warning" name="update">
        </form>

        <br>

        <a href="libros.php"><button class="btn btn-primary">Regresar</button></a>
    </div>

    
</body>
</html>