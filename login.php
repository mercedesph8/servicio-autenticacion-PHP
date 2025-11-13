<?php
session_start(); //necesario para iniciar sesión

//Array predefinido de los usuarios que "están registrados"
$usuarios_correctos = [
    "admin" => "admin",
    "usuario" => "1234",
    "mercedes" => "0000"
];

$error = ""; //Variable para los mensajes de error

//Verifico si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Si se ha enviado entra

    //Recibo los datos del usuario
    $usuario_introducido = $_POST['usuario'];
    $contrasenia_introducida = $_POST['password'];

    //Verifico si ese usuario existe
    if (isset($usuarios_correctos[$usuario_introducido])) {

        if ($usuarios_correctos[$usuario_introducido] == $contrasenia_introducida) {

            $_SESSION['usuario'] = $usuario_introducido; //Guardo el nombre de usuario en la sesión

            //Redirijo a la página de  y paro la ejecución del script
            header("Location: bienvenida.php");
            exit();
        } else {
            //Lanzo error de contraseña incorrecta
            $error = "Contraseña Incorrecta";
        }
    } else {
        //Lanzo error de que el usuario no existe
        $error = "El usuario no existe";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <div class="contenedor">
        <div class="caja-login">
            <h1>Iniciar Sesión</h1>
            <?php
            if ($error != "") {
                echo $error;
            }
            ?>
            <form action="login.php" method="POST">
                <div class="campo">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>

                <div class="campo">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>

</body>

</html>