<?php
	session_start();
	include_once("connections/basedados.h");
	$idPrato = $_POST['idPrato'];
	$nomePrato = $_POST['nomePrato'];
	$valorPrato = $_POST['valorPrato'];
	
	$result_prato="UPDATE prato SET nomePrato='$nomePrato', valorPrato='$valorPrato' WHERE idPrato='$idPrato'";
	$resultado_prato= mysqli_query($conn, $result_prato);
	
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg']= "<p style='color=green'> Informações editadas</p>";
		header("Location: gerirprato.php");
	}else{
		$_SESSION['msg']= "<p style='color=green;'> Informações não editadas</p>";
		header("Location: editar_prato.php?id=$id");
	}
?>