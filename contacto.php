<?php 
// BASE DE DATOS
require 'includes/config/database.php';

$db= conectarDB();

$respuesta =$_GET['resultado'] ?? null; 
// ARREGLO CON MENSAJE DE ERRORES
$errores=[];
    
// se crean vacias
    $email='';
    $telefono='';
    $mensaje='';
    $nombre='';

// EJEECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIE EL FORMULARIO
if($_SERVER['REQUEST_METHOD']==='POST'){
    // echo "<pre>";
    //   var_dump($_POST);
    // echo "</pre>";
    // echo "<pre>";
    //   var_dump($_FILES); contenido de los archivos
    // echo "</pre>";



    // ESTO ESCAPA LOS DATOS, ES DECIR, EN CASO DE QUE ALGUIEN COLOQUE PARA INYECTAR CODIGO SQL, LA COLOCA PARA QUE NO SE AUTILIZABLE
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $telefono=mysqli_real_escape_string($db,$_POST['telefono']);
    $mensaje=mysqli_real_escape_string($db,$_POST['mensaje']);
    $nombre=mysqli_real_escape_string($db,$_POST['nombre']);
 

    // MENSAJES DE ERRORES POR SI ALGUNOS CAMPOS ESTAN VACIOS
    if(!$email){
        $errores[]= "Debes añadir un email";
    }
    // MENSAJES DE ERRORES POR SI ALGUNOS CAMPOS ESTAN VACIOS
    if(!$nombre){
        $errores[]= "Debes añadir un nombre";
    }
    if(!$telefono){
        $errores[]= "Debes añadir un telefono";
    }
    if(!$mensaje){
        $errores[]= "El mensaje es obligatorio";
    }
   


    // REVISAR QUE EL ARREGLO ESTE VACIO. ISSET REVISA QUE UNA VARIABLE ESTE CREADA Y EMPTY SI ESTA VACIO
    if(empty($errores)){ //en caso de que este vacio


        // insertar a la BASE DE DATOS
         $query="INSERT INTO contacto (email, telefono, mensaje, nombre) VALUES ('$email', '$telefono','$mensaje', '$nombre');";
        // echo $query;
        // var_dump($query);
        // exit;
        $resultado=mysqli_query($db,$query);
        
     if($resultado){
        //    redirecciona al usuario para que se borra la info cuando se envie
        // esto se debe hacer poco, se puede hacer un loop de muchas redirecciones
        
        
        header('location: /teaproyect/contacto.php?resultado=1');
        }
    }

}

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
            <a href="encuestas.php">Encuestas</a>
            <a href="noticias.php">Noticias</a>
            <a href="contacto.php" class="active">Contacto</a>
        </nav>
    </div>
    <div class="contenedor seccion_contacto">


        <!-- <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture> -->
        <?php if(intval($respuesta) === 1):?>
            <p class="alerta exito">Mensaje enviado correctamente</p>
         <?php endif;?>
        <h1>Llene el formulario de Contacto</h1>


        <!-- FOREACH PARA IR MOSTRANDO LOS ERRORES ALMACENADOS EN EL ARREGLO DE ERRORES EN LA PAGINA -->

<?php foreach($errores as $error):?>
    
            <div class="alerta error">
                <?php echo $error?>
            </div> 
        <?php endforeach?>
        <form class="formulario" method="POST" action="/teaproyect/contacto.php"> 
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="nombre">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email" name="email">

                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu Teléfono" id="telefono" name="telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje"></textarea>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </div><!--CIERRE CONTENEDOR-->
</div>
<?php
//  template del footer
incluirTemplate('footer');

?>