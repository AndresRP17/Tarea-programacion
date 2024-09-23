<?php
include_once("../includes/db.php");
$operacion = $_GET["operacion"];

if ($operacion == "new") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sentencia = $conexion->prepare("INSERT INTO usuarios (email, contraseña) VALUES (?,?) ");
    $sentencia->bind_param("ss", $email, $password);
    $sentencia->execute();

} else if ($operacion == "edit") {
    $id = $_POST["id"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sentencia = $conexion->prepare("UPDATE usuarios SET email = ?, contraseña = ? WHERE id = ?");
    $sentencia->bind_param("ssi" , $email, $password, $id);
    $sentencia->execute();

} else if ($operacion == "delete"){
    
    $id = $_GET["id"];
    $sentencia = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();
    
}

header("Location: /tareanueva/views/usuarios/listado.php");
//aca van a estar todas las operaciones que podes realizar en el formulario

?>