<?php 
require '../../includes/funciones.php';
$auth=estaAutenticado();

if(!$auth){
    header('location: /teaproyect/index.php');
}



// ID QUE SE TRAE DEL INDEX.PHP CUANDO SE LE DA CLICK AL BOTON actualizar para traerse el id de la casa que se esta dando click
$id=$_GET['id'];
$id=filter_var($id,FILTER_VALIDATE_INT);

// VALIDAR URL
if(!$id){
    header('location: /teaproyect/admin/index.php');
}

// BASE DE DATOS
require '../../includes/config/database.php';
$db= conectarDB();

// CONSULTA PARA OBTENER LOS DATOS DE LAS PROPIEDADES
$consulta="SELECT * FROM noticias WHERE id= $id";
$resultado=mysqli_query($db,$consulta);
$noticia=mysqli_fetch_assoc($resultado); //se trae los resultados de la base de datos



// ARREGLO CON MENSAJE DE ERRORES
$errores=[];
    
// se crean vacias
    $titulo=$noticia['titulo'];
    $descripcion=$noticia['descripcion'];
    $imagenPropiedad=$noticia['imagen'];

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
    $descripcion=mysqli_real_escape_string($db,$_POST['descripcion']);
   
    $fecha = date('y-m-d');
  
    // asignar file o imagen hacia la variable
    $imagen=$_FILES['imagen'];

    // MENSAJES DE ERRORES POR SI ALGUNOS CAMPOS ESTAN VACIOS
    if(!$titulo){
        $errores[]= "Debes añadir un titulo";
    }
  
    if(!$descripcion){
        $errores[]= "La descripcion es obligatorio";
    }
    if(strlen($descripcion)<50){
        $errores[]= "La descripcion es obligatorio y debe tener al menos 50 caracteres";
    }
   

    // VALIDAR POR TAMAÑO (1mb max)
    $medida=1000*1000; //bits a kb

    if($imagen['size']>$medida){
        $errores[]="La imagen es muy pesada (MAX: 100KB)";
    }


    // REVISAR QUE EL ARREGLO ESTE VACIO. ISSET REVISA QUE UNA VARIABLE ESTE CREADA Y EMPTY SI ESTA VACIO
    if(empty($errores)){ //en caso de que este vacio
       
            // CREAR CARPETA EN PHP
            $carpetaImagenes='../../imagenes/';
            // PARA SABER SI LA CARPETA EXISTE SE USA IS_DIR
            if(!is_dir($carpetaImagenes)){ //SI NO EXISTE, SE CREA
                mkdir($carpetaImagenes);//cuando no hay errores, crea la carpeta 
            }
        
        $nombreImagen='';
        
        //----- SUBIDA DE ARCHIVOOS-----

            // SI HAY UNA IMAGEN NUEVA, SE VA A ELIMINAR LA ANTERIOR
        if($imagen['name']){
            // ESTA FUNCION ELIMINA EL ARCHIVO CON EL NOMBRE DE LA CARPETA Y LUEGO EL DEL ARCHIVO
            unlink($carpetaImagenes . $noticia['imagen']);
            
             // GENERARA NOMBRE UNICO PARA LAS IMAGENES
            $nombreImagen=md5(uniqid(rand(),true)) .  ".jpg";//generan numeros aleatorios

            // SUBIR IMAGEN A LA CARPETA
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        }else{
            $nombreImagen=$noticia['imagen'];
        }

        

       
      
        // ACTUALIZAR EN la BASE DE DATOS
         $query="UPDATE noticias SET titulo = '$titulo', imagen='$nombreImagen', descripcion = '$descripcion' WHERE id = $id";

        $resultado=mysqli_query($db,$query);

     if($resultado){
        //    redirecciona al usuario para que se borra la info cuando se envie
        // esto se debe hacer poco, se puede hacer un loop de muchas redirecciones
        
        
        header('location: /teaproyect/admin/index.php?resultado=2');
        }
    }

}

// incluyendo el header 


// incluyendo el header 
    incluirTemplate('header');
?>

    <main class="contenedor secc_actualizar_noti">
        <h1>Actualizar Noticia</h1>

        <a href="/teaproyect/admin/index.php" class="boton boton-verde">Volver</a>

        <!-- FOREACH PARA IR MOSTRANDO LOS ERRORES ALMACENADOS EN EL ARREGLO DE ERRORES EN LA PAGINA -->
        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error?>
            </div> 
        <?php endforeach?>


        <!-- GET EXPONE LOS DATOS EN LA URL, POST NO LOS EXPONE Y ES MAS SEGURO. INICIO DE SESION POST. POST PARA ENVIAR DATOS, GET PARA OBTENER DATOS DE UN SERVIDOR -->
        <!-- enctype sirve para indicar al formulario que tendra archivos que enviar, como imagenes -->
        <form class="formulario" method="POST" enctype="multipart/form-data"> 
            <fieldset>
                <legend>
                    Informacion general de la noticia
                </legend>
                <!-- el name sera el que se manda a la base de datos, lee los datos, por medio de esa variable que es el nombre que le coloquemos es name -->
                <label for="titulo">Titulo: </label>
                <input type="text" name="titulo" id="titulo" placeholder="titulo de noticia" value="<?php echo $titulo;?>">

              
       
                <label for="imagen">Imagen</label>
                <!-- con accept solo permite aceptar imagen jpeg y png-->
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/teaproyect/imagenes/<?php echo $imagenPropiedad;?>" class="imagen-small" alt="">

                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion" cols="30" rows="10"><?php echo $descripcion;?></textarea>
            </fieldset>

          
            <input type="submit" id="btnEnviar" value="Actualizar noticia" class="boton boton-verde">
        </form>
    
    </main>

    <?php 
    //  template del footer
    incluirTemplate('footer');
    ?>