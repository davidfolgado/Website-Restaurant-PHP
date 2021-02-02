<?php
	session_start();
	include_once("connections/basedados.h");
?>
<html lang="en">
<head>
    <title>Registar</title>
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
                <li><a href="comida.php">Comida</a></li>
                <li><a href="restaurantes.php">Restaurantes</a></li>
                <li><a class="active"  href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1> Registe se </h1>
	<br>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
	?>
	<form method="POST" action="validaRegisto.php">
		<input type="hidden" name="idUtilizador"><br><br>
		<label> Nome: </label>
		<input type="text" name="nomeUtilizador" placeholder=""> <br><br>
		<label> Email: </label>
		<input type="email" name="emailUtilizador" placeholder=""><br><br>
		<label> Password: </label>
		<input type="password" name="passUtilizador" placeholder=""><br><br>
		<label> Tipo de Utilizador: </label>
		<select name="idTipo">
			<option value="1">Cliente</option>
			<option value="2">Gestor de Restaurantes</option>
			<option value="3">Administrador</option>
		</select>
		<br>
		<br>
		<input type="submit" value="Registar">
		
	</form>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>