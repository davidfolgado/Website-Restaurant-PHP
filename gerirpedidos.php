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
    <title>Gerir pedidos</title>
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
                <li><a class="active" href="gerirpedidos.php">Pedidos</a></li>
                <li><a href="gerirprato.php">Pratos</a></li>
				<li><a href="perfilgestor.php">Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1>Pedidos</h1>
	<br>
	<br>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
		?>
		<?php
		$result_encomenda = "SELECT idEncomenda, valorEncomenda, idRestaurante, idUtilizador FROM encomenda";
		$resultado_encomenda = mysqli_query($conn, $result_encomenda);
		while($row_encomenda = mysqli_fetch_assoc($resultado_encomenda)){
			echo "Número da Encomenda: " . $row_encomenda['idEncomenda'] . "<br>";
			echo "Valor Encomenda: " . $row_encomenda['valorEncomenda'] . "<br>";
			echo "ID Restaurante: " . $row_encomenda['idRestaurante'] . "<br>";
			echo "ID Utilizador: " . $row_encomenda['idUtilizador'] . "<br>";
			echo "<a href='proc_conclui_encomenda.php?id=" . $row_encomenda['idEncomenda'] . "'><img border='0' alt='Apagar' src='img/check.png' width='25' height='25'></a><br><hr>";
		}
	?>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>