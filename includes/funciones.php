<?php
// para usar la variable templates
require 'app.php';
// en caso de que la variable inicio no este presente, entra el parametro por default y seria false
function incluirTemplate($nombre, $inicio=false){

    include TEMPLATES_URL . "/$nombre.php";
}

function estaAutenticado() : bool{
    session_start();
    $auth=$_SESSION['login'];

    if($auth){
        return true;
    }

    return false;
}
function user(){
   
    $auth=$_SESSION['usuario'];

    if($auth){
        return $auth;
    }
}

?>