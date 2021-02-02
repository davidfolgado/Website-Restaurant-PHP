<?php
	session_start();
	include_once("connections/basedados.h");
	$idEncomenda = $_GET['id'];
	if(!empty($idEncomenda)){
		$result_encomenda = "DELETE FROM encomenda WHERE idEncomenda='$idEncomenda'";
		$resultado_encomenda = mysqli_query($conn, $result_encomenda);
			if(mysqli_affected_rows($resultado_encomenda)){
			$_SESSION['msg'] = "<p style='color:red;'>Erro</p>";
			header("Location: gerirrpedidos.php");
			}else  {
		
			$_SESSION['msg'] = "<p style='color:green;'>Restaurante apagado com sucesso</p>";
			header("Location: gerirpedidos.php");
			}
	}
	?>