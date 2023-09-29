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
  

    if($id){
        
        $query="DELETE FROM historias WHERE id=$id";
        
        $resultado=mysqli_query($db, $query);

        if($resultado){
            // despues del link se pone un '?' y posterior el nombre de la variable que uno quiere y se iguala a un numero
            header('location: /teaproyect/admin/index.php?resultado=3');
        }
    }
}

// incluyendo las funciones 


// incluyendo el header por medio de template
    incluirTemplate('header');
?>

    <main class="contenedor seccion_index_admi">
        <h1>"PAGINA ADMINISTRADOR"</h1>
        <p>Bienvenid@ <?php echo user();?> </p>
        <div class="botones_index">
            <a href="/teaproyect/admin/noticias.php" class="boton boton-noticias">Noticias</a>
             <a href="/teaproyect/admin/historias.php" class="boton boton-historias">Historias</a>
        </div>
    </main>


    <?php 

    // CERRAR CONEXION CON LA BD
    mysqli_close($db);

    //  template del footer
    incluirTemplate('footer');
    ?>