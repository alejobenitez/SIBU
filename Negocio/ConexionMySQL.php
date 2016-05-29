<?php
$servidor = "localhost"; //el servidor a utilizar
$usuario = "root"; //El usuario en la base de datos
$contrasena = "abc123"; //La contraseña
$BD = "SIBU"; //El nombre de la base de datos

$conex = new mysqli($servidor, $usuario,$contrasena, $BD);
if ($conex->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
 
?>