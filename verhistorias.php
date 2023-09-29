<?php

include 'includes/config/database.php';
$db = conectarDB();

$query = "SELECT * FROM historias WHERE publico=1;";
$resultado = mysqli_query($db, $query);


// incluyendo las funciones 
require 'includes/funciones.php';
// MUESTRA MENSAJE CONDICIONAL
$respuesta =$_GET['resultado'] ?? null; 

// incluyendo el header por medio de template
incluirTemplate('header');
?>
<div class="contenedor3 grid_cont3">
    <div class="grid-menu2">
        <nav class="menu2">
            <a href="sobre-nosotros.php">Sobre nosotros</a>
            <a href="informacion.php">Informacion</a>
            <a href="areas.php">Areas de atencion</a>
            <a href="verhistorias.php" class="active">Historias</a>
            <a href="galeria.php">Galeria</a>
            <a href="encuestas.php">Encuestas</a>
            <a href="noticias.php">Noticias</a>
            <a href="contacto.php">Contacto</a>
        </nav>
    </div>
    <div class="color_hist">

    <div class="contenedor hist">
        <h1>Historias publicadas</h1>
        <?php if(intval($respuesta) === 1):?>
            <p class="alerta exito">Historia enviada correctamente</p>
         <?php endif;?>
        <div class="enviar_historia">
            <p>¡Animate a enviar tu historia aqui!</p>
            <a href="historias.php">Publica tu historia</a>
        </div>

        <div class="historias_cont">
            <?php while ($historia = mysqli_fetch_assoc($resultado)) : ?>
                <seccion class="seccion">
                    <div class="seccion_titulo">
                        <h4><?php echo $historia['titulo']; ?></h4>
                    </div>
                    <div class="seccion2_color">

                    <div class="seccion_autor">
                        <h5>-<?php echo $historia['autor']; ?></h5>
                    </div>
                    <div class="seccion_texto">
                        <p class="descripcion"><?php echo $historia['descripcion']; ?></p>
                    </div>
                    <div class="seccion_fecha">
                        <h5 class="descripcion"><?php echo $historia['fecha']; ?></h5>
                    </div>
                    <div class="seccion_boton">
                        <a href="historia.php?id=<?php echo $historia['id'];?>">Leer mas</a>
                    </div>
                    </div>
                </seccion>


            <?php endwhile; ?>
        </div>
        </div>
    </div>
</div>
<?php
//  template del footer
incluirTemplate('footer');

?>