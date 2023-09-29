<?php 
// incluyendo el header 
require 'includes/funciones.php';

// incluyendo el header 
    incluirTemplate('header');
?>

    <main class="contenedor seccion">

        <h2>Casas y Depas en Venta</h2>
        <?php 
            $limite=10;
            include 'includes/templates/anuncios.php';
        ?>
    </main>

    <?php 
   //  template del footer
   incluirTemplate('footer');
    ?>