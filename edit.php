<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// Incluir la conexion a base de datos
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$id_articulo = $_POST['id_articulo'];
	$descripcion = $_POST['descripcion'];
	$cadusidad = $_POST['cadusidad'];
	$categoria = $_POST['categoria'];
	$cantidad = $_POST['cantidad'];
	$mermas = $_POST['mermas'];
	
	// Verificar los campos vacios
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
	} else {	
		//Actualizar la tabla
		$result = mysqli_query($mysqli, "UPDATE products SET name='$name', qty='$qty', id_articulo='$id_articulo', descripcion='$descripcion', cadusidad='$cadusidad', categoria='$categoria', cantidad='$cantidad', mermas='$mermas' WHERE id=$id ");
		
		//Redirigir a la pagina de visualizacion
		header("Location: view.php");
	}
}
?>
<?php
//Obtener el id de la url
$id = $_GET['id'];

//Datos seleccionados asociados con esta identificacion en particular
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$qty = $res['qty'];
	$id_articulo = $res['id_articulo'];
	$descripcion = $res['descripcion'];
	$cadusidad = $res['cadusidad'];
	$categoria = $res['categoria'];
	$cantidad = $res['cantidad'];
	$merma = $res['merma'];
}
?>
<html>
<head>	
	<title>Editar datos</title>
</head>

<body>
	<a href="index.php">Pagina de inicio</a> | <a href="view.php">Ver Productos</a> | <a href="logout.php">Cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nombre</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Precio (MXN)</td>
				<td><input type="text" name="qty" value="<?php echo $qty;?>"></td>
			</tr>
			<tr> 
				<td>ID_Articulo</td>
				<td><input type="text" name="id_articulo" value="<?php echo $price;?>"></td>
			</tr>
			<tr> 
				<td>Descripcion</td>
				<td><input type="text" name="descripcion" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Cadusidad</td>
				<td><input type="text" name="cadusidad" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Categoria</td>
				<td><input type="text" name="categoria" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Cantidad</td>
				<td><input type="date" name="cantidad" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Merma</td>
				<td><input type="text" name="merma" value="<?php echo $name;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
