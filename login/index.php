<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
<?php
    session_start();

    $codigo = $_GET['codigo'];
    
?>
<body>
    <div class="container">

        <?php
            if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <h2>Datos de usuario, guardar para soliciar prestamos.</h2>
                    <h3>Código de usuario: </h3><?= $_SESSION['codigo'] ?>
                    <h3>Teléfono de usuario: </h3><?= $_SESSION['telefono'] ?>
                </div>
        <?php } ?>

        <?php 
        if(isset($_SESSION['message'])){?>
            <h1>Escoge una opción</h1>
            <div class="button-container">
                <button onclick="location.href='login.php?codigo=<?php echo $codigo; ?>'">Solicitar prestamo</button>
            </div>

        <?php session_unset(); } else { ?>
            <h1>Selecciona el tipo de usuario</h1>
            <div class="button-container">
                <button onclick="location.href='login.php?codigo=<?php echo $codigo; ?>'">Usuario Existente</button>
                <button onclick="location.href='nuevo_user.php?codigo=<?php echo $codigo ?>'">Nuevo Usuario</button>
            </div>
        <?php } ?>
        <button onclick="location.href='../view/libros.php'">Regresar</button>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>