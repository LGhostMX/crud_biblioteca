<!DOCTYPE html>
<html>
<head>
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
        <h2>Formulario de Ingreso</h2>
        <form action="../controllers/iniciarSesion.php" method="post">
            <input type="text" id="id" name="id" placeholder="ID" class="input-field" required><br>
            <input type="tel" id="phone" name="telefono" placeholder="Teléfono" class="input-field" required><br>
            <input type="submit" value="Continuar" class="button">
        </form>
    </div>
</body>
</html>