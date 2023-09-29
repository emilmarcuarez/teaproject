<?php



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
            <a href="galeria.php" class="active">Galeria</a>
            <a href="encuestas.php">Encuestas</a>
            <a href="noticias.php">Noticias</a>
            <a href="contacto.php">Contacto</a>
        </nav>
    </div>
    <div class="contenedor nosotros_cont">
        <h1>Galeria</h1>
       <div class="enviar_foto">
        <p>Envia tu foto al siguiente correo: <span>teaproyectpzo@gmail.com</span></p>
       </div>
      <div class="galeria-autos grid_galeria">
        <!-- <img src="build/img/20.png" alt="">
        <img src="build/img/21.png" alt="">
        <img src="build/img/22.png" alt="">
        <img src="build/img/23.png" alt="">
        <img src="build/img/24.png" alt="">
        <img src="build/img/25.png" alt="">
        <img src="build/img/26.png" alt="">
        <img src="build/img/27.png" alt="">
        <img src="build/img/28.png" alt=""> -->
      </div>
    </div><!--CIERRE CONTENEDOR-->
</div>
<?php
//  template del footer
incluirTemplate('footer');

?>