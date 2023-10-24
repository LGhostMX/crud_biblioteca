<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar registros</title>
    <style>

form {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

input[type=text], input[type=number] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
    opacity: .8;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <?php
    
    include ("../PHP/db_conn.php");

    session_start();

    ?>

    <nav class="nav navbar bg-dark">
        <div class="container">
        <a href="home.html"><button class="btn btn-info">Regresar</button></a>
        </div>
    </nav>

    <div class="container">
        <br>

        <?php
            if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php session_unset(); } ?>



                <h1>Libros disponibles</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Editorial</th>
                            <th>ISBN</th>
                            <th>N. Pags</th>
                            <th>Autores</th>
                            <th>Clasificacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $query = "SELECT autor_libro.codigo_libro_autor, libros.codigo, libros.titulo, libros.editorial, libros.ISBN, libros.num_pags, GROUP_CONCAT(autores.nombre SEPARATOR ', ') as autores, ejemplares.clasificacion FROM autor_libro INNER JOIN libros ON libros.codigo = autor_libro.codigo_libro INNER JOIN autores ON autores.codigo = autor_libro.codigo_autor INNER JOIN ejemplares ON ejemplares.codigo = libros.codigo GROUP BY autor_libro.codigo_libro_autor;";
                            $resultado = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($resultado)){ ?>
                                <tr>
                                    <td><?php echo $row['codigo_libro_autor']; ?></td>
                                    <td><?php echo $row['titulo']; ?></td>
                                    <td><?php echo $row['editorial']; ?></td>
                                    <td><?php echo $row['ISBN']; ?></td>
                                    <td><?php echo $row['num_pags']; ?></td>
                                    <td><?php echo $row['autores']; ?></td>
                                    <td><?php echo $row['clasificacion']; ?></td>
                                    <td>
                                        <a href="../login/index.php?codigo=<?php echo $row['codigo']; ?>">
                                        <button class="btn btn-primary">Solicitar</button>
                                        </a>
                                        <a href="editLibro.php?codigo=<?php echo $row['codigo_libro_autor']; ?>">
                                        <button class="btn btn-warning">Editar</button>
                                        </a>
                                        <a href="../controllers/deleteLibro.php?autores=<?php echo $row['autores']?>&titulo=<?php echo $row['titulo']?>&editorial=<?php echo $row['editorial']?>&ISBN=<?php echo $row['ISBN']?>&num_pags=<?php echo $row['num_pags']?>&clasificacion=<?php echo $row['clasificacion']?>&codigo=<?php echo $row['codigo_libro_autor'] ?>">
                                        <button class="btn btn-danger">Eliminar</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                    </tbody>
                </table>


    </div>

    <div class="container">
    <form action="../controllers/insertarLibro.php" method="POST">

        <h2>Añadir un nuevo libro</h2>

        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor" required><br>

        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="editorial">Editorial:</label><br>
        <input type="text" id="editorial" name="editorial" required><br>

        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="ISBN" required ><br>

        <label for="paginas">Número de Páginas:</label><br>
        <input type="number" id="paginas" name="num_pags" required><br>

        <label for="clasificacion">Clasificacion:</label><br>
        <input type="text" id="clasificacion" name="clasificacion" required><br>

        <label for="fecha_pre">Fecha de Prestamo:</label><br>
        <input type="date" id="fecha_pre" name="fecha_pre" required><br><br>

        <label for="fecha_dev">Fecha de Devolucion:</label><br>
        <input type="date" id="fecha_dev" name="fecha_dev" required><br><br>

        <label for="localizacion">Localización:</label><br>
        <input type="text" id="localizacion" name="localizacion" required ><br>

        <input type="submit" value="Enviar" name="insertar">
    </form> 
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>