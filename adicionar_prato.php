<?php
	session_start();
	include_once("connections/basedados.h");
	
	if(!isset($_SESSION["login"])){ 
		header("Location: login.php"); 
		exit; }
		
?>
<html lang="en">
<head>
    <title>Adicionar restaurante</title>
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
                <li><a href="indexgestor.php">Home</a></li>
                <li><a href="gerirpedidos.php">Pedidos</a></li>
				<li><a class="active"  href="gerirprato.php">Pratos</a></li>
				<li><a href="perfilgestor.php">Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1> Adicionar prato </h1>
	<br>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
	?>
	<form method="POST" action="proc_adc_prato.php">
		<input type="hidden" name="idRestaurante"><br><br>
		<label> Prato: </label>
		<input type="text" name="nomePrato" placeholder=""> <br><br>
		<label> Valor: </label>
		<input type="number" name="valorPrato" placeholder=""><br><br>
		<input type="submit" value="Adicionar">
	</form>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>