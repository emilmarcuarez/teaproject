    
<?php 
    // importar la conexion
    // CON DIR HACE QUE EL REQUIRE SEA RELATIVO HACIA LA UBICACION EN DONDE ESTA ESTE TEMPLATE
        require __DIR__ .'/../config/database.php';
        $db=conectarDB();
    // consultar
        $query="SELECT * FROM propiedades LIMIT $limite";
    // obtener resultados
        $resultado=mysqli_query($db,$query);

?>
    <div class="contenedor-anuncios">
        <!-- iterar los resultados que traje desde la base de datos -->
        <?php while($propiedad = mysqli_fetch_assoc($resultado)):?>
            <div class="anuncio">
                    <picture>
                        
                        <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen'];?>" alt="anuncio">
                    </picture>

                    <div class="contenido-anuncio">
                        <h3><?php echo $propiedad['titulo'];?></h3>
                        <p class="descripcion"><?php echo $propiedad['descripcion'];?></p>
                        <a href="anuncio.php?id=<?php echo $propiedad['id'];?>">Leer mas</a>
                        <p class="precio">$<?php echo $propiedad['precio'];?></p>

                        <ul class="iconos-caracteristicas">
                            <li>
                                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                                <p><?php echo $propiedad['wc'];?></p>
                            </li>
                            <li>
                                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                                <p><?php echo $propiedad['estacionamiento'];?></p>
                            </li>
                            <li>
                                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                                <p><?php echo $propiedad['habitaciones'];?></p>
                            </li>
                        </ul>

                        <a href="anuncio.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">
                            Ver Propiedad
                        </a>
                    </div><!--.contenido-anuncio-->
                </div><!--anuncio-->
            <?php endwhile; ?>
         </div>

        <?php
            // CERRAR LA CONEXION
            mysqli_close($db);
        ?>