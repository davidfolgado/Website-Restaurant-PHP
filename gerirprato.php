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
    <title>Gerir comida</title>
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
				<li><a class="active" href="gerirprato.php">Pratos</a></li>
				<li><a href="perfilgestor.php">Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1> Pratos </h1>
	<br>
	<br>
	<a href="adicionar_prato.php"> <img border='0' alt='Add' src='img/add.png' width='50' height='50'> </a>
	<br>
	<br>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
	?>
	<?php
		$result_prato = "SELECT * FROM prato";
		$resultado_prato = mysqli_query($conn, $result_prato);
		while($row_prato = mysqli_fetch_assoc($resultado_prato)){
			echo "Número do prato: " . $row_prato['idPrato'] . "<br>";
			echo "Prato: " . $row_prato['nomePrato'] . "<br>";
			echo "Valor: " . $row_prato['valorPrato'] ."€". "<br>";
			echo "<a href='editar_prato.php?idPrato=". $row_prato ['idPrato']."'> <img border='0' alt='Editar' src='img/edit.png' width='25' height='25'>  </a>";
			echo "<a href='proc_apagar_prato.php?id=" . $row_prato['idPrato'] . "'><img border='0' alt='Apagar' src='img/delete.png' width='25' height='25'></a><br><hr>";
		}
	?>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>