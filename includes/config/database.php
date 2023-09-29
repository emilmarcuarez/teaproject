<?php

// conectar bd
function conectarDB() : mysqli{
    $db=mysqli_connect('localhost', 'root', 'root', 'teaproyect');

    if(!$db){
        
        echo "No se pudo conectar";
        exit;
    }

    return $db;
}