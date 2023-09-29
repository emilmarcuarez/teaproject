<?php 

// incluyendo el header 
require 'includes/funciones.php';

// incluyendo el header 
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
            <a href="encuestas.php" class="active">Encuestas</a>
            <a href="noticias.php">Noticias</a>
            <a href="contacto.php">Contacto</a>
        </nav>
    </div>
    <div class="contenedor seccion_encuesta_pag">

        <h1>Encuesta</h1>
        <p>Para partipar en la encuesta: <a href="https://docs.google.com/forms/d/e/1FAIpQLSeitOoQYa4BWfT-SXiq6WYqDkkg4RoGQJPLwCVElSjgKvDa8A/viewform" target="_blank">Encuesta</a></p>
        <h4>Los estadisticas obtenidas de las encuestas hasta el <span>23 de mayo del 2023</span> son las siguientes: </h4>
        <div class="graficos">
            <div class="grafico_cont">
                <h5>¿Conoce usted que son los Trastornos del espectro autista (TEA)?</h5>
                 <img src="build/img/g1.png" alt="">
            </div>
            <div class="grafico_cont">
                <h5>¿Ha oído hablar sobre los Trastornos del espectro autista (TEA)?</h5>
                 <img src="build/img/g2.png" alt="">
            </div>
            <div class="grafico_cont">
                <h5>¿Conoce personas en su urbanismo que tengan los trastornos del espectro autista (TEA)?</h5>
                 <img src="build/img/g3.png" alt="">
            </div>
            <div class="grafico_cont">
                <h5>¿Alguna vez había participado en una encuesta sobre este tema?</h5>
               <img src="build/img/g4.png" alt="">
            </div>
            <div class="grafico_cont">
                <h5>¿Ha leído o escuchado sobre los TEA en alguna red social, revista o periódico  local?</h5>
                <img src="build/img/g5.png" alt="">
            </div>
            <div class="grafico_cont">
                <h5>¿Has visitado o conoces paginas donde se hablen de los TEA en Puerto Ordaz?</h5>
                <img src="build/img/g6.png" alt="">
            </div>
            <div class="grafico_cont">
                <h5>¿Te parece que esta pagina es funcional y logra su fin de informar sobre los TEA?</h5>
                  <img src="build/img/g7.png" alt="">
            </div>
            <div class="grafico_cont">
                <h5>Del 1 al 10 que puntaje le das a la información que brinda la pagina. Donde 1 es muy mala y 10 muy buena</h5>
                 <img src="build/img/g8.png" alt="">
            </div>
           
        </div>
    </div><!--CIERRE CONTENEDOR-->
</div>
<?php
//  template del footer
incluirTemplate('footer');

?>