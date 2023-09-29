<?php 
require '../includes/funciones.php';
$auth=estaAutenticado();

if(!$auth){
    header('location: /teaproyect/index.php');
}

// INSERTAR LA CONEXION
require '../includes/config/database.php';
$db= conectarDB();

// ESCRIBIR EL QUERY
$query="SELECT * FROM noticias";

// CONSULTAR LA BD
$consulta=mysqli_query($db,$query);


// MUESTRA MENSAJE CONDICIONAL
$resultado =$_GET['resultado'] ?? null; //sino esta el valor resultado, se le pone null y no presenta error, solo le asigna null y no falla

// revisar que el request sea de tipo post ESTO ES PARA ELIMINAR
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id=$_POST['id'];
    $id=filter_var($id, FILTER_VALIDATE_INT);
   
  

    if($id){
        
        $query="SELECT imagen FROM noticias WHERE id=$id";

        $resultado=mysqli_query($db, $query);
        $noticia=mysqli_fetch_assoc($resultado);
        
        unlink('../imagenes/' . $noticia['imagen']);
        // ELIMINAR LA PROPIEDAD
        
        $query="DELETE FROM noticias WHERE id=$id";
        
        $resultado=mysqli_query($db, $query);

        if($resultado){
            // despues del link se pone un '?' y posterior el nombre de la variable que uno quiere y se iguala a un numero
            header('location: /teaproyect/admin/noticias.php?resultado=3');
        }
    }
}


// incluyendo las funciones 


// incluyendo el header por medio de template
    incluirTemplate('header');
?>

    <main class="contenedor seccion_noti_admi">
    <a href="/teaproyect/admin/index.php" class="boton boton-azul">Volver</a>
        <h1>Administrador de noticias</h1>
        <!-- estos numeros de resultado se mandan por el header que redirecciona a la pagina principal-->
        <?php if(intval($resultado) === 1):?>
            <p class="alerta exito">Noticia creada correctamente</p>
                <?php elseif(intval($resultado) === 2):?>
                    <p class="alerta exito">Noticia Actualizada Correctamente</p>      
                    <?php elseif(intval($resultado) === 3):?>
                    <p class="alerta exito">Noticia Eliminada Correctamente</p>      
         <?php endif;?>
        <a href="/teaproyect/admin/propiedades/crear.php" class="boton boton-verde">Nueva noticia</a>
    </main>
    <div class="contenedor grid-propiedades">
        <div class="titulos">
              <div class="grid--contenedor">
                         <h3>Id</h3>
                        <h3>Titulo</h3>
                        <h3>Imagen</h3>
                        <h3>Descripcion</h3>
                        <h3>Acciones</h3>
                 </div>
        </div>
          
                
                <div class=" grupo-2 grid--contenedor">
                    <!-- MOSTRAR RESULTADOS DE LA BD EN LA TABLA -->
                   <?php while($noticia = mysqli_fetch_assoc($consulta)): ?>
                            <div><?php echo $noticia['id']; ?></div>
                            <div><?php echo $noticia['titulo']; ?></div>
                           
                            <div><img src="/teaproyect/imagenes/<?php echo $noticia['imagen'];?>" class="imagen-tabla" alt=""></div>
                            <div><?php echo $noticia['descripcion']; ?></div>
                            <div>
                            <form method="POST" class="w-100">
                                        <!-- ESTOS INPUT HIDDEN SIRVEN PARA MANDAR INFORMACION, QUE EN ESTE CASO ES EL ID -->
                                        <input type="hidden" name="id" value="<?php echo $noticia['id'];?>">

                                      <input type="submit" class="boton-rojo-block" value="Eliminar">
                                </form>
                              
                                <a href="/teaproyect/admin/propiedades/actualizar.php?id=<?php echo $noticia['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                            </div>
                        <?php endwhile;?>
                </div>
            </div>
    <?php 

    // CERRAR CONEXION CON LA BD
    mysqli_close($db);

    //  template del footer
    incluirTemplate('footer');
    ?>