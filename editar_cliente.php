<?php
	session_start();
	include_once("connections/basedados.h");
	if(!isset($_SESSION["login"])){ 
		header("Location: login.php"); 
		exit; }
	$id = filter_input(INPUT_GET, 'idUtilizador', FILTER_SANITIZE_NUMBER_INT);
	$result_utilizador = "SELECT * FROM utilizador WHERE idUtilizador='$id'";
	$resultado_utilizador = mysqli_query($conn, $result_utilizador);
	$row_utilizador = mysqli_fetch_assoc($resultado_utilizador);
?>
<html lang="en">
<head>
    <title>Editar dados</title>
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
                <li><a href="indexcliente.php">Home</a></li>
                <li><a href="pedidoscliente.php">Pedidos</a></li>
                <li><a class="active" href="perfilcliente.php">Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1> Editar perfil </h1>
	<br>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
	?>
	<form method="POST" action="proc_edit_cliente.php">
		<input type="hidden" name="idUtilizador" value="<?php echo $row_utilizador ['idUtilizador'];?>"><br><br>
		<label> Nome: </label>
		<input type="text" name="nomeUtilizador" placeholder="" value="<?php echo $row_utilizador ['nomeUtilizador'];?>"> <br><br>
		<label> Email: </label>
		<input type="email" name="emailUtilizador" placeholder="" value="<?php echo $row_utilizador ['emailUtilizador'];?>"><br><br>
		<label> Contacto: </label>
		<input type="password" name="passUtilizador" placeholder="" value="<?php echo $row_utilizador ['passUtilizador'];?>"><br><br>
		<input type="submit" value="Editar">
	</form>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>