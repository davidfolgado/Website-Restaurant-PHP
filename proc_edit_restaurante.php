<?php
	session_start();
	include_once("connections/basedados.h");
	$idRestaurante = $_POST['idRestaurante'];
	$nomeRestaurante = $_POST['nomeRestaurante'];
	$moradaRestaurante = $_POST['moradaRestaurante'];
	$contactoRestaurante = $_POST['contactoRestaurante'];
	
	$result_restaurante="UPDATE restaurante SET nomeRestaurante='$nomeRestaurante', moradaRestaurante='$moradaRestaurante', contactoRestaurante='$contactoRestaurante' WHERE idRestaurante='$idRestaurante'";
	$resultado_restaurante= mysqli_query($conn, $result_restaurante);
	
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg']= "<p style='color=green'> Informações editadas</p>";
		header("Location: gerirrestaurantes.php");
	}else{
		$_SESSION['msg']= "<p style='color=green;'> Informações não editadas</p>";
		header("Location: editar_restaurante.php?id=$id");
	}
?>