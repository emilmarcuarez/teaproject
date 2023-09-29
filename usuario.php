<?php

// importar la conexion
require 'includes/config/database.php';
$db=conectarDB();
// crear un email y password
$email="emilmarpatricia@gmail.com";
$password="1234";

$passwordHash=password_hash($password,PASSWORD_DEFAULT);


// query
$query="INSERT INTO usuarios (email,password) VALUES ('$email', '$passwordHash')";

echo $query;

mysqli_query($db,$query);

