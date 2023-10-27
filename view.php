<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//Incluir la conexion a base de datos
include_once("connection.php");

//Obtenciond e datos en orden descendente (La ultima entrada primero)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE loginn_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Pagina de inicio</title>
</head>

<body>
	<a href="index.php">Pagina de inicio</a> | <a href="add.html">Agragar nuevos datos</a> | <a href="logout.php">Cerrar sesion</a>
	<br/><br/>

	<div id="header">
		Tabla Articulos!
	</div>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Nombre</td>
			<td>Precio (MXN)</td>
			<td>ID_Articulo</td>
			<td>Descripcion</td>
			<td>Cadusidad</td>
			<td>Categoria</td>
			<td>Cantidad</td>
			<td>Merma</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['qty']."</td>";
			echo "<td>".$res['id_articulo']."</td>";
			echo "<td>".$res['descripcion']."</td>";	
			echo "<td>".$res['cadusidad']."</td>";	
			echo "<td>".$res['categoria']."</td>";	
			echo "<td>".$res['cantidad']."</td>";	
			echo "<td>".$res['merma']."</td>";	

			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Estas seguro de que quieres eiminar?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
