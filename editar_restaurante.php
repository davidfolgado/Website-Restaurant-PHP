<?php
	session_start();
	include_once("connections/basedados.h");
	if(!isset($_SESSION["login"])){ 
		header("Location: login.php"); 
		exit; }
	$id = filter_input(INPUT_GET, 'idRestaurante', FILTER_SANITIZE_NUMBER_INT);
	$result_restaurante = "SELECT * FROM restaurante WHERE idRestaurante='$id'";
	$resultado_restaurante = mysqli_query($conn, $result_restaurante);
	$row_restaurante = mysqli_fetch_assoc($resultado_restaurante);
?>
<html lang="en">
<head>
    <title>Editar restaurante</title>
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
	<h1> Editar restaurante </h1>
	<br>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
	?>
	<form method="POST" action="proc_edit_restaurante.php">
		<input type="hidden" name="idRestaurante" value="<?php echo $row_restaurante ['idRestaurante'];?>"><br><br>
		<label> Nome: </label>
		<input type="text" name="nomeRestaurante" placeholder="" value="<?php echo $row_restaurante ['nomeRestaurante'];?>"> <br><br>
		<label> Morada: </label>
		<input type="text" name="moradaRestaurante" placeholder="" value="<?php echo $row_restaurante ['moradaRestaurante'];?>"><br><br>
		<label> Contacto: </label>
		<input type="text" name="contactoRestaurante" placeholder="" value="<?php echo $row_restaurante ['contactoRestaurante'];?>"><br><br>
		<input type="submit" value="Editar">
	</form>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>