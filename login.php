<?php
	session_start();
	include_once("connections/basedados.h");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" type="text/css" href="css/mystylegaleria.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="js/navbar.js"></script>
    <link rel="stylesheet" href="css/icon.css"> <!-- css que acrescenta o botao de fechar na galeria-->
    <link rel="stylesheet" href="css/quicksand.css">
	<style>
	img {
		display: block;
		margin-left: auto;
		margin-right: auto;

		}
	</style>
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
                <li><a href="restaurantes.php">Restaurantes</a></li>
                <li><a class="active"  href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>
	 <section class="sec1">
        <br>
        <br>
        <br>
        <h1>Login</h1>
        <br>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
	?>


             <img src="img/img_avatar2.png" alt="Avatar" class="avatar" height="200" width="200" >

            <div align="center">
				<form class= "form_login" method = "POST" action = "verificaLogin.php">
					<p></p><input type="text" name="login" placeholder="username" /><br>
					<p><input type="password" name="passwd" placeholder="password" /><br>
					<p><input type="submit" value ="Login">
				</form>
				<h3>Ou</h3>
				<a href="registar.php"> <h3> Regista-te </h3></a>
			</div>

    </section>
    <section class="content"><!--login-->

    </section>
<footer>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>
