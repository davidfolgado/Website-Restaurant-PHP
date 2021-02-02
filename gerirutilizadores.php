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
    <title>Gerir utilizadores</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
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
                <li><a href="indexadm.php">Home</a></li>
                <li><a class="active" href="gerirutilizador.php">Utilizadores</a></li>
                <li><a href="gerirrestaurantes.php">Restaurantes</a></li>
				<li><a href="perfiladm.php">Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1> Utilizadores </h1>
	<br>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
	?>
	<?php
		$result_utilizador = "SELECT idUtilizador, nomeUtilizador, emailUtilizador, idTipo FROM utilizador";
		$resultado_utilizador = mysqli_query($conn, $result_utilizador);
		while($row_utilizador = mysqli_fetch_assoc($resultado_utilizador)){
			echo "Número do Utilizador: " . $row_utilizador['idUtilizador'] . "<br>";
			echo "Nome do Utilizador: " . $row_utilizador['nomeUtilizador'] . "<br>";
			echo "Email do Utilizador: " . $row_utilizador['emailUtilizador'] . "<br>";
			echo "Tipo de Utilizador: " . $row_utilizador['idTipo'] . "<br>";
			echo "<a href='editar_utilizadores.php?idUtilizador=". $row_utilizador ['idUtilizador']."'> <img border='0' alt='Editar' src='img/edit.png' width='25' height='25'> </a>";
			echo "<a href='proc_apagar_utilizadores.php?id=" . $row_utilizador['idUtilizador'] . "'><img border='0' alt='Apagar' src='img/delete.png' width='25' height='25'></a><br><hr>";
		}
	?>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>