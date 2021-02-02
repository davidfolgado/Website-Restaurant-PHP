<?php
	session_start();
	include_once("connections/basedados.h");
	$idRestaurante = $_GET['id'];
	if(!empty($idRestaurante)){
		$result_restaurante = "DELETE FROM restaurante WHERE idRestaurante='$idRestaurante'";
		$resultado_restaurante = mysqli_query($conn, $result_restaurante);
			if(mysqli_affected_rows($resultado_restaurante)){
			$_SESSION['msg'] = "<p style='color:red;'>Erro</p>";
			header("Location: gerirrestaurantes.php");
			}else  {
		
			$_SESSION['msg'] = "<p style='color:green;'>Restaurante apagado com sucesso</p>";
			header("Location: gerirrestaurantes.php");
			}
	}
	?>