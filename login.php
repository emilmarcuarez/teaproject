<?php 

include 'includes/config/database.php';
$db=conectarDB();

$errores=[];

// AUTENTICAR EL USUARIO
if($_SERVER['REQUEST_METHOD']==='POST'){

    $email=mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password=mysqli_real_escape_string($db, $_POST['password']);

    if(!$email){
        $errores[]="El email es obligatorio o no es valido";
    }
    if(!$password){
        $errores[]="La contraseña es obligatoria";
    }

    if(empty($errores)){
        // REVISAMOS SI EL USUARIO EXISTE
        $query="SELECT * FROM usuarios WHERE email= '$email'; ";
        $resultado=mysqli_query($db, $query);

        // var_dump($resultado);

        if($resultado->num_rows){
            // revisar si el password es correcto
            $usuario=mysqli_fetch_assoc($resultado);

            // verificar si el password es correcto o no
            $auth=password_verify($password, $usuario['password']);
            var_dump($auth);

            if($auth){
                // 
                session_start();
                // llenar el arreglo de la sesion

                $_SESSION['usuario']=$usuario['email'];
                $_SESSION['login']=true;

                header('location: /teaproyect/admin/index.php');
            }else{
                $errores[]="El password es incorrecto";
            }
        }else{
            $errores[]="El usuario no existe";
        }
    }
}   


// incluyendo el header 
require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor contenido-centrado">
        <h1>Inciar sesion</h1>
        <?php
            foreach($errores as $error):        
        ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form method="POST" class="formulario">
        <fieldset>
                <legend>Email y password</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu Email" id="email" require>

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Tu password" id="pasword" require>

            </fieldset>
            <input type="submit" value="Iniciar sesion" class="boton boton-verde">
        </form>
    </main>

    <?php 
    //  template del footer
    incluirTemplate('footer');
    ?>