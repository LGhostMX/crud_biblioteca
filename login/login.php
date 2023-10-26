<!DOCTYPE html>
<html>
<head>
    <?php 
    include("../PHP/db_conn.php");
    $codigo = $_GET['codigo'];
    ?>
    <title>Formulario de Ingreso</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .input-field {
            display: block;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .button {
            display: inline-block;
            margin: 10px auto;
            padding: 10px 20px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Datos del libro solicitado</h2>
        <?php

            $query = "SELECT * FROM libros WHERE codigo = '$codigo'";
            $resultado = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($resultado)){ 
                
                echo "<strong>Titulo:</strong> ".$row['titulo']."<br>";
                echo "<strong>Editorial:</strong> ".$row['editorial']."<br>";
                echo "<strong>ISBN</strong> ".$row['ISBN']."<br>";
                echo "<strong>Número de páginas:</strong> ".$row['num_pags']."<br>";
                
            }
                ?>

        <h2>Ingresa tus datos</h2>

        <form action="../controllers/solicitarLibro.php" method="post">
        <input type="text" name="libro" value="<?php echo $codigo ?>" hidden>
            <input type="text" id="codigo" name="codigo" placeholder="Codigo de usuario" class="input-field" required><br>
            <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" class="input-field" required><br>
            <label for="">Ingresa la fecha de préstamo</label>
            <input type="date" id="fecha_pre" name="fecha_pre" class="input-field" required><br>
            <label for="">Ingresa la fecha de devolución</label>
            <input type="date" id="fecha_dev" name="fecha_dev" class="input-field" required><br>
            <input type="submit" value="Continuar" class="button">
        </form>
    </div>
</body>
</html>