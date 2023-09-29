<?php 
// BASE DE DATOS
require 'includes/config/database.php';

$db= conectarDB();


// ARREGLO CON MENSAJE DE ERRORES
$errores=[];
    
// se crean vacias
    $titulo='';
    $autor='';
    $descripcion='';

// EJEECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIE EL FORMULARIO
if($_SERVER['REQUEST_METHOD']==='POST'){
    // echo "<pre>";
    //   var_dump($_POST);
    // echo "</pre>";
    // echo "<pre>";
    //   var_dump($_FILES); contenido de los archivos
    // echo "</pre>";



    // ESTO ESCAPA LOS DATOS, ES DECIR, EN CASO DE QUE ALGUIEN COLOQUE PARA INYECTAR CODIGO SQL, LA COLOCA PARA QUE NO SE AUTILIZABLE
    $titulo=mysqli_real_escape_string($db,$_POST['titulo']);
    $autor=mysqli_real_escape_string($db,$_POST['autor']);
    $descripcion=mysqli_real_escape_string($db,$_POST['descripcion']);
    $fecha = date('y-m-d');

    // MENSAJES DE ERRORES POR SI ALGUNOS CAMPOS ESTAN VACIOS
    if(!$titulo){
        $errores[]= "Debes añadir un titulo";
    }
    if(!$autor){
        $errores[]= "El autor es obligatorio. Sino colocar: ANONIMO";
    }
    if(!$descripcion){
        $errores[]= "La historia es obligatorio";
    }
    if(strlen($descripcion)<50){
        $errores[]= "La historia es obligatorio y debe tener al menos 50 caracteres";
    }
   


    // REVISAR QUE EL ARREGLO ESTE VACIO. ISSET REVISA QUE UNA VARIABLE ESTE CREADA Y EMPTY SI ESTA VACIO
    if(empty($errores)){ //en caso de que este vacio
        $publico=0;

        // insertar a la BASE DE DATOS
         $query="INSERT INTO historias (titulo, autor, descripcion, fecha, publico) VALUES ('$titulo', '$autor','$descripcion' ,'$fecha', $publico);";
        // echo $query;
        // var_dump($query);
        // exit;
        $resultado=mysqli_query($db,$query);
        
     if($resultado){
        //    redirecciona al usuario para que se borra la info cuando se envie
        // esto se debe hacer poco, se puede hacer un loop de muchas redirecciones
        
        
        header('location: /teaproyect/verhistorias.php?resultado=1');
        }
    }

}

// incluyendo el header 
require 'includes/funciones.php';

// incluyendo el header 
    incluirTemplate('header');
?>

<main class="contenedor seccion2">
        <h1>Envia tu historia</h1>

        <a href="/teaproyect/verhistorias.php" class="boton boton-verde">Volver</a>

        <!-- FOREACH PARA IR MOSTRANDO LOS ERRORES ALMACENADOS EN EL ARREGLO DE ERRORES EN LA PAGINA -->
        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error?>
            </div> 
        <?php endforeach?>


        <!-- GET EXPONE LOS DATOS EN LA URL, POST NO LOS EXPONE Y ES MAS SEGURO. INICIO DE SESION POST. POST PARA ENVIAR DATOS, GET PARA OBTENER DATOS DE UN SERVIDOR -->
        <!-- enctype sirve para indicar al formulario que tendra archivos que enviar, como imagenes -->
        <form class="formulario" method="POST" action="/teaproyect/historias.php"> 
            <fieldset>
                <legend>
                    Historia
                </legend>
                <!-- el name sera el que se manda a la base de datos, lee los datos, por medio de esa variable que es el nombre que le coloquemos es name -->
                <label for="titulo">Titulo: </label>
                <input type="text" name="titulo" id="titulo" placeholder="titulo de la historia" value="<?php echo $titulo;?>">

                <label for="autor">Autor: </label>
                <input type="text" name="autor" id="autor" placeholder="Nombre del autor" value="<?php echo $autor;?>">

                <label for="descripcion">Historia:</label>
                <textarea id="descripcion" name="descripcion" cols="30" rows="10"><?php echo $descripcion;?></textarea>
            </fieldset>

            <input type="submit" id="btnEnviar" value="Enviar historia" class="boton boton-verde">
        </form>
    
    </main>

    <?php 
    //  template del footer
    incluirTemplate('footer');
    ?>
