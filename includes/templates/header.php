<?php


if(!isset($_SESSION)){
    session_start();
}

$auth=$_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
       <!-- font awesome-->
       <script src="https://kit.fontawesome.com/8aca401b21.js" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="/teaproyect/build/css/app.css">
</head>
<body>
     <div id="contenido">
    <header class="header">
        <div class="contenedor">
            <div class="zona-logo">
                <div class="logo">
                    <img src="/teaproyect/build/img/logosvg.svg" alt="">
                </div>
                <div class="zona-logo__texto">
                    <a href="/teaproyect/index.php">
                    <h1>Centro de apoyo sobre los Trastornos del espectro autista (TEA)</h1>
                    </a>
                    <?php if($auth):?>
                        <a class="cerrar_sesion" href="cerrar-sesion.php">
                         <h5> cerrar sesion</h5>   
                        </a>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="titulo">
            <div class="contenedor">
                <div class="titulo_content">
                    <h1>En Puerto Ordaz, Edo. Bolivar.</h1>
                </div>
                
            </div>
        </div>
    </header>