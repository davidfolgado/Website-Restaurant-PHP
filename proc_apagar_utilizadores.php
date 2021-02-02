<?php
	session_start();
	include_once("connections/basedados.h");
	$idUtilizador = $_GET['id'];
	if(!empty($idUtilizador)){
		$result_utilizador = "DELETE FROM utilizador WHERE idUtilizador='$idUtilizador'";
		$resultado_utilizador = mysqli_query($conn, $result_utilizador);
			if(mysqli_affected_rows($resultado_restaurante)){
			$_SESSION['msg'] = "<p style='color:red;'>Erro</p>";
			header("Location: gerirutilizadores.php");
			}else  {
		
			$_SESSION['msg'] = "<p style='color:green;'>Restaurante apagado com sucesso</p>";
			header("Location: gerirutilizadores.php");
			}
	}
	?>