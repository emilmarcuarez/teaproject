<?php 
include 'includes/config/database.php';
$db = conectarDB();

$query = "SELECT * FROM historias WHERE publico=1 LIMIT 3;";
$resultado = mysqli_query($db, $query);

$num=$_GET['resultado'];

    // require sirve para funciones e include para templates
    // aqui llamamos a la funcion para incluir el template header
    require 'includes/funciones.php';

    // variable de inicio para que se mantenga la imagen grande solo en el index
        $inicio=true;
    // incluyendo el header 
        incluirTemplate('header',$inicio);
?>

<div class="slideshow">
		<ul class="slider">
			<li>
				<img src="build/img/1.png" alt="">
				
			</li>
			<li>
				<img src="build/img/2.png" alt="">
			
			</li>
			<li>
				<img src="build/img/3.png" alt="">
			
			</li>
			<li>
				<img src="build/img/4.png" alt="">
	
			</li>
		</ul>

		<ol class="pagination">
			
		</ol>
	
		<div class="left">
			<span class="fa fa-chevron-left"></span>
		</div>

		<div class="right">
			<span class="fa fa-chevron-right"></span>
		</div>

	</div>

        <!-- MENU -->
        <div class="seccion_menu">
        <div class="contenedor">
            <div class="cont_menu">
                <nav class="menu">
                    <a href="sobre-nosotros.php">Sobre nosotros</a>
                    <a href="informacion.php">Informacion</a>
                    <a href="areas.php">Areas de atencion</a>
                    <a href="verhistorias.php">Historias</a>
                    <a href="galeria.php">Galeria</a>
                    <a href="encuestas.php">Encuestas</a>
                    <a href="noticias.php">Noticias</a>
                    <a href="contacto.php">Contacto</a>
                </nav>
                <div class="texto_menu">
                    <div class="texto_titulo">
                        <h3>Definicion</h3>
                    </div>
                    <div class="texto_menu-p">
                        <p>Los trastornos del espectro autista (TEA) son discapacidades del desarrollo causadas por diferencias en el cerebro. Las personas con TEA con frecuencia tienen problemas con la comunicación y la interacción sociales, y conductas o intereses restrictivos o repetitivos.</p>
                        <p>El término "espectro" en el trastorno del espectro autista se refiere a un amplio abanico de síntomas y gravedad.</p>
                    </div>
                    <!-- <img src="build/img/iamgen1.webp" alt="" class="imagen_menu"> -->
                    <div class="texto_enlace">
                        <a href="#">Leer mas >></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Historias -->
    <div class="historias">
        <div class="contenedor">
            <h3>Algunas historias</h3>
            <div class="historias_cont2">
            <?php while ($historia = mysqli_fetch_assoc($resultado)) : ?>
                <seccion class="seccion">
                    <div class="seccion_titulo">
                        <h4 class="descripcion3"><?php echo $historia['titulo']; ?></h4>
                    </div>
                    <div class="seccion_texto">
                        <p class="descripcion2"><?php echo $historia['descripcion']; ?></p>
                    </div>
                    <div class="seccion_boton">
                    <a href="historia.php?id=<?php echo $historia['id'];?>">Leer mas</a>
                    </div>
                </seccion>
            <?php endwhile; ?>
                <!-- <seccion class="seccion">
                    <div class="seccion_titulo">
                        <h4>Historia 1</h4>
                    </div>
                    <div class="seccion_texto">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusamus doloribus eveniet  </p>
                    </div>
                    <div class="seccion_boton">
                        <a href="#">Leer mas</a>
                    </div>
                </seccion>
                <seccion class="seccion">
                    <div class="seccion_titulo">
                        <h4>Historia 1</h4>
                    </div>
                    <div class="seccion_texto">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe accusamus doloribus eveniet  </p>
                    </div>
                    <div class="seccion_boton">
                        <a href="#">Leer mas</a>
                    </div>
                </seccion> -->
            </div>
        </div>
    </div><!--FIN DE HISTORIAS-->

    <!-- encuesta -->
    <section class="seccion-encuest">
        <a href="">Ver resultados>></a>
    </section>
    <?php 
     //  template del footer
     incluirTemplate('footer');

    ?>