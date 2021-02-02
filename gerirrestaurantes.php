<?php
	session_start();
	include_once("connections/basedados.h");
	if(!isset($_SESSION["login"])){ 
		header("Location: login.php"); 
		exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gerir restaurantes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" type="text/css" href="css/mystylegaleria.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/galeriaa.js"></script>
    <link rel="stylesheet" href="css/icon.css"> <!-- css que acrescenta o botao de fechar na galeria-->
    <link rel="stylesheet" href="css/quicksand.css">

</head>
<body>
<div class="wrapper">

    <nav>
        <div class="logo">
            Kitchen4All
        </div>
        <div class="menu">
            <ul>
                <li><a href="indexadm.php">Home</a></li>
                <li><a href="gerirutilizadores.php">Utilizadores</a></li>
                <li><a class="active" href="gerirrestaurantes.php">Restaurantes</a></li>
				<li><a href="perfiladm.php">Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1> Restaurantes </h1>
	<br>
	<br>
	<a href="adicionar_restaurante.php"> <img border='0' alt='Add' src='img/add.png' width='50' height='50'> </a>
	<br>
	<br>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
	?>
	<?php
		$result_restaurante = "SELECT idRestaurante, nomeRestaurante, moradaRestaurante, contactoRestaurante FROM restaurante";
		$resultado_restaurante = mysqli_query($conn, $result_restaurante);
		while($row_restaurante = mysqli_fetch_assoc($resultado_restaurante)){
			echo "Número do Restaurante: " . $row_restaurante['idRestaurante'] . "<br>";
			echo "Nome do Restaurante: " . $row_restaurante['nomeRestaurante'] . "<br>";
			echo "Morada do Restaurante: " . $row_restaurante['moradaRestaurante'] . "<br>";
			echo "Contacto do Restaurante: " . $row_restaurante['contactoRestaurante'] . "<br>";
			echo "<a href='editar_restaurante.php?idRestaurante=". $row_restaurante ['idRestaurante']."'> <img border='0' alt='Editar' src='img/edit.png' width='25' height='25'>  </a>";
			echo "<a href='proc_apagar_restaurante.php?id=" . $row_restaurante['idRestaurante'] . "'><img border='0' alt='Apagar' src='img/delete.png' width='25' height='25'></a><br><hr>";
		}
	?>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>