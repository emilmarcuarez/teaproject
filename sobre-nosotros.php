<?php



// incluyendo las funciones 
require 'includes/funciones.php'; 

// incluyendo el header por medio de template
incluirTemplate('header');
?>
<div class="contenedor3 grid_cont3">
    <div class="grid-menu2">
        <nav class="menu2">
            <a href="sobre-nosotros.php" class="active">Sobre nosotros</a>
            <a href="informacion.php">Informacion</a>
            <a href="areas.php">Areas de atencion</a>
            <a href="verhistorias.php">Historias</a>
            <a href="galeria.php">Galeria</a>
            <a href="encuestas.php">Encuestas</a>
            <a href="noticias.php">Noticias</a>
            <a href="contacto.php">Contacto</a>
        </nav>
    </div>
    <div class="contenedor nosotros_cont">
        <h1>Sobre nosotros</h1>
       
        <p>Somos estudiantes del 8vo semestre de ingenieria de sistemas que iniciamos este proyecto con el fin de ofrecer una pagina web que contenga informacion acerca de los Trastornos del Espectro Autista (TEA) en Ciudad Guayana.</p>

        <div class="nosotros-contacto">
            <h4>Para ponerte en contacto con nosotros, rellena el siguiente formulario:<a href="contacto.php" class="enlace_click">Click aqui</a> </h4>
            
            
        </div>
        <div class="numeros">
            <p>Numeros telefonicos: </p>
            <ul>
                <li>+58 414-7675878</li>
                <li>+58 424-9462589</li>
            </ul>
        </div>
        <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252679.45668939856!2d-62.874324698671!3d8.291202457845888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8dcbf02b84200b49%3A0x6e05317f7c974d14!2sCiudad%20Guayana%2C%20Bol%C3%ADvar!5e0!3m2!1ses!2sve!4v1684735282565!5m2!1ses!2sve" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div><!--CIERRE CONTENEDOR-->
</div>
<?php
//  template del footer
incluirTemplate('footer');

?>