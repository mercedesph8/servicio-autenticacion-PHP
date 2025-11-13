<?php 
session_start();

//Cierro sesión si se pulsa el botón
if (isset($_GET['cerrar'])){
    //destruyo el usuario de $_SESSION y redirijo a la pantalla de login
    session_destroy();
    header("Location: login.php");
    exit();
}

//Verifico si el usuario está logado (si está en $_session o no).
if(!isset($_SESSION['usuario'])){
    //Si no está, no tiene iniciada sesión, por lo que se redirige a permisos.php
    header("Location: permisos.php");
    exit();
}

//Los datos que se muestran en la página
$nombre_usuario = $_SESSION['usuario'];
$hora = date("H:i:s");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    
    <div class="contenedor">
        <div class="caja-bienvenida">
            <h1>¡Bienvenido, <?php echo $nombre_usuario; ?>!</h1>
            
            <div class="info-sesion">
                <p><strong>Hora actual:</strong> <?php echo $hora;?></p>
                <p class="mensaje-especial">
                   <?php echo "¡GRACIAS POR ENTRAR EN NUESTRA PÁGINA WEB!"?>
                </p>
            </div>
<!--Botón de cerrar sesión, si pulsa te redirige a esta misma página y ejecuta el bloque de cerrar sesión, que te lleva a la pantalla de login -->
            <a href="bienvenida.php?cerrar=true" class="boton-cerrar">Cerrar sesión</a>
        </div>
    </div>
    
</body>
</html>