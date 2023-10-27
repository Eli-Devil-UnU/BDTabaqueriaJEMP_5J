<html>
<head>
	<title>Register</title>
</head>

<body>
<a href="index.php">Pagina de inicio</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "Deben llenarse todos los campos. Cualquiera de los dos campos estan vacios.";
		echo "<br/>";
		echo "<a href='register.php'>Volver</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO loginn (name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("No se pudo ejecutar la consulta insercion.");
			
		echo "Registro con exito";
		echo "<br/>";
		echo "<a href='login.php'>Iniciar sesion</a>";
	}
} else {
?>
	<p><font size="+2">Registrarse</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre completo</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Gmail</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Nombre de usuario</td>
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
