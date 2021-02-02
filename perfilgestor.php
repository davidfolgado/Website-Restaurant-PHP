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
    <title>Perfil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" type="text/css" href="css/mystylegaleria.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="js/navbar.js"></script>
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
                <li><a href="gerirprato.php">Pratos</a></li>
				<li><a class="active" href="perfilgestor.php">Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1>Perfil</h1>
	<br>
	<br>
	<div align="center">
		<img src="img/img_avatar2.png" alt="Avatar" class="avatar" height="200" width="200" > 
		<hr>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
		?>
		<?php
			$result_utilizador = 'SELECT idUtilizador, nomeUtilizador, emailUtilizador, passUtilizador FROM utilizador WHERE nomeUtilizador="'.$_SESSION["login"].'"';
			$resultado_utilizador = mysqli_query($conn, $result_utilizador);
			while($row_utilizador = mysqli_fetch_assoc($resultado_utilizador)){
				echo "Nome: " . $row_utilizador['nomeUtilizador'] . "<br>";
				echo "Email: " . $row_utilizador['emailUtilizador'] . "<br>";
				echo "Password: " . $row_utilizador['passUtilizador'] . "<br>" . "<hr>";
				echo "<a href='editar_gestor.php?idUtilizador=". $row_utilizador ['idUtilizador']."'> <img border='0' alt='Editar' src='img/edit.png' width='25' height='25'> </a>";
			}
		?>
	</div>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>