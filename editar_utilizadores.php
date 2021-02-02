<?php
	session_start();
	include_once("connections/basedados.h");
	if(!isset($_SESSION["login"])){ 
		header("Location: login.php"); 
		exit; }
	$idUtilizador = filter_input(INPUT_GET, 'idUtilizador', FILTER_SANITIZE_NUMBER_INT);
	$result_utilizador = "SELECT * FROM utilizador WHERE idUtilizador='$idUtilizador'";
	$resultado_utilizador = mysqli_query($conn, $result_utilizador);
	$row_utilizador = mysqli_fetch_assoc($resultado_utilizador);
?>
<html lang="en">
<head>
    <title>Editar utilizador</title>
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
                <li><a class="active" href="gerirutilizadores.php">Utilizadores</a></li>
                <li><a href="gerirrestaurantes.php">Restaurantes</a></li>
				<li><a href="perfiladm.php">Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1> Editar utilizador </h1>
	<br>
	<form method="POST" action="proc_edit_utilizadores.php">
		<input type="hidden" name="idUtilizador" value="<?php echo $row_utilizador ['idUtilizador'];?>"><br><br>
		<label> Nome: </label>
		<input type="text" name="nomeUtilizador" placeholder="" value="<?php echo $row_utilizador ['nomeUtilizador'];?>"> <br><br>
		<label> Email: </label>
		<input type="text" name="emailUtilizador" placeholder="" value="<?php echo $row_utilizador ['emailUtilizador'];?>"><br><br>
		<label> Tipo: </label>
		<select name="idTipo" value="<?php echo $row_utilizador ['idTipo'];?>">
			<option value="1">Cliente</option>
			<option value="2">Gestor de Restaurantes</option>
			<option value="3">Administrador</option>
		</select>
		<br>
		<br>
		<input type="submit" value="Editar">
	</form>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>