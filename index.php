<?php
	session_start();
	include_once("connections/basedados.h");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index</title>
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
				<li><a class="active"  href="index.php">Home</a></li>
                <li><a href="comida.php">Comida</a></li>
                <li><a href="restaurantes.php">Restaurantes</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<h1> Seja muito bem vindo </h1>
	<br>
	<br>
	<h5> Kitchen4All é a nova cadeia de restaurantes onde poderá fazer as suas encomendas online !! </h5>
	<h5> Com Kitchen4All poderás encomendar comida, via aplicação, e é bastante simples!! </h5>
	<h5> Regista-te já em Kitchen4All e poderás começar já a encomendar as tuas refeições favoritas !! </h5>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>