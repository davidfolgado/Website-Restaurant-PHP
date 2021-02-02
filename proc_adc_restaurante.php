<?php
	session_start();
	include_once("connections/basedados.h");
	$nomeRestaurante = $_POST['nomeRestaurante'];
	$moradaRestaurante = $_POST['moradaRestaurante'];
	$contactoRestaurante = $_POST['contactoRestaurante'];
	$idUtilizador = $_POST['idUtilizador'];
	
	$result_restaurante="INSERT INTO restaurante (nomeRestaurante, moradaRestaurante, contactoRestaurante, idUtilizador) VALUES ('$nomeRestaurante','$moradaRestaurante','$contactoRestaurante','$idUtilizador')";
	$resultado_restaurante= mysqli_query($conn, $result_restaurante);
	
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg']= "<p style='color=green'> Restaurante adicionado</p>";
		header("Location: gerirrestaurantes.php");
	}else{
		$_SESSION['msg']= "<p style='color=green;'> Restaurante não adicionado</p>";
		header("Location: adicionar_restaurante.php");
	}
?>