<?php
	session_start();
	include_once("connections/basedados.h");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Comida</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="css/mystylegaleria.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="js/navbar.js"></script>
    <link rel="stylesheet" href="css/icon.css"> <!-- css que acrescenta o botao de fechar na galeria-->
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
</head>
<body>
<div class="wrapper">

    <nav>
        <div class="logo">
            Kitchen4All
        </div>
        <div class="menu">
            <ul>
				<li><a href="index.php">Home</a></li>
                <li><a class="active"  href="comida.php">Comida</a></li>
                <li><a href="restaurantes.php">Restaurantes</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1> Comida </h1>
	<br>
	<?php
		header('Content-Type: text/html; charset=utf-8');
		$result_comida = "SELECT nomePrato, valorPrato FROM prato";
		$resultado_comida = mysqli_query($conn, $result_comida);
		while($row_comida = mysqli_fetch_assoc($resultado_comida)){
			echo "Nome do Prato: " . $row_comida['nomePrato'] . "<br>";
			echo "Preço: " . $row_comida['valorPrato'] . "€" . "<br>"."<hr>";
		}
	?>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>