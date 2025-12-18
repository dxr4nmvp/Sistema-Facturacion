<?php
require_once 'conexion.php';

$clave_plana = 'admin123'; // EXACTA
$hash = password_hash($clave_plana, PASSWORD_DEFAULT);

$stmt = $conection->prepare(
    "UPDATE usuario SET clave = ? WHERE usuario = 'admin'"
);
$stmt->bind_param("s", $hash);
$stmt->execute();

echo $hash;