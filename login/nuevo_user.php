<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Nuevo Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            padding-left: 13px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #0077b6;
        }

        .form-container {
            text-align: left;
            margin-top: 20px;
        }

        .form-container label {
            display: block;
            font-weight: bold;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button-container {
            text-align: center;
        }

        .button-container button {
            display: block;
            width: 100%;
            padding: 10px 0;
            background-color: #0077b6;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-container button:hover {
            background-color: #005a94;
        }
    </style>
</head>
<body>
    <?php
    $codigo = $_GET['codigo'];
    ?>
    <div class="container">
        <h1>Registro de Nuevo Usuario</h1>
        <div class="form-container">
            <form action="../controllers/nuevoUsuario.php?codigo=<?php echo $codigo ?>" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required>

                <div class="button-container">
                    <button type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>
