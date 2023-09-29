<?php

include 'includes/config/database.php';
$db = conectarDB();

$query = "SELECT * FROM noticias;";
$resultado = mysqli_query($db, $query);


// incluyendo las funciones 
require 'includes/funciones.php';

// incluyendo el header por medio de template
incluirTemplate('header');
?>
<div class="contenedor3 grid_cont3">
    <div class="grid-menu2">
        <nav class="menu2">
            <a href="sobre-nosotros.php">Sobre nosotros</a>
            <a href="informacion.php">Informacion</a>
            <a href="areas.php">Areas de atencion</a>
            <a href="verhistorias.php">Historias</a>
            <a href="galeria.php">Galeria</a>
            <a href="encuestas.php">Encuestas</a>
            <a href="noticias.php" class="active">Noticias</a>
            <a href="contacto.php">Contacto</a>
        </nav>
    </div>
    <div class="contenedor secc_noticias">
        <h1>Noticias</h1>
        <div class="contenedor-noticias">
            <!-- iterar los resultados que traje desde la base de datos -->
            <?php while ($noticia = mysqli_fetch_assoc($resultado)) : ?>
                <div class="divi" onclick="location.href='noticia.php?id=<?php echo $noticia['id']; ?>'">
                    
                    <div class="noticias_div">
                        <picture>

                            <img loading="lazy" src="/teaproyect/imagenes/<?php echo $noticia['imagen']; ?>" alt="anuncio">
                        </picture>

                        <div class="contenido-anuncios">
                            <h3><?php echo $noticia['titulo']; ?></h3>
                            <p class="descripcion"><?php echo $noticia['descripcion']; ?></p>
                           
                        </div>
                    </div>
                    <div class="small">
                        <small class="card-footer text-muted text-right">
                        -<?php echo $noticia['fecha']; ?>- </small>
                    </div>
                    
                </div>

                <!--.contenido-anuncio-->
                <!--anuncio-->
            <?php endwhile; ?>
        </div>
    </div>
</div><!--CIERRE CONTENEDOR-->
</div><!--CIERRE CONTENEDOR 3-->
<?php
//  template del footer
incluirTemplate('footer');

?>