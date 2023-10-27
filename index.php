<?php session_start(); ?>
<html>
<head>
	<title>Pagina de inicio</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido a mi pagina Web!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM loginn");
	?>
				
		Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Cerrar sesion</a><br/>
		<br/>
		<a href='view.php'>Ver y Agregar Productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Debes iniciar sesión para ver esta página.<br/><br/>";
		echo "<a href='login.php'>Iniciar sesión</a> | <a href='register.php'>Registrarse</a>";
	}
	?>
	<div id="footer">
		Creado por <a href="https://eli-devil-unu.github.io/TabaqueriaProyecto/" title="Jose Elias Melendez Portilo">Jose Elias Melendez Portilo</a>
	</div>
</body>
</html>
