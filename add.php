<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//Incluir la conexion a base de datos 
include_once("connection.php");

if(isset($_POST['Submit'])) {	

	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$id_articulo = $_POST['id_articulo'];
	$descripcion = $_POST['descripcion'];
	$cadusidad = $_POST['cadusidad'];
	$categoria = $_POST['categoria'];
	$cantidad = $_POST['cantidad'];
	$mermas = $_POST['mermas'];
	$loginId = $_SESSION['id'];
		
	// Comprobacion de campos vacios
	if(empty($name) || empty($qty) || empty($id_articulo) || empty($descripcion) || empty($cadusidad) || empty($categoria) || empty($cantidad) || empty($mermas)) {
				
		if(empty($name)) {
			echo "<font color='red'>Nombre del campo vacio.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Precio del campo vacio.</font><br/>";
		}
		
		if(empty($id_articulo)) {
			echo "<font color='red'>ID_Articulo del campo vacio.</font><br/>";
		}	
		
		if(empty($descripcion)) {
			echo "<font color='red'>Descripcion del campo vacio.</font><br/>";
		}

		if(empty($cadusidad)) {
			echo "<font color='red'>Cadusidad del campo vacio.</font><br/>";
		}

		if(empty($categoria)) {
			echo "<font color='red'>Categoria del campo vacio.</font><br/>";
		}

		if(empty($cantidad)) {
			echo "<font color='red'>Cantidad del campo vacio.</font><br/>";
		}

		if(empty($mermas)) {
			echo "<font color='red'>Mermas del campo vacio.</font><br/>";
		}
		
		//Enlace a la pagina anterior
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
		// Si todos los campos estan llenos (No vacios) 
			
		//Insertar los datos a la base de datos
		$result = mysqli_query($mysqli, "INSERT INTO products(name, qty, id_articulo, descripcion, cadusidad, categoria, cantidad, mermas,  loginn_id) VALUES('$name','$qty','$id_articulo', '$descripcion', '$cadusidad', '$categoria', '$cantidad', '$mermas','$loginId')");
		
		//Mostrar mensaje de exito
		echo "<font color='green'>Datos agregados con exito.";
		echo "<br/><a href='view.php'>Ver resultado</a>";
	}
}
?>
</body>
</html>
