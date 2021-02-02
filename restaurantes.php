<?php
	session_start();
	include_once("connections/basedados.h");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Restaurantes</title>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="comida.php">Comida</a></li>
                <li><a class="active" href="restaurantes.php">Restaurantes</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1> Restaurantes </h1>
	<br>
	<?php
		$result_restaurante = "SELECT nomeRestaurante, moradaRestaurante, contactoRestaurante FROM restaurante";
		$resultado_restaurante = mysqli_query($conn, $result_restaurante);
		while($row_restaurante = mysqli_fetch_assoc($resultado_restaurante)){
			echo "Nome do Restaurante: " . $row_restaurante['nomeRestaurante'] . "<br>";
			echo "Morada do Restaurante: " . $row_restaurante['moradaRestaurante'] . "<br>";
			echo "Contacto do Restaurante: " . $row_restaurante['contactoRestaurante'] . "<br>" . "<hr>";
		}
	?>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>