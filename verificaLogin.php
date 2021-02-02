<?php
	session_start();
	include "connections/basedados.h";


	$login = $_POST["login"];
	$pass = $_POST["passwd"];

	$_SESSION["login"] = $login;
	$_SESSION["pass"] = $pass;

	if(empty($_SESSION["login"] || $_SESSION["pass"])){
			echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos');window.location.href='login.php';</script>";
			die();
	}

	$query=mysqli_query($conn,"SELECT * FROM utilizador WHERE nomeUtilizador = '". $login ."' AND passUtilizador= '". $pass ."'");
	if (!$row = mysqli_fetch_assoc($query)){
		echo "<script language='javascript' type='text/javascript'>alert('A password ou nome de utilizador não estão corretos ou conta inexistente ou não aprovada! Tente novamente!');window.location.href='login.php';</script>";
	}else {
		if ($row['idTipo'] == 1){
					$_SESSION['idUtilizador'] = $row['idUtilizador'];
			header("Location: indexcliente.php");
		}elseif($row['idTipo'] == 2){
					$_SESSION['idUtilizador'] = $row['idUtilizador'];
			header("Location: indexgestor.php");
		}elseif($row['idTipo'] == 3){
					$_SESSION['idUtilizador'] = $row['idUtilizador'];
			header("Location: indexadm.php");
		}
	}

	mysqli_close($conn);
?>
