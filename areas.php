<?php

include 'includes/config/database.php';
$db = conectarDB();

$query = "SELECT * FROM historias;";
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
            <a href="areas.php" class="active">Areas de atencion</a>
            <a href="verhistorias.php">Historias</a>
            <a href="galeria.php">Galeria</a>
            <a href="encuestas.php">Encuestas</a>
            <a href="noticias.php">Noticias</a>
            <a href="contacto.php">Contacto</a>
        </nav>
    </div>
    <div class="contenedor areas_atencion">
        
        <h1>Areas de atencion</h1>
        <h3>Organizaciones</h3>
        <div class="areas_flex">
            <div class="card_area">
                <div class="card_text">

                
                <div class="imagen_area">
                    <img src="build/img/a.png" alt="">
                </div>
                <div class="titulo">
                    <h4>Alinca</h4>
                </div>
                
                <div class="descripcion_area">
                    <p>ALINCA es un equipo humanitario que lleva a cabo programas y proyectos sociales a las poblaciones más vulnerables para contribuir al mejoramiento de su calidad de vida</p>
                </div>
                </div>
                <small class="link_area">
                    <a href="https://alincaven.org/esp/">Contactar</a>
                </small>
            </div> <!--CIERRE DE CARD-->

             <!-- 2 -->
        <div class="card_area">
        <div class="card_text">
            <div class="imagen_area">
                    <img src="build/img/b.png" alt="">
                </div>
                <div class="titulo">
                    <h4>Mundo sonrisa</h4>
                </div>
                
                <div class="descripcion_area">
                    <p>Mundo sonrisa se encaraga de ofrecer una diversa gama de doctores para que los niños puedan ser atendidos en todas las especialidades que lo requieran.</p>
                </div>
        </div>
                <small class="link_area">
                    <a href="https://ve.todosnegocios.com/mundo-sonrisa-guayana-0286-9670255">Contactar</a>
                </small>
            </div> <!--CIERRE DE CARD-->

            <!-- 3 -->
        <div class="card_area">
        <div class="card_text">
            <div class="imagen_area">
                    <img src="build/img/c.png" alt="">
                </div>
                <div class="titulo">
                    <h4>Fundacion lala</h4>
                </div>
                
                <div class="descripcion_area">
                    <p>Organización sin fines de lucro dedicada a fomentar el bienestar integral en la región, especialmente en niños. Otorga ayuda con temas de salud y economicos.</p>
                </div>
</div>
                <small class="link_area">
                    <a href="https://www.instagram.com/fundacionlalave/?hl=es">Contactar</a>
                </small>
            </div> <!--CIERRE DE CARD-->

            <!-- 4 -->
        <div class="card_area">
        <div class="card_text">
            <div class="imagen_area">
                    <img src="build/img/d.png" alt="">
                </div>
                <div class="titulo">
                    <h4>Bandera Azul</h4>
                </div>
                
                <div class="descripcion_area">
                    <p>Madre e hijo autista tienen una cuenta de instagram donde realizan webinars, charlas y comparten un poco sobre su historia. Ellos son de Puerto Ordaz, Estado Bolivar, Venzuela.</p>
                </div>
        </div>
                <small class="link_area">
                    <a href="https://www.instagram.com/banderazul/">Contactar</a>
                </small>
            </div> <!--CIERRE DE CARD-->

             <!-- 5 -->
        <div class="card_area">
        <div class="card_text">
            <div class="imagen_area">
                    <img src="build/img/e.png" alt="">
                </div>
                <div class="titulo">
                    <h4>Fundación Asperger de Venezuela</h4>
                </div>
                
                <div class="descripcion_area">
                    <p>ONG manejada por personas con Asperger. Trabajamos por:TEA, Prevención del bullying en Venezuela. Presencia en 20 estados del país.
                </p>
                </div>
        </div>
                <small class="link_area">
                    <a href="https://www.instagram.com/fundasperven/">Contactar</a>
                </small>
            </div> <!--CIERRE DE CARD-->

                   <!-- 6 -->
        <div class="card_area">
        <div class="card_text">
            <div class="imagen_area">
                    <img src="build/img/f.png" alt="">
                </div>
                <div class="titulo">
                    <h4>Psicólogos Sin Fronteras Vzla</h4>
                </div>
                
                <div class="descripcion_area">
                    <p>Asistencia Psicologica a personas y comunidades en crisis y duelos por diversas causas, que necesiten apoyo psicológico para recuperarse emocionalmente.
                </p>
                </div>
        </div>
                <small class="link_area">
                    <a href="https://www.instagram.com/psfvenezuela/">Contactar</a>
                </small>
            </div> <!--CIERRE DE CARD-->

                 
        </div>
        <div class="areas_doctores">
            <h3>Doctores</h3>
             <div class="areas_flex">
                <!-- 7 -->
        <div class="card_area">
        <div class="card_text">
            <div class="imagen_area">
                    <img src="build/img/g.png" alt="">
                </div>
                <div class="titulo">
                    <h4>Msc. Hilwil Tineo</h4>
                </div>
                
                <div class="descripcion_area">
                    <p>Terapeuta en Puerto Ordaz. Atencion a niños y adultos.
                </p>
                </div>
        </div>
                <small class="link_area">
                    <a href="https://www.instagram.com/terapeutaht">Contactar</a>
                </small>
            </div> <!--CIERRE DE CARD-->

                    <!-- 8 -->
        <div class="card_area">
        <div class="card_text">
            <div class="imagen_area">
                    <img src="build/img/h.png" alt="">
                </div>
                <div class="titulo">
                    <h4>Psic. Ivonne Lachmann</h4>
                </div>
                
                <div class="descripcion_area">
                    <p>Psic Clínico apasionada de la evaluación, diagnóstico y psicoterapia de personas con Autismo, TDAH o discapacidad, para que sean competentes y felices.
                </p>
                </div>
        </div>
                <small class="link_area">
                    <a href="https://www.instagram.com/teapoyoentuvida/">Contactar</a>
                </small>
            </div> <!--CIERRE DE CARD-->

                        <!-- 9 -->
        <div class="card_area">
        <div class="card_text">
            <div class="imagen_area">
                    <img src="build/img/i.png" alt="">
                </div>
                <div class="titulo">
                    <h4>Msc. Karla Torrelles.</h4>
                </div>
                
                <div class="descripcion_area">
                    <p>Terapeuta ubicada en Puerto Ordaz, especialista en evaluacion y atencion de niños y adolescentes.
                </p>
                </div>
        </div>
                <small class="link_area">
                    <a href="https://www.instagram.com/karlatorrelles/">Contactar</a>
                </small>
            </div> <!--CIERRE DE CARD-->
            </div>
        </div>
       
    </div><!--CIERRE CONTENEDOR-->
</div><!--CIERRE CONTENEDOR 3-->
<?php
//  template del footer
incluirTemplate('footer');

?>