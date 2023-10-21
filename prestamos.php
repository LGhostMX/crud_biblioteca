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

  <table>
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
            include ("PHP/db_conn.php");

            $query = "SELECT * FROM prestamos";
        
        ?>
      </tbody>


  </table>
</body>
</html>