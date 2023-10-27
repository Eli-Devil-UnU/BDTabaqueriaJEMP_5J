<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//Inclulir conexion a base de datos
include("connection.php");

//Obtener la id de la base de datos
$id = $_GET['id'];

//Borrar una fila de la tabla
$result=mysqli_query($mysqli, "DELETE FROM products WHERE id=$id");

//Redirigir a la pagina de visualizacion
header("Location:view.php");
?>

