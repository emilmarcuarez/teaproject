<?php
// ME TRAIGO EL ID que pasaron por el link del boton de "ver propiedad"
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

// VALIDAR URL, en caso de que no pasen id, se regresa a la pagina principal automaticamente
if (!$id) {
    header('location: /teaproyect/index.php');
}

// BASE DE DATOS
require 'includes/config/database.php';
$db = conectarDB();
$query = "SELECT * FROM noticias WHERE id=$id";

$resultado = mysqli_query($db, $query);

if($resultado->num_rows ===0){
    header('location: /teaproyect/index.php');
}

$propiedad = mysqli_fetch_assoc($resultado);


// incluyendo las funciones de php para aplicar el template
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
            <a href="encuestas.php">Encuestas</a>
            <a href="noticias.php" class="active">Noticias</a>
            <a href="contacto.php">Contacto</a>
        </nav>
    </div>
    
<main class="contenedor seccion_hist_uni contenido-centrado">
<picture>
                        
                        <img loading="lazy" src="/teaproyect/imagenes/<?php echo $propiedad['imagen'];?>" alt="imagen de noticia">
                    </picture>
    
                    <div class="contenido-anuncio">
<h1><?php echo $propiedad['titulo']; ?></h1>
    
    <div class="resumen-propiedad">
       

        <p><?php echo $propiedad['descripcion']; ?></p>
        <h5><?php echo $propiedad['fecha']; ?></h5>
    </div>
                    </div>
    <!--.contenido-anuncio-->
</main>
</div>
<?php
//  template del footer
incluirTemplate('footer');
// cerrar conexion
    mysqli_close($db);

?>