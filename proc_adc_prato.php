<?php
	session_start();
	include_once("connections/basedados.h");
	$nomePrato = $_POST['nomePrato'];
	$valorPrato = $_POST['valorPrato'];
	
	
	$result_prato="INSERT INTO prato (nomePrato, valorPrato) VALUES ('$nomePrato','$valorPrato')";
	$resultado_pratoe= mysqli_query($conn, $result_prato);
	
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg']= "<p style='color=green'> Prato adicionado</p>";
		header("Location: gerirprato.php");
	}else{
		$_SESSION['msg']= "<p style='color=green;'> Prato não adicionado</p>";
		header("Location: adicionar_prato.php");
	}
?>