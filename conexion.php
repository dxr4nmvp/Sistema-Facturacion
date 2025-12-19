<?php

$host = 'localhost:3307';
$user = 'root';
$password = '';
$db = 'facturacion2';

$conection = @mysqli_connect($host, $user, $password, $db);

if (!$conection) {
    echo "Error en la conexión";
}

?>