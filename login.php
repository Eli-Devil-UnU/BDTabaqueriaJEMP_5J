<?php session_start(); ?>
<html>
<head>
	<title>Inicio de sesion</title>
</head>

<body>
<a href="index.php">Pagina de inicio</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") {
		echo "El campo de nombre de usuario o contraseña esta vacio.";
		echo "<br/>";
		echo "<a href='login.php'>Volver</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM loginn WHERE username='$user' AND password=md5('$pass')")
					or die("No se puede ejecutar la consulta.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Contraseña incorrecta.";
			echo "<br/>";
			echo "<a href='login.php'>Volver</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Iniciar sesion</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Usuario</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Ingresar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
