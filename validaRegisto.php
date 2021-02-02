<?php
	session_start();
	include_once("connections/basedados.h");
	$nomeUtilizador = $_POST['nomeUtilizador'];
	$emailUtilizador = $_POST['emailUtilizador'];
	$passUtilizador = $_POST['passUtilizador'];
	$idTipo =$_POST['idTipo'];
	
	
	$result_utilizador="INSERT INTO utilizador (nomeUtilizador, emailUtilizador, passUtilizador, idTipo) VALUES ('$nomeUtilizador','$emailUtilizador','$passUtilizador','$idTipo')";
	$resultado_utilizador= mysqli_query($conn, $result_utilizador);
	
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg']= "<p style='color=green'> Utilizador criado com sucesso</p>";
		header("Location: login.php");
	}else{
		$_SESSION['msg']= "<p style='color=green;'> Utilizador não registado</p>";
		header("Location: registar.php");
	}
?>