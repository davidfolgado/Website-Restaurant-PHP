<?php
	session_start();
	include_once("connections/basedados.h");
	$idUtilizador = $_POST['idUtilizador'];
	$nomeUtilizador = $_POST['nomeUtilizador'];
	$emailUtilizador = $_POST['emailUtilizador'];
	$idTipo = $_POST['idTipo'];
	
	$result_utilizador="UPDATE utilizador SET nomeUtilizador='$nomeUtilizador', emailUtilizador='$emailUtilizador', idTipo='$idTipo' WHERE idUtilizador='$idUtilizador'";
	$resultado_utilizador= mysqli_query($conn, $result_utilizador);
	
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg']= "<p style='color=green'> Informações editadas</p>";
		header("Location: gerirutilizadores.php");
	}else{
		$_SESSION['msg']= "<p style='color=green;'> Informações não editadas</p>";
		header("Location: editar_utilizadores.php?id=$id");
	}
?>