<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seleccionar Tipo de Usuario</title>
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
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        
        .button-container {
            text-align: center;
        }
        
        .button-container button {
            display: block;
            width: 100%;
            padding: 10px 0;
            margin: 10px 0;
            background-color: #0077b6;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .button-container button:hover {
            background-color: #005a94;
        }
        
        footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Seleccionar Tipo de Usuario</h1>
        <div class="button-container">
            <button onclick="location.href='login.php'">Usuario Existente</button>
            <button onclick="location.href='nuevo_user.php'">Nuevo Usuario</button>
        </div>
    </div>
</body>
</html>