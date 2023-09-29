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
$query="SELECT * FROM historias";

// CONSULTAR LA BD
$consulta=mysqli_query($db,$query);


// MUESTRA MENSAJE CONDICIONAL
$resultado =$_GET['resultado'] ?? null; //sino esta el valor resultado, se le pone null y no presenta error, solo le asigna null y no falla

// revisar que el request sea de tipo post ESTO ES PARA ELIMINAR
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id=$_POST['id'];
    $id=filter_var($id, FILTER_VALIDATE_INT);
    $uu=$_POST['uu'];
    $uu=filter_var($uu, FILTER_VALIDATE_INT);
    $ocultar=$_POST['ocultar'];
    $ocultar=filter_var($ocultar, FILTER_VALIDATE_INT);
  

    if($id){
        
        $query="DELETE FROM historias WHERE id=$id";
        
        $resultado=mysqli_query($db, $query);

        if($resultado){
            // despues del link se pone un '?' y posterior el nombre de la variable que uno quiere y se iguala a un numero
            header('location: /teaproyect/admin/historias.php?resultado=3');
        }
    }else if($uu){
        $query="SELECT publico FROM historias WHERE id=$uu";
        $resultado=mysqli_query($db, $query);
        if($resultado===1){
            header('location: /teaproyect/admin/historias.php?resultado=4');
        }else{
            $query="UPDATE historias SET publico=1 WHERE id=$uu";
       
        $resultado=mysqli_query($db, $query);

        if($resultado){
            // despues del link se pone un '?' y posterior el nombre de la variable que uno quiere y se iguala a un numero
            header('location: /teaproyect/admin/historias.php?resultado=2');
        }
        }
        
    }else if($ocultar){
        $query="SELECT publico FROM historias WHERE id=$ocultar";
        $resultado=mysqli_query($db, $query);
        if($resultado==0){
            header('location: /teaproyect/admin/index.php?resultado=6');
        }else{
            $query="UPDATE historias SET publico=0 WHERE id=$ocultar";
       
        $resultado=mysqli_query($db, $query);

        if($resultado){
            // despues del link se pone un '?' y posterior el nombre de la variable que uno quiere y se iguala a un numero
            header('location: /teaproyect/admin/historias.php?resultado=5');
        }
        }
        
    }
}


// incluyendo las funciones 

// incluyendo el header por medio de template
    incluirTemplate('header');
?>

    <main class="contenedor seccion_hist_admi">
    <a href="/teaproyect/admin/index.php" class="boton boton-azul">Volver</a>
        <h1>Administrador de historias</h1>
        <!-- estos numeros de resultado se mandan por el header que redirecciona a la pagina principal-->
        <?php if(intval($resultado) === 1):?>
            <p class="alerta exito">Anuncio creado correctamente</p>
                <?php elseif(intval($resultado) === 2):?>
                    <p class="alerta exito">Historia publicada correctamente</p>      
                    <?php elseif(intval($resultado) === 3):?>
                    <p class="alerta exito">Historia Eliminada Correctamente</p>      
                    <?php elseif(intval($resultado) === 4):?>
                    <p class="alerta exito">Ya la historia fue publicada</p>      
                    <?php elseif(intval($resultado) === 5):?>
                    <p class="alerta exito">Ocultada correctamente</p>      
                    <?php elseif(intval($resultado) === 6):?>
                    <p class="alerta exito">Ya la historia fue ocultada</p>      
         <?php endif;?>
        <!-- <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a> -->
    </main>
    <div class="contenedor grid-propiedades">
        <div class="titulos">
              <div class="grid--contenedor">
                        <h3>titulo</h3>
                        <h3>historia</h3>
                        <h3>autor</h3>
                        <h3>fecha</h3>
                        <h3>Acciones</h3>
                 </div>
        </div>
          
                
                <div class=" grupo-2 grid--contenedor">
                    <!-- MOSTRAR RESULTADOS DE LA BD EN LA TABLA -->
                   <?php while($historia = mysqli_fetch_assoc($consulta)): ?>
                            <div><?php echo $historia['titulo']; ?></div>
                            <div><?php echo $historia['descripcion']; ?></div>
                           
                            <div><?php echo $historia['autor']; ?></div>
                            <div><?php echo $historia['fecha']; ?></div>
                            <div>
                                <form method="POST" class="w-100">
                                        <!-- ESTOS INPUT HIDDEN SIRVEN PARA MANDAR INFORMACION, QUE EN ESTE CASO ES EL ID -->
                                        <input type="hidden" name="id" value="<?php echo $historia['id'];?>">
                                      <input type="submit" class="boton-rojo-block" value="Eliminar definitivo">
                                </form>
                                <form method="POST" class="w-100">
                                      <input type="hidden" name="uu" value="<?php echo $historia['id'];?>">
                                    <input type="submit" class="boton-amarillo-block avisoP" value="Publicar">
                                </form>
                                <form method="POST" class="w-100">
                                      <input type="hidden" name="ocultar" value="<?php echo $historia['id'];?>">
                                    <input type="submit" class="boton-verde-block" value="Ocultar">
                                </form>
                              
                              
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