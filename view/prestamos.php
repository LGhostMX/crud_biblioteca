<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body {
      background-color: #ffffff;
      text-align: center;
  }
  
  .container {
      margin-top: 100px;
  }
  
  body {
      font-family: Arial, sans-serif;
  }
  
  h1 {
      text-align: center;
  }
  
  table {
      width: 80%;
      margin: 0 auto;
      border-collapse: collapse;
  }
  
  table, th, td {
      border: 1px solid #999;
  }
  
  th, td {
      padding: 10px;
      text-align: center;
  }
  
  th {
      background-color: #000000;
      color: #fff;
  }
  
  tr:nth-child(even) {
      background-color: #ffffff;
  }
  
  .solicitar-button {
      background-color: #0077b6;
      color: #fff;
      border: none;
      padding: 10px 27px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 5px;
      cursor: pointer;
  }

  .miscbtn {
      background-color:darkslategray;
      color: #fff;
      border: none;
      padding: 10px 27px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 5px;
      cursor: pointer;
  }
  
  .eliminar-button{
      background-color: #c41717;
      color: #fff;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 5px;
      cursor: pointer;
      
  }
  
  

  
  </style>
<body>
  <h1>Préstamos</h1>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    <a href="home.html" class="">
    <button class="miscbtn">Regresar</button>
    </a>

  <?php
    session_start();

            if(isset($_SESSION['message2'])){?>
                <div class="alert alert-<?=$_SESSION['message2_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message2'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php session_unset(); } ?>
        
  <table class="table table-striped">
      <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Ejemplar</th>
            <th>Fecha de préstamo</th>
            <th>Fecha de devolución</th>
            <th>Acciones</th>
        </tr>
      </thead>
      
      <tbody>
        <?php
            include ("../PHP/db_conn.php");

            $query = "SELECT ejemplar_usuario.ejemplar_usuario, usuarios.nombre, usuarios.direccion, usuarios.telefono, libros.titulo, ejemplares.fecha_pre, ejemplares.fecha_dev FROM usuarios INNER JOIN ejemplar_usuario ON usuarios.codigo = ejemplar_usuario.codigo_usuario INNER JOIN libros ON ejemplar_usuario.codigo_ejemplar = libros.codigo INNER JOIN ejemplares ON ejemplar_usuario.codigo_ejemplar = ejemplares.codigo ORDER BY ejemplar_usuario.ejemplar_usuario ASC";
            $resultado = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($resultado)){ ?>

                <tr>
                    <td><?php echo $row['ejemplar_usuario']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['direccion']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo $row['fecha_pre']; ?></td>
                    <td><?php echo $row['fecha_dev']; ?></td>
                    <td>
                        <a href="../controllers/deletePrestamos.php?codigo=<?php echo $row['ejemplar_usuario']; ?>">
                        <button class="eliminar-button">Eliminar</button>
                        </a>
                    </td>
                </tr>

             <?php } ?>
      </tbody>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
